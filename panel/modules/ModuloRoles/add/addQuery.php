<?php

    session_start();
    include("../../../../db/dbConnection.php");

    $name = $_POST["name"];
    if(isset($_POST["checks"])){
        $checks = $_POST["checks"];
    }
    $output = array();

    if($name == "") {
        echo json_encode(array("bool" => false, "value" => "El campo nombre es obligatorio"));
    } else {
        $query = $conexion->prepare("SELECT nombreRol FROM tblRol WHERE nombreRol = '$name'");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        $result = $query->fetch();
        if(!empty($result)) {
            echo json_encode(array("bool" => false, "value" => "Este rol ya existe"));
        } else {
            if (!isset($checks)) {
                echo json_encode(array("bool" => false, "value" => "Escoja al menos un privilegio"));
            } else {
                foreach($checks as $check) {
                    array_push($output, $check);
                }
                $query2 = $conexion->prepare("INSERT INTO tblrol(`nombreRol`) VALUES ('$name')");
                $query2->execute();
                if($query2) {
                    foreach($output as $out) {
                        $query3 = $conexion->prepare("INSERT INTO `tblrolprivilegio`(`idRol`, `idPrivilegio`) VALUES ('$name','$out') WHERE ");
                        $query3->execute();
                    }
                    if($query2) {
                        echo json_encode(array("bool" => tru, "value" => "Rol registrado"));
                    } else {
    
                    }
                } else {
                    echo json_encode(array("bool" => false, "value" => "Error"));
                }
            }
        }
    }
?>