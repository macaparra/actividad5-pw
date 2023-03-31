<?php
    class ProductosModel extends Query{
        private $codigo, $nombre, $precio_compra, $precio_venta, $id, $estado, $img;
        public function __construct()
        {
           parent::__construct(); 
        }
       
        
 

        public function getProductos()
        {
            $sql = "SELECT p.* FROM productos p ";
            $data = $this->selectAll($sql);
            return $data;
        }

        public function registrarProducto(string $codigo, string $nombre, string $precio_compra, string $precio_venta, string $img){
            $this->codigo = $codigo;
            $this->nombre = $nombre;
            $this->precio_compra = $precio_compra;
            $this->precio_venta = $precio_venta;
            $this->img = $img;
            $verificar = "SELECT * FROM productos WHERE codigo = '$this->codigo'";
            $existe = $this->select($verificar);
            if (empty($existe)) {
                $sql = "INSERT INTO productos(codigo, descripcion, precio_compra, precio_venta, foto) VALUES (?,?,?,?,?)";
                $datos = array($this->codigo, $this->nombre, $this->precio_compra, $this->precio_venta, $this->img);
                $data = $this->save($sql, $datos);
                if ($data == 1) {
                    $res = "ok";
                }else {
                    $res = "Error";
                }
            }else {
                $res = "existe";
            }
            return $res;
        }

        public function modificarProducto(string $codigo, string $nombre, string $precio_compra, string $precio_venta, string $img, int $id){
            $this->codigo = $codigo;
            $this->nombre = $nombre;
            $this->precio_compra = $precio_compra;
            $this->precio_venta = $precio_venta;
            $this->img = $img;
            $this->id = $id;
            $sql = "UPDATE productos SET codigo = ?, descripcion = ?, precio_compra = ?, precio_venta = ?, foto = ? WHERE id = ?";
            $datos = array($this->codigo, $this->nombre, $this->precio_compra, $this->precio_venta,$this->img, $this->id);
            $data = $this->save($sql, $datos);
            if ($data == 1) {
                $res = "modificado";
            }else {
                $res = "Error";
            }
            return $res;
        }

       public function editarPro(int $id)
       {
        $sql = "SELECT * FROM productos WHERE id = $id";
        $data = $this->select($sql);
        return $data;
       } 

       public function accionPro(int $estado, int $id)
       {
            $this->id = $id;
            $this->estado = $estado;
            $sql = "UPDATE productos SET estado = ? WHERE id = ? ";
            $datos = array($this->estado, $this->id);
            $data = $this->save($sql, $datos);
            return $data;
       }
    }

?>