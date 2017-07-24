# User RESTFull API Test
Esse é um projeto de teste de um RESTFull API.

## Instalação da Aplicação

### Requisitos
Serão necessárias necessárias as seguintes ferramentas:

**Git**

Git é uma ferramenta

**PHP Cli (Command-line)**

O PHP Cli (Command-line) é o PHP para execução de scripts em linha de comando com a linguagem PHP, será utilizado pelo Composer e para processamento dos testes unitários.

**Composer**

O Composer é um orquestrador de dependências da aplicação em PHP, onde a dependência é verificada, e caso não exista, a mesma é baixada e instalada para funcionamento da aplicação.

**Docker e o Docker-Compose**

O Docker é 

## Instalação das Dependências

Após a instalação das ferramentas necessárias, abra um terminal (Prompt Command Line para Windows).
Acesse a pasta criada com o download do projeto, e execute o composer para instalação das dependências do PHP:

Ubuntu/Debian:
```
$ composer install
```

Após conclusão do download das dependências do PHP, é necessário efetuar o download das imagens que serão utilizadas nos containers que serão gerados pelo Docker:

Ubuntu/Debian:
```
$ docker-compose build
```
Terminados os downloads das imagens do docker, crie os container e coloque eles no ar:

Ubuntu/Debian:
```
$ docker-compose up
```

