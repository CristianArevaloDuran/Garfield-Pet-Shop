<?php
    session_start();
    include("../../../db/dbConnection.php");
    
    $id = $_GET["id"];

    if(!isset($id)) {
        echo json_encode(array("bool" => false, "value" => "Error"));
    } else if($id == "1") {
        echo json_encode(array("bool" => false, "value" => "No se puede eliminar el rol Administrador"));
    } else {
        $query = $conexion->prepare("DELETE FROM tblrol WHERE idRol = '$id'");
        $query->execute();
        if($query) {
            echo json_encode(array("bool" => true, "value" => "Rol eliminado correctamente"));
        } else {
            echo json_encode(array("bool" => false, "value" => "Error"));
        }
    }
?>