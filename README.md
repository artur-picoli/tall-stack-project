<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre o projeto

Este projeto foi criado para consolidar conhecimentos já adquiridos, como também implementar novas abordagens e conceitos.

O mesmo foi criado utilizando as seguintes tecnogias: 

- PHP
- TALL Stack(Tailwind CSS, Alpine JS, Laravel e Livewire)
- Banco de dados MySQL.

O projeto possui as seguintes características/funcionalidades:

- Criação de Usuários, com autenticação via e-amail.
- Recuperação de senha.
- Alteração de perfil (dados pessoais, senhas), utilizando convenções e boas práticas de segurança.
- Crud completo de alunos.
- Crud completo de responsáveis.
- Criação de vínculos entre alunos e responsáveis, apartir do aluno (cada aluno poderá ter no máximo 5 responsáveis vinculados).
- Criação de vínculos entre responsáveis e alunos, apartir do responsável (cada responsável poderá ter no máximo 5 alunos vinculados).
- Contador de alunos e responsáveis na Home, ao qual são atualizados em tempo real, utilizando Broadcasting de eventos via WebSocket com Pusher Channels.

## Requerimentos da aplicação

- PHP 8.1+
- Apache ou Nginx
- MySQL
- Composer

## Comandos a serem executados

Clonar este projeto via interface do Github, ou rodando o seguinte comando em seu terminal:
```
php artisan serve
```




