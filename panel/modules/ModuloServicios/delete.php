<?php
    session_start();
    include("../../../db/dbConnection.php");
    
    $id = $_GET["id"];

    if(!isset($id)) {
        echo json_encode(array("bool" => false, "value" => "Error"));
    } else {
            $query = $conexion->prepare("DELETE FROM tblServicios WHERE idServicio = '$id'");
            $query->execute();
            echo json_encode(array("bool" => true, "value" => "Servicio eliminado"));
        }
?>