<?php 
    class Producto extends Conectar {
        public function getProducto() {
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SET * FROM tm_producto";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function getProductoId($prod_id) {
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SET * FROM tm_producto WHERE prod_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$prod_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }
?>