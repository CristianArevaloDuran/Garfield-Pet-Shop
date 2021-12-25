<?php
    session_start();

    $password = $_POST["password"];
    require("../../../db/dbConnection.php");
    $query = $conexion->prepare("SELECT emp.idEmpleado, emp.conEmpleado FROM tblEmpleados as emp WHERE emp.idEmpleado = '$_SESSION[userid]'");
    $query-> setFetchMode(PDO::FETCH_ASSOC);
    $query-> execute();
    $result = $query->fetch();

    if(password_verify($password, $result["conEmpleado"])) {
        header("Location: editData/editData.php");
    } else {
        $_SESSION["status"] = false;
        header("Location: profileModal.php");
    }
?>