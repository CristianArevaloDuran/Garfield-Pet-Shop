<?php
    session_start();
    include("../db/dbConnection.php");
    
    $identificacion = $_POST["identificacion"];
    $password = $_POST["password"];

    if($identificacion == "" || $password == "") {
        echo json_encode(array("bool" => false, "value" => "Rellene todos los campos"));
    } else {
        $query = $conexion->prepare("SELECT * FROM tblempleados WHERE idEmpleado = '$identificacion'");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        $result = $query->fetch();
        if(password_verify($password, $result["conEmpleado"])) {
            echo json_encode(array("bool" => true, "value" => $result));
            $_SESSION["userid"] = $result["idEmpleado"];
        } else {
            echo json_encode(array("bool" => false, "value" => "Contraseña y/o identificación incorrecta"));
        }
    }
?>