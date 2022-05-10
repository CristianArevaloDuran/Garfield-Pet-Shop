<?php
    session_start();
    include("../../../db/dbConnection.php");
    
    $id = $_GET["id"];

    if(!isset($id)) {
        echo json_encode(array("bool" => false, "value" => "Error"));
    } else if($id == "1") {
        echo json_encode(array("bool" => false, "value" => "No se puede eliminar el rol Administrador"));
    } else {

        $query = $conexion->prepare("SELECT * FROM tblEmpleados WHERE rolEmpleado = '$id'");
        $query->execute();
        if($query->rowCount() > 0) {
            echo json_encode(array("bool" => false, "value" => "No se puede eliminar el rol porque tiene empleados asociados"));
        } else {
            $query = $conexion->prepare("DELETE FROM tblRol WHERE idRol = '$id'");
            $query->execute();
            echo json_encode(array("bool" => true, "value" => "Rol eliminado"));
        }
    }
?>