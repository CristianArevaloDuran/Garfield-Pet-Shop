<?php
    session_start();
    require("../../../../db/dbConnection.php");

    if(isset($_SESSION["passConfirmed"]) && $_SESSION["passConfirmed"] == false) {
        header("Location: ../profileModal.php");
    }

    $query = $conexion->prepare("SELECT * FROM tblEmpleados WHERE idEmpleado = '$_SESSION[userid]'");
    $query-> setFetchMode(PDO::FETCH_ASSOC);
    $query->execute();
    $result = $query->fetch();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>editData</title>
</head>
<body>
    <div class="container">
        <div class="user-img">
            <img draggable="false" src="<?php
                if($result["imgEmpleado"] == null) {
                    echo("../../../../img/logo.jpg");
                } 
            ?>" alt="">
        </div>
        <div class="data">
            <form id="updUserData">
                <div class="inputs">
                    <div class="input">
                    <label for="name">Nombres</label>
                    <input type="name" name="name" id="name" value="<?= $result["nomEmpleado"] ?>">
                </div>
                <div class="input">
                    <label for="lastname">Apellidos</label>
                    <input type="lastname" name="lastname" id="lastname" value="<?= $result["apeEmpleado"] ?>">
                </div>
                <div class="input">
                    <label for="email">Correo Electrónico</label>
                    <input type="email" name="email" id="email" value="<?= $result["corEmpleado"] ?>">
                </div>
                <div class="input">
                    <label for="phone">Télefono</label>
                    <input type="phone" name="phone" id="phone" value="<?= $result["telEmpleado"] ?>">
                </div>
                <div class="input">
                    <label for="addres">Dirección</label>
                    <input type="addres" name="addres" id="addres" value="<?= $result["dirEmpleado"] ?>">
                </div>
                <div class="input">
                    <label for="date">Fecha de nacimiento</label>
                    <input type="date" name="date" id="date" value="<?= $result["fecNacimiento"] ?>">
                </div>
                </div>
                <input type="submit" value="Actualizar">
            </form>
        </div>
    </div>
</body>
</html>