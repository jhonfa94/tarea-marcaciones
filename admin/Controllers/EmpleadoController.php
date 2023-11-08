<?php

include __DIR__ . "/../Models/Empleado.php";

class EmpleadoController
{
    public static function info($id)
    {
        return Empleado::info($id, $id);
    }

    public static function listarEmpleados()
    {

        return Empleado::listar();
    }

    public static function registrar()
    {
        if (isset($_POST['registrarEmpleado'])) {
            $cedula = intval($_POST['cedula']);
            // validamos si el empleado existe por la cedula
            $validarEmpleado = Empleado::info($cedula);
            // var_dump($_POST);
            // var_dump($validarEmpleado);

            if (count($validarEmpleado) > 0) {

                echo "
                    <div class='alert alert-danger' role='alert'>
                        El empleado con cédula $cedula ya se encuentra registrado
                    </div>
                ";
                HelperController::clearDataFormJs();
            } else {

                $data = [
                    'cedula' => $cedula,
                    'nombre' => $_POST['nombre'],
                    'apellido' => $_POST['apellido'],
                    'fecha_nacimiento' => $_POST['fecha_nacimiento'],
                    'correo' => $_POST['correo'],
                    'estado' => $_POST['estado'],
                    'lugar_marcacion' => $_POST['lugar_marcacion'],
                ];

                $registro = Empleado::registrar($data);

                if ($registro > 0) {
                    HelperController::clearDataFormJs();

                    echo "
                        <div class='alert alert-success' role='alert'>
                            El empleado {$_POST['nombre']}  {$_POST['apellido']} con cédula $cedula se registro exitosamente
                        </div>
                    ";

                    HelperController::reloadPage();
                }
            }
        }
    }

    public static function update()
    {
        if (isset($_POST["updateEmpleado"])) {
            
            $idEmpleado = intval($_POST["idEmpleado"]);
            $cedula = intval($_POST["cedula"]);
            
            $data = [
                'id'  => $idEmpleado,
                'cedula'  => $cedula,
                'nombre'  => $_POST['nombre'],
                'apellido'  => $_POST['apellido'],
                'fecha_nacimiento'  => $_POST['fecha_nacimiento'],
                'correo'  => $_POST['correo'],
                'estado'  => $_POST['estado'],
            ];

            $updateEmpleado = Empleado::update($data);
            // var_dump($updateEmpleado);

            HelperController::clearDataFormJs();
            if ($updateEmpleado) {
                echo "
                    <div class='alert alert-success' role='alert'>
                        Empleado actualizado. 
                    </div>
                ";
                HelperController::redirectPage('index.php?ruta=empleados'); 
            } else{
                echo "
                    <div class='alert alert-warning' role='alert'>
                        Para actualizar el registro del id $idEmpleado, se requiere modificación de alguno de los campos del formulario
                    </div>
                ";
            }
        }
    }

    public static function delete()
    {
        if (isset($_POST["eliminarEmpleado"])) {
            $id = intval($_POST["idEmpleado"]);

            $delete = Empleado::delete($id);
            HelperController::clearDataFormJs();
            if ($delete) {
                HelperController::redirectPage("index.php?ruta=empleados", 0);
            }

        }
    }
}
