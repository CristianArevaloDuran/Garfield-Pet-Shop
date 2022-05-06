<?php

    session_start();
    include("../../../../db/dbConnection.php");

    $name = $_POST["name"];
    $checks = $_POST["checks"];

    if($checks) {
        
            echo json_encode(array("bool" => false, "value" => "$checks[0]"));
        
    } else {
        $query = $conexion->prepare("");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $result = $query->execute();
        if($result) {
            echo json_encode(array("bool" => true, "value" => "Datos actualizados"));
        } else {
            echo json_encode(array("bool" => false, "value" => "Error al actualizar, vuelva a intentar"));
        }
        
    }
?>