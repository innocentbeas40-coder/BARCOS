<?php

require '../../db/proteger.php';
require __DIR__ . '/../../db/conexion.php';
require '../../includes/funciones/barcos/actualizar_barcos.php';


$barco = actualizar_barco();

$matricula = $_GET['matricula'];

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="../../build/css/app.css">

    <title>Actualizar barco</title>

</head>


<body>

    <form method="post">

        <?php

        if ($errores) {

            foreach ($errores as $error) {

                echo "<p>$error</p>";
            }
        }

        ?>


        <fieldset>

            <h3>Actualiza tu barco</h3>


            <div class="contenedor_campos">


                <div class="campos">

                    <input
                        type="text"
                        name="matricula"
                        placeholder="Matrícula"
                        value="<?php echo $barco['matricula']; ?>">

                </div>


                <div class="campos">

                    <input
                        type="text"
                        name="nombre"
                        placeholder="Nombre"
                        value="<?php echo $barco['nombre']; ?>">

                </div>


                <div class="campos">

                    <input
                        type="text"
                        name="n_amarre"
                        placeholder="Número de amarre"
                        value="<?php echo $barco['n_amarre']; ?>">

                </div>


                <div class="campos">

                    <input
                        type="text"
                        name="cuota_amarre"
                        placeholder="Cuota de amarre"
                        value="<?php echo $barco['cuota_amarre']; ?>">

                </div>


                <div class="campos">

                    <input
                        type="text"
                        name="socio_cedula"
                        placeholder="Cédula del socio"
                        value="<?php echo $barco['socio_cedula']; ?>">

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


        <div class="contenedor_boton">

            <a
                class="boton"
                href="../../pag/barcos.php">
                Volver atrás
            </a>

        </div>


    </form>

</body>

</html>

