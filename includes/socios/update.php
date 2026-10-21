<?php

require '../../db/proteger.php';
require '../funciones/socios/actualizar_socios.php';

$socio = actualizar_socios();

$cedula = $_GET['cedula'];



?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../build/css/app.css">
    <title>Actualizar Socio</title>
</head>

<body>


    <form method="POST">
        <?php foreach ($errores as $error) { ?>
            <p><?php echo $error; ?></p>
        <?php } ?>

        <fieldset>
            <h3>Actualiza tu socio</h3>

            <div class="contenedor_campos">

                <div class="campos">


                    <input
                        type="text"
                        name="cedula"
                        placeholder="Documento"
                        value="<?php echo $socio['cedula']; ?>">

                </div>


                <div class="campos">

                    <input
                        type="text"
                        name="apellido"
                        placeholder="Apellido"
                        value="<?php echo $socio['apellido']; ?>">

                </div>


                <div class="campos">

                    <input
                        type="text"
                        name="telefono"
                        placeholder="Teléfono"
                        value="<?php echo $socio['telefono']; ?>">
                </div>


            </div>

            <div class="contenedor_boton">

                <input
                    class="boton"
                    type="submit"
                    name="actualizar"
                    value="Actualizar">

            </div>


        </fieldset>

        <br>

        <div class="contenedor_boton">

            <a class="boton"
             href="../../pag/socios.php">
             Volver atrás
            </a>

        </div>


    </form>
</body>

</html>