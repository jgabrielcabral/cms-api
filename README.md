## Sobre a API de CMS para postagens

A API de CMS consiste em um desafio de desenvolvimento de uma API para postagens de um CMS (Content Management System) utilizando o framework Laravel na linguagem PHP.

## Requisitos de Sistema

- Framework Laravel 6.x
- Composer (Gerenciador de Pacotes)
- PHP >= 7.2.5
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Servidor de Banco de Dados MySQL/MariaDB

## Configuração Local Inicial

* Executar o comando para clonar o repositório: 
```
git clone https://github.com/jgabrielcabral/cms-api.git
```
* Criar o arquivo .env no diretório raiz do projeto
* Copiar o conteúdo do arquivo .env.example para o arquivo .env
* Criar um novo banco no SGBD local
* Configurar o arquivo .env com as variáveis do seu ambiente para o carregamento do banco de dados:
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel
DB_USERNAME=root
DB_PASSWORD=
```
* Executar o comando de instalação das dependências do projeto:
```
composer install
```
* Executar o comando de geração de chaves do Laravel: 
```
php artisan key:generate
```
* Executar o comando de construção e preenchimento do banco de dados:
```
php artisan migrate --seed
```
* Executar o comando para rodar o ambiente de teste local:
```
php artisan serve
```
* Utilizar as rotas conforme definido no desafio http://127.0.0.1:8000/api
