<?php
require_once 'Conexion.php';

class Arma extends Conexion{
    public $arma_id;
    public $arma_nombre;
    public $arma_sit;


    public function __construct($args = []){
        $this->arma_id = $args['arma_id'] ?? null;
        $this->arma_nombre = $args['arma_nombre'] ?? '';
        $this->arma_sit = $args['arma_sit'] ?? '';
    }

    public function guardar (){
        $sql = "INSERT INTO armas (arma_nombre) VALUES ('$this->arma_nombre')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * FROM armas WHERE arma_sit = 1";

        if($this->arma_nombre !=''){
            $sql .= " and arma_nombre like '%$this->arma_nombre%' ";
        }


        if($this->arma_id != null){
            $sql .= " and arma_id = $this->arma_id";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE armas SET arma_nombre = '$this->arma_nombre' WHERE arma_id = $this->arma_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE armas SET arma_sit = 0 WHERE arma_id = $this->arma_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
