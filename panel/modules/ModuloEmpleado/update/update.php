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
                        <label for="email">Correo Electr??nico</label>
                        <input type="email" name="email" id="email" value="<?= $result["corEmpleado"] ?>">
                    </div>
                    <div class="input">
                        <label for="phone">T??lefono</label>
                        <input type="phone" name="phone" id="phone" value="<?= $result["telEmpleado"] ?>">
                    </div>
                    <div class="input">
                        <label for="addres">Direcci??n</label>
                        <input type="addres" name="addres" id="addres" value="<?= $result["dirEmpleado"] ?>">
                    </div>
                    <div class="input">
                        <label for="date">Fecha de nacimiento</label>
                        <input type="date" name="date" id="date" value="<?= $result["fecNacimiento"] ?>">
                    </div>
                    <div class="input">
                        <label for="role">Rol</label>
                        <select required="true" type="text" name="role" id="role">
                            <?php
                                $rolquery = $conexion->prepare("SELECT * FROM tblrol");
                                $rolquery->execute();
                                while($rolresult = $rolquery->fetch(PDO::FETCH_ASSOC)) {
                            ?>    
                                <option value="<?= $rolresult['idRol'] ?>"><?= $rolresult['nombreRol'] ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <div class="input">
                        <label for="estate">Estado</label>
                        <input required="false" type="text" name="estate" id="estate" value="<?= $result["nomEstado"] ?>">
                    </div>
                    <div class="input">
                        <label for="id">Identificaci??n</label>
                        <input required="false" type="text" name="id" id="id" value="<?= $result["idEmpleado"] ?>">
                    </div>
                    <div class="input">
                        <input hidden required="false" type="text" name="imagen" id="imagen" value="<?= $result["imgEmpleado"] ?>">
                    </div>
                </div>
                <input type="submit" value="Actualizar">
            </form>
        </div>
    </div>
    <script src="update.js"></script>
    <script src="modal.js"></script>
</body>
</html>