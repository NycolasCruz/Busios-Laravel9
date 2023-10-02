<h1 align="center">BUSIOS - Sistema de Gerência de Lojas</h1>

## 🚀 Tecnologias

<p>Sistema desenvolvido com as seguintes tecnologias:</p>

- PHP
- Laravel
- Laravel Breeze
- JavaScript
- Axios
- Font Awesome
- Tailwind
- Bootstrap
- Sweet Alert
- Docker

## 🖥️ Sobre

<p align="justify">O projeto tem como principal função criar e gerenciar lojas. O objetivo é ser um sistema simples, mas performático e que possa ser facilmente adptado a qualquer problemática que tenha a gestão como solução, como a administração de suas tarefas do dia a dia ou da sua empresa.</p>

## 🔧 Características

- [x] Projeto base finalizado
- [x] Cadastro, edição e exclusão de lojas
- [x] Interface limpa e intuitiva
- [x] Máscaras nos campos
- [x] Permissões para usuários
- [x] Autenticação e cadastro de usuários
- [x] Requisições sem recarregamento da página
- [X] Containerização com Docker

## 🕹️ Instalação

Instale o docker desktop <a href="https://desktop.docker.com/win/main/amd64/Docker%20Desktop%20Installer.exe?utm_source=docker&utm_medium=webreferral&utm_campaign=dd-smartbutton&utm_location=header">clicando neste link aqui</a>.

Instale também o WSL e o Ubuntu na sua Microsoft Store.

Caso encontre problemas, instale o pacote de atualização do kernel do Linux do WSL 2 <a href="https://wslstorestorage.blob.core.windows.net/wslblob/wsl_update_x64.msi">clicando aqui também</a>.

Agora clone o repositório do projeto no Ubunto e em seguida entre em seu editor de código com o WSL utilizando a distribuição Ubuntu.

Com o terminal aberto na pasta correta, execute o comando abaixo para subir os containers do projeto para o Docker:
````
docker compose up -d
````

Acesse o container utilizando:
````
docker compose exec app bash
````

E instale as dependências do projeto:
````
composer install
````

Instale também os pacotes do node:
````
npm install
````

Copie o arquivo .env.example para um novo arquivo '.env' e gere a chave encriptografada:
````
php artisan key:generate
````

E por fim faça a conexão com o banco de dados e rode as migrations:

OBS: Foi utilizado MySQL como banco, na porta 3388 e host localhost.
````
php artisan migrate
````

Agora é só acessar o projeto na porta <a href="http://localhost:8989">8989</a>!

Container feito pelo <a href="https://github.com/carlosfgti">Carlos</a> do EspecializaTi <img src="https://raw.githubusercontent.com/Tarikul-Islam-Anik/Microsoft-Teams-Animated-Emojis/master/Emojis/Smilies/Purple%20Heart.png" alt="PO" width="20" height="20" />

## 🐧 Autor

<a href="https://github.com/NycolasCruz">
    <img src="https://github.com/NycolasCruz.png"  width="15%">
    <p>Nycolas Cruz</p>
</a>
