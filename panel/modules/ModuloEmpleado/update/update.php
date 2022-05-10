<?php
    session_start();
    if(!isset($_SESSION["userid"])) {
        header("Location: ../login/login.php");
    } else {
        require("../../../../db/dbConnection.php");
        $query = $conexion->prepare("SELECT img.imagen, emp.nomEmpleado, emp.apeEmpleado, rol.nombreRol, emp.corEmpleado, emp.telEmpleado, emp.idEmpleado, emp.dirEmpleado, emp.fecNacimiento, est.nomEstado, emp.imgEmpleado FROM tblEmpleados as emp INNER JOIN tblRol as rol on emp.rolEmpleado = rol.idRol INNER JOIN tblImgEmpleados as img ON emp.imgEmpleado = img.idImagen INNER JOIN tblEstado as est ON emp.estEmpleado = est.idEstado WHERE idEmpleado = '$_GET[id]'");
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
<div class="mensaje">
        <p></p>
        <div class="icon">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="cur                        rentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
        </div>
    </div>
    <div class="img-select-modal">
        <div class="content">
            <h2>Seleccionar imagen</h2>
            <div class="imagenes">
                <?php
                    $imgquery = $conexion->prepare("SELECT * FROM tblImgEmpleados");
                    $imgquery->execute();
                    while($imgresult = $imgquery->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <div class="imagen">
                        <img draggable="false" src="data:image/png;base64,<?= base64_encode($imgresult["imagen"]) ?>" alt="">
                        <div class="icon <?= $imgresult["idImagen"] ?>">
                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check" class="svg-inline--fa fa-check fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M173.898 439.404l-166.4-166.4c-9.997-9.997-9.997-26.206 0-36.204l36.203-36.204c9.997-9.998 26.207-9.998 36.204 0L192 312.69 432.095 72.596c9.997-9.997 26.207-9.997 36.204 0l36.203 36.204c9.997 9.997 9.997 26.206 0 36.204l-294.4 294.401c-9.998 9.997-26.207 9.997-36.204-.001z"></path></svg>
                        </div>
                    </div>
                <?php } ?>
            </div>
            <div class="actions">
                <button class="cancel">Cancelar</button>
                <button class="select">Seleccionar</button>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="data">
            <form id="updUserData">
                <div class="user-img">
                    <img id="currentImage" draggable="false" src="data:image/png;base64,<?= base64_encode($result["imagen"]) ?>" alt="">
                    <div class="cam-icon">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="camera" class="svg-inline--fa fa-camera fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M512 144v288c0 26.5-21.5 48-48 48H48c-26.5 0-48-21.5-48-48V144c0-26.5 21.5-48 48-48h88l12.3-32.9c7-18.7 24.9-31.1 44.9-31.1h125.5c20 0 37.9 12.4 44.9 31.1L376 96h88c26.5 0 48 21.5 48 48zM376 288c0-66.2-53.8-120-120-120s-120 53.8-120 120 53.8 120 120 120 120-53.8 120-120zm-32 0c0 48.5-39.5 88-88 88s-88-39.5-88-88 39.5-88 88-88 88 39.5 88 88z"></path></svg>
                    </div>
                </div>
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
                    <div class="input">
                        <label for="role">Rol</label>
                        <input disabled style="cursor: no-drop;" required="false" type="text" name="role" id="role" value="<?= $result["nombreRol"] ?>">
                    </div>
                    <div class="input">
                        <label for="estate">Estado</label>
                        <input disabled style="cursor: no-drop;" required="false" type="text" name="estate" id="estate" value="<?= $result["nomEstado"] ?>">
                    </div>
                    <div class="input">
                        <label for="id">Identificación</label>
                        <input disabled style="cursor: no-drop;" required="false" type="text" name="id" id="id" value="<?= $result["idEmpleado"] ?>">
                    </div>
                    <div class="input">
                        <label for="pass">Contraseña</label>
                        <div class="inputPass">
                            <input type="password" name="password" id="pass" value="<?= $_SESSION["passwordTemp"] ?>">
                            <div class="eye">
                                <button id="reveal">
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye" class="svg-inline--fa fa-eye fa-w-18 svgEye rotate-svg" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 576 512"><path d="M572.52 241.4C518.29 135.59 410.93 64 288 64S57.68 135.64 3.48 241.41a32.35 32.35 0 0 0 0 29.19C57.71 376.41 165.07 448 288 448s230.32-71.64 284.52-177.41a32.35 32.35 0 0 0 0-29.19zM288 400a144 144 0 1 1 144-144 143.93 143.93 0 0 1-144 144zm0-240a95.31 95.31 0 0 0-25.31 3.79 47.85 47.85 0 0 1-66.9 66.9A95.78 95.78 0 1 0 288 160z"></path>
                                    </svg>
                                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="eye-slash" class="svg-inline--fa fa-eye-slash fa-w-20 svgEyeLash rotate" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><path d="M320 400c-75.85 0-137.25-58.71-142.9-133.11L72.2 185.82c-13.79 17.3-26.48 35.59-36.72 55.59a32.35 32.35 0 0 0 0 29.19C89.71 376.41 197.07 448 320 448c26.91 0 52.87-4 77.89-10.46L346 397.39a144.13 144.13 0 0 1-26 2.61zm313.82 58.1l-110.55-85.44a331.25 331.25 0 0 0 81.25-102.07 32.35 32.35 0 0 0 0-29.19C550.29 135.59 442.93 64 320 64a308.15 308.15 0 0 0-147.32 37.7L45.46 3.37A16 16 0 0 0 23 6.18L3.37 31.45A16 16 0 0 0 6.18 53.9l588.36 454.73a16 16 0 0 0 22.46-2.81l19.64-25.27a16 16 0 0 0-2.82-22.45zm-183.72-142l-39.3-30.38A94.75 94.75 0 0 0 416 256a94.76 94.76 0 0 0-121.31-92.21A47.65 47.65 0 0 1 304 192a46.64 46.64 0 0 1-1.54 10l-73.61-56.89A142.31 142.31 0 0 1 320 112a143.92 143.92 0 0 1 144 144c0 21.63-5.29 41.79-13.9 60.11z"></path>
                                    </svg>
                                </button>
                            </div>
                            
                        </div>
                    </div>
                    <div class="input">
                        <input hidden required="false" type="text" name="imagen" id="imagen" value="<?= $result["idImagen"] ?>">
                    </div>
                </div>
                <input type="submit" value="Actualizar">
            </form>
        </div>
    </div>
    <script src="reveal.js"></script>
    <script src="update.js"></script>
    <script src="modal.js"></script>
</body>
</html>