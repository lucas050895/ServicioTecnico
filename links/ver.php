<?php
    include('../bd/conecxion.php');
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
    <link rel="stylesheet" href="../css/ver.css">
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/439ee37b3b.js" crossorigin="anonymous"></script>
</head>
<body>
    <main>
        <div class="titulo">
            <i class="fas fa-search"></i>
            <h1>Buscar cliente </h1>
        </div>

        <form action="" method="GET">
            <div>
                <div>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre">
                </div>
                <div>
                    <label for="direccion">Dirección</label>
                    <input type="text" name="direccion" id="direccion">
                </div>
            </div>

            <div>
                <input type="submit" value="Buscar">
            </div>

            <hr>
        </form>


            <table>
                <tr>
                    <th>Nombre</th>
                    <th>Dirección</th>
                    <th></th>
                </tr>
            </table>

        <div>
            <?php

                if(isset($_GET["nombre"]) && $_GET["nombre"] != ''){
                    $nombre = $_GET['nombre'];
                    $resultado = $conexion -> query("SELECT * FROM clientes WHERE nombre LIKE '$nombre%' ")or die($conexion -> error);
                    if($resultado->num_rows > 0 ){
                        while($fila = mysqli_fetch_array($resultado)){
                            $nombre = $fila['nombre'];
                            $direccion = $fila['direccion'];
                            $id = $fila['id'];
                            
                            ?>
                                <table>
                                    <tr class="info">
                                        <th><?php echo $nombre; ?>
                                        <th><?php echo $direccion; ?>
                                        <th><a href="cliente.php?id=<?php echo $id?>">Ver cliente</a></th>
                                    </tr>
                                </table>
                            <?php
                        };
                    }else{
                        echo "<h2>" . "No hay clientes registrado con ese nombre" . "</h2>";
                    }
                }
                if(isset($_GET["direccion"]) && $_GET["direccion"] != ''){
                    $direccion = $_GET['direccion'];
                    $resultado = $conexion -> query("SELECT * FROM clientes WHERE direccion LIKE '$direccion%' ")or die($conexion -> error);
                    if($resultado->num_rows > 0 ){
                        
                        while($fila = mysqli_fetch_array($resultado)){
                            $nombre = $fila['nombre'];
                            $direccion = $fila['direccion'];
                            
                            ?>
                                <table>
                                    <tr>
                                        <th><?php echo $nombre; ?></th>
                                        <th><?php echo $direccion ?></th>
                                    </tr>
                                </table>
                            <?php
                        };
                    }else{
                        echo "<h2>" . "No hay clientes registrado con esa dirección" . "</h2>";
                    }
                }
                $conexion ->close();
            ?>
        </div>
    </main>
</body>
</html>