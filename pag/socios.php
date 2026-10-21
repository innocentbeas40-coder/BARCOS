<?php

require '../db/proteger.php';
require '../includes/funciones/socios/obtener_socios.php';

if (isset($_GET['mensaje'])) {

    if ($_GET['mensaje'] == 3) {

        echo "<script>alert('Socio eliminado correctamente');</script>";

    } else {

        echo "<script>alert('No se pudo eliminar el socio');</script>";
    }

    echo "<script>window.history.replaceState({}, document.title, 'socios.php');</script>";
}

$socios = obtener_socios();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../build/css/app.css" />
    <title>Socios</title>
</head>

<body>

    <h1 class="tituloP">Socios</h1>

    <table border="2">
        <div class="contenedorB">
            <a class="boton" href="../form/FormSocios.php">Crear Usuario</a>
            <a class="boton" href="dashboard.php">Volver al Dashboard</a>
        </div>

        <thead>
            <tr>
                <th colspan="3">Documento</th>
                <th colspan="3">Segundo Nombre</th>
                <th colspan="3">teléfono</th>
                <th colspan="3">opciones</th>
            </tr>
        </thead>

        <tbody>

            <?php
            while ($socio = mysqli_fetch_assoc($socios)) {
            ?>

                <tr>
                    <td colspan="3"><?php echo $socio['cedula']; ?></td>
                    <td colspan="3"><?php echo $socio['apellido']; ?></td>
                    <td colspan="3"><?php echo $socio['telefono']; ?></td>
                    <td><a class="boton" href="../includes/socios/update.php?cedula=<?php echo $socio['cedula']; ?>">actualizar</a></td>
                    <td><a class="boton"  href="../includes/funciones/socios/eliminar_socios.php?cedula=<?php echo $socio['cedula']; ?>" onclick="return confirm('¿Está seguro de que desea eliminar este socio?');">eliminar</a></td>
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