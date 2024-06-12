<?php
    include('../bd/conecxion.php');

    $nombre = $_POST['nombre'];
    $celular = $_POST['celular'];
    $direccion = $_POST['direccion'];
    $tipo = $_POST['tipo'];
    $modelo = $_POST['modelo'];
    $problema = $_POST['problema'];

    $file_name = $_FILES['uploadedFile']['name'];
    $file_tmp = $_FILES['uploadedFile']['tmp_name'];
    $route = "../public/img/". $file_name;

    move_uploaded_file($file_tmp, $route);


    $insert = "INSERT INTO datos(nombre,celular,direccion,maquina,modelo,revisar,foto1)
            VALUES('$nombre','$celular','$direccion','$tipo','$modelo','$problema', '$file_name')";
        
    $sql_query = mysqli_query($conexion, $insert)


?>

<!DOCTYPE html>
<html lang="es">
<head> 
    <!-- CHARSET -->
    <meta charset="UTF-8">
    <!-- IE-EDGE -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- VIEWPORT -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- DESCRIPTION -->
    <meta name="description" content="Servicio Técnico">
    <!-- AUTHOR -->
    <meta name="author" content="Lucas Conde">
    <!-- TITTLE -->
    <title>Servicio Técnico</title>
    <!-- STYLES -->
    <link rel="stylesheet" href="../css/index.css">
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/439ee37b3b.js" crossorigin="anonymous"></script>
</head>
<body>
    <main>
        <h1>Se subio correctamente el cliente.</h1>

        <div>
            <button><a href="links/agregar.php">Agregar clientes</a></button>
            <button><a href="links/ver.php">Ver clientes</a></button>
        </div>
    </main>
</body>
</html>