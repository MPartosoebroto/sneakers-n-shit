FROM php:7.0-fpm

RUN apt-get update \
  && apt-get install -y mysql-client gnupg2 git bzip2 unzip libzip-dev \
  && curl -LO https://github.com/Yelp/dumb-init/releases/download/v1.2.0/dumb-init_1.2.0_amd64.deb \
  && dpkg -i dumb-init_*.deb \
  && pecl channel-update pecl.php.net \
  && pecl install xdebug zip \
  && docker-php-ext-install -j$(nproc) pdo_mysql sockets zip \
  && docker-php-ext-enable xdebug \
  && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
  && apt-get clean \
  && rm -rf /dumb-init_1.2.0_amd64.deb /tmp/* /var/lib/apt/lists/* /var/tmp/* \
  && docker-php-ext-install pcntl

ENV NODE_VERSION 8.9.4

RUN curl -LOk https://nodejs.org/dist/v$NODE_VERSION/node-v$NODE_VERSION-linux-x64.tar.gz \
  && tar -C /usr/local --strip-components 1 -xzf node-v$NODE_VERSION-linux-x64.tar.gz \
  && rm -rf /node-v$NODE_VERSION-linux-x64.tar.gz \
  && npm install

WORKDIR /

ENTRYPOINT ["/usr/bin/dumb-init", "--"]
