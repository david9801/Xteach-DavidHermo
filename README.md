

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
Puedes probar la página con algún error al subirlo a un server en https://streamingesp.com/public/ 
### 1. Clonar repositorio de GITHUB

`git glone [https://github.com/david9801/Xteach-DavidHermo.git](https://github.com/david9801/Xteach-DavidHermo/tree/withexams)`
### 2. Deberás ver
`git branch`

  master
* withexams



### 3. Ejecutar migraciones del proyecto

En tu motor de base de datos requerido (en mi caso MySQL) debes crear una base de datos nueva e indicar los datos de acceso en el fichero .env:
- Equipo/host
- Nombre 
- Usuario 
- Contraseña 

En este proyecto ha sido empleado estos datos ( modificalos en el fichero .env )

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


Un admin puede subir temas, ver sus cursos, ver sus alumnos por curso y sus notas, ver la nota media en sus cursos, y ver el progreso medio en sus cursos.
También puede exportar a excel sus cursos, y se pueden implementar muchas mas funcionalidades.



Un alumno puede inscribirse a un curso, terminar curso, obtener curso....
## Info

Aqui, todavia incompleto, se pretende subir examenes (ya hecho con name), queda que un profesor (es decir un admin) los pueda visualizar.
Próxima implementacion: crear las tablas y modelos Question and Answer.
Question tendrá una relación 1:M con Exam (un examen puede tener muchas preguntas pero una pregunta pertenece a un solo examen
)
Answer tendrá una relación 1:M con Question ( una pregunta tendrá varias respuestas-en funcion de los alumnos que hagan el examen- , pero una respuesta pertenece a una sola pregunta). Habrá que relacionar luego esto con el modelo User o Inscripcion
