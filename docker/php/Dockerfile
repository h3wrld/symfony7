FROM php:8.2-fpm-alpine AS builder

RUN apk --no-cache add \
    libpq \
    postgresql-dev \
    postgresql-client \
    git \
    unzip

WORKDIR /app

COPY . .

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN composer install --no-interaction --optimize-autoloader

FROM php:8.2-fpm-alpine

RUN apk --no-cache add \
    libpq

COPY --from=builder /app /var/www/html/symfony7

RUN set -x \
    && apk add --no-cache --virtual .build-deps \
        $PHPIZE_DEPS \
        postgresql-dev \
    && docker-php-ext-install pdo_pgsql \
    && apk del .build-deps

WORKDIR /var/www/html/symfony7

EXPOSE 9000

CMD ["php-fpm"]
