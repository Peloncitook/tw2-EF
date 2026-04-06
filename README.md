# Sistema de Recepción y Gestión de Documentos

## Descripción del Proyecto
Este proyecto es un sistema web desarrollado en el framework CakePHP 5 diseñado para digitalizar la recepción y seguimiento de documentos (carnets, certificados, títulos, etc.). Soluciona los cuellos de botella de la recepción física mediante un flujo digital controlado por roles de usuario y estados de tramitación.

## Características Principales
* **Seguridad y Autenticación:** Acceso restringido al sistema mediante el plugin de Authentication de CakePHP.
* **Control de Roles:** * **Administrador:** Acceso total. Se encarga de registrar usuarios, digitalizar (subir) los archivos físicos al sistema, asignarlos al usuario correspondiente y gestionar el avance del trámite.
  * **Usuario Normal:**  Acceso de solo lectura (Tracking). Interfaz estrictamente limitada a visualizar la lista de sus propios documentos y monitorear su estado, sin permisos de subida, edición ni eliminación.
* **Gestión de Archivos Físicos:** Subida de documentos con renombramiento automático (timestamps) para evitar colisiones en el servidor.
* **Estados de Flujo:** Seguimiento del ciclo de vida del documento (Recibido, Recepcionado, Revisión, Aprobado, Devuelto).

## Tecnologías Utilizadas
* **Framework:** CakePHP 5.x (Patrón MVC)
* **Base de Datos:** MariaDB / MySQL
* **Entorno:** Contenedores con Podman (Imagen `webdevops/php-apache:8.4`) en MiniOS Linux.
* **Control de Versiones:** Git / GitHub

## Instrucciones de Instalación


1. **Clonar el repositorio:**

   git clone [https://github.com/Peloncitook/EF.git](https://github.com/Peloncitook/EF.git)
   cd EF

2. **Instalar dependencias de Composer:**

   composer install
   
3. **Configuración de Base de Datos:**

Crear una base de datos llamada db_ef


Configurar las credenciales en config/app_local.php.

Crear las Migraciones

bin/cake bake migration_snapshot InitialStructure


4. **Cargar roles y usuario administrador inicial:**


bin/cake migrations seed


   
   
   Permisos de Escritura (Sistemas Linux/Contenedores):
Es vital dar permisos a las carpetas temporales y de almacenamiento de archivos:

chmod -R 777 tmp logs webroot/files/documentos

Credenciales de Acceso (Prueba)
Administrador: admin@example.com / password