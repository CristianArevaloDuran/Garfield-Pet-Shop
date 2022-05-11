<?php

    session_start();
    include("../../../../db/dbConnection.php");

    $name = $_POST["name"];
    $id = $_POST["id"];
    if(isset($_POST["checks"])){
        $checks = $_POST["checks"];
    }
    $output = array();

    if($name == "") {
        echo json_encode(array("bool" => false, "value" => "El campo nombre es obligatorio"));
    } else {
        $query = $conexion->prepare("UPDATE `tblrol` SET `nombreRol`='$name' WHERE `idRol`='$id'");
        $query->execute();
        if($query) {
            $query2 = $conexion->query("SELECT priv.privilegio, priv.idprivilegio FROM tblRol AS rol INNER JOIN tblrolprivilegio as rolpriv ON rol.idRol = rolpriv.idRol INNER JOIN tblprivilegios as priv ON rolpriv.idPrivilegio = priv.idPrivilegio WHERE rol.idRol = '$id'");
            $query2-> setFetchMode(PDO::FETCH_ASSOC);
            $query2->execute();
            $result = $query2->fetchAll();

            if(!isset($checks)) {
                echo json_encode(array("bool" => false, "value" => "Escoja al menos un privilegio"));
            } else {

                foreach($checks as $check) {
                    array_push($output, $check);
                }

                $query3 = $conexion->prepare("DELETE FROM tblrolprivilegio WHERE idRol = '$id'");
                $query3->execute();

                    if ($query3) {
                        foreach($output as $output2) {
                            if($output2) {
                                $query4 = $conexion->prepare("INSERT INTO tblrolprivilegio(idRol, idPrivilegio) VALUES ('$id','$output2')");
                                $query4->execute();
                            }
                        }
                        if ($query4) {
                            echo json_encode(array("bool" => true, "value" => "Rol actualizado correctamente"));
                        } else {
                            echo json_encode(array("bool" => false, "value" => "Error al actualizar el rol"));
                        }
            
                } else {
                    echo json_encode(array("bool" => false, "value" => "Error"));
                }
            }
        }
    }
?>