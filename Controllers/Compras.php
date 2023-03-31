<?php
    class Compras extends Controller{
        public function __construct(){
            session_start();
            parent::__construct();
        }

        public function index(){
            $this->views->getView($this, "index");
        }

        public function ventas(){
            $data = $this->model->getClientes();
            $this->views->getView($this, "ventas", $data);
        }

        public function historial_ventas(){
            $this->views->getView($this, "historial_ventas");
        }

        public function buscarCodigo($cod)
        {
            $data = $this->model->getProCod($cod);
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function ingresar()
        {
            $id = $_POST['id'];
             $datos = $this->model->getProductos($id);
            $id_producto = $datos['id'];
            $id_usuario = $_SESSION['id_usuario'];
            $precio = $datos['precio_compra'];
            $cantidad = $_POST['cantidad'];
            $comprobar = $this->model->consultarDetalle('detalle', $id_producto, $id_usuario);
            if (empty($comprobar)) {
                $sub_total = $precio*$cantidad;  
                $data = $this->model->registrarDetalle('detalle',$id_producto, $id_usuario, $precio, $cantidad, $sub_total);
                if ($data == "ok") {
                    $msg = array('msg'=> 'Producto ingresado a la compra' , 'icono' => 'success');
                }else {
                    $msg = array('msg'=> 'Error al ingresar el productos' , 'icono' => 'error');
                }
            }else {
                $total_cantidad = $comprobar['cantidad'] + $cantidad;  
                $sub_total = $total_cantidad * $precio;
                $data = $this->model->actualizarDetalle('detalle',$precio, $total_cantidad, $sub_total, $id_producto, $id_usuario);
                if ($data == "modificado") {
                    $msg = array('msg'=> 'Producto actualizado' , 'icono' => 'success');
                
                }else {
                    $msg = array('msg'=> 'Error al actualizar' , 'icono' => 'error');
                
                }
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function ingresarVenta()
        {
            $id = $_POST['id'];
             $datos = $this->model->getProductos($id);
            $id_producto = $datos['id'];
            $id_usuario = $_SESSION['id_usuario'];
            $precio = $datos['precio_venta'];
            $cantidad = $_POST['cantidad'];
            $comprobar = $this->model->consultarDetalle('detalle_temp',$id_producto, $id_usuario);
            if (empty($comprobar)) {
                $sub_total = $precio*$cantidad;  
                $data = $this->model->registrarDetalle('detalle_temp', $id_producto, $id_usuario, $precio, $cantidad, $sub_total);
                if ($data == "ok") {
                    $msg = "ok";
                }else {
                    $msg = "Error al ingresar el productos";
                }
            }else {
                $total_cantidad = $comprobar['cantidad'] + $cantidad;  
                $sub_total = $total_cantidad * $precio;
                $data = $this->model->actualizarDetalle('detalle_temp',$precio, $total_cantidad, $sub_total, $id_producto, $id_usuario);
                if ($data == "modificar") {
                    $msg = "modificado";
                }else {
                    $msg = "Error al modificar el productos";
                }
            }
            echo json_encode($msg, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function listar($table)
        {
            $id_usuario = $_SESSION['id_usuario'];
            $data['detalle'] = $this->model->getDetalle($table, $id_usuario); 
            $data['total_pagar'] = $this->model->calcularCompra($table, $id_usuario); 
            echo json_encode($data, JSON_UNESCAPED_UNICODE);
            die();
        }

        public function delete($id)
        {
            $data = $this->model->deleteDetalle('detalle',$id);
            if ($data == 'ok') {
                $msg = array('msg'=> 'Producto eliminado' , 'icono' => 'success');
                
            }else {
                $msg = array('msg'=> 'Error' , 'icono' => 'error');
                
            }
            echo json_encode($msg);
            die();
        }

        public function deleteVenta($id)
        {
            $data = $this->model->deleteDetalle('detalle_temp',$id);
            if ($data == 'ok') {
                $msg = array('msg'=> 'Producto eliminado' , 'icono' => 'success');
                
            }else {
                $msg = array('msg'=> 'Error' , 'icono' => 'error');
                
            }
            echo json_encode($msg);
            die();
        }

        public function registrarCompra()
        {
            $id_usuario = $_SESSION['id_usuario'];
            $total = $this->model->calcularCompra('detalle',$id_usuario);
            $data = $this->model->registrarCompra($total['total']);
            if ($data == 'ok') {
                $detalle = $this->model->getDetalle('detalle',$id_usuario);
                $id_compra = $this->model->getId('compras');
                foreach ($detalle as $row) {
                    $cantidad = $row['cantidad'];
                    $precio = $row['precio'];
                    $id_pro = $row['id_producto'];
                    $sub_total = $cantidad * $precio;
                    $this->model->registrarDetalleCompra($id_compra['id'], $id_pro, $cantidad, $precio, $sub_total);
                    $stock_actual = $this->model->getProductos($id_pro);
                    $stock = $stock_actual['cantidad'] + $cantidad;
                    $this->model->actualizarStock($stock, $id_pro );
                } 
                $vacia = $this->model->vaciarDetalle('detalle',$id_usuario);
                if ($vacia == 'ok') {
                    $msg = array('msg' => 'ok' , 'id_compra' => $id_compra['id']);
                }
                
            }else{
                $msg = 'Error al realizar la compra';
            }
            echo json_encode($msg);
            die();
        }

        public function registrarVenta($id_cliente)
        {
            $id_usuario = $_SESSION['id_usuario'];
            $total = $this->model->calcularCompra('detalle_temp',$id_usuario);
            $data = $this->model->registrarVenta($id_cliente, $total['total']);
            if ($data == 'ok') {
                $detalle = $this->model->getDetalle('detalle_temp',$id_usuario);
                $id_venta = $this->model->getId('ventas');
                foreach ($detalle as $row) {
                    $cantidad = $row['cantidad'];
                    $precio = $row['precio'];
                    $id_pro = $row['id_producto'];
                    $sub_total = $cantidad * $precio;
                    $this->model->registrarDetalleVenta($id_venta['id'], $id_pro, $cantidad, $precio, $sub_total);
                    $stock_actual = $this->model->getProductos($id_pro);
                    $stock = $stock_actual['cantidad'] - $cantidad;
                    $this->model->actualizarStock($stock, $id_pro );
                } 
                $vacia = $this->model->vaciarDetalle('detalle_temp',$id_usuario);
                if ($vacia == 'ok') {
                    $msg = array('msg' => 'ok' , 'id_venta' => $id_venta['id']);
                }
                
            }else{
                $msg = 'Error al realizar la compra';
            }
            echo json_encode($msg);
            die();
        }

        public function generarPdf($id_compra)
        {
            $empresa = $this->model->getEmpresa();
            $productos = $this->model->getProCompra($id_compra);
            require('Libraries/fpdf/fpdf.php');

            $pdf = new FPDF('P', 'mm', array(80, 202));
            $pdf->AddPage();
            $pdf->SetMargins(5, 0, 0);
            $pdf->SetTitle('Reporte Compra - LimpiezaStock');
            $pdf->SetFont('Arial','B',14);
            $pdf->Cell(65,40, $empresa['nombre'], 0, 1, 'C');
            $pdf->Image(base_url . 'Assets/img/logos.png', 30, 1, 25, 25);
            $pdf->SetFont('Arial','B',9);
            $pdf->Cell(18, 5, 'Ruc: ', 0, 0, 'L');
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(10, 5, $empresa['ruc'], 0, 1, 'L');
            
            $pdf->SetFont('Arial','B',9);
            $pdf->Cell(18, 5, 'Telefono: ', 0, 0, 'L');
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(10, 5, $empresa['telefono'], 0, 1, 'L');

            $pdf->SetFont('Arial','B',9);
            $pdf->Cell(18, 5, 'Direccion: ', 0, 0, 'L');
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(18, 5, $empresa['direccion'], 0, 1, 'L');

            $pdf->SetFont('Arial','B',9);
            $pdf->Cell(18, 5, 'Folio: ', 0, 0, 'L');
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(18, 5, $id_compra, 0, 1, 'L');
            $pdf->Ln();

            //Emcabezado de productos
            $pdf->SetFillColor(105,105,105);
            $pdf->SetTextColor(255,255,255);
            $pdf->Cell(10, 5, 'Cant', 0, 0, 'L', true);
            $pdf->Cell(35, 5, 'Descripcion', 0, 0, 'L', true);
            $pdf->Cell(10, 5, 'Precio', 0, 0, 'L', true);
            $pdf->Cell(15, 5, 'Sub Total', 0, 1, 'L', true);
            $pdf->SetTextColor(0,0,0);
            $total = 0.00;
            foreach ($productos as $row) {
                $total = $total + $row['sub_total'];
                $pdf->Cell(10, 5, $row['cantidad'], 0, 0, 'L');
                $pdf->Cell(35, 5, $row['descripcion'], 0, 0, 'L');
                $pdf->Cell(10, 5, $row['precio'], 0, 0, 'L');
                $pdf->Cell(15, 5, number_format($row['sub_total'], 2, '.', ','), 0, 1, 'L');
            }
            $pdf->Ln();
            $pdf->Cell(70, 5, 'Total a pagar', 0, 1, 'R');
            $pdf->Cell(70, 5, number_format($total, 2, '.', ','), 0, 1, 'R');


            $pdf->Output();
        }

        public function historial()
        {
            $this->views->getView($this, "historial");
        }

        public function listar_historial()
        {
            $data = $this->model->getHistorialcompras();
            for ($i=0; $i < count($data); $i++) { 
                $data[$i]['acciones'] = '<div>
                <a class="btn btn-danger" href="'.base_url."Compras/generarPdf/".$data[$i]['id'].'" target="_blank">PDF</a>
                <div/>';
           }
            echo json_encode($data);
            die();
        }

        public function listar_historial_venta()
        {
            $data = $this->model->getHistorialVentas();
            for ($i=0; $i < count($data); $i++) { 
                $data[$i]['acciones'] = '<div>
                <a class="btn btn-danger" href="'.base_url."Compras/generarPdfVenta/".$data[$i]['id'].'" target="_blank">PDF</a>
                <div/>';
           }
            echo json_encode($data);
            die();
        }

        public function generarPdfVenta($id_venta)
        {
            $empresa = $this->model->getEmpresa();
            $productos = $this->model->getProVenta($id_venta);
            require('Libraries/fpdf/fpdf.php');

            $pdf = new FPDF('P', 'mm', array(80, 202));
            $pdf->AddPage();
            $pdf->SetMargins(5, 0, 0);
            $pdf->SetTitle('Reporte Venta - LimpiezaStock');
            $pdf->SetFont('Arial','B',14);
            $pdf->Cell(65,40, $empresa['nombre'], 0, 1, 'C');
            $pdf->Image(base_url . 'Assets/img/logos.png', 30, 1, 25, 25);
            $pdf->SetFont('Arial','B',9);
            $pdf->Cell(18, 5, 'Ruc: ', 0, 0, 'L');
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(10, 5, $empresa['ruc'], 0, 1, 'L');
            
            $pdf->SetFont('Arial','B',9);
            $pdf->Cell(18, 5, 'Telefono: ', 0, 0, 'L');
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(10, 5, $empresa['telefono'], 0, 1, 'L');

            $pdf->SetFont('Arial','B',9);
            $pdf->Cell(18, 5, 'Direccion: ', 0, 0, 'L');
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(18, 5, $empresa['direccion'], 0, 1, 'L');

            $pdf->SetFont('Arial','B',9);
            $pdf->Cell(18, 5, 'Folio: ', 0, 0, 'L');
            $pdf->SetFont('Arial','',9);
            $pdf->Cell(18, 5, $id_venta, 0, 1, 'L');
            $pdf->Ln();
            //Emcabezado de Clientes
            $pdf->SetFillColor(105,105,105);
            $pdf->SetTextColor(255,255,255);
            $pdf->SetFont('Arial','B',7);
            $pdf->Cell(25, 5, 'Nombre', 0, 0, 'L', true);
            $pdf->Cell(20, 5, 'Telefono', 0, 0, 'L', true);
            $pdf->Cell(25, 5, 'Direccion', 0, 1, 'L', true);
            $pdf->SetTextColor(0,0,0);
            $clientes = $this->model->clientesVenta($id_venta);
            $pdf->SetFont('Arial','',7);
            $pdf->Cell(25, 5, $clientes['nombre'], 0, 0, 'L');
            $pdf->Cell(20, 5, $clientes['telefono'], 0, 0, 'L');
            $pdf->Cell(25, 5, $clientes['direccion'], 0, 1, 'L');
            
            $pdf->Ln();
            //Emcabezado de productos
            $pdf->SetFillColor(105,105,105);
            $pdf->SetTextColor(255,255,255);
            $pdf->Cell(10, 5, 'Cant', 0, 0, 'L', true);
            $pdf->Cell(35, 5, 'Descripcion', 0, 0, 'L', true);
            $pdf->Cell(10, 5, 'Precio', 0, 0, 'L', true);
            $pdf->Cell(15, 5, 'Sub Total', 0, 1, 'L', true);
            $pdf->SetTextColor(0,0,0);
            $total = 0.00;
            foreach ($productos as $row) {
                $total = $total + $row['sub_total'];
                $pdf->Cell(10, 5, $row['cantidad'], 0, 0, 'L');
                $pdf->Cell(35, 5, $row['descripcion'], 0, 0, 'L');
                $pdf->Cell(10, 5, $row['precio'], 0, 0, 'L');
                $pdf->Cell(15, 5, number_format($row['sub_total'], 2, '.', ','), 0, 1, 'L');
            }
            $pdf->Ln();
            $pdf->Cell(70, 5, 'Total a pagar', 0, 1, 'R');
            $pdf->Cell(70, 5, number_format($total, 2, '.', ','), 0, 1, 'R');


            $pdf->Output();
        }
        
    }

    
?>