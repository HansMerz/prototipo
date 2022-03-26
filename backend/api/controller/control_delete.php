<?php

session_start();

require_once '../../db/Database.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Method: GET, POST');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json; charset=UTF-8');

$data = json_decode(file_get_contents('php://input'));

$controlId = '';

$response = [
    'deleted' => false,
    'error' => true,
    'message' => "Error al eliminar el control"
];

if (isset($data)) {
    $controlId = validate($data->controlId);
}
if ($controlId) {
    $database = new Database();
    try {
        if ($delete = $database->deleteControl($controlId)) {
            $response = [
                'deleted' => true,
                'error' => false,
                'message' => "Control Eliminado"
            ];
        }
    } catch (Exception $e) {
        $response['message'] = $e->getMessage();
    }
}
echo json_encode($response);

function validate($data){

    $data = trim($data);

    $data = stripslashes($data);

    $data = htmlspecialchars($data);

    return $data;

}