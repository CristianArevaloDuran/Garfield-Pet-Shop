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
    $rol = $_POST["role"];
    $id = $_POST["id"];

    date_default_timezone_set('America/Bogota');
    $date = date('d-m-y h:i:s');

    if($nombres == "" || $apellidos == "" || $email == "" || $telefono == "" || $direccion == "" || $fechaNac == "" || $password == "") {
        echo json_encode(array("bool" => false, "value" => "Rellene todos los campos"));
    } else {
        $password = password_hash($password, PASSWORD_BCRYPT);
        $query = $conexion->prepare("INSERT INTO tblEmpleados VALUES ('$id', '$imgId', '$nombres', '$apellidos', '$email', '$telefono', '$direccion', '$fechaNac', '$date', null, '$rol', 1, '$password')");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $result = $query->execute();
        if($result) {
            echo json_encode(array("bool" => true, "value" => "Empleado registrado"));
        } else {
            echo json_encode(array("bool" => false, "value" => "Error al registrar, vuelva a intentar"));
        }
        
    }
?>