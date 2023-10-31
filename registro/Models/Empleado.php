<?php

class Empleado
{

    public static function info($cedula, $id = null)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM empleados WHERE cedula = :cedula OR id =  :id");
        $stmt->bindParam(':cedula', $cedula, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $retorno = $stmt->rowCount() > 0 ? $stmt->fetch(PDO::FETCH_ASSOC) : [];
        $stmt->closeCursor();
        return $retorno;
    }
}
