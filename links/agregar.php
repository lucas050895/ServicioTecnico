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
    <link rel="stylesheet" href="../css/agregar.css">
    <!-- FONT AWESOME -->
    <script src="https://kit.fontawesome.com/439ee37b3b.js" crossorigin="anonymous"></script>
</head>
<body>
    <main>
        
        <form action="subir.php" method="POST" enctype="multipart/form-data">

            <div>
                <a href="../index.php">
                    <i class="fas fa-arrow-circle-left"></i>
                    Volver atras
                </a>
            </div>

            <h1>Cargar Cliente</h1>

            <fieldset>
                <legend>Datos</legend>
                <div>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre">
                </div>
                <div>
                    <label for="celular">Celular</label>
                    <input type="tel" name="celular" id="celular">
                </div>
                <div>
                    <label for="direccion">Dirección</label>
                    <input type="text" name="direccion" id="direccion">
                </div>
            </fieldset>

            <fieldset>
                <legend>Máquina</legend>
                <div>
                    <label for="tipo">Tipo de Máquina</label>
                    <input type="text" name="tipo" id="tipo">
                </div>
                <div>
                    <label for="modelo">Modelo</label>
                    <input type="text" name="modelo" id="modelo">
                </div>

                <div>
                    <label for="problema">Problema a revisar</label>
                    <select name="problema" id="problema">
                        <option value="">Seleccionar Opción</option>
                        <?php
                                if($conexion) {
                                    $consultation = "SELECT *
                                                        FROM revisar";
                                    $resultado = mysqli_query($conexion,$consultation);
                            
                                    if($resultado){
                                        while($row = $resultado->fetch_array()){
                                            $id = $row['id_revisar'];
                                            $descripcion = $row['descripcion'];
                            
                                            ?>
                                                <option value="<?php echo $id ?>">
                                                    <?php echo $descripcion ?>
                                                </option>
                                            <?php
                                        }
                                    }
                                }
                            ?>
                    </select>
                </div>

                <div>
                    <input type="file" name="uploadedFile" multiple accept="image/">
                </div>
            </fieldset>

            <div>
                <input type="submit" value="Cargar">
            </div>



        </form>
    </main>
</body>
</html>