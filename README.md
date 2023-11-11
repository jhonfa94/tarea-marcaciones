# SISTEMA DE MARCACIONES

> El sistema de marcaciónes facilita el registro de la jornada del empleado. Actualemente el sistema cuenta con los siguientes módulos: 

* Login
* Usuarios
* Empleados
* Marcaciones

El proyecto se encuentra desarrollado bajo las siguietes tecnologías web: 

* Frontend
    * HTML
    * CSS
    * JAVASCRIPT
    * Bootstrap (v5)
* Backend
    * PHP (v8)
* Base de datos
    * MariaDB 


### Nota: 

- En el archivo config.php se debe configurar la url del proyecto. 
- En el archivo ***Models/Conexion.php*** se debe configurar los valores de la conexión de la base de datos. 

> Usuario y Contraseña: **1234567**


###Ejemplo de url de marcación para QR: 
> http://localhost/marcaciones/registro/index.php?ruta=general&marcacion=QR&ubicacion=1&cedula=48

* Ruta: general u oficina
* Marcación: QR
* Ubicación: 1 => General || 2 => Oficina
* Cédula: Número de la cédula del empleado


