<?php 
    class Producto extends Conectar {
        public function getProducto() {
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_producto WHERE est=1";
            $sql=$conectar->prepare($sql);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function getProductoId($prod_id) {
            $conectar = parent::conexion();
            parent::set_names();
            $sql="SELECT * FROM tm_producto WHERE prod_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$prod_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function deleteProducto($prod_id) {
            $conectar = parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_producto
                SET
                    est=0,
                    fech_elim=now()
                WHERE
                    prod_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$prod_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function insertProducto($prod_nom) {
            $conectar = parent::conexion();
            parent::set_names();
            $sql="INSERT INTO tm_producto (prod_id, prod_nom, fech_crea, fech_modi, fech_elim, est) VALUES (NULL, ? , now(), NULL, NULL, 1);";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$prod_nom);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }

        public function updateProducto($prod_id, $prod_nom) {
            $conectar = parent::conexion();
            parent::set_names();
            $sql="UPDATE tm_producto
                SET
                    prod_nom=?,
                    fech_modi=now()
                WHERE
                    prod_id = ?";
            $sql=$conectar->prepare($sql);
            $sql->bindValue(1,$prod_nom);
            $sql->bindValue(2,$prod_id);
            $sql->execute();
            return $resultado=$sql->fetchAll();
        }
    }
?>