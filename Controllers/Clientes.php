<?php
    class Clientes extends Controller{
        public function __construct()
        {
            session_start();
            if (empty($_SESSION['activo'])) {
                header("location: ".base_url);
            }
            parent::__construct();
        }
        public function index()
        {
            $this->views->getView($this, "index");
        }

        public function listar()
        {
           $data = $this->model->getClientes();
           for ($i=0; $i < count($data); $i++) { 
                if ($data[$i]['estado'] == 1) {
                    $data[$i]['estado'] =' <span class="badge bg-success">Activo</span>';
                    $data[$i]['acciones'] = '<div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="button" aria-pressed="false" autocomplete="off" onclick="btnEditarCli('.$data[$i]['id'].');">Editar</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="button" aria-pressed="false" autocomplete="off" onclick="btnEliminarCli('.$data[$i]['id'].');">Eliminar</button>
                    <div/>';
                }else{
                    $data[$i]['estado'] = ' <span class="badge bg-danger">Inactivo</span>';
                    $data[$i]['acciones'] = '<div>
                   <button type="button" class="btn btn-success" data-bs-toggle="button" aria-pressed="false" autocomplete="off" onclick="btnReingresarCli('.$data[$i]['id'].');">Reingresar</button>
                    <div/>';
                }
           }
           echo json_encode($data, JSON_UNESCAPED_UNICODE);
           die();
        }


        public function registrar()
        {
            $dni = $_POST['dni'];
            $nombre = $_POST['nombre'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $id = $_POST['id'];
            if (empty($dni) || empty($nombre) || empty($telefono) || empty($direccion)) {
                $msg = "Debes llenar todos los campos";
            }else{
                if ($id == "") {
                        $data =  $this->model->registrarCliente($dni, $nombre, $telefono, $direccion);
                        if ($data == "ok") {
                            $msg = "si";
                        }else if ($data == "existe"){
                            $msg = "El dni ya existe";
                        }else{
                            $msg = "Error al registrar cliente";
                        }
                    
                }else {
                    $data =  $this->model->modificarCliente($dni, $nombre, $telefono, $direccion, $id);
                    if ($data == "modificado") {
                        $msg = "modificado";
                    }else{
                        $msg = "Error al modificado el  cliente";
                    }
                }
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function editar(int $id)
        {
            $data = $this->model->editarCli($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function eliminar(int $id)
        {
           $data = $this->model->accionCli(0, $id);
           if ($data == 1) {
             $msg = "ok";
           }else {
                $msg = "Error al eliminar el cliente";
           }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
           die();
        }

        public function reingresar(int $id)
        {
           $data = $this->model->accionCli(1, $id);
           if ($data == 1) {
             $msg = "ok";
           }else {
                $msg = "Error al reingresar el cliente";
           }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
           die();
        }
    }

?>


