<?php

require_once '../../db/Database.php';

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Method: GET, POST');
header('Access-Control-Allow-Headers: *');
header('Content-Type: application/json; charset=UTF-8');

$data = json_decode(file_get_contents('php://input'));

$user = $pass = '';

$response = [
    'auth' => false,
    'error' => true,
    'message' => "Error al iniciar sesión"
];

if (isset($data)) {
    $user = $data->user;
    $pass = $data->pass;
}
if ($user && $pass) {
    $database = new Database();
    try {
        if ($auth = $database->auth($user, $pass)) {
            $response = [
                'auth' => true,
                'error' => false,
                'message' => "Autenticado"
            ];
            //TODO: Redirect to Dashboard
        }
    } catch (Exception $e) {
        $response['message'] = $e->getMessage();
    }
}
echo json_encode($response);
