<?php
require '../../models/Asignar.php';

header('Content-Type: application/json; charset=UTF-8');

$metodo = $_SERVER['REQUEST_METHOD'];

try {
    switch ($metodo) {
        case 'POST':
            $tipo = $_REQUEST['tipo']; 
            $asig = new Asignar($_POST);
            switch ($tipo) {
                case '1': 
                    $ejecucion = $asig->guardar();
                    $mensaje = "Guardado correctamente";
                    break;

                case '2': 
                    $ejecucion = $asig->modificar();
                    $mensaje = "Modificado correctamente";
                    break;

                case '3': 
                    $ejecucion = $asig->eliminar();
                    $mensaje = "Eliminado correctamente";
                  
                    break;

                default:
                    http_response_code(400); 
                    $mensaje = "Tipo de operación no válida";
                    break;
            }
            http_response_code(200);
            echo json_encode([
                "mensaje" => $mensaje,
                "codigo" => 1,
            ]);
            break;

        case 'GET':
            $asig = new Asignar($_GET);
            $asigs = $asig->buscar();
            echo json_encode($asigs);
            break;

        default:
            http_response_code(405); 
            echo json_encode([
                "mensaje" => "Método no permitido",
                "codigo" => 9,
            ]);
            break;
    }
} catch (Exception $e) {
    http_response_code(500); 
    echo json_encode([
        "detalle" => $e->getMessage(),
        "mensaje" => "Error de ejecución",
        "codigo" => 0,
    ]);
}

exit;
