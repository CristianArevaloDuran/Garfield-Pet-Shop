<?php
    session_start();
    require("../../../../db/dbConnection.php");

    if(!isset($_SESSION["userid"])) {
        
    } else {

    }
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
    <div class="mensaje">
        <p></p>
        <div class="icon">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
        </div>
    </div>
    <div class="container">
        <div class="data">
            <form id="updUserData">
                <h1>Crear servicio</h1>
                <div class="inputs">
                    <div class="input">
                        <label for="name">Servicio</label>
                        <input type="name" name="name" id="name">
                    </div>
                    <div class="input">
                        <label for="description">Descripción</label>
                        <textarea name="description" id="description" cols="30" rows="10"></textarea>
                    </div>
                    <div class="input">
                        <label for="price">Precio</label>
                        <input type="number" name="price" id="price">
                    </div>
                </div>
                <input type="submit" value="Registrar">
            </form>
        </div>
    </div>
    <script src="reveal.js"></script>
    <script src="modal.js"></script>
    <script src='add.js'></script>
</body>
</html>