## knowledge assessment
Laravel MVC application 
### Requirements

- Docker
- Docker Compose

### Setup

Start containers detached from terminal running: 
```shell script
docker-compose up -d
```

then execute composer insede docker container
```shell script
docker-compose exec app composer install
```

### Run Teste

to execute test inside container
```shell script
docker-compose exec app php ./vendor/bin/phpunit
```

app:
- http://localhost:8080/


### Under the hood
- [Laravel](https://laravel.com/)
## License

[MIT license](https://opensource.org/licenses/MIT).

