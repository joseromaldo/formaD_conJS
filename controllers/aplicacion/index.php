<?php
require '../../models/Aplicacion.php';
header('Content-Type: application/json; charset=UTF-8');

$metodo = $_SERVER['REQUEST_METHOD'];
// $tipo = $_REQUEST['tipo'];


try {
    switch ($metodo) {
        case 'POST':
            $tipo = $_REQUEST['tipo']; //Se cambió de posición esta variable
            $app = new Aplicacion($_POST);
            switch ($tipo) {
                case '1':

                    $ejecucion = $app->guardar();
                    $mensaje = "Guardado correctamente";
                    break;

                    case '2':

                        $ejecucion = $app->modificar();
                        $mensaje = "Modificado correctamente";
                        break;

                        case '3':

                            $ejecucion = $app->eliminar();
                            $mensaje = "Eliminar correctamente";
                            break;

                default:
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
            // http_response_code(200);
            $app = new Aplicacion($_GET);
            $apps = $app->buscar();
            echo json_encode($apps);
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
