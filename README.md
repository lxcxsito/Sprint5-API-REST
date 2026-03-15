# Sprint5-API-REST

README - API REST Laravel con Passport

Este proyecto es una API REST construida con Laravel 10.50.2, que utiliza Laravel Passport para la autenticación mediante OAuth2. Incluye pruebas con PHPUnit que apuntan a una base de datos de prueba. Este documento explica paso a paso cómo configurar y ejecutar el entorno y cómo correr los tests.

1. Requisitos previos

Antes de comenzar, asegúrate de tener instalado:

PHP ≥ 8.1 

Composer

MySQL o MariaDB

Node.js y npm (opcional, si hay front o assets)

Git

2. Clonar el proyecto

Clona el repositorio y entra en la carpeta del proyecto:

git clone <https://github.com/lxcxsito/Sprint5-API-REST.git>
cd <api-passport>
3. Instalar dependencias

Instala las dependencias de PHP:

composer install

Si hay front o assets (opcional):

npm install
npm run dev
4. Configurar variables de entorno

Copia el archivo de ejemplo .env.example a .env:

cp .env.example .env

Edita .env y configura tu base de datos:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=nombre_base_datos
DB_USERNAME=usuario
DB_PASSWORD=contraseña

Opcional: puedes crear otra base de datos para pruebas, si quieres aislarla de la de desarrollo.

5. Crear la base de datos

En tu gestor MySQL/MariaDB, crea la base de datos:

CREATE DATABASE nombre_base_datos;

Si quieres base de datos separada para tests:

CREATE DATABASE nombre_base_datos_test;
6. Ejecutar migraciones y seeders

Ejecuta las migraciones para crear las tablas:

php artisan migrate

Luego ejecuta los seeders para llenar la base de datos con datos iniciales:

php artisan db:seed

Si quieres limpiar y volver a migrar y sembrar todo:

php artisan migrate:fresh --seed
7. Configurar Laravel Passport

Instala las claves de Passport:

php artisan passport:install

Esto generará las claves necesarias para OAuth2 y mostrará los IDs y secretos de los clientes.

8. Ejecutar el servidor local

Inicia el servidor de desarrollo:

php artisan serve

La API estará disponible en: http://127.0.0.1:8000

9. Ejecutar pruebas con PHPUnit

Asegúrate de que tu base de datos de prueba esté creada y configurada en .env.testing (o usa las mismas credenciales de .env si no usas un archivo separado).

Para ejecutar todas las pruebas:

php artisan test
# o
vendor/bin/phpunit

⚠️ Las pruebas utilizan la base de datos de prueba. Si quieres reiniciar los datos antes de los tests, asegúrate de que los seeders se ejecuten correctamente.