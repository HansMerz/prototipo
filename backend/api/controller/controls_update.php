<?php
session_start();
require_once(realpath(dirname(__FILE__) . '/../../db/Database.php'));


header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Method: GET, POST');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json; charset=UTF-8');

$data = json_decode(file_get_contents('php://input'));


if (isset($data)) {
    $fecha = validate($data->fecha);
    $profesional = validate($data->profesional);
    $especializacion = validate($data->especializacion);
    $observacion = validate($data->observacion);
    $idcontrol = validate($data->idcontrol);
}


if ($fecha && $profesional && $especializacion && $observacion && $idcontrol) {

    $database = new Database();

    $params = [$idcontrol];
    try {
        if ($register = $database->registerControl('UPDATE control SET fecha = ?, profesional = ?, especializacion = ?, observacion = ? WHERE idcontrol = ?', $fecha, $profesional, $especializacion, $observacion,
            $params)) {
            $response = [
                'updated' => true,
                'error' => false,
                'message' => "Control actualizado"
            ];
        }
    } catch (Exception $e) {
        $response['message'] = $e->getMessage();
    }
}
echo json_encode($response);


function validate($data)
{

    $data = trim($data);

    $data = stripslashes($data);

    $data = htmlspecialchars($data);

    return $data;

}