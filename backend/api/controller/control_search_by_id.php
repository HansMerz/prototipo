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
    'error' => true,
    'message' => "Error al consultar el control",
    'data' => []
];

if (isset($data)) {
    $controlId = validate($data->controlId);
}
if ($controlId) {
    $database = new Database();
    try {
        $params = ['i', $controlId];
        if ($controls = $database->getControlById($params)) {
            foreach ($controls as $control) {
                if ($control['idcontrol'] == $controlId) {
                    $response = [
                        'error' => false,
                        'message' => "",
                        'data' => $control
                    ];
                }
            }
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