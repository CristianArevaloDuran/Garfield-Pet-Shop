<?php
    session_start();

    include("../../../db/dbConnection.php");

    $password = $_POST["password"];

    if($password == "") {
        echo json_encode(array("bool" => false, "value" => "Ingrese su contraseña"));
    } else {
        $query = $conexion->prepare("SELECT * FROM tblEmpleados WHERE idEmpleado = '$_SESSION[userid]'");
        $query-> setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        $result = $query->fetch();

        if(password_verify($password, $result["conEmpleado"])) {
            echo json_encode(array("bool" => true, "value" => ""));
            $_SESSION["passConfirmed"] = true;
            $_SESSION["passwordTemp"] = $password;
        } else {
            echo json_encode(array("bool" => false, "value" => "Contraseña incorrecta"));
        }
    }

?>