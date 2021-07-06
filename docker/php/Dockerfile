FROM php:7.4-fpm-alpine

WORKDIR /opt/app

COPY docker/php/bin/* /usr/local/bin/
RUN php_install pdo_mysql

COPY . ./
