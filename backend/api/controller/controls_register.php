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
    $profesional=validate($data->profesional);
    $especializacion=validate($data->especializacion);
 	$observacion=validate($data->observacion);
}



	if( $fecha&& $profesional && $especializacion && $observacion){

    $database = new Database();

    $params = [$_SESSION['client']['idusuario']];
    try {
        if ($register = $database->registerControl('INSERT INTO  control (fecha,profesional,especializacion,observacion,usuario_idusuario) VALUES (?,?,?,?,?);', $fecha,$profesional,$especializacion,$observacion,
        	$params)){
            $response = [
                'registered' => true,
                'error' => false,
                'message' => "Control registrado"
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