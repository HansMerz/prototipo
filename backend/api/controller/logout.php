<?php

session_start();

if (isset($_SESSION['client'])) {
    session_unset();
    session_destroy();
}
header("Location: ../../../index.php");
