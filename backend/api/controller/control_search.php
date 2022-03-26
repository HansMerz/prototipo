<?php

require_once(realpath(dirname(__FILE__) . '/../../db/Database.php'));

function getControlData() {

    $database = new Database();
    $params = [
      'i',
      $_SESSION['client']['idusuario']
    ];
    $controlData = $database->select('SELECT * FROM control WHERE usuario_idusuario = ?;', $params);
    return $controlData;
}