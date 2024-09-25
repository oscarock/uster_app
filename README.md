1 - clonar el repositorio

2 configurar el archivo en especial la parte de la conexion a la BD .env una copia esta en el archivo .env.example que quede con los datos igual al servicio del docker compose 

3 ejecutar el docker compose up -d 

4 ejecutar el comando docker-compose run --rm composer install
5 ejecutar el comando docker-compose exec app php artisan key:generate

6 entrar al contenedor ir a la ruta /var/www/html y ejecutar el comando  chmod 777 -R storage/

7 luego ejecutar docker-compose exec app php artisan migrate 

8 luego ejecutar docker-compose exec app php artisan db:seed

9 ingresar al sitio con http://localhost:8003/vehicles

10 ya podra navegar por la aplicacion