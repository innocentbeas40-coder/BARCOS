<?php

require '../db/proteger.php';
require '../includes/funciones/barcos/agregar_barcos.php';

$errores = [];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $errores = agregar_barcos();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../build/css/app.css" />

    <title>Agregar Barco</title>

</head>

<body>

    <?php foreach ($errores as $error) { ?>

        <p><?php echo $error; ?></p>

    <?php } ?>


    <form method="POST">

        <fieldset>
            <h3>crear un barco</h3>

            <div class="contenedor_campos">

                <div class="campos">
                    <input
                        type="text"
                        name="matricula"
                        placeholder="Matrícula">
                </div>

                <div class="campos">
                    <input
                        type="text"
                        name="nombre"
                        placeholder="Nombre">

                </div>

                <div class="campos">
                    <input
                        type="text"
                        name="n_amarre"
                        placeholder="Número de amarre">

                </div>

                <div class="campos">
                    <input
                        type="text"
                        name="cuota_amarre"
                        placeholder="Cuota de amarre">

                </div>

                <div class="campos">
                    <input
                        type="text"
                        name="socio_cedula"
                        placeholder="Cédula del socio">

                </div>

            </div>

            <div class="contenedor_boton">
                <input
                    class="boton"
                    type="submit"
                    name="guardar">

            </div>


        </fieldset>






    </form>

    <div class="contenedor_boton">
        <a class="boton" href="../pag/barcos.php">Volver a Barcos</a>

    </div>


</body>

</html>