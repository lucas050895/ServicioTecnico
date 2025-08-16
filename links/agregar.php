<?php
    include('../bd/conexion.php');
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
        <div class="titulo">
            <i class="far fa-address-card"></i>
            <h1>Cargar Cliente</h1>
        </div>
        
        <form action="subir.php" method="POST" enctype="multipart/form-data">
            <fieldset>
                <legend>Datos</legend>
                <div>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre" id="nombre" required>
                </div>
                <div>
                    <label for="celular">Celular</label>
                    <input type="tel" name="celular" id="celular" required>
                </div>
                <div>
                    <label for="direccion">Dirección</label>
                    <input type="text" name="direccion" id="direccion" required>
                </div>
            </fieldset>

            <fieldset>
                <legend>Máquina</legend>
                <div>
                    <label for="tipo">Tipo</label>
                    <input type="text" name="tipo" id="tipo" required>
                </div>
                <div>
                    <label for="modelo">Modelo</label>
                    <input type="text" name="modelo" id="modelo" required>
                </div>

                
                <div>
                    <label for="problema">Problema</label>
                    <select name="problema" id="problema" required>
                        <option value="" selected disabled>Seleccionar Opción</option>
                        <?php
                                if($conexion) {
                                    $consultation = "SELECT descripcion
                                                        FROM problema";
                                    $resultado = mysqli_query($conexion,$consultation);
                            
                                    if($resultado){
                                        while($row = $resultado->fetch_array()){
                                            $descripcion = $row['descripcion'];
                            
                                            ?>
                                                <option value="<?php echo $descripcion ?>">
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
                    <input type="file" name="fotos_maquina[]" multiple accept="image/*">
                </div>
            </fieldset>

            <div>
                <input type="submit" name="submit" value="Cargar">
            </div>



        </form>
    </main>
</body>
</html>