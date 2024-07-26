<?php
require_once 'Conexion.php';

class Tareas extends Conexion {
    public $tar_id;
    public $tar_app;
    public $tar_descripcion;
    public $tar_fecha;
    public $tar_sit;

    public function __construct($args = []) {
        $this->tar_id = $args['tar_id'] ?? null;
        $this->tar_app = $args['tar_app'] ?? '';
        $this->tar_descripcion = $args['tar_descripcion'] ?? '';
        $this->tar_fecha = $args['tar_fecha'] ?? '';
        $this->tar_sit = $args['tar_sit'] ?? '';
    }

    public function guardar() {
        $sql = "INSERT INTO tareas(tar_app, tar_descripcion, tar_fecha) 
                VALUES ($this->tar_app, '$this->tar_descripcion', '$this->tar_fecha')";

     
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function buscar() {
       
        $sql = "SELECT 
                    t.tar_id,
                    a.apl_nombre AS app_nombre,
                    a.apl_id,
                    t.tar_descripcion,
                    t.tar_fecha,
                    t.tar_sit
                FROM 
                    tareas t
                JOIN 
                    aplicacion a ON t.tar_app = a.apl_id
                WHERE t.tar_sit = 1"; 
    
    
       
        // if ($this->tar_id != null) {
        //     $sql .= " AND t.tar_id = $this->tar_id";
        // }
    
        // if ($this->tar_app != '') {
        //     $sql .= " AND a.apl_nombre LIKE '%$this->tar_app%'";
        // }
    
        // if ($this->tar_descripcion != '') {
        //     $sql .= " AND t.tar_descripcion LIKE '%$this->tar_descripcion%'";
        // }
    
        // if ($this->tar_fecha != '') {
        //     $sql .= " AND t.tar_fecha = $this->tar_fecha";
        // }
    
   
        $resultado = self::servir($sql);
        return $resultado;
    }
    


    public function modificar() {
        $sql = "UPDATE tareas 
                SET tar_app = '$this->tar_app', tar_descripcion = '$this->tar_descripcion', 
                    tar_fecha = '$this->tar_fecha' 
                WHERE tar_id = $this->tar_id";
     

        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    
   

    public function eliminar(){
        $sql = "UPDATE tareas SET tar_sit = 0 WHERE tar_id = $this->tar_id";

        $resultado = self::ejecutar($sql);
        return $resultado;
    }
}
