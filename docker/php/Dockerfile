FROM php:7.0-fpm

RUN apt-get update --fix-missing \
    && pecl channel-update pecl.php.net \
    && pecl install xdebug \
    && apt-get install -y libpq-dev \
    && docker-php-ext-enable xdebug \
    && docker-php-ext-install -j$(nproc) pdo_mysql sockets

COPY xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini
