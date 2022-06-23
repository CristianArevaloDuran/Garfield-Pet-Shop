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
    $rol = $_POST["role"];
    $id = $_POST["id"];

    date_default_timezone_set('America/Bogota');
    $date = date('d-m-y h:i:s');

    if($nombres == "" || $apellidos == "" || $email == "" || $telefono == "" || $direccion == "" || $fechaNac == "") {
        echo json_encode(array("bool" => false, "value" => "Rellene todos los campos"));
    } else {
        $query = $conexion->prepare("UPDATE `tblempleados` SET `imgEmpleado`='$imgId',`nomEmpleado`='$nombres',`apeEmpleado`='$apellidos',`corEmpleado`='$email',`telEmpleado`='$telefono',`dirEmpleado`='$direccion',`fecNacimiento`='$fechaNac', `rolEmpleado`='$rol' WHERE idEmpleado = '$id'");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $result = $query->execute();
        if($result) {
            echo json_encode(array("bool" => true, "value" => "Empleado actualizado correctamente"));
        } else {
            echo json_encode(array("bool" => false, "value" => "Error al actualizar el empleado"));
        }
        
    }
?>