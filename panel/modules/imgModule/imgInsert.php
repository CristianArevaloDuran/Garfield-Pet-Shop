<?php
    session_start();
    require("../../../db/dbConnection.php");
    if(!$_SESSION["userid"]) {
        header("Location: ../../../login/login.php");
    }

    $query = $conexion->prepare("SELECT * FROM tblImgEmpleados");
    $query-> setFetchMode(PDO::FETCH_ASSOC);
    $query-> execute();
    $result = $query->fetch();

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>imgInsert</title>
</head>
<body>
    <div class="container">
        <div class="actions">
            <div class="icons">
                <a class="icon" href="">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
                </a>
            </div>
        </div>
        <div class="title">
            <h1>Lista de imagenes</h1>
        </div>
        <div class="img-list">
            <?php while($result) { ?>
                <div class="img">
                    <img draggable="false" src="data:image/png;base64,<?= base64_encode($result["imagen"]) ?>" alt="">
                </div>
            <?php } ?>
        </div>
    </div>
</body>
</html>