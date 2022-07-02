<?php
    session_start();
    if(!isset($_SESSION["userid"])) {
        header("Location: ../login/login.php");
    } else {
        require("../../../../db/dbConnection.php");
        $query = $conexion->prepare("SELECT * FROM tblservicios WHERE idServicio = $_GET[id]");
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
            <div class='user-data'>
                <h1><?= $result['nombreServicio'] ?></h1>
                <div class='datos'>
                    <div class='dato'>
                        <p class='title'>Descripción:</p>
                        <div class='text'>
                            <p><?= $result['descripcionServicio'] ?></p>
                        </div>
                    </div>
                    <div class='dato'>
                        <p class='title'>Precio:</p>
                        <div class='text'>
                            <p><?= '$' . $result['valorServicio'] ?></p>
                        </div>
                    </div>
                </div>

            <?php 
                foreach ($_SESSION['privilegios'] as $row) {
                    if($row['privilegio'] === 'editarServicios') {
            ?>

                <div class='buttons'>
                    <a href="../update/update.php?id=<?= $_GET['id'] ?>"><svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-alt" class="svg-inline--fa fa-pen-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M497.94 74.17l-60.11-60.11c-18.75-18.75-49.16-18.75-67.91 0l-56.55 56.55 128.02 128.02 56.55-56.55c18.75-18.75 18.75-49.15 0-67.91zm-246.8-20.53c-15.62-15.62-40.94-15.62-56.56 0L75.8 172.43c-6.25 6.25-6.25 16.38 0 22.62l22.63 22.63c6.25 6.25 16.38 6.25 22.63 0l101.82-101.82 22.63 22.62L93.95 290.03A327.038 327.038 0 0 0 .17 485.11l-.03.23c-1.7 15.28 11.21 28.2 26.49 26.51a327.02 327.02 0 0 0 195.34-93.8l196.79-196.79-82.77-82.77-84.85-84.85z"></path></svg>Modificar</a>
                </div>

            <?php
                    }
                }
            ?>

            </div>
        </div>
    </div>
</body>
</html>