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


    <style>
        body {
            background-image: url('./views/assets/img/registro-marcacion.jpg');
            background-repeat: no-repeat;
            background-size: cover;
        }
    </style>


</head>

<body>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6 mt-5 card">
                <h2 class="text-center mt-2">REGISTRAR MARCACIÓN</h2>
                <form method="get">
                    <input type="hidden" name="marcacion" value="MANUAL">

                    <div class="form-group">
                        <!-- <label for="cedula">Text</label> -->
                        <input id="cedula" class="form-control" type="number" name="cedula" min="0" required autofocus placeholder="Cédula">
                    </div>

                    <div class="mt-3 d-grid gap-2">
                        <button class="btn btn-primary" type="submit">REGISTRAR</button>
                    </div>

                </form>
                <?php
                RegistroController::marcacion();
                ?>
            </div>
        </div>
    </div>




</body>

</html>