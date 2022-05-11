<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./404.css">
    <link rel="shortcut icon" href="./img/logo.png" type="image/x-icon">
    <title>Página no encontrada</title>
</head>
<body>
    <div class="container">
        <img src="./img/logo.png" draggable="false" alt="">
        <h1>Página no encontrada</h1>
        <?php
            session_start();
            if(isset($_SESSION['userid'])) {
                ?>
                <a href="" onclick="redirect()">Volver</a>
                <?php
            } else {
                ?>
                <a href="./index">Volver</a>
                <?php
            }
        ?>
    </div>
    <script>
        function redirect() {
            window.top.location.replace("./panel/panel");
        }
    </script>
</body>
</html>