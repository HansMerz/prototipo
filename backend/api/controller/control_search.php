<?php

require_once '../../db/Database.php';

$database = new Database();

$controlData = $database->select('SELECT * FROM control;');