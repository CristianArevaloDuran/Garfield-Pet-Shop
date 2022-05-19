<?php
    session_start();
    include("../../db/dbConnection.php");
    $input = $_POST["buscador"];
    if(isset($input)) {
        $query = $conexion->prepare("SELECT * FROM tblempleados WHERE nomEmpleado = '$input' || apeEmpleado = '$input'");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $result = $query->execute();
        if($result) {
            echo json_encode(array("bool" => true, "value" => $result));
        } else {
            echo json_encode(array("bool" => false, "value" => "Error"));
        }
    }
    
?>