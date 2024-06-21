<?php
    include('../bd/conecxion.php');
        if(isset($_GET['id'])){

        $resultado = $conexion -> query ('SELECT * FROM clientes WHERE id = "'.$_GET['id'].'"')or die($conexion -> error);
        if(mysqli_num_rows($resultado) > 0){ 
            $fila = mysqli_fetch_row($resultado);
        }else{
            /*SI NO EXISTE EL id DEL PRODUCTO, SE REDIRECCIONA*/
            header("Location: ../index.php");
        }
    }else{
        header("Location: ../index.php");
    }
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
    <link rel="stylesheet" href="../css/cliente.css">
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/439ee37b3b.js" crossorigin="anonymous"></script>
</head>
<body>
    <main>
        <div class="titulo">
            <i class="fas fa-address-card"></i>
            <h1>Datos del Cliente</h1>
        </div>

        <div>
            <section>
                <p>Cliente N°: <?php echo $fila[0] ?></p>
                <p>Se creó el:
                    <?php
                        $date = date_create($fila[7]);
                        echo date_format($date,"d/m/y H:i");
                    ?>
                </p>
            </section>

            <section>
                <h2><hr>Datos<hr></h2>
                <p>Nombre: <?php echo $fila[1] ?></p>
                <p>Celular: <?php echo $fila[2] ?></p>
                <p>Dirección: <?php echo $fila[3] ?></p>

                <h2><hr>Máquina<hr></h2>
                <p>Modelo:  <?php echo $fila[4] ?></p>
                <p>Tipo:  <?php echo $fila[5] ?></p>
                <p>Problema:  <?php echo $fila[6] ?></p>
            </section>

            <section>
                <h2><hr>Fotos<hr></h2>
            </section>
        </div>
    </main>
</body>
</html>