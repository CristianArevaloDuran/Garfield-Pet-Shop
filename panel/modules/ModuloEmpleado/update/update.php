<?php
    session_start();
    if(!isset($_SESSION["userid"])) {
        header("Location: ../login/login.php");
    } else {
        require("../../../../db/dbConnection.php");
        $query = $conexion->prepare("SELECT img.imagen, emp.nomEmpleado, emp.apeEmpleado, rol.nombreRol, emp.corEmpleado, emp.telEmpleado, emp.idEmpleado, emp.dirEmpleado, emp.fecNacimiento, est.nomEstado FROM tblEmpleados as emp INNER JOIN tblRol as rol on emp.rolEmpleado = rol.idRol INNER JOIN tblImgEmpleados as img ON emp.imgEmpleado = img.idImagen INNER JOIN tblEstado as est ON emp.estEmpleado = est.idEstado WHERE idEmpleado = '$_GET[id]'");
        $query->setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        $result = $query->fetch();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>view <?= $result['nomEmpleado'] ?></title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <div class='content'>
            <iframe src="../../profileModal/editData/editData.php" frameborder="0"></iframe>
        </div>
    </div>
</body>
</html>