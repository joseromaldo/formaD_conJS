<?php
require_once 'Conexion.php';

class Asignar extends Conexion
{
    public $asi_id;
    public $asi_pro;
    public $asi_app;
    public $asi_sit; 

    public function __construct($args = [])
    {
        $this->asi_id = $args['asi_id'] ?? null;
        $this->asi_pro = $args['asi_pro'] ?? '';
        $this->asi_app = $args['asi_app'] ?? '';
        $this->asi_sit = $args['asi_sit'] ?? 1;
    }

    public function guardar()
    {
        $sql = "INSERT INTO asignacion (asi_pro, asi_app, asi_sit) 
                VALUES ('$this->asi_pro', '$this->asi_app', '$this->asi_sit')";
        $resultado = self::ejecutar($sql);
        return $resultado;
    }

//  public function buscarnom2()
//     {
//         $sql = " SELECT DISTINCT apl_nombre, apl_id
// FROM asignacion 
// INNER JOIN programador ON pro_id = asi_programador
// INNER JOIN aplicacion ON apl_id = asi_aplicacion 
// INNER JOIN grados ON gra_id = pro_grado
// INNER JOIN armas ON pro_arma = arma_id
// INNER JOIN tareas ON apl_id = tar_app;
// ";

//         $conditions = [];

//         if ($this->asi_id !== null) {
//             $conditions[] = "asi_id = $this->asi_id";
//         }

//         if ($this->asi_aplicacion !== false && $this->asi_aplicacion !== '') {
//             $conditions[] = "asi_aplicacion = $this->asi_aplicacion";
//         }

//         if ($this->asi_programador !== false && $this->asi_programador !== '') {
//             $conditions[] = "asi_programador = $this->asi_programador";
//         }

//         if (!empty($conditions)) {
//             $sql .= " WHERE " . implode(" AND ", $conditions);
//         }





//         $resultado = self::servir($sql);

//         return $resultado;
//     }
//     public function buscarnom()
//     {
//         $sql = "SELECT gra_nombre || ' de ' || arma_descripcion || ' ' || pro_nombre || ' ' || pro_apellido AS nombre, apl_nombre, asi_id, apl_id, pro_id
//                 FROM asignacion 
//                 INNER JOIN programador ON pro_id = asi_programador
//                 INNER JOIN aplicacion ON apl_id = asi_aplicacion 
//                 INNER JOIN grados ON gra_id = pro_grado
//                 INNER JOIN armas ON pro_arma = arma_id";
    
//         $conditions = [];
    
//         if ($this->asi_id !== null) {
//             $conditions[] = "asi_id = $this->asi_id";
//         }
    
//         if ($this->asi_aplicacion !== false && $this->asi_aplicacion !== '') {
//             $conditions[] = "asi_aplicacion = $this->asi_aplicacion";
//         }
    
//         if ($this->asi_programador !== false && $this->asi_programador !== '') {
//             $conditions[] = "asi_programador = $this->asi_programador";
//         }
    
//         if (!empty($conditions)) {
//             $sql .= " WHERE " . implode(" AND ", $conditions);
//         }
    
       
        
    
      
//         $resultado = self::servir($sql);
    
//         return $resultado;
//     }
    




    public function buscar()
    {
        $sql = "SELECT 
        asi_id,
    p.pro_nombre AS pro_nombre, 
    p.pro_apellido AS pro_apellido,
    a.apl_nombre AS app_nombre,
        asi_sit
FROM 
    asignacion 
JOIN 
    programador p ON asi_pro = p.pro_id
JOIN 
    aplicacion a ON asi_app = a.apl_id
WHERE 
    asi_sit = 1 
    AND p.pro_situacion = 1 
    AND a.apl_estado = 1";


        $resultado = self::servir($sql);
        return $resultado;
    }

    public function modificar()
    {
    
        $sql = "UPDATE asignacion
                SET asi_pro = '$this->asi_pro', asi_app = '$this->asi_app' 
                WHERE asi_id = $this->asi_id";
     

        $resultado = self::ejecutar($sql);
        return $resultado;
    }

    public function eliminar(){
       
            $sql = "UPDATE asignacion SET asi_sit = 0 WHERE asi_id = $this->asi_id";

            $resultado = self::ejecutar($sql);
            return $resultado;

    
            
    }
}
