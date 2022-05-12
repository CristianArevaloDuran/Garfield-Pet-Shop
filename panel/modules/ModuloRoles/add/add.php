<?php
    session_start();
    require("../../../../db/dbConnection.php");

    if(!isset($_SESSION["userid"])) {
        header("Location: ../../../panel");
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
            <form id="addRole">
                <h1>Añadir rol</h1>
                <div class="inputs">
                    <div class="input">
                        <label for="name" class='label'>Nombre Rol</label>
                        <input type="name" name="name" id="name">
                    </div>
                    <div class="input">
                        <div class="privilegios">
                            <label class='label'>Privilegios</label>
                            <div class='checks'>
                                <div class="dropdowns">
                                    <div class="dropdown" id="sidebarContent">
                                        <div class="icon-title">
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" class="svg-inline--fa fa-user fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg>
                                            <p>Ver clientes</p>
                                        </div>
                                        <div class="arrow-down">
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down" class="svg-inline--fa fa-angle-down fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z"></path></svg>
                                        </div>
                                    </div>

                                    <div class="dropdown-content">
                                        <div class="content">
                                            <input type="checkbox" class='base' hidden value='1' name='checks[]'>
                                            <div class='check-input'>
                                                <input class='checkbox-input' type="checkbox" id='crearCliente' value='2' name='checks[]'>
                                                <label for="crearCliente">Crear cliente</label>
                                            </div>
                                            <div class='check-input'>
                                                <input class='checkbox-input' type="checkbox" id='estadoCliente' value='3' name='checks[]'>
                                                <label for="estadoCliente">Cambiar estado cliente</label>
                                            </div>
                                            <div class='check-input'>
                                                <input class='checkbox-input' type="checkbox" id='crearMascota' value='crearMascota'>
                                                <label for="crearMascota">Crear Mascota</label>
                                            </div>
                                            <div class='check-input'>
                                                <input class='checkbox-input' type="checkbox" id='estadoMascota' value='estadoMascota'>
                                                <label for="estadoMascota">Cambiar estado mascota</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="dropdown" id="sidebarContent2">
                                        <div class="icon-title">
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-alt" class="svg-inline--fa fa-pen-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M497.94 74.17l-60.11-60.11c-18.75-18.75-49.16-18.75-67.91 0l-56.55 56.55 128.02 128.02 56.55-56.55c18.75-18.75 18.75-49.15 0-67.91zm-246.8-20.53c-15.62-15.62-40.94-15.62-56.56 0L75.8 172.43c-6.25 6.25-6.25 16.38 0 22.62l22.63 22.63c6.25 6.25 16.38 6.25 22.63 0l101.82-101.82 22.63 22.62L93.95 290.03A327.038 327.038 0 0 0 .17 485.11l-.03.23c-1.7 15.28 11.21 28.2 26.49 26.51a327.02 327.02 0 0 0 195.34-93.8l196.79-196.79-82.77-82.77-84.85-84.85z"></path></svg>
                                            <p>Ver servicios</p>
                                        </div>
                                        <div class="arrow-down">
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down" class="svg-inline--fa fa-angle-down fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z"></path></svg>
                                        </div>
                                    </div>

                                    <div class="dropdown-content">
                                        <div class="content">
                                            <input type="checkbox" class='base' hidden value='verCliente' >
                                            <div class='check-input'>
                                                <input class='checkbox-input' type="checkbox" id='crearCliente' value='crearCliente'>
                                                <label for="crearCliente">Crear cliente</label>
                                            </div>
                                            <div class='check-input'>
                                                <input class='checkbox-input' type="checkbox" id='estadoCliente' value='estadoCliente'>
                                                <label for="estadoCliente">Cambiar estado cliente</label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="dropdown" id="sidebarContent3">
                                        <div class="icon-title">
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="suitcase" class="svg-inline--fa fa-suitcase fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M128 480h256V80c0-26.5-21.5-48-48-48H176c-26.5 0-48 21.5-48 48v400zm64-384h128v32H192V96zm320 80v256c0 26.5-21.5 48-48 48h-48V128h48c26.5 0 48 21.5 48 48zM96 480H48c-26.5 0-48-21.5-48-48V176c0-26.5 21.5-48 48-48h48v352z"></path></svg>
                                            <p>Ver empleados</p>
                                        </div>
                                        <div class="arrow-down">
                                            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down" class="svg-inline--fa fa-angle-down fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z"></path></svg>
                                        </div>
                                    </div>

                                    <div class="dropdown-content">
                                        <div class="content">
                                            <input type="checkbox" class='base' hidden value='verCliente' >
                                            <div class='check-input'>
                                                <input class='checkbox-input' type="checkbox" id='crearCliente' value='crearCliente'>
                                                <label for="crearCliente">Crear cliente</label>
                                            </div>

                                            <div class='check-input'>
                                                <input class='checkbox-input' type="checkbox" id='estadoCliente' value='estadoCliente'>
                                                <label for="estadoCliente">Cambiar estado cliente</label>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <input type="submit" value="Añadir">
            </form>
        </div>
    </div>
    <script src='./dropdownExpand.js'></script>
    <script src='./addQuery.js'></script>
</body>
</html>