FROM php:8.2-fpm-alpine AS builder

RUN apk --no-cache add \
    libpq \
    postgresql-dev \
    postgresql-client \
    git \
    unzip

WORKDIR /var/www/html/symfony7

COPY . .

FROM php:8.2-fpm-alpine

RUN apk --no-cache add \
    libpq

RUN set -x \
    && apk add --no-cache --virtual .build-deps \
        $PHPIZE_DEPS \
        postgresql-dev \
    && docker-php-ext-install pdo_pgsql \
    && apk del .build-deps

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html/symfony7

EXPOSE 9000

CMD composer install --no-interaction --optimize-autoloader && php-fpm
