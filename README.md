# Sistema Web de Registro de Estudiantes

## 1. Descripción del proyecto

El presente proyecto consiste en el desarrollo de un sistema web de registro de estudiantes, elaborado como parte de la actividad académica de la asignatura de Diseño Web de la Universidad Tecnológica ECOTEC.

El sistema permite registrar información personal y académica de los estudiantes mediante un formulario web, almacenando los datos en una base de datos relacional MySQL.

El proyecto integra tecnologías de desarrollo web como HTML5, CSS3, PHP y MySQL, aplicando buenas prácticas de programación, organización del código y seguridad en el manejo de información.

## 2. Tecnologías utilizadas

Las principales tecnologías y herramientas utilizadas para el desarrollo del proyecto son:

- **HTML5:** Estructura del formulario y contenido de las páginas web.
- **CSS3:** Diseño visual, estilos y presentación de la interfaz.
- **PHP:** Procesamiento de formularios y comunicación con la base de datos.
- **MySQL:** Administración y almacenamiento de los registros de estudiantes.
- **XAMPP:** Entorno de desarrollo local para ejecutar Apache y MySQL.
- **Visual Studio Code:** Editor de código fuente.
- **Git y GitHub:** Control de versiones y almacenamiento del proyecto.

## 3. Funcionalidades del sistema

El sistema de registro de estudiantes contempla las siguientes funcionalidades:

- Registro de nuevos estudiantes mediante un formulario web.
- Captura de nombres, apellidos, correo electrónico, teléfono y carrera.
- Almacenamiento de información en una base de datos MySQL.
- Consulta y visualización de los estudiantes registrados.
- Validación de los datos ingresados en los formularios.
- Organización de los archivos del proyecto para facilitar su mantenimiento.

## 4. Estructura de la base de datos

El proyecto utiliza una base de datos denominada `db_sistema_web`, que contiene una tabla principal llamada `estudiantes`.

La tabla almacena los siguientes campos:

| Campo | Tipo de dato | Descripción |
|---|---|---|
| id | INT | Identificador único y autoincremental. |
| nombres | VARCHAR(80) | Nombres del estudiante. |
| apellidos | VARCHAR(80) | Apellidos del estudiante. |
| correo | VARCHAR(120) | Correo electrónico. |
| telefono | VARCHAR(15) | Número telefónico. |
| carrera | VARCHAR(100) | Carrera académica. |
| fecha_creacion | TIMESTAMP | Fecha y hora de registro. |

El campo `id` funciona como clave primaria y el correo electrónico cuenta con una restricción UNIQUE para evitar registros duplicados.

## 5. Instalación y ejecución del proyecto

Para ejecutar el sistema de manera local, se deben seguir los siguientes pasos:

**Paso 1. Instalar XAMPP**

Descargar e instalar XAMPP para disponer de los servicios Apache y MySQL.

**Paso 2. Clonar el repositorio**

Abrir una terminal y ejecutar el siguiente comando:

```bash
git clone https://github.com/TU_USUARIO/AI3_DisenoWeb_AbelJimenez.git
```

**Paso 3. Ubicar el proyecto**

Copiar o ubicar la carpeta del proyecto dentro del directorio:

```text
C:\xampp\htdocs\
```

**Paso 4. Iniciar los servicios**

Abrir el panel de control de XAMPP e iniciar los servicios:

- Apache
- MySQL

**Paso 5. Crear la base de datos**

1. Ingresar a phpMyAdmin desde `http://localhost/phpmyadmin`.
2. Importar el archivo SQL del proyecto, que contiene las instrucciones de creación de la base de datos y la tabla de estudiantes.
3. Verificar que se haya creado correctamente la base de datos `db_sistema_web`.

**Paso 6. Configurar la conexión**

Verificar el archivo de conexión PHP y configurar los datos correspondientes al entorno local:

- Servidor: localhost
- Usuario: root
- Contraseña: (vacía por defecto en XAMPP, si no ha sido modificada).
- Base de datos: db_sistema_web

**Paso 7. Ejecutar el sistema**

Abrir el navegador e ingresar a la siguiente dirección:

```text
http://localhost/AI3_DisenoWeb_AbelJimenez/
```

El sistema web estará disponible para realizar registros y consultar la información almacenada.

## 6. Seguridad y buenas prácticas

Durante el desarrollo del proyecto se consideran buenas prácticas orientadas a proteger la información y mejorar la calidad del código:

- Uso de validaciones para los datos ingresados por los usuarios.
- Implementación de sentencias preparadas para prevenir ataques de inyección SQL.
- Uso de `htmlspecialchars()` para evitar la ejecución de contenido HTML o JavaScript malicioso al mostrar información.
- Separación de los archivos de conexión y procesamiento.
- Organización del código para facilitar su comprensión y mantenimiento.

## 7. Control de versiones

El desarrollo del proyecto se gestiona mediante Git y GitHub, utilizando commits para registrar los cambios realizados durante las diferentes etapas de implementación.

Se mantiene un historial de modificaciones que permite identificar los avances y mejoras realizadas en el sistema.

## 8. Autor

**Estudiante:** Abel Jimenez

**Universidad:** Universidad Tecnológica ECOTEC

**Carrera:** Ingeniería en Sistemas

**Asignatura:** Programacion de sistemas web

**Proyecto:** Sistema Web de Registro de Estudiantes

---

**Nota:** Este proyecto fue desarrollado con fines académicos como parte de las actividades prácticas de la asignatura de Programacion de Sistemas Web.
