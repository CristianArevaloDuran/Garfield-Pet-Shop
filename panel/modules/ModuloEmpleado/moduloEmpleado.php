<?php
    session_start();
    if(!isset($_SESSION["userid"])) {
        header("Location: ../login/login");
    } else {
        require("../../../db/dbConnection.php");
        $query = $conexion->prepare("SELECT img.imagen, emp.nomEmpleado, emp.apeEmpleado, rol.nombreRol, emp.corEmpleado, emp.telEmpleado, emp.idEmpleado FROM tblEmpleados as emp INNER JOIN tblRol as rol on emp.rolEmpleado = rol.idRol INNER JOIN tblImgEmpleados as img ON emp.imgEmpleado = img.idImagen");
        $query-> setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>lista</title>
    <link rel="stylesheet" href="./styles.css">
</head>
<body>
    <div class="container">
        <div class="icons">
            <a href="./add/add.php" class="icon rotated">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
            </a>
        </div>
        <div class="content">
            <h2 class="title">Lista de empleados</h2>
            <div class="list">
                <?php
                    while($result = $query->fetch()) {
                ?>
                <div class="list-item">
                    <div class="data">
                        <img src="data:image/png;base64,<?= base64_encode($result["imagen"]) ?>" draggable="false" alt="">
                        <div>
                            <h2><?= $result['nomEmpleado'] . ' ' . $result['apeEmpleado'] ?></h2>
                            <p><?= $result['corEmpleado'] ?></p>
                            <p><?= $result['telEmpleado'] ?></p>
                            <p><?= $result['nombreRol'] ?></p>
                        </div>
                    </div>
                    <div class="actions">
                    <?php 
                    foreach ($_SESSION['privilegios'] as $row) {
                        if($row['privilegio'] === 'estadoCliente') {
                    ?>
                            <a href="./update/update?id=<?= $result['idEmpleado'] ?>">
                                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-alt" class="svg-inline--fa fa-pen-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M497.94 74.17l-60.11-60.11c-18.75-18.75-49.16-18.75-67.91 0l-56.55 56.55 128.02 128.02 56.55-56.55c18.75-18.75 18.75-49.15 0-67.91zm-246.8-20.53c-15.62-15.62-40.94-15.62-56.56 0L75.8 172.43c-6.25 6.25-6.25 16.38 0 22.62l22.63 22.63c6.25 6.25 16.38 6.25 22.63 0l101.82-101.82 22.63 22.62L93.95 290.03A327.038 327.038 0 0 0 .17 485.11l-.03.23c-1.7 15.28 11.21 28.2 26.49 26.51a327.02 327.02 0 0 0 195.34-93.8l196.79-196.79-82.77-82.77-84.85-84.85z"></path></svg>
                            </a>
                    <?php
                            }
                        }
                    ?>
                        <a href="./view/view?id=<?= $result['idEmpleado'] ?>">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye" class="svg-inline--fa fa-eye fa-w-18" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path fill="currentColor" d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"></path></svg>
                        </a>
                    </div>
                </div>
                <?php
                    }
                ?>
            </div>
        </div>
    </div>
</body>
</html>