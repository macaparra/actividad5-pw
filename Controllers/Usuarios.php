<?php
    class Usuarios extends Controller{
        public function __construct()
        {
            session_start();
          
            parent::__construct();
        }
        public function index()
        {
            if (empty($_SESSION['activo'])) {
                header("location: ".base_url);
            }
            $data['cajas'] = $this->model->getCajas();
            $this->views->getView($this, "index", $data);
        }

        public function home()
        {
            if (empty($_SESSION['activo'])) {
                header("location: ".base_url);
            }   
            $data['usuarios'] = $this->model->getDatos('usuarios');
            $data['clientes'] = $this->model->getDatos('clientes');
            $data['productos'] = $this->model->getDatos('productos');
            $data['ventas'] = $this->model->getVentas();
            $this->views->getView($this, "home", $data);
        }
        public function listar()
        {
           $data = $this->model->getUsuarios();
           for ($i=0; $i < count($data); $i++) { 
                if ($data[$i]['estado'] == 1) {
                    $data[$i]['estado'] =' <span class="badge bg-success">Activo</span>';
                    $data[$i]['acciones'] = '<div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="button" aria-pressed="false" autocomplete="off" onclick="btnEditarUser('.$data[$i]['id'].');">Editar</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="button" aria-pressed="false" autocomplete="off" onclick="btnEliminarUser('.$data[$i]['id'].');">Eliminar</button>
                    <div/>';
                }else{
                    $data[$i]['estado'] = ' <span class="badge bg-danger">Inactivo</span>';
                    $data[$i]['acciones'] = '<div>
                    <button type="button" class="btn btn-success" data-bs-toggle="button" aria-pressed="false" autocomplete="off" onclick="btnReingresarUser('.$data[$i]['id'].');">Reingresar</button>
                     <div/>';
                }

           }
           echo json_encode($data, JSON_UNESCAPED_UNICODE);
           die();
        }

        public function validar()
        {
            if (empty($_POST['usuario']) || empty($_POST['clave'])) {
                $msg = "Los campos estan vacios";
            }else{
                $usuario = $_POST['usuario'];
                $clave = $_POST['clave'];
                $hash = hash("SHA256", $clave);
                $data = $this->model->getUsuario($usuario, $hash);
                if ($data) {
                    $_SESSION['id_usuario'] = $data['id'];
                    $_SESSION['usuario'] = $data['usuario'];
                    $_SESSION['nombre'] = $data['nombre'];
                    $_SESSION['activo'] = true;
                    $msg = "ok";
                }else{
                    $msg = "Usuario o contrasena incorrecta";
                }

            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function registrar()
        {
            $usuario = $_POST['usuario'];
            $nombre = $_POST['nombre'];
            $clave = $_POST['clave'];
            $confirmar = $_POST['confirmar'];
            $caja = $_POST['caja'];
            $id = $_POST['id'];
            $hash = hash("SHA256", $clave);
            if (empty($usuario) || empty($nombre) || empty($caja)) {
                $msg = array('msg'=> 'Debes llenar todos los campos', 'icono'=>'warning');
            }else{
                if ($id == "") {
                    if ($clave != $confirmar) {
                        $msg = array('msg'=> 'Las contrasenas no coinciden', 'icono'=>'warning');
                    }else {
                        $data =  $this->model->registrarUsuario($usuario, $nombre, $hash, $caja);
                        if ($data == "ok") {
                            $msg = array('msg'=> 'Usuario registrado con exito', 'icono'=>'success');
                        }else if ($data == "existe"){
                            $msg = array('msg'=> 'El usuario ya existe', 'icono'=>'warning');
                        }else{
                            $msg = array('msg'=> 'Error al registrar usuario', 'icono'=>'error');
                        }
                    }
                }else {
                    $data =  $this->model->modificarUsuario($usuario, $nombre, $caja, $id);
                    if ($data == "modificado") {
                        $msg = array('msg'=> 'modificado', 'icono'=>'success');
                    }else{
                        $msg = array('msg'=> 'Error al modificado el  usuario', 'icono'=>'error');
                        
                    }
                }
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function editar(int $id)
        {
            $data = $this->model->editarUser($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function eliminar(int $id)
        {
           $data = $this->model->accionUser(0, $id);
           if ($data == 1) {
             $msg = array('msg'=> 'Usuario dado de baja', 'icono'=>'success');
           }else {
                $msg = array('msg'=> 'Error al eliminar el usuario', 'icono'=>'error');
           }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
           die();
        }

        public function reingresar(int $id)
        {
           $data = $this->model->accionUser(1, $id);
           if ($data == 1) {
            $msg = array('msg'=> 'Usuario reingresado', 'icono'=>'success');
          }else {
               $msg = array('msg'=> 'Error al reingresar el usuario', 'icono'=>'error');
          }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
           die();
        }

        public function cambiarPass()
        {
            $actual = $_POST['clave_actual'];
            $nueva = $_POST['clave_nueva'];
            $confirmar = $_POST['confirmar_clave'];
            if (empty($actual) || empty($nueva) || empty($confirmar)) {
                $mensaje = array('msg' => "Debes llenar todos los campos", 'icono' => 'warning');
            }else {
                if ($nueva!= $confirmar) {
                    $mensaje = array('msg' => "Las contraseñas no coinciden", 'icono' => 'warning');
                } else {
                    $id = $_SESSION['id_usuario'];
                    $hash = hash("SHA256", $actual);
                    $data = $this->modal->getPass($hash, $id);
                    if (!empty($data)) {
                       
                        $verificar = $this->model->modificarPass(hash("SHA256", $nueva), $id);
                        if ($verificar == 1) {
                            $mensaje = array('msg' => "Contraseñas modificada con exito", 'icono' => 'success');
                        }else{
                            $mensaje = array('msg' => "Error al modificar la contraseña", 'icono' => 'error');

                        }
                    }else {
                        $mensaje = array('msg' => "La contraseña actual es incorrecta", 'icono' => 'error');

                    }
                    echo json_encode($mensaje, JSON_UNESCAPED_UNICODE);
                    die();
                }
                
            }
        }

        public function salir()
        {
           session_destroy();
           header("location: ".base_url);
        }

        public function reporteStock()
       {
            $data = $this->model->getStockMinimo();
            echo json_encode($data);
            die();
       }

       public function productosVendidos()
       {
            $data = $this->model->getproductosVendidos();
            echo json_encode($data);
            die();
       }

       
    }

?>


