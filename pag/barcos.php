<?php

require '../db/proteger.php';
require '../includes/funciones/barcos/obtener_barcos.php';


if (isset($_GET['mensaje'])) {

    if ($_GET['mensaje'] == 4) {

        echo "<script>alert('Barco eliminado correctamente');</script>";
    } else {

        echo "<script>alert('No se pudo eliminar el Barco');</script>";
    }

    echo "<script>window.history.replaceState({}, document.title, 'barcos.php');</script>";
}

$barcos = obtener_barcos();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../build/css/app.css" />
    <title>Barcos</title>
</head>

<body>

    <h1 class="tituloP">Barcos</h1>

    <table border="2">
        <div class="contenedorB">
            <a class="boton" href="../form/FormBarcos.php">Crear Barco</a>
            <a class="boton" href="dashboard.php">Volver al Dashboard</a>
        </div>


        <thead>

            <tr>

                <th colspan="3">Matrícula</th>
                <th colspan="3">Nombre</th>
                <th colspan="3">Número de amarre</th>
                <th colspan="3">Cuota de amarre</th>
                <th colspan="3">Socio</th>
                <th colspan="3">Opciones</th>

            </tr>

        </thead>

        <tbody>

            <?php

            while ($barco = mysqli_fetch_assoc($barcos)) {

            ?>

                <tr>

                    <td colspan="3"><?php echo $barco['matricula']; ?></td>
                    <td colspan="3"><?php echo $barco['nombre']; ?></td>
                    <td colspan="3"><?php echo $barco['n_amarre']; ?></td>
                    <td colspan="3"><?php echo $barco['cuota_amarre']; ?></td>
                    <td colspan="3"><?php echo $barco['socio_cedula']; ?></td>
                    <td><a class="boton" href="../includes/barcos/update.php?matricula=<?php echo $barco['matricula']; ?>">actualizar</a></td>
                    <td><a class="boton" href="../includes/funciones/barcos/eliminar_barcos.php?matricula=<?php echo $barco['matricula']; ?>" onclick="return confirm('¿Está seguro de que desea eliminar este barco');">eliminar</a></td>

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