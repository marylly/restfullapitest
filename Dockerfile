FROM php:7-fpm
MAINTAINER Marylly Araújo Silva <mymarylly@gmail.com>

# PDO Library
RUN docker-php-ext-install pdo pdo_mysql

USER root
WORKDIR /tmp
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer
WORKDIR /usr/share/nginx/html/restfullapi