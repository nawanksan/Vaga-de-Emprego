<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Cadastro de Vagas de Emprego
### Sistema básico de cadastramento de vagas de emprego

# O que usei:
- Laravel
- php
- visual studio code

# Instalação

### Clone o repositório

    https://github.com/nawanksan/Vaga-de-Emprego.git

### instalação das dependências.

    composer install
    npm install

### Altere a porta do MYSQL no arquivo .env  
### mude de  (apenas se sua porta for diferente)
    DB_PORT=3312

### Para  
    DB_PORT=3306
### antes de criar as tabelas crie a database direto no MYSQL
    create database sistema_vagas;

### crie as tabelas no banco de dados  
    php artisan migrate

### Execute o servidor do laravel
    php artisan serve

### Email e Senha do ADM do sistema
    kawan@gmail.com
    1234

### Diagrama DER do sistema:
![Sistema Vagas DER Oficial](https://github.com/nawanksan/Vaga-de-Emprego/assets/121257501/10f49dc0-046c-4be5-aa8e-f07e7c94d05c)

## ## 📄 Licença
Este projeto foi criado para estudos e uso pessoal.
Contribuições são bem-vindas! 🎯
