<?php

require '../db/proteger.php';
require '../includes/funciones/socios/agregar_socios.php';

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errores = agregar_socios();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../build/css/app.css" />
    <title>Agregar Socio</title>
</head>

<body>


    <?php foreach ($errores as $error) { ?>
        <p><?php echo $error; ?></p>
    <?php } ?>

    <form method="POST">

        <fieldset>

            <h3>crea un socio</h3>

            <div class="contenedor_campos">

                <div class="campos">
                    <input type="text" name="cedula" placeholder="Documento">
                </div>

                <div class="campos">
                    <input type="text" name="apellido" placeholder="Apellido">
                </div>


                <div class="campos">
                    <input type="text" name="telefono" placeholder="Teléfono">
                </div>

            </div>

            <div class="contenedor_boton">
                <input class="boton" type="submit" name="guardar">
            </div>


        </fieldset>

        <div class="contenedor_boton">
            <a class="boton" href="../pag/socios.php">Volver atrás</a>
        </div>


    </form>
</body>

</html>