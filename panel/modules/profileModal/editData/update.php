<?php
    session_start();
    include("../../../../db/dbConnection.php");

    $nombres = $_POST["name"];
    $apellidos = $_POST["lastname"];
    $email = $_POST["email"];
    $telefono = $_POST["phone"];
    $direccion = $_POST["addres"];
    $fechaNac = $_POST["date"];
    $imgId = $_POST["imagen"];
    $password = $_POST["password"];

    if($nombres == "" || $apellidos == "" || $email == "" || $telefono == "" || $direccion == "" || $fechaNac == "" || $password == "") {
        echo json_encode(array("bool" => false, "value" => "Rellene todos los campos"));
    } else {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $query = $conexion->prepare("UPDATE tblEmpleados SET nomEmpleado = '$nombres', apeEmpleado = '$apellidos', corEmpleado = '$email', telEmpleado = '$telefono', dirEmpleado = '$direccion', fecNacimiento = '$fechaNac', imgEmpleado = '$imgId', conEmpleado = '$password' WHERE idEmpleado = '$_SESSION[userid]'");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $result = $query->execute();
        if($result) {
            echo json_encode(array("bool" => true, "value" => "Datos actualizados"));
        } else {
            echo json_encode(array("bool" => false, "value" => "Error al actualizar, vuelva a intentar"));
        }
        
    }
?>