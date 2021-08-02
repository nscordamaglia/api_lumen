# OLX Challenge

## Official Documentation

Documentation for the framework can be found on the [Lumen website](https://lumen.laravel.com/docs).
Documentation for the jwt-auth can be found on the [jwt-auth website](https://jwt-auth.readthedocs.io/en/develop/).

# Entorno
---------
docker php:7.4-fpm-alpine 
docker ngnix

# Luego de descargar
-------------------
- docker-compose up -d
- docker exec -it lumen_olx ash

# Dentro del container
---------------------
- copiar .env.example como .env
- composer install
- php artisan migrate
- php artisan db:seed
- GET http://localhost:8080/ -> version

# Rutas
---------
- POST http://localhost:8080/login 
- GET http://localhost:8080/list
- GET http://localhost:8080/show/id
- PUT http://localhost:8080/update/id
- DELETE http://localhost:8080/delete/id

# Obtener token
---------------
- POST http://localhost:8080/login ->  user: admin, password: 12345
* Extraner el access_token *
  {
  "access_token": "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3Q6ODA4MFwvbG9naW4iLCJpYXQiOjE2MjM3OTQ0NzMsImV4cCI6MTYyMzc5ODA3MywibmJmIjoxNjIzNzk0NDczLCJqdGkiOiJ4TU9FWTdVM25iS2xQd2haIiwic3ViIjoxLCJwcnYiOiIyM2JkNWM4OTQ5ZjYwMGFkYjM5ZTcwMWM0MDA4NzJkYjdhNTk3NmY3In0.MtG62LILZy0A_tWl7MVAxpVT1xRsLr-Lpb6PXNqDJXU",
  "token_type": "bearer",
  "expires_in": 3600
  }
* Realizar las consultas agregando el header *
    - authorization: Bearer {{access_token}}
