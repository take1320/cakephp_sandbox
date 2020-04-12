FROM php:7.2-fpm-alpine

# app source
WORKDIR /var/www/html
COPY . /var/www/html

# composer 依存パッケージインストール
RUN apk update \
  && apk add --no-cache icu-libs libzip-dev \
  && apk add --no-cache --virtual build-dependencies icu-dev \
  && docker-php-ext-install zip intl pdo_mysql

# composer インストール
COPY --from=composer:1.9.1 /usr/bin/composer /usr/bin/composer

ENV COMPOSER_ALLOW_SUPERUSER 1

RUN set -xeu \
 && composer install \

# コンテナ起動時にmigrate
#CMD php artisan migrate && php-fpm
