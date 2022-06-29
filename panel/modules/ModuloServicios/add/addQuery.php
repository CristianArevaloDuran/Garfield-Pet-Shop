<?php
    session_start();
    include("../../../../db/dbConnection.php");

    $servicio = $_POST["name"];
    $description = $_POST["description"];
    $price = $_POST["price"];

    if($servicio == "" || $description == "" || $price == "") {
        echo json_encode(array("bool" => false, "value" => "Rellene todos los campos"));
    }else {
        $query = $conexion->prepare("INSERT INTO `tblservicios`(`nombreServicio`, `descripcionServicio`, `valorServicio`) VALUES ('$servicio','$description','$price')");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $result = $query->execute();
        if($result) {
                echo json_encode(array("bool" => true, "value" => "Servicio registrado"));
            } else {
                echo json_encode(array("bool" => false, "value" => "Error al registrar, vuelva a intentar"));
            }
        }
?>