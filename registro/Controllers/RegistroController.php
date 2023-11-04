<?php
include __DIR__ . "/../Models/Registro.php";
include __DIR__ . "/../Models/Empleado.php";

class RegistroController
{

    public static function marcacion()
    {
        if (isset($_GET['cedula'])) {
            $cedula = $_GET['cedula'];
            $tipo_marcacion = $_GET['marcacion'];

            $infoEmpleado = Empleado::info($cedula, $cedula);
            HelperController::clearDataFormJs();

            // VALIDAMOS SI EL USUARIO ESTA REGISTRADO EN EL SISTEMA
            if (!count($infoEmpleado) > 0) {
                echo "
                    <div class='alert alert-danger mt-3' role='alert'>
                        El número del documento no esta asociado para el registro de la marcación
                    </div>
                ";
                die();
            }

            // VALIDAMOS SI EL USUARIO ESTA ACTIVO
            if ($infoEmpleado['estado'] == 0) {
                echo "
                    <div class='alert alert-warning mt-3' role='alert'>
                        El empleado no esta activo
                    </div>
                ";
                die();
            }

            $idEmpleado = $infoEmpleado['id'];
            $nombreEmpleado = $infoEmpleado['nombre'] . ' ' . $infoEmpleado['apellido'];
            $infoMarcacion = Registro::info($idEmpleado);


            // SI EXISTE UNA MARCACION SE VALIDA SI TIENE YA LA SALIDA
            if (count($infoMarcacion) > 0 && $infoMarcacion['salida'] != null) {
                echo "
                        <div class='alert alert-info mt-3' role='alert'>
                            $nombreEmpleado su jornada ya fue finalizada
                        </div>
                    ";
                HelperController::redirectPage(URL, 3000);
                die();
            }

            // SI NO SE TIENE IFORMACION SE GENERA REGISTRO DE MARCACION
            if (!count($infoMarcacion) > 0) {
                $registro = Registro::registrar($idEmpleado, $tipo_marcacion);
                if ($registro) {
                    echo "
                        <div class='alert alert-success mt-3' role='alert'>
                            Bienvenido $nombreEmpleado
                            <br>
                            Tipo Marcación: $tipo_marcacion
                        </div>
                    ";
                    HelperController::redirectPage(URL, 3000);
                    die();
                }
            } else {
                $update = Registro::actualizar($infoMarcacion['id'], $idEmpleado, $tipo_marcacion);
                if ($update) {
                    echo "
                        <div class='alert alert-success mt-3' role='alert'>
                            Marcación Finalizada $nombreEmpleado
                            <br>
                            Tipo Marcación: $tipo_marcacion
                        </div>
                    ";
                    HelperController::redirectPage(URL, 3000);
                    die();
                }
            }
        }
    }
}
