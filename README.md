# docker-lamp

Docker con Apache, MySQL 8.0, PHPMyAdmin and PHP.

Para ejecutar los containers debemos ejecutar: 
```
docker-compose up -d
```

- Para abrir phpmyadmin acude a la dirección [http://127.0.0.1:8000](http://127.0.0.1:8000)
- Abre el navegador para ver un ejemplo simple de php en  [http://127.0.0.1:80](http://127.0.0.1:80)
- Tu proyecto se encontrará en `www/` dentro de una carpeta, abre el navegador [http://127.0.0.1/YourProject](http://127.0.0.1/Carpeta)

Ejecutar el cliente MySQL:

- `docker-compose exec db mysql -u root -p` 

> [Fuente](https://www.crashell.com/estudio/apache_php_mysql_y_phpmyadmin_con_docker_lamp).
