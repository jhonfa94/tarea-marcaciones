<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="<?= URL ?>/views/assets/img/marcacion.ico" type="image/x-icon">

    <!-- bootstrap css -->
    <link rel="stylesheet" href="<?= URL ?>/views/plugins/bootstrap/css/bootstrap.min.css">

    <title>REGISTRO - SISTEMA DE MARCACIONES</title>

    <!-- scrips js -->
    <!-- bootstrap js -->
    <script src="<?= URL ?>/views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>





</head>

<body>

    <?php
    if (isset($_GET['ruta'])) {
        $arrayRuta = explode('/', $_GET['ruta']);
        $ruta = $arrayRuta[0];

        if ($ruta == 'general' || $ruta == 'oficina') {
            include "ubicacion/{$ruta}.php";
        } else {
            include "ubicacion/seleccionar.php";
        }
    } else {
        include "ubicacion/seleccionar.php";
    }

    ?>



</body>

</html>