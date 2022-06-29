<?php
    session_start();
    include("../../db/dbConnection.php");
    $input = $_POST["buscador"];
    if(isset($input)) {
        $query = $conexion->prepare("SELECT * FROM tblempleados WHERE nomEmpleado = '$input'");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        while($result = $query->fetch()) {
            echo json_encode(array("bool" => true, "value" => $result["nomEmpleado"]));
        }
    }
    
?>