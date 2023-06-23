<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Sobre o projeto

Este projeto foi criado para consolidar conhecimentos já adquiridos, como também implementar novas abordagens e conceitos.

O mesmo foi criado utilizando as seguintes tecnologias: 

- PHP
- TALL Stack (Tailwind CSS, Alpine JS, Laravel e Livewire)
- Banco de dados MySQL.

O projeto possui as seguintes características/funcionalidades:

- Criação de Usuários, com autenticação via e-mail.
- Recuperação de senha.
- Alteração de perfil (dados pessoais, senhas), utilizando convenções e boas práticas de segurança.
- Crud completo de alunos.
- Crud completo de responsáveis.
- Criação de vínculos entre alunos e responsáveis, a partir do aluno (cada aluno pode ter no máximo 5 responsáveis vinculados).
- Criação de vínculos entre responsáveis e alunos, a partir do responsável (cada responsável pode ter no máximo 5 alunos vinculados).
- Contador de alunos e responsáveis na Home, ao qual são atualizados em tempo real, utilizando Broadcasting de eventos via WebSocket com Pusher Channels.

## Requerimentos da aplicação

- PHP 8.1+
- Apache
- MySQL
- Composer
- Node.js

## Configurações e comandos necessários

Clonar este projeto via interface do Github, ou rodar o seguinte comando em seu terminal:

```
git clone https://github.com/artur-picoli/tall-stack-project.git
```

Acesse o projeto e rode o seguinte comando para instalar as dependências:

```
composer install --no-scripts
npm install
```

Copie o arquivo .env.example, ou rode o seguinte comando:

```
cp .env.example .env
```

Crie uma nova chave para a aplicação:

```
php artisan key:generate

```

Buildar os assets da aplicação:

```
npm run build
```

- Crie uma conta no [Mailtrap](https://mailtrap.io/), ou outra plataforma de testes de e-mail de sua preferência.
- Crie uma conta no [Pusher](https://pusher.com/).

No arquivo .ENV, realizar as seguintes alterações e salvar o arquivo:


- Altere a variável [APP_URL] para: http://localhost:8000
- Crie uma Database no MySQL e coloque o nome na variável [DB_DATABASE]
- Altere a variável [BROADCAST_DRIVER] para: pusher
- Altere a variável [QUEUE_CONNECTION] para: database
- Altere as variáveis [MAIL] com as credencias do Mailtrap, ou outra plataforma de teste de e-mails de sua preferência.
- Altere as variáveis [PUSHER] com as credenciais fornecidas pela plataforma.

Criar os diretórios locais para o storage de imagens de perfil, alunos e responsáveis, rodando o seguinte comando:

```
php artisan storage:link
```

Criar a tabela de gerenciamento de filas:

```
php artisan queue:table
```

rodar as migrações e popular a database:

```
php artisan migrate --seed
```

Abra um terminal e rode o seguinte comando, para iniciar o servidor:

```
php artisan serve
```

Abra outra guia do terminal e rode o seguinte comando para iniciar as filas:

```
php artisan queue:work
```

## Utilizando a aplicação

Após seguir todos os passos, será possível criar uma nova conta, validando a mesma em sua plataforma de e-mail de testes (Mailtrap, ou alguma outra) ou caso prefira, utilize as seguintes credenciais de teste:
```
E-mail: demonstracao@example.com
Senha: password
```

Após logado, será possível ter acesso a todas as funcionalidades descritas no tópico Sobre o projeto.

Eventuais dúvidas, basta criar uma Issue neste repositório.

Um abraço!












