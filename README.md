# AI3_DisenoWeb_NombreApellido

Módulo web en PHP (PDO) con MySQL/MariaDB: registro (Create) y consulta (Read) de estudiantes, con sentencias preparadas, validación cliente/servidor, protección CSRF y saneamiento de salidas contra XSS.

## Requisitos
- XAMPP / WAMP / Laragon (PHP 8+ y MySQL/MariaDB)

## Despliegue local
1. Clona el repositorio dentro de `htdocs` (XAMPP): `git clone <URL_DEL_REPO> AI3_DisenoWeb_NombreApellido`
2. Inicia Apache y MySQL desde el panel de XAMPP.
3. Importa `database/db_sistema_web.sql` en phpMyAdmin (pestaña Importar) o por consola:
   `mysql -u root < database/db_sistema_web.sql`
4. Revisa las credenciales en `conexion.php` (por defecto `root` sin contraseña).
5. Abre `http://localhost/AI3_DisenoWeb_NombreApellido/index.php`

## Estructura
- `conexion.php`: conexión PDO con try-catch
- `index.php`: formulario de registro (Create)
- `registros.php`: tabla de registros (Read)
- `database/db_sistema_web.sql`: script DDL
- `css/estilos.css`: estilos
