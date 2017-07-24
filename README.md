# User RESTFull API Test
Esse é um projeto de teste de um RESTFull API, construída utilizando o microframework Slim Framework 3, utilizado para construção estruturada de aplicações Web e API (Application Programming Interface).

## Instalação da Aplicação

### Requisitos
Serão necessárias necessárias as seguintes ferramentas:

**Git**

Git é uma ferramenta de controle de versionamento de arquivos, muito utilizado no versionamento de arquivos que compõe um software, ou parte dele, sendo possível trabalhar em forma colaborativa, controlando a concorrência de manutenção dos arquivos de um projeto. Os arquivos versionados podem ficar armazenados num servidor de escolha, porém existem outras ferramentas para armazenamento de arquivos versionados utilizando o Git, como: GitHub, GitLab, BitBucket, etc.

**PHP Cli (Command-line)**

O PHP Cli (Command-line) é o PHP para execução de scripts em linha de comando com a linguagem PHP, será utilizado pelo Composer e para processamento dos testes unitários.

**Composer**

O Composer é um orquestrador de dependências da aplicação em PHP, onde a dependência é verificada, e caso não exista, a mesma é baixada e instalada para funcionamento da aplicação.

**Docker e o Docker-Compose**

O Docker é uma ferramenta de criação, manuntenção e execução de múltiplos containers de uma aplicação. Concentra todas as ferramentas, frameworks e conteúdo de uma aplicação criada, sendo possível criar um ambiente independente do ambiente do sistema operacional onde é executado.

## Instalação das Dependências

Após a instalação das ferramentas necessárias, abra um terminal (Prompt Command Line para Windows).
Acesse a pasta criada com o download do projeto, e execute o composer para instalação das dependências do PHP:

```
$ composer install
```

Após conclusão do download das dependências do PHP, é necessário efetuar o download das imagens que serão utilizadas nos containers que serão gerados pelo Docker:

## Setup da Aplicação

Para fazer o setup da aplicação que está estrutura em containers dockers, deve se acessar a pasta raiz do projeto e executar o seguinte comando para construção dos containers necessários para funcionamento da aplicação:

```
$ docker-compose build
```
Terminados os downloads das imagens do dockers, crie os container e coloque eles no ar:

Ubuntu/Debian:
```
$ docker-compose up
```
_Observação:_ Caso a aplicação não fique disponível, verifique se a porta http 8064 do servidor web(nginx), a porta 3306 do MariaDB, a porta 9000 utilizada pelo serviço PHP-FPM e a porta 8001 ocupada pelo phpMyAdmin estejam ocupadas, impedindo de subir a aplicação ou parte dela. Se estas portas estiverem sendo utilizadas, as mesmas podem ser alteradas no arquivo docker-compose.yml existente na pasta raiz do projeto na seção dos serviços **Web**, **DB**, **php** e/ou **pma** respectivamente.

Após o setup completo da aplicação, ela pode ser executada com o comando a abaixo, a deixando em execução background:

```
$ docker-compose up -d
```

Para encerramento da aplicação, acesse a pasta raiz do projeto e digite o seguinte comando:
```
$ docker-compose down
```

## Acessando a aplicação
Após conclusão do setup de todos os containers, é possível acessar a aplicação através da url `http://localhost:8064` (porta http pode ser alterada via docker-compose.yml).

**Rotas do User Endpoint**
```
GET	http://localhost:8064/users	Para consulta a todos os users existentes no banco de dados
GET	http://localhost:8064/user/1	Para consulta a user existente no banco de dados
POST	http://localhost:8064/user	Para inclusão de novo user
PUT	http://localhost:8064/user/1	Para atualização de um user existente
DELETE	http://localhost:8064/user/1	Para exclusão de um user existente
```
**JSON**
Um exemplo de json para executar um request:
```
{
    "nome": "Dorothy Johnson Vaughan",
    "email": "dorothy@outlook.com",
    "dt_cadastro": "1910-09-20 11:42:37"
}
```

## Banco de Dados
Foi utilizado o banco de dados MariaDB para a persistência de dados nesta aplicação, que pode ser acessada através da url `http://localhost:8001` para verificação dos dados.

## Testes Unitários
Os testes unitários automatizados serão criados e executados utilizando o framework PHPUnit. Está armazenado no container docker do php-fpm, é pode ser executado utilizando o seguinte comando dentro da pasta do projeto:

```
docker exec -ti fpm bash -ic 'cd /usr/share/nginx/html/restfullapi; composer container-test; exit $?'
```
Que deverá exibir uma saída no console parecida com a abaixo:
```
> phpunit --verbose --coverage-html ./report
PHPUnit 4.8.36 by Sebastian Bergmann and contributors.

Runtime:        PHP 7.1.7
Configuration:  /usr/share/nginx/html/restfullapi/phpunit.xml
Warning:        The Xdebug extension is not loaded
                No code coverage will be generated.

..

Time: 43 ms, Memory: 6.00MB

OK (2 tests, 2 assertions)
exit
```

## Code Coverage Report
A cada execução dos testes unitários feita pelo PHPUnit, são gerados os relatórios de Code Coverage que gera um HTML disponível na pasta `report/` na pasta raiz do projeto, sendo possível visualizar pelo navegador web com os arquivos **index.html** e/ou **dashboard.html**.

## BDD (Comming Soon)
Não foi possível testar e implementar, mas pretendo experimentar.