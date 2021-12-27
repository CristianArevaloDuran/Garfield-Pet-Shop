
<?php
    include("../db/dbConnection.php");

    $query = $conexion->prepare("SELECT imagen FROM tblImgEmpleados");
    $query->execute();

    if(isset($_POST["enviar"])) {

        $file = addslashes(file_get_contents($_FILES["img"]["tmp_name"]));

        $query = $conexion->prepare("INSERT INTO tblImgEmpleados(imagen) VALUES ('$file')");
        $query->execute();

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert IMG</title>
</head>
<body>
    <form action="insert.php" method="post" enctype="multipart/form-data">
        <input type="file" name="img">
        <input type="submit" name="enviar">
    </form>
    <?php
        while($result = $query->fetch(PDO::FETCH_ASSOC)) {
            ?>
            <img src="data:image/png;base64,<?= base64_encode($result["imagen"]) ?>" alt="">
            <?php
        }
    ?>
</body>
</html>