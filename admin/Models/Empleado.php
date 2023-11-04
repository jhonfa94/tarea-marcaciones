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


    public static function listar()
    {
        $stmt = Conexion::conectar()->prepare("SELECT e.id, e.cedula, e.nombre, e.apellido, e.fecha_nacimiento, e.correo, e.estado, l.lugar
            FROM empleados e
            JOIN lugares l ON e.lugar_marcacion = l.id
        ");
        $stmt->execute();
        $retorno = $stmt->rowCount() > 0 ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
        $stmt->closeCursor();
        return $retorno;
    }

    public static function registrar($data)
    {
        $conexion = Conexion::conectar();
        $insertEmpleado = $conexion->prepare("INSERT INTO empleados (cedula, nombre, apellido, fecha_nacimiento, correo, estado, lugar_marcacion) 
            VALUES(:cedula, :nombre, :apellido, :fecha_nacimiento, :correo, :estado, :lugar_marcacion); 
        ");
        $insertEmpleado->bindParam(':cedula', $data['cedula'], PDO::PARAM_INT);
        $insertEmpleado->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $insertEmpleado->bindParam(':apellido', $data['apellido'], PDO::PARAM_STR);
        $insertEmpleado->bindParam(':fecha_nacimiento', $data['fecha_nacimiento'], PDO::PARAM_STR);
        $insertEmpleado->bindParam(':correo', $data['correo'], PDO::PARAM_STR);
        $insertEmpleado->bindParam(':estado', $data['estado'], PDO::PARAM_STR);
        $insertEmpleado->bindParam(':lugar_marcacion', $data['lugar_marcacion'], PDO::PARAM_INT);
        $insertEmpleado->execute();
        $id = $conexion->lastInsertId();
        $retorno = $id  > 0 ? $id : 0;
        $insertEmpleado->closeCursor();
        return $retorno;
    }

    public static function update($data){
        $updateEmpleado = Conexion::conectar()->prepare("UPDATE empleados SET 
                cedula = :cedula,
                nombre = :nombre,
                apellido = :apellido,
                fecha_nacimiento = :fecha_nacimiento,
                correo = :correo,
                estado = :estado, 
                lugar_marcacion = :lugar_marcacion        
            WHERE id = :id

        ");
        $updateEmpleado->bindParam(':id', $data['id'], PDO::PARAM_INT);
        $updateEmpleado->bindParam(':cedula', $data['cedula'], PDO::PARAM_INT);
        $updateEmpleado->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $updateEmpleado->bindParam(':apellido', $data['apellido'], PDO::PARAM_STR);
        $updateEmpleado->bindParam(':fecha_nacimiento', $data['fecha_nacimiento'], PDO::PARAM_STR);
        $updateEmpleado->bindParam(':correo', $data['correo'], PDO::PARAM_STR);
        $updateEmpleado->bindParam(':estado', $data['estado'], PDO::PARAM_STR);
        $updateEmpleado->bindParam(':lugar_marcacion', $data['lugar_marcacion'], PDO::PARAM_INT);
        $updateEmpleado->execute();
        $retorno = $updateEmpleado->rowCount() > 0 ? true : false;
        $updateEmpleado->closeCursor();
        return $retorno;
       
    }
}
