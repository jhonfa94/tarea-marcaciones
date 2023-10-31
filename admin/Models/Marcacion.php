<?php 
 class Marcacion
 {
   public static function listar()
   {
      $stmt = Conexion::conectar()->prepare("SELECT m.id, m.empleado_id, 
            DATE_FORMAT(m.entrada, '%Y-%m-%d %H:%m:%s %p') AS entrada,
            DATE_FORMAT(m.salida, '%Y-%m-%d %H:%m:%s %p') AS salida,
            TIMESTAMPDIFF(HOUR ,m.entrada, m.salida) AS horas, 
            CONCAT(e.nombre, ' ', e.apellido) AS empleado
         FROM marcaciones m
         JOIN empleados e ON e.id = m.empleado_id
      ");
      $stmt->execute();
      $retorno = $stmt->rowCount() > 0 ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
      $stmt->closeCursor();
      return $retorno;
   }    
 }

?>