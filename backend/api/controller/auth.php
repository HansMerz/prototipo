<?php

session_start();

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
    $user = validate($data->user);
    $pass = validate($data->pass);
}
if ($user && $pass) {
    $database = new Database();
    try {
        if ($auth = $database->auth($user, $pass)) {
            foreach ($auth as $client) {
                if ($client['username'] == $user && $client['password'] == $pass) {
                    $response = [
                        'auth' => true,
                        'error' => false,
                        'message' => "Autenticado"
                    ];
                    $_SESSION['client'] = $client;
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