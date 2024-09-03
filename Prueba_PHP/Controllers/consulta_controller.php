<?php
require_once __DIR__ . '/../Models/Peticion.php';

if (isset($_GET['inicio']) && isset($_GET['final'])) {
    $startYear = $_GET['inicio'];
    $endYear = $_GET['final'];

    $con = new Consulta();
    $datos = $con->getDatos($startYear, $endYear);

    header('Content-Type: application/json');
    echo json_encode($datos);
    exit;
}


