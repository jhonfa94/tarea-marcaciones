<?php

class Usuario
{

    public static function info($cedula, $id = null)
    {
        $stmt = Conexion::conectar()->prepare("SELECT id, cedula, nombre, correo, password, rol, estado  FROM usuarios WHERE cedula = :cedula OR id = :id;");
        $stmt->bindParam(':cedula', $cedula, PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $retorno = $stmt->rowCount() > 0 ? $stmt->fetch(PDO::FETCH_ASSOC) : [];
        $stmt->closeCursor();
        return $retorno;
    }
    public static function lista()
    {
        $stmt = Conexion::conectar()->prepare("SELECT id, cedula, nombre, correo, password, rol, estado  FROM usuarios; ");
        $stmt->execute();
        $retorno = $stmt->rowCount() > 0 ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
        $stmt->closeCursor();
        return $retorno;
    }

    public static function registrarSesion($cedula, $estado, $dispositivo)
    {
        $conexion = Conexion::conectar();
        $insertSession = $conexion->prepare("INSERT INTO sessiones (cedula, estado, dispositivo, fecha_hora) 
            VALUES(:cedula, :estado, :dispositivo, NOW());         
        ");
        $insertSession->bindParam(':cedula', $cedula, PDO::PARAM_INT);
        $insertSession->bindParam(':estado', $estado, PDO::PARAM_STR);
        $insertSession->bindParam(':dispositivo', $dispositivo, PDO::PARAM_STR);
        $insertSession->execute();
        $retorno = $conexion->lastInsertId() > 0 ? true : false;
        $insertSession->closeCursor();
        return $retorno;
    }

    public static function registrar($data)
    {

        $conexion = Conexion::conectar();
        $insertUser = $conexion->prepare("INSERT INTO usuarios (cedula, nombre, correo, password, rol,   estado) 
            VALUES(:cedula, :nombre, :correo, :password, :rol,  :estado); 
        ");
        $insertUser->bindParam(':cedula', $data['cedula'], PDO::PARAM_INT);
        $insertUser->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $insertUser->bindParam(':correo', $data['correo'], PDO::PARAM_STR);
        $insertUser->bindParam(':password', $data['password'], PDO::PARAM_STR);        
        $insertUser->bindParam(':rol', $data['rol'], PDO::PARAM_STR);        
        $insertUser->bindParam(':estado', $data['estado'], PDO::PARAM_STR);
        $insertUser->execute();
        $id = $conexion->lastInsertId();
        $retorno = $id  > 0 ? $id : 0;
        $insertUser->closeCursor();
        return $retorno;
    }

    public static function update($data)
    {
        $updateUsuario = Conexion::conectar()->prepare("UPDATE usuarios SET 
                cedula = :cedula,
                nombre = :nombre,
                correo = :correo,
                rol = :rol,
                estado = :estado        
            WHERE  id = :id
        ");
        $updateUsuario->bindParam(':id', $data['id'], PDO::PARAM_INT);
        $updateUsuario->bindParam(':cedula', $data['cedula'], PDO::PARAM_INT);
        $updateUsuario->bindParam(':nombre', $data['nombre'], PDO::PARAM_STR);
        $updateUsuario->bindParam(':correo', $data['correo'], PDO::PARAM_STR);
        $updateUsuario->bindParam(':rol', $data['rol'], PDO::PARAM_STR);        
        $updateUsuario->bindParam(':estado', $data['estado'], PDO::PARAM_STR);
        $updateUsuario->execute();
        $retorno = $updateUsuario->rowCount() > 0 ? true : false;
        $updateUsuario->closeCursor();
        return $retorno;
    }
}
