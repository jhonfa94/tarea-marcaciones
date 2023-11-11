<?php 

class Registro
{
    public static function info($empleado_id)
    {
        $stmt = Conexion::conectar()->prepare("SELECT id, empleado_id, entrada, salida FROM  marcaciones 
            WHERE empleado_id = :empleado_id AND DATE(registro) = CURDATE();             
        ");
        $stmt->bindParam(':empleado_id', $empleado_id, PDO::PARAM_INT);
        $stmt->execute();
        $retorno = $stmt->rowCount() > 0 ? $stmt->fetch(PDO::FETCH_ASSOC) : [];
        $stmt->closeCursor();
        return $retorno;
    }

    public static function registrar($empleado_id, $tipo_entrada, $lugar_entrada_id)
    {
        $conexion = Conexion::conectar();
        $registrar = $conexion->prepare("INSERT INTO marcaciones (empleado_id, entrada, tipo_entrada, lugar_entrada_id) 
            VALUES (:empleado_id, NOW(), :tipo_entrada, :lugar_entrada_id);
        ");
        $registrar->bindParam(':empleado_id', $empleado_id, PDO::PARAM_INT);
        $registrar->bindParam(':tipo_entrada', $tipo_entrada, PDO::PARAM_STR);
        $registrar->bindParam(':lugar_entrada_id', $lugar_entrada_id, PDO::PARAM_INT);
        $registrar->execute();
        $idRegistro = $conexion->lastInsertId();
        $retorno = $idRegistro > 0 ? true : false;
        $registrar->closeCursor();
        return $retorno;
    }

    public static function actualizar($marcacion_id, $empleado_id, $tipo_salida, $lugar_salida_id)
    {
        $stmt = Conexion::conectar()->prepare("UPDATE marcaciones SET 
            salida = NOW(), 
            tipo_salida = :tipo_salida, 
            lugar_salida_id = :lugar_salida_id
            WHERE  id = :marcacion_id AND empleado_id = :empleado_id
        ");
        $stmt->bindParam(':marcacion_id', $marcacion_id, PDO::PARAM_INT);
        $stmt->bindParam(':empleado_id', $empleado_id, PDO::PARAM_INT);
        $stmt->bindParam(':tipo_salida', $tipo_salida, PDO::PARAM_STR);
        $stmt->bindParam(':lugar_salida_id', $lugar_salida_id, PDO::PARAM_INT);
        $stmt->execute();
        $retorno = $stmt->rowCount() > 0 ? true : false;
        $stmt->closeCursor();
        return $retorno;
    }
    
}
