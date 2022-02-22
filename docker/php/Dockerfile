FROM php:8.0.6-fpm-alpine

WORKDIR /var/www

RUN apk add --no-cache --virtual .deps \
    autoconf \
    make \
    g++

RUN apk add --no-cache \
    freetype \
    libpng \
    libjpeg-turbo \
    freetype-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    openssl-dev \
    libzip-dev

RUN docker-php-ext-configure gd \
    && docker-php-ext-install \
    gd \
    pdo \
    pdo_mysql \
    zip

RUN apk add --no-cache --virtual .phpize-deps $PHPIZE_DEPS \
    && pecl install -f apcu && docker-php-ext-enable apcu \
    && pecl install -f igbinary && docker-php-ext-enable igbinary \
    && pecl install -f redis && docker-php-ext-enable redis \
    && pecl install -f xdebug && docker-php-ext-enable xdebug \
    && apk del --purge --no-cache freetype-dev libpng-dev libjpeg-turbo-dev autoconf g++ make

RUN apk del .deps

COPY . .

RUN chmod +x composer.phar

CMD sh -c "./composer.phar install --no-interaction --optimize-autoloader  --apcu-autoloader" && php-fpm
