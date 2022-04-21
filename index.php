
<?php
    session_start();
    if(isset($_SESSION["userid"])) {
        header("Location: panel/panel");
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="styles.css">
    <title>Garfield Pet Shop</title>
</head>
<body>
    
    <!--Parallax-->

    <div class="contenedor">
        <a href='login/login' class="inicio_sesion">Iniciar sesión</a>
        <div class="contenido">
            <img src="img/logo.jpg" draggable="false" alt="">
            <h1>Garfield Pet Shop</h1>
        </div>
    </div>

    

    <!--Parallax-->

    <!--Separador-->

    <div class="separador">
    </div>

    <!--Separador-->

    <!--Descripcion-->

    <div class="descripcion">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Quas adipisci recusandae nesciunt, cumque temporibus vitae hic repellendus rerum blanditiis aspernatur beatae assumenda odit sint quam dolor esse quos quia fugit.</p>
    </div>

    <!--Descripcion-->

</body>
</html>