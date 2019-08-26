# Teste VHSYS

Para o teste foi utilizado PHP 7.3 com Laravel 5.8 e banco de dados MySQL 5.7

## Requisitos

Requisitos para instalação do projeto:

* Composer
* PHP >= 7.2
* MySQL 5.7

## Clone o reposítório utilizando

git clone https://github.com/MarlonRaphael/teste-vhsys.git

## Comandos

Para rodar o projeto, é necessário rodar os seguintes comandos

```
cp .env.example .env
```
```
composer install
```
```
php artisan key:generate
```

Altere as linhas 12 e 13 do arquivo .env para configurar o banco de dados 

Rode o seguinte comando para gerar as tabelas
```
php artisan migrate
```

Pronto! Agora é só rodar o comando ``php artisan serve`` e o projeto já estará funcionando.
