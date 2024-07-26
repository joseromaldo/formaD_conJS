<?php
require_once 'Conexion.php';

class Aplicacion extends Conexion{
    public $apl_id;
    public $apl_nombre;
    public $apl_estado;


    public function __construct($args = []){
        $this->apl_id = $args['apl_id'] ?? null;
        $this->apl_nombre = $args['apl_nombre'] ?? '';
        $this->apl_estado = $args['apl_estado'] ?? '';
    }

    public function guardar (){
        $sql = "INSERT INTO aplicacion (apl_nombre) VALUES ('$this->apl_nombre')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar(){
        $sql = "SELECT * FROM aplicacion WHERE apl_estado = 1";

        if($this->apl_nombre !=''){
            $sql .= " and apl_nombre like '%$this->apl_nombre%' ";
        }


        if($this->apl_id != null){
            $sql .= " and apl_id = $this->apl_id";
        }

        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar(){
        $sql = "UPDATE aplicacion SET apl_nombre = '$this->apl_nombre' WHERE apl_id = $this->apl_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
        $sql = "UPDATE aplicacion SET apl_estado = 0 WHERE apl_id = $this->apl_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
