

# Proyecto XTEACH


## Tecnologías utilizadas

<figure>
    <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg"
         alt="Laravel" width="300" height="100">
    <figcaption>Laravel 8.0</figcaption>
</figure>

<figure>
    <img src="https://getbootstrap.com/docs/5.3/assets/brand/bootstrap-logo-shadow.png"
         alt="Boostrap 5.3" width="200" height="150">
    <figcaption>Boostrap 5.3</figcaption>
</figure>

## Instalación
Puedes probar la página con algún error al subirlo a un server en https://streamingesp.com/public/  , aunque es de la rama withexams

### 1. Clonar repositorio de GITHUB

`git glone https://github.com/david9801/Xteach-DavidHermo.git`

### 2. Asegurate que estás en la rama correcta 
En tu terminal ejecuta:
` git branch `

Deberás ver:      

* master

 withexams 
En tu terminal ejecuta 
` composer install`
asegurandote que la version PHP es >7.0 & <8.0

### 3. Ejecutar migraciones del proyecto

En tu motor de base de datos requerido (en mi caso MySQL) debes crear una base de datos nueva e indicar los datos de acceso en el fichero .env:
- Equipo/host
- Nombre 
- Usuario 
- Contraseña 

En este proyecto ha sido empleado estos datos ( modificalos en el fichero .env ). Si no tienes fichero .env , crealo a partir de .env.example

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=xteach
DB_USERNAME=root
DB_PASSWORD=*******
```

En el caso de emplear Laravel con MySQL, asegúrate de lo siguiente:
Debes ir a /config/database.php y buscar 'engine':

'engine' => null,

se cambia por:

'engine' => 'InnoDB',

Una vez se ha realizado el paso anterior(que ya está hecho al importar este proyecto):
Crear en mysql una bbdd llamada xteach y a continuacion ejecutar las migraciones y el seeder: 


`php artisan migrate`


También ejecutar el siguiente comando desde la consola de comandos para no tener problemas al mostrar la foto de perfil del usuario:


`php artisan storage:link`


`php artisan db:seed`

Ejecutando ese seeder ya ejecutas Curso,Inscripcion, Roles y User.

## Como Navegar
Hay 2 roles, admin y alumno, cada rol tiene unas funcionalidades distintas.



Un alumno puede inscribirse a un curso, finalizar un curso y obtener nota por inputs (para facilitar el proyecto). También puede desmatricularse de un curso.
Un alumno supera un curso si finaliza el curso, es decir un progreso del 100%. Un alumno se gradúa en un curso si su nota de corte es superior a 50, y además ha tenido que superar el curso.


Un admin puede subir cursos, ver sus cursos creados, ver sus alumnos por curso y sus notas, ver la nota media en sus cursos, y ver el progreso medio en sus cursos.
También puede exportar a excel sus cursos, y se pueden implementar muchas mas funcionalidades.

## En la otra rama, se añade la funcionalidad de subir examenes a la plataforma--
## VER LA OTRA RAMA withshift ( es la completa)

