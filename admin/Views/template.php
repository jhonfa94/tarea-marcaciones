<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="shortcut icon" href="<?= URL ?>/views/assets/img/favicon.ico" type="image/x-icon">

    <link rel="stylesheet" href="<?= URL ?>/views/plugins/bootstrap/css/bootstrap.min.css">

    <!-- Datatables -->
    <!-- <link rel="stylesheet" href="<?= URL ?>/views/plugins/datatables/datatables.min.css"> -->
    <link rel="stylesheet" href="<?= URL ?>/views/plugins/datatables/dataTables.bootstrap5.min.css">


    <title>ADMIN - SISTEMA DE MARCACIONES</title>

    <!-- scrips js -->
    <script src="<?= URL ?>/views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="<?= URL ?>/views/plugins/jquery/jquery-3.7.0.js"></script>
    <script src="<?= URL ?>/views/plugins/datatables/jquery.datatables.min.js"></script>
    <script src="<?= URL ?>/views/plugins/datatables/dataTables.bootstrap5.min.js"></script>

</head>

<body>

    <div class="container-fluid ps-md-0">

        <?php
        if (isset($_SESSION['iniciarSession']) && $_SESSION['iniciarSession'] == 'ok' && isset($_GET['ruta'])) {

            //incluimos el navbar
            include 'includes/navbar.php';

            $rutas = explode('/', $_GET['ruta']);
            // var_dump($rutas);
            $ruta = $rutas[0];
            // echo "$ruta";
            if (in_array($ruta, [                
                'marcaciones',
                'registro',
                'salir',
            ])) {
                include "modulos/{$ruta}.php";
            }
            if (in_array($ruta, [
                'empleados',
                'empleados-edit',
                'empleados-eliminar',
            ])) {
                include "modulos/empleados/{$ruta}.php";
            }
            if (in_array($ruta, [
                'usuarios',
                'usuarios-edit',
            ]) && in_array($_SESSION['rol'], ['developer', 'admin'])) {
                include "modulos/usuarios/{$ruta}.php";
            }
            if (in_array($ruta, [
                'dashboard',
            ])) {
                include "modulos/dashboard/{$ruta}.php";
            } else {
                // include 'modulos/error/404.php';
            }
        } elseif (isset($_GET['ruta']) && $_GET['ruta'] == 'salir') {
            include "modulos/salir.php";
        } else {
            include "modulos/login.php";
        }

        ?>

    </div><!-- container-fluid -->

</body>

</html>