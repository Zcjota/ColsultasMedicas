Proyecto de Consultorio Médico en Laravel 9
Estudiante: Jaime Junior Aguilar leaños
Materia : Tecnologia web 2
Turno : Noche
Docente : Ing.Zambrana Chacon Jaime
Este proyecto de consultorio médico está desarrollado utilizando el potente framework Laravel. Laravel es conocido por su sintaxis expresiva y elegante, haciendo que el desarrollo de aplicaciones web sea una experiencia agradable y creativa.

Instalación y Uso
Clona el repositorio.

Ejecuta las migraciones y seeders para configurar la base de datos.

composer install
php artisan migrate --seed
php artisan db:seed --class=UsuariosTableSeeder
php artisan db:seed --class=PacientesTableSeeder
php artisan db:seed --class=HistoriasTableSeeder
php artisan db:seed --class=CitasTableSeeder
php artisan db:seed --class=RecetariosTableSeeder
php artisan db:seed --class=RolusuariosTableSeeder

Asegúrate de tener las versiones correctas de PHP y Composer:

php --version
composer --version
Si estás iniciando un nuevo proyecto, puedes crearlo con:


composer create-project laravel/laravel ConsultorioMedico "9.*"
Estructura de Base de Datos
Este proyecto utiliza migraciones para definir la estructura de la base de datos. A continuación, se presentan los comandos para crear y migrar las tablas:


php artisan make:migration create_usuario_table
php artisan make:migration create_paciente_table
php artisan make:migration create_historia_table
php artisan make:migration create_recetario_table
php artisan make:migration create_citas_table
php artisan make:migration create_rol_usuario_table

php artisan migrate
También se crean modelos correspondientes a cada tabla:


php artisan make:model Usuario
php artisan make:model Paciente
php artisan make:model Historia
php artisan make:model Recetario
php artisan make:model Citas
php artisan make:model Rolusuario
Y controladores asociados:


php artisan make:controller UsuarioController
php artisan make:controller PacienteController
php artisan make:controller HistoriaController
php artisan make:controller RecetarioController
php artisan make:controller CitasController
php artisan make:controller RolusuarioController
Además, se generan seeders para poblar la base de datos:


php artisan make:seeder UsuariosTableSeeder
php artisan make:seeder PacientesTableSeeder
php artisan make:seeder HistoriasTableSeeder
php artisan make:seeder CitasTableSeeder
php artisan make:seeder RecetariosTableSeeder
php artisan make:seeder RolusuariosTableSeeder

Contribuciones
¡Gracias por considerar contribuir al proyecto! Consulta la guía de contribuciones para obtener más información.

Código de Conducta
Asegúrate de revisar y seguir nuestro Código de Conducta para crear un ambiente acogedor para todos.

Reporte de Vulnerabilidades de Seguridad
Si encuentras alguna vulnerabilidad de seguridad en Laravel, por favor, notifícala enviando un correo electrónico a Taylor Otwell a través de taylor@laravel.com. Todas las vulnerabilidades de seguridad se abordarán de manera rápida.

Licencia
Este proyecto utiliza el framework Laravel, que está bajo la licencia MIT.
