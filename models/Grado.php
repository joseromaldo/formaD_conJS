<?php
require_once 'Conexion.php';

class Grado extends Conexion{
    public $gra_id;
    public $gra_nombre;
    public $gra_sit;


    public function __construct($args = []){
        $this->gra_id = $args['gra_id'] ?? null;
        $this->gra_nombre = $args['gra_nombre'] ?? '';
        $this->gra_sit = $args['gra_sit'] ?? '';
    }

    public function guardar (){
        $sql = "INSERT INTO grados (gra_nombre) VALUES ('$this->gra_nombre')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * FROM grados WHERE gra_sit = 1";

        if($this->gra_nombre !=''){
            $sql .= " and gra_nombre like '%$this->gra_nombre%' ";
        }


        if($this->gra_id != null){
            $sql .= " and gra_id = $this->gra_id";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE grados SET gra_nombre = '$this->gra_nombre' WHERE gra_id = $this->gra_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE grados SET gra_sit = 0 WHERE gra_id = $this->gra_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}