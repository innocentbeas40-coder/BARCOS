<?php

require '../db/proteger.php';
require '../includes/funciones/salidas/obtener_salidas.php';

if (isset($_GET['mensaje'])) {

    if ($_GET['mensaje'] == 6) {

        echo "<script>alert('Salida eliminado correctamente');</script>";
    } else {

        echo "<script>alert('No se pudo eliminar el salida');</script>";
    }

    echo "<script>window.history.replaceState({}, document.title, 'salidas.php');</script>";
}

$salidas = obtener_salidas();

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../build/css/app.css" />

    <title>Salidas</title>

</head>

<body>

    <h1 class="tituloP">Salidas</h1>

    <table border="2">

        <div class="contenedorB">
            <a class="boton" href="../form/FormSalidas.php">Crear Salida</a>
            <a class="boton" href="dashboard.php">Volver al Dashboard</a>
        </div>

        




        <thead>

            <tr>

                <th colspan="3">ID Salida</th>
                <th colspan="3">Fecha</th>
                <th colspan="3">Hora</th>
                <th colspan="3">Destino</th>
                <th colspan="3">Matrícula del barco</th>
                <th colspan="3">Opciones</th>

            </tr>

        </thead>

        <tbody>

            <?php

            while ($salida = mysqli_fetch_assoc($salidas)) {

            ?>

                <tr>

                    <td colspan="3"><?php echo $salida['IdSalida']; ?></td>
                    <td colspan="3"><?php echo $salida['Fecha']; ?></td>
                    <td colspan="3"><?php echo $salida['Hora']; ?></td>
                    <td colspan="3"><?php echo $salida['Destino']; ?></td>
                    <td colspan="3"><?php echo $salida['Barcos_Matricula']; ?></td>
                    <td><a class="boton" href="../includes/salidas/update.php?IdSalida=<?php echo $salida['IdSalida']; ?>">actualizar</a></td>
                    <td><a class="boton" href="../includes/funciones/salidas/eliminar_salidas.php?IdSalida=<?php echo $salida['IdSalida']; ?>" onclick="return confirm('¿Está seguro de que desea eliminar esta salida');">Eliminar</a></td>

                </tr>

            <?php

            }

            ?>

        </tbody>
    </table>

    <div class="contenedorB">
        <a class="boton" href="../pag/CerrarSesion.php">Cerrar Sesión</a>
    </div>

</body>

</html>