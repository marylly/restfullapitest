FROM php:7-fpm
MAINTAINER Marylly Araújo Silva <mymarylly@gmail.com>

# PDO Library
RUN docker-php-ext-install pdo pdo_mysql