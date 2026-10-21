<?php

require '../db/proteger.php';
require '../includes/funciones/salidas/agregar_salidas.php';

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errores = agregar_salidas();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../build/css/app.css">

    <title>Agregar Salida</title>

</head>

<body>

    <?php foreach ($errores as $error) { ?>

        <p><?php echo $error; ?></p>

    <?php } ?>


    <form method="POST">
        <fieldset>

            <h3>Agregar Salida</h3>

            <div class="contenedor_campos">

                <div class="campos">
                    <input type="date" name="Fecha" placeholder="Fecha">
                </div>

                <div class="campos">
                    <input type="time" name="Hora" placeholder="Hora">
                </div>

                <div class="campos">
                    <input type="text" name="Destino" placeholder="Destino">
                </div>

                <div class="campos">
                    <input type="text" name="Barcos_Matricula" placeholder="Matricula del Barco">
                </div>

            </div>


            <div class="contenedor_boton">
                <input class="boton" type="submit" name="guardar">

            </div>

        </fieldset>




        <div class="contenedor_boton">
            <a class="boton" href="../pag/salidas.php">Volver a Salidas</a>

        </div>

    </form>
</body>

</html>