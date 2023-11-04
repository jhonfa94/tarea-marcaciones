<?php


class Dashboard
{
    public static function totalEmpleados()
    {
        // 1 => Activos
        $stmt = Conexion::conectar()->prepare(" SELECT COUNT(*) AS totalEmp FROM empleados WHERE estado = 1 ");
        $stmt->execute();
        $retorno = $stmt->rowCount() > 0 ? $stmt->fetch(PDO::FETCH_ASSOC) : [];
        $stmt->closeCursor();
        return $retorno;
    }

    public static function  marcacionesFecha($fecha)
    {
        $stmt = Conexion::conectar()->prepare("SELECT * FROM  marcaciones m 
            WHERE DATE(m.registro) = :fecha
        ");
        $stmt->bindParam(":fecha", $fecha, PDO::PARAM_STR);
        $stmt->execute();
        $retorno = $stmt->rowCount() > 0 ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
        $stmt->closeCursor();
        return $retorno;
    }

    public static function totalMarcacionManualEntrada($fecha)
    {
        $stmt = Conexion::conectar()->prepare("SELECT  COUNT(*) AS total FROM  marcaciones m 
            WHERE DATE(m.registro) =  :fecha AND m.tipo_entrada = 'MANUAL'        
        ");
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $stmt->execute();
        $retorno = $stmt->rowCount() > 0 ? $stmt->fetch(PDO::FETCH_ASSOC) : [];
        $stmt->closeCursor();
        return $retorno;
    }

    public static function totalMarcacionQrEntrada($fecha)
    {
        $stmt = Conexion::conectar()->prepare("SELECT  COUNT(*) AS total FROM  marcaciones m 
            WHERE DATE(m.registro) =  :fecha AND m.tipo_entrada = 'QR'        
        ");
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $stmt->execute();
        $retorno = $stmt->rowCount() > 0 ? $stmt->fetch(PDO::FETCH_ASSOC) : [];
        $stmt->closeCursor();
        return $retorno;
    }

    public static function totalMarcacionManualSalida($fecha)
    {
        $stmt = Conexion::conectar()->prepare("SELECT  COUNT(*) AS total FROM  marcaciones m 
            WHERE DATE(m.registro) =  :fecha AND m.tipo_salida = 'MANUAL'        
        ");
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $stmt->execute();
        $retorno = $stmt->rowCount() > 0 ? $stmt->fetch(PDO::FETCH_ASSOC) : [];
        $stmt->closeCursor();
        return $retorno;
    }

    public static function totalMarcacionQrSalida($fecha)
    {
        $stmt = Conexion::conectar()->prepare("SELECT  COUNT(*) AS total FROM  marcaciones m 
            WHERE DATE(m.registro) =  :fecha AND m.tipo_salida = 'QR'        
        ");
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $stmt->execute();
        $retorno = $stmt->rowCount() > 0 ? $stmt->fetch(PDO::FETCH_ASSOC) : [];
        $stmt->closeCursor();
        return $retorno;
    }

    public static function listadoMaracacionesFecha($fecha)
    {
        $stmt = Conexion::conectar()->prepare("SELECT e.cedula, CONCAT(e.nombre, ' ', e.apellido) AS empleado, l.lugar, 
                 m.tipo_entrada, m.tipo_salida, 
                DATE_FORMAT(m.entrada, '%Y-%m-%d %H:%m:%s %p') AS entrada,
                DATE_FORMAT(m.salida, '%Y-%m-%d %H:%m:%s %p') AS salida,
                TIMESTAMPDIFF(HOUR ,m.entrada, m.salida) AS horas
            FROM  marcaciones m
            INNER JOIN  empleados e ON  m.empleado_id = e.id
            INNER JOIN lugares l ON l.id = e.lugar_marcacion
            WHERE e.estado = 1 AND DATE(m.registro) = :fecha
        ");
        $stmt->bindParam(':fecha', $fecha, PDO::PARAM_STR);
        $stmt->execute();
        $retorno = $stmt->rowCount() > 0 ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
        $stmt->closeCursor();
        return $retorno;
    }
}
