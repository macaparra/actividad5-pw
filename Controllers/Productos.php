<?php
    class Productos extends Controller{
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
            
            $this->views->getView($this, "index");
        }

        public function listar()
        {
           $data = $this->model->getProductos();
           for ($i=0; $i < count($data); $i++) { 
                $data[$i]['imagen'] = '<img class="img-thumbnail" src="'. base_url. "Assets/img/".$data[$i]['foto'].'" width="100">';
                if ($data[$i]['estado'] == 1) {
                    $data[$i]['estado'] =' <span class="badge bg-success">Activo</span>';
                    $data[$i]['acciones'] = '<div>
                    <button type="button" class="btn btn-primary" data-bs-toggle="button" aria-pressed="false" autocomplete="off" onclick="btnEditarPro('.$data[$i]['id'].');">Editar</button>
                    <button type="button" class="btn btn-danger" data-bs-toggle="button" aria-pressed="false" autocomplete="off" onclick="btnEliminarPro('.$data[$i]['id'].');">Eliminar</button>
                    <div/>';
                }else{
                    $data[$i]['estado'] = ' <span class="badge bg-danger">Inactivo</span>';
                    $data[$i]['acciones'] = '<div>
                    <button type="button" class="btn btn-success" data-bs-toggle="button" aria-pressed="false" autocomplete="off" onclick="btnReingresarPro('.$data[$i]['id'].');">Reingresar</button>
                     <div/>';
                }

           }
           echo json_encode($data, JSON_UNESCAPED_UNICODE);
           die();
        }



        public function registrar()
        {
            $codigo = $_POST['codigo'];
            $nombre = $_POST['nombre'];
            $precio_compra = $_POST['precio_compra'];
            $precio_venta = $_POST['precio_venta'];
            // $medida = $_POST['medida'];
            // $categoria = $_POST['categoria'];
            $id = $_POST['id'];
            $img = $_FILES['imagen'];
            $name = $img['name'];
            $tmpname = $img['tmp_name'];
            $destino = "Assets/img/".$name;
            $fecha = date("YmdHis");
            if (empty($codigo) || empty($nombre) || empty($precio_compra) || empty($precio_venta)) {
                $msg = "Debes llenar todos los campos";
            }else{
                if (!empty($name)) {
                   $imgNombre = $fecha . ".jpg";
                   $destino = "Assets/img/". $imgNombre;
                }else if (!empty($_POST['foto_actual']) && empty($name)) {
                    $imgNombre = $_POST['foto_actual'];
                }else{
                    $imgNombre = "default.png";
                }
                if ($id == "") {
                        $data =  $this->model->registrarProducto($codigo, $nombre, $precio_compra, $precio_venta, $imgNombre);
                        if ($data == "ok") {
                            if (!empty($name)) {
                                move_uploaded_file($tmpname, $destino);
                            }
                            $msg = "si";
                            
                        }else if ($data == "existe"){
                            $msg = "El Producto ya existe";
                        }else{
                            $msg = "Error al registrar Producto";
                        }
                }else {
                    $imgDelete = $this->model->editarPro($id);
                    if ($imgDelete['foto'] !='default.png' ) {
                        if (file_exists("Assets/img/".$imgDelete['foto'])) {
                            unlink("Assets/img/".$imgDelete['foto']);
                        }
                    }
                    $data =  $this->model->modificarProducto($codigo, $nombre, $precio_compra, $precio_venta, $imgNombre, $id);
                    if ($data == "modificado") {
                        if (!empty($name)) {
                            move_uploaded_file($tmpname, $destino);
                        }
                        $msg = "modificado";
                    }else{
                        $msg = "Error al modificado el  Producto";
                    }  
                }
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function editar(int $id)
        {
            $data = $this->model->editarPro($id);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function eliminar(int $id)
        {
           $data = $this->model->accionPro(0, $id);
           if ($data == 1) {
             $msg = "ok";
           }else {
                $msg = "Error al eliminar el Producto";
           }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
           die();
        }

        public function reingresar(int $id)
        {
           $data = $this->model->accionPro(1, $id);
           if ($data == 1) {
             $msg = "ok";
           }else {
                $msg = "Error al reingresar el Producto";
           }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
           die();
        }

    }

?>


