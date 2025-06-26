FROM php:8-fpm-bullseye

WORKDIR /project
COPY --from=composer/composer:latest-bin /composer /usr/bin/composer
ENV PATH="$PATH:/root/.composer/vendor/bin"

RUN sed -i 's/http\:\/\//https\:\/\//g' /etc/apt/sources.list
RUN apt-get update && apt-get install -y  libpq-dev
RUN docker-php-ext-install pdo pdo_pgsql pgsql

WORKDIR /project
