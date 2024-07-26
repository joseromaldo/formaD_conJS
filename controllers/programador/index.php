<?php
require '../../models/Programador.php';

header('Content-Type: application/json; charset=UTF-8');

$metodo = $_SERVER['REQUEST_METHOD'];

try {
    switch ($metodo) {
        case 'POST':
            $tipo = $_REQUEST['tipo']; 
            $programador = new Programador($_POST);
            switch ($tipo) {
                case '1': 
                    $ejecucion = $programador->guardar();
                    $mensaje = "Guardado correctamente";
                    break;

                case '2': 
                    $ejecucion = $programador->modificar();
                    $mensaje = "Modificado correctamente";
                    break;

                case '3': 
                    $ejecucion = $programador->eliminar();
                    $mensaje = "Eliminado correctamente";
                    break;

                default:
                    http_response_code(400); // Código de error para solicitud incorrecta
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
            $programador = new Programador($_GET);
            $programadores = $programador->buscar();
            echo json_encode($programadores);
            break;

        default:
            http_response_code(405); // Código de error para método no permitido
            echo json_encode([
                "mensaje" => "Método no permitido",
                "codigo" => 9,
            ]);
            break;
    }
} catch (Exception $e) {
    http_response_code(500); // Código de error para error interno del servidor
    echo json_encode([
        "detalle" => $e->getMessage(),
        "mensaje" => "Error de ejecución",
        "codigo" => 0,
    ]);
}

exit;
