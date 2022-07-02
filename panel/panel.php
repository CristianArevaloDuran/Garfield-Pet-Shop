
<?php
    session_start();
    if(!isset($_SESSION["userid"])) {
        header("Location: ../login/login");
    } else {
        require("../db/dbConnection.php");
        
        $query = $conexion->prepare("SELECT img.imagen, emp.nomEmpleado, emp.apeEmpleado, rol.nombreRol FROM tblEmpleados as emp INNER JOIN tblRol as rol on emp.rolEmpleado = rol.idRol INNER JOIN tblImgEmpleados as img ON emp.imgEmpleado = img.idImagen WHERE idEmpleado = '$_SESSION[userid]'");
        $query-> setFetchMode(PDO::FETCH_ASSOC);
        $query->execute();
        $result = $query->fetch();

        $query2 = $conexion->prepare("SELECT priv.privilegio FROM tblEmpleados as emp INNER JOIN tblRol as rol on emp.rolEmpleado = rol.idRol INNER JOIN tblrolprivilegio as rolpriv ON rol.idRol = rolpriv.idRol INNER JOIN tblprivilegios as priv ON rolpriv.idPrivilegio = priv.idPrivilegio WHERE idEmpleado = '$_SESSION[userid]'");
        $query2-> setFetchMode(PDO::FETCH_ASSOC);
        $query2->execute();
        $result2 = $query2->fetchAll();

        $_SESSION["privilegios"] = $result2;
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/logo.png" type="image/x-icon">
    <link rel="stylesheet" href="styles/modal.css">
    <link rel="stylesheet" href="styles/min-sidebar.css">    
    <link rel="stylesheet" href="styles/max-sidebar.css">
    <link rel="stylesheet" href="styles/min-buscador.css">    
    <link rel="stylesheet" href="styles/max-buscador.css">
    <link rel="stylesheet" href="styles/contentDisplay.css">    
    <title>Panel</title>
</head>
<body>

    <!--Devs Modal-->

    <div class="devs-modal" id="devsModal">
        <div class="devs-content" id="devsModalContent">
            <div class="logo">
                <img draggable="false" src="../img/logo.jpg" alt="">
            </div>
            <div class="icon" id="devsModalClose">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
            </div>
            <div class="devs-names">
                <h1>Desarrolladores</h1>
                <p>Xiomara Valentina Vargas García</p>
                <p>Kevin Stiven Gamba Penagos</p>
                <p>Juan Diego Castañeda Ulloa</p>
                <p>Cristian Camilo Quevedo Rodriguez</p>
                <p>Cristian Arévalo Duran</p>
                <p>😎</p>
            </div>
        </div>
    </div>

    <div class="devs-container">
        
    </div>

    <!--Devs Modal-->

    <!--Profile modal...-->

    <div class="profile-modal" id="profileModal">
        <div class="modal-content" id="profileModalContent">
            <div class="logo">
                <img draggable="false" src="../img/logo.jpg" alt="">
            </div>
            <div class="icon" id="profileModalClose">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
            </div>
            <div class="iframe-container">
                <iframe name="profileModal" id="profileModalIframe" title="profileModal" src="modules/profileModal/profileModal.php" frameborder="0"></iframe>
            </div>
        </div>
    </div>

    <!--...Profile modal-->

    <!--Sidebar collapsed...-->

    <div class="min-sidebar" id="minSidebar">
        <div class="open-sidebar" id="openSidebar">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="bars" class="svg-inline--fa fa-bars fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M16 132h416c8.837 0 16-7.163 16-16V76c0-8.837-7.163-16-16-16H16C7.163 60 0 67.163 0 76v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16zm0 160h416c8.837 0 16-7.163 16-16v-40c0-8.837-7.163-16-16-16H16c-8.837 0-16 7.163-16 16v40c0 8.837 7.163 16 16 16z"></path>
            </svg>
        </div>

        <div class="user-profile">
            <div class="user-img" id="profileModalButton1">
                <img draggable="false" src="data:image/png;base64,<?= base64_encode($result["imagen"]) ?>" alt="User profile picture">
            </div>
            <div class="user-data" id="profileModalButton2">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" class="svg-inline--fa fa-user fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg>
            </div>
        </div>
        <div class="modules-buttons">
            <?php 
                foreach ($result2 as $row) {
                    if($row['privilegio'] === 'verCliente') {
            ?>
                <div class="button" id="sidebarContent1">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" class="svg-inline--fa fa-user fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg>
                </div>
            <?php
                    }
                }
            ?>

            <?php 
                foreach ($result2 as $row) {
                    if($row['privilegio'] === 'verServicios') {
            ?>

            <div class="button" id="sidebarContent2">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-alt" class="svg-inline--fa fa-pen-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M497.94 74.17l-60.11-60.11c-18.75-18.75-49.16-18.75-67.91 0l-56.55 56.55 128.02 128.02 56.55-56.55c18.75-18.75 18.75-49.15 0-67.91zm-246.8-20.53c-15.62-15.62-40.94-15.62-56.56 0L75.8 172.43c-6.25 6.25-6.25 16.38 0 22.62l22.63 22.63c6.25 6.25 16.38 6.25 22.63 0l101.82-101.82 22.63 22.62L93.95 290.03A327.038 327.038 0 0 0 .17 485.11l-.03.23c-1.7 15.28 11.21 28.2 26.49 26.51a327.02 327.02 0 0 0 195.34-93.8l196.79-196.79-82.77-82.77-84.85-84.85z"></path></svg>
            </div>

            <?php
                    }
                }
            ?>

            <?php 
                foreach ($result2 as $row) {
                    if($row['privilegio'] === 'verEmpleado') {
            ?>
                <div class="button" id="sidebarContent3">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="suitcase" class="svg-inline--fa fa-suitcase fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path d="M128 480h256V80c0-26.5-21.5-48-48-48H176c-26.5 0-48 21.5-48 48v400zm64-384h128v32H192V96zm320 80v256c0 26.5-21.5 48-48 48h-48V128h48c26.5 0 48 21.5 48 48zM96 480H48c-26.5 0-48-21.5-48-48V176c0-26.5 21.5-48 48-48h48v352z"></path></svg>
                </div>
            <?php
                    }
                }
            ?>
            <a href="logout/logout" class="button logout">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-out-alt" class="svg-inline--fa fa-sign-out-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"></path></svg>
            </a>
        </div>

        <div class="sidebar-footer">
            <p id="devsModalButton1">Desarrolladores</p>
        </div>
    </div>

    <!--...Sidebar collapsed-->

    <!--Max Sidebar...-->

    <div class="max-sidebar" id="maxSidebar">
        <div class="close-sidebar" id="closeSidebar">
            <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="times" class="svg-inline--fa fa-times fa-w-11" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 352 512"><path fill="currentColor" d="M242.72 256l100.07-100.07c12.28-12.28 12.28-32.19 0-44.48l-22.24-22.24c-12.28-12.28-32.19-12.28-44.48 0L176 189.28 75.93 89.21c-12.28-12.28-32.19-12.28-44.48 0L9.21 111.45c-12.28 12.28-12.28 32.19 0 44.48L109.28 256 9.21 356.07c-12.28 12.28-12.28 32.19 0 44.48l22.24 22.24c12.28 12.28 32.2 12.28 44.48 0L176 322.72l100.07 100.07c12.28 12.28 32.2 12.28 44.48 0l22.24-22.24c12.28-12.28 12.28-32.19 0-44.48L242.72 256z"></path></svg>
        </div>

        <div class="user-profile">
            <div class="user-img" id="profileModalButton3">
                <img draggable="false" src="data:image/png;base64,<?= base64_encode($result["imagen"]) ?>" alt="User profile picture">
            </div>
            <div class="user-data" id="profileModalButton4">
                <h2><?= $result["nomEmpleado"] ?> <?= $result["apeEmpleado"] ?></h2>
                <p><?= $result["nombreRol"] ?></p>
            </div>
        </div>

        <div class="dropdowns">
            <?php
                foreach ($result2 as $row) {
                    if($row['privilegio'] === 'verCliente') {
            ?>
            <div class="dropdown" id="sidebarContent4">
                <div class="icon-title">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="user" class="svg-inline--fa fa-user fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M224 256c70.7 0 128-57.3 128-128S294.7 0 224 0 96 57.3 96 128s57.3 128 128 128zm89.6 32h-16.7c-22.2 10.2-46.9 16-72.9 16s-50.6-5.8-72.9-16h-16.7C60.2 288 0 348.2 0 422.4V464c0 26.5 21.5 48 48 48h352c26.5 0 48-21.5 48-48v-41.6c0-74.2-60.2-134.4-134.4-134.4z"></path></svg>
                    <p>Clientes</p>
                </div>
                <div class="arrow-down">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down" class="svg-inline--fa fa-angle-down fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z"></path></svg>
                </div>
            </div>

            <div class="dropdown-content">
                <div class="content">
                    <a href="modules/ModuloPropietario/moduloPropietario" target="contenido"  onclick="sidebarToggle()">Propietarios</a>
                    <a href="modules/ModuloMascota/Mascota/moduloMascota" target="contenido" onclick="sidebarToggle()">Mascotas</a>
                </div>
            </div>

            <?php
                }
            }
            ?>

            <?php 
                foreach ($result2 as $row) {
                    if($row['privilegio'] === 'verServicios') {
            ?>

            <div class="dropdown" id="sidebarContent5">
                <div class="icon-title">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="pen-alt" class="svg-inline--fa fa-pen-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M497.94 74.17l-60.11-60.11c-18.75-18.75-49.16-18.75-67.91 0l-56.55 56.55 128.02 128.02 56.55-56.55c18.75-18.75 18.75-49.15 0-67.91zm-246.8-20.53c-15.62-15.62-40.94-15.62-56.56 0L75.8 172.43c-6.25 6.25-6.25 16.38 0 22.62l22.63 22.63c6.25 6.25 16.38 6.25 22.63 0l101.82-101.82 22.63 22.62L93.95 290.03A327.038 327.038 0 0 0 .17 485.11l-.03.23c-1.7 15.28 11.21 28.2 26.49 26.51a327.02 327.02 0 0 0 195.34-93.8l196.79-196.79-82.77-82.77-84.85-84.85z"></path></svg>
                    <p>Servicios</p>
                </div>
                <div class="arrow-down">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down" class="svg-inline--fa fa-angle-down fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z"></path></svg>
                </div>
            </div>

            <div class="dropdown-content">
                <div class="content">
                    <a href="modules/ModuloServicios/servicios" onclick="sidebarToggle()" target="contenido">Lista de Servicios</a>
                </div>
            </div>

            <?php
                    }
                }
            ?>

            <?php 
                foreach ($result2 as $row) {
                    if($row['privilegio'] === 'verEmpleado') {
            ?>

            <div class="dropdown" id="sidebarContent6">
                <div class="icon-title">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="suitcase" class="svg-inline--fa fa-suitcase fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M128 480h256V80c0-26.5-21.5-48-48-48H176c-26.5 0-48 21.5-48 48v400zm64-384h128v32H192V96zm320 80v256c0 26.5-21.5 48-48 48h-48V128h48c26.5 0 48 21.5 48 48zM96 480H48c-26.5 0-48-21.5-48-48V176c0-26.5 21.5-48 48-48h48v352z"></path></svg>
                    <p>Empleados</p>
                </div>
                <div class="arrow-down">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down" class="svg-inline--fa fa-angle-down fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z"></path></svg>
                </div>
            </div>

            <div class="dropdown-content">
                <div class="content">
                    <a href="modules/ModuloEmpleado/moduloEmpleado"  target="contenido" onclick="sidebarToggle()">Lista de empleados</a>
                    <?php 
                        foreach ($result2 as $row) {
                            if($row['privilegio'] === 'verRoles') {
                    ?>
                        <a href="modules/ModuloRoles/roles" target="contenido" onclick="sidebarToggle()">Lista de roles</a>
                    <?php
                            }
                        }
                    ?>
                </div>
            </div>

            <?php
                }
            }
            ?>

            <a href="logout/logout" class="logout">
                <div class="icon-title">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="sign-out-alt" class="svg-inline--fa fa-sign-out-alt fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M497 273L329 441c-15 15-41 4.5-41-17v-96H152c-13.3 0-24-10.7-24-24v-96c0-13.3 10.7-24 24-24h136V88c0-21.4 25.9-32 41-17l168 168c9.3 9.4 9.3 24.6 0 34zM192 436v-40c0-6.6-5.4-12-12-12H96c-17.7 0-32-14.3-32-32V160c0-17.7 14.3-32 32-32h84c6.6 0 12-5.4 12-12V76c0-6.6-5.4-12-12-12H96c-53 0-96 43-96 96v192c0 53 43 96 96 96h84c6.6 0 12-5.4 12-12z"></path></svg>
                    <p>Cerrar sesión</p>
                </div>
                <div class="arrow-down">
                    <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="angle-down" class="svg-inline--fa fa-angle-down fa-w-10" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 320 512"><path fill="currentColor" d="M143 352.3L7 216.3c-9.4-9.4-9.4-24.6 0-33.9l22.6-22.6c9.4-9.4 24.6-9.4 33.9 0l96.4 96.4 96.4-96.4c9.4-9.4 24.6-9.4 33.9 0l22.6 22.6c9.4 9.4 9.4 24.6 0 33.9l-136 136c-9.2 9.4-24.4 9.4-33.8 0z"></path></svg>
                </div>
            </a>
        </div>

        <div class="sidebar-footer">
            <p id="devsModalButton2">Desarrolladores</p>
        </div>
    </div>

    <div class="blur-max-sidebar" id="blurMaxSidebar">

    </div>

    <!--...Max Sidebar-->

    <!--Min Buscador...-->

    <div class="min-buscador-container">
        <div class="min-buscador" id="buscadorButton">
            <div class="input-sim">
            </div>
            <div class="icon">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="filter" class="svg-inline--fa fa-filter fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M487.976 0H24.028C2.71 0-8.047 25.866 7.058 40.971L192 225.941V432c0 7.831 3.821 15.17 10.237 19.662l80 55.98C298.02 518.69 320 507.493 320 487.98V225.941l184.947-184.97C520.021 25.896 509.338 0 487.976 0z"></path></svg>
            </div>
            <div class="icon">
                <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="svg-inline--fa fa-search fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg>
            </div>
        </div>
    </div>

    <!--... Min Buscador-->

    <!--Max Buscador...-->

    <div class="max-buscador-container" id="maxBuscador">
        <div class="max-buscador" id="maxBuscadorContent">
            <form method="post" id="form">
                <div class="input">
                    <input type="text" placeholder="Buscar" name="buscador" id="buscador">
                    <button class="button1">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="filter" class="svg-inline--fa fa-filter fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M487.976 0H24.028C2.71 0-8.047 25.866 7.058 40.971L192 225.941V432c0 7.831 3.821 15.17 10.237 19.662l80 55.98C298.02 518.69 320 507.493 320 487.98V225.941l184.947-184.97C520.021 25.896 509.338 0 487.976 0z"></path></svg>
                    </button>
                    <button class="button2">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" data-icon="search" class="svg-inline--fa fa-search fa-w-16" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M505 442.7L405.3 343c-4.5-4.5-10.6-7-17-7H372c27.6-35.3 44-79.7 44-128C416 93.1 322.9 0 208 0S0 93.1 0 208s93.1 208 208 208c48.3 0 92.7-16.4 128-44v16.3c0 6.4 2.5 12.5 7 17l99.7 99.7c9.4 9.4 24.6 9.4 33.9 0l28.3-28.3c9.4-9.4 9.4-24.6.1-34zM208 336c-70.7 0-128-57.2-128-128 0-70.7 57.2-128 128-128 70.7 0 128 57.2 128 128 0 70.7-57.2 128-128 128z"></path></svg>
                    </button>
                </div>
            </form>
            <div class="results" id="results">
                
            </div>
        </div>
    </div>

    <!--...Max Buscador-->

    <!--Content display...-->

    <div class="container">
        <div class="dummy-sidebar">

        </div>
        <div class="iframe-container">
            <iframe src="modules/welcome/welcome" frameborder="0" name="contenido"></iframe>
        </div>
    </div>

    <!--...Content display-->

    <script src="scripts/expand.js"></script>
    <script src="scripts/expandSidebar.js"></script>
    <script src="scripts/devs.js"></script>
    <script>

        const sidebarButton1 = document.getElementById('sidebarContent1');
        const sidebarButton2 = document.getElementById('sidebarContent2');
        const sidebarButton3 = document.getElementById('sidebarContent3');
        const sidebarButton4 = document.getElementById('sidebarContent4');
        const sidebarButton5 = document.getElementById('sidebarContent5');
        const sidebarButton6 = document.getElementById('sidebarContent6');

        <?php
            foreach ($result2 as $row) {
                if($row['privilegio'] === 'verCliente') {
        ?>

            sidebarButton1.addEventListener('click', ()=>{
                sidebarToggle();
                dropdownContent(sidebarButton4, sidebarButton1);
            })

        <?php
                }
            }
        ?>

        <?php 
            foreach ($result2 as $row) {
                if($row['privilegio'] === 'verServicios') {
        ?>

            sidebarButton2.addEventListener('click', ()=>{
                sidebarToggle();
                dropdownContent(sidebarButton5, sidebarButton2);
            })

        <?php
                }
            }
        ?>

        <?php 
            foreach ($result2 as $row) {
                if($row['privilegio'] === 'verEmpleado') {
        ?>

            sidebarButton3.addEventListener('click', ()=>{
                sidebarToggle();
                dropdownContent(sidebarButton6, sidebarButton3);
            })

        <?php
                }
            }
        ?>

        <?php
            foreach ($result2 as $row) {
                if($row['privilegio'] === 'verCliente') {
        ?>

            sidebarButton4.addEventListener('click', ()=>{
                dropdownContent(sidebarButton4, sidebarButton1);
            })

        <?php
                }
            }
        ?>

        <?php 
            foreach ($result2 as $row) {
                if($row['privilegio'] === 'verServicios') {
        ?>

            sidebarButton5.addEventListener('click', ()=>{
                dropdownContent(sidebarButton5, sidebarButton2);
            })

        <?php
                }
            }
        ?>

        <?php 
            foreach ($result2 as $row) {
                if($row['privilegio'] === 'verEmpleado') {
        ?>

            sidebarButton6.addEventListener('click', ()=>{
                dropdownContent(sidebarButton6, sidebarButton3);
            })
        
        <?php
                }
            }
        ?>

        function dropdownContent(buttonContent, button) {
            let currentActive = document.querySelector('.dropdown-active');
            let dropdownArrow = buttonContent.querySelector('.arrow-down svg');
            let currentDropdownArrow = document.querySelector('.dropdown-active .arrow-down svg');
            let dropdownContentBlock = buttonContent.nextElementSibling;
            let anchorDropdown = dropdownContentBlock.querySelectorAll('.content a');
            let dropdownContent = buttonContent.nextElementSibling;
            let currentButton = document.querySelector('.button-active');
        
            if(currentActive && currentActive !== buttonContent) {
                let currentDropdownContentBlock = document.querySelector('.dropdown-active').nextElementSibling;
                let currentAnchorDropdown = currentDropdownContentBlock.querySelectorAll('.content a');
                currentActive.classList.toggle('dropdown-active');
                currentButton.classList.toggle('button-active');
                currentActive.nextElementSibling.style.maxHeight = 0;
                currentDropdownArrow.style.transform = 'rotate(0)';
                for(i = 0; i < currentAnchorDropdown.length; i ++) {
                    currentAnchorDropdown[i].style.opacity = 0;
                }
                setTimeout(()=>{
                    currentActive.nextElementSibling.classList.remove('dropdown-content-active');
                },250)
            }
        
            if(buttonContent.classList.contains('dropdown-active')) {
                dropdownContent.style.maxHeight = 0;
                button.classList.remove('button-active');
                dropdownArrow.style.transform = 'rotate(0)';
                for(i = 0; i < anchorDropdown.length; i ++) {
                    anchorDropdown[i].style.opacity = 0;
                }
                setTimeout(()=>{
                    dropdownContent.classList.remove('dropdown-content-active');
                    buttonContent.classList.remove('dropdown-active');
                },170)
            } else {
                buttonContent.classList.add('dropdown-active');
                button.classList.add('button-active');
                dropdownContent.style.maxHeight = dropdownContent.scrollHeight + 85 +       'px';
                dropdownContent.classList.add('dropdown-content-active');
                dropdownArrow.style.transform = 'rotate(180deg)';
                for(i = 0; i < anchorDropdown.length; i ++) {
                    anchorDropdown[i].style.opacity = 1;
                }
            }
        }

    </script>
    <script src="scripts/buscadorModal.js"></script>
    <script src="scripts/search.js"></script>
</body>
</html>