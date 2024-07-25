<?php
require '../../models/Grado.php';
header('Content-Type: application/json; charset=UTF-8');

$metodo = $_SERVER['REQUEST_METHOD'];
// $tipo = $_REQUEST['tipo'];


try {
    switch ($metodo) {
        case 'POST':
            $tipo = $_REQUEST['tipo']; //Se cambió de posición esta variable
            $grado = new Grado($_POST);
            switch ($tipo) {
                case '1':

                    $ejecucion = $grado->guardar();
                    $mensaje = "Guardado correctamente";
                    break;

                    case '2':

                        $ejecucion = $grado->modificar();
                        $mensaje = "Modificado correctamente";
                        break;

                        case '3':

                            $ejecucion = $grado->eliminar();
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
            $grado = new Grado($_GET);
            $grados = $grado->buscar();
            echo json_encode($grados);
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
