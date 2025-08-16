<?php
    include('../bd/conexion.php');

    $nombre         =   ucwords($_POST['nombre']);  // Pasar a mayúsculas solo la primera letra
    $celular        =   $_POST['celular'];
    $direccion      =   trim(strtoupper($_POST['direccion'])); // Pasar a mayuscula
    $tipo           =   $_POST['tipo'];
    $modelo         =   $_POST['modelo'];
    $problema       =   $_POST['problema'];

    //Verificando si existe el directorio
    $dirLocal = "../img";

    if (!file_exists($dirLocal)) {
        mkdir($dirLocal, 0777, true);
    }

    $miDir         = opendir($dirLocal); //Habro el directorio


    if(isset($_POST['submit']) && count($_FILES['fotos_maquina']['name'])>0){

        // Recorrer cada archivo subido
        foreach ($_FILES['fotos_maquina']['name'] as $i => $name) {

            //strlen método de php pues devuelve la longitud de una cadena
            if (strlen($_FILES['fotos_maquina']['name'][$i]) > 1) {
            
            $fileName          = $_FILES['fotos_maquina']['name'][$i];
            $sourceFoto        = $_FILES['fotos_maquina']['tmp_name'][$i];
            $tamanoFoto        = $_FILES["fotos_maquina"]['size'][$i];
            $restricciontamano = "500";//MB

                if((($tamanoFoto/1024)/1024)<=$restricciontamano){

                /**Renombrando cada foto que llega desde el formulario */
                $nuevoNombreFile    = substr(md5(uniqid(rand())),0,15);
                $extension_foto     = pathinfo($fileName, PATHINFO_EXTENSION);
                $nombreFoto         = $nuevoNombreFile.'_'.$nombre.'.'.$extension_foto;
                $resultadoFotos     = $dirLocal.'/'.$nombreFoto;

                    // Mover archivo a una ubicación permanente
                    move_uploaded_file($sourceFoto, $resultadoFotos);
                
                    // Insertar información del archivo en la base de datos
                    $sql = "INSERT INTO fotos_clientes (foto, nombre_cliente) VALUES ('{$nombreFoto}', '{$nombre}')";
                    mysqli_query($conexion, $sql);
                    
                }else{
                    echo'<p style="color:red">Existe una foto que supera el peso Maximo de '.$tamanoFoto.'</p>';
                }
            }
        }


        $sql = "INSERT INTO clientes (nombre, celular, direccion, modelo, tipo, problema) VALUES ('{$nombre}', '{$celular}', '{$direccion}', '{$modelo}', '{$tipo}', '{$problema}')";
        mysqli_query($conexion, $sql);


    }

    // Cerrar conexión a la base de datos
    mysqli_close($conexion);

    // Redirigir a la página de inicio
    // header("Location: ../index.php");
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

        <div>
            <h1>Se ha subido <br>correctamente</br> el cliente.</h1>
        </div>
        
        <div>
            <button>
                <a href="agregar.php">
                    <i class="fas fa-plus"></i>
                    Agregar
                </a>
            </button>
            <button>
                <a href="ver.php">
                    <i class="fas fa-eye"></i>
                    Ver
                </a>
            </button>
        </div>
    </main>
</body>
</html>