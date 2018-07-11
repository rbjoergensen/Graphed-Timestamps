FROM php:7.2.6-apache

RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo pdo_pgsql pgsql

COPY src/ /var/www/html
