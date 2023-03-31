<?php
    class UsuariosModel extends Query{
        private $usuario, $nombre, $clave, $id_caja, $id, $estado;
        public function __construct()
        {
           parent::__construct(); 
        }
        public function getUsuario(string $usuario, string $clave)
        {
            $sql = "SELECT * FROM usuarios WHERE usuario = '$usuario' AND clave = '$clave'";
            $data = $this->select($sql);
            return $data;
        }
        public function getCajas()
        {
            $sql = "SELECT * FROM caja WHERE estado = 1";
            $data = $this->selectAll($sql);
            return $data;
        }
 

        public function getUsuarios()
        {
            $sql = "SELECT u.*, c.id as id_caja, c.caja FROM usuarios u INNER JOIN caja c WHERE u.id_caja = c.id";
            $data = $this->selectAll($sql);
            return $data;
        }

        public function registrarUsuario(string $usuario, string $nombre, string $clave, int $id_caja){
            $this->usuario = $usuario;
            $this->nombre = $nombre;
            $this->clave = $clave;
            $this->id_caja = $id_caja;
            $verificar = "SELECT * FROM usuarios WHERE usuario = '$this->usuario'";
            $existe = $this->select($verificar);
            if (empty($existe)) {
                $sql = "INSERT INTO usuarios(usuario, nombre, clave, id_caja) VALUES (?,?,?,?)";
                $datos = array($this->usuario, $this->nombre, $this->clave, $this->id_caja);
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

        public function modificarUsuario(string $usuario, string $nombre, int $id_caja, int $id){
            $this->usuario = $usuario;
            $this->nombre = $nombre;
            $this->id = $id;
            $this->id_caja = $id_caja;
            $sql = "UPDATE usuarios SET usuario = ?, nombre = ?, id_caja = ? WHERE id = ?";
            $datos = array($this->usuario, $this->nombre, $this->id_caja, $this->id);
            $data = $this->save($sql, $datos);
            if ($data == 1) {
                $res = "modificado";
            }else {
                $res = "Error";
            }
            return $res;
        }

       public function editarUser(int $id)
       {
        $sql = "SELECT * FROM usuarios WHERE id = $id";
        $data = $this->select($sql);
        return $data;
       } 

       public function getPass(string $clave,int $id)
       {
        $sql = "SELECT * FROM usuarios WHERE clave = '$clave' AND id = $id";
        $data = $this->select($sql);
        return $data;
       } 
       public function accionUser(int $estado, int $id)
       {
            $this->id = $id;
            $this->estado = $estado;
            $sql = "UPDATE usuarios SET estado = ? WHERE id = ? ";
            $datos = array($this->estado, $this->id);
            $data = $this->save($sql, $datos);
            return $data;
       }

       public function modificarPass(string $clave, int $id)
       {
            $sql = "UPDATE usuarios SET clave = ? WHERE id = ? ";
            $datos = array($clave, $id);
            $data = $this->save($sql, $datos);
            return $data;
       }

       public function getDatos(string $table)
       {
            $sql = "SELECT COUNT(*) AS total FROM $table";
            $data = $this->select($sql);
            return $data;
       } 

        public function getVentas()
       {
            $sql = "SELECT COUNT(*) AS total FROM ventas WHERE fecha > CURDATE()";
            $data = $this->select($sql);
            return $data;
       } 

       

       public function getStockMinimo()
       {
            $sql = "SELECT * FROM productos WHERE cantidad > 9 ORDER BY cantidad DESC LIMIT 10";
            $data = $this->selectAll($sql);
            return $data;
        } 

        public function getproductosVendidos()
        {
             $sql = "SELECT d.id_producto, d.cantidad, p.id, p.descripcion, SUM(d.cantidad) AS total FROM detalle_ventas d INNER JOIN productos p ON p.id = d.id_producto  GROUP BY d.id_producto ORDER BY d.cantidad DESC LIMIT 10";
             $data = $this->selectAll($sql);
             return $data;
         } 
       

       
       
    }

?>