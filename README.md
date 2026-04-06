# Sistema de Recepción y Gestión de Documentos

## Descripción del Proyecto
Este proyecto es un sistema web desarrollado en el framework CakePHP 5 diseñado para digitalizar la recepción y seguimiento de documentos (carnets, certificados, títulos, etc.). Soluciona los cuellos de botella de la recepción física mediante un flujo digital controlado por roles de usuario y estados de tramitación.

## Características Principales
* **Seguridad y Autenticación:** Acceso restringido al sistema mediante el plugin de Authentication de CakePHP.
* **Control de Roles (RBAC):** * **Administrador:** Acceso total al CRUD de usuarios, roles y todos los documentos del sistema.
  * **Usuario Normal:** Interfaz restringida para  visualizar únicamente sus propios documentos (vera su documento que escaneo el que recepciono su documento), sin permisos de edición o eliminación para mantener la integridad del historial.
* **Gestión de Archivos Físicos:** Subida de documentos con renombramiento automático (timestamps) para evitar colisiones en el servidor.
* **Estados de Flujo:** Seguimiento del ciclo de vida del documento (Recibido, Recepcionado, Revisión, Aprobado, Devuelto).

## Tecnologías Utilizadas
* **Framework:** CakePHP 5.x (Patrón MVC)
* **Base de Datos:** MariaDB / MySQL
* **Entorno:** Contenedores con Podman (Imagen `webdevops/php-apache:8.4` o `8.3`) en MiniOS Linux.
* **Control de Versiones:** Git / GitHub

## Instrucciones de Instalación

1. **Clonar el repositorio:**
   ```bash
   git clone [https://github.com/Peloncitook/EF.git](https://github.com/Peloncitook/EF.git)
   cd EF
   
   Permisos de Escritura (Sistemas Linux/Contenedores):
Es vital dar permisos a las carpetas temporales y de almacenamiento de archivos:

chmod -R 777 tmp logs webroot/files/documentos

Credenciales de Acceso (Prueba)
Administrador: admin@example.com / password