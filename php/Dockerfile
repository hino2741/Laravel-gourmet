FROM php:7.3-fpm

RUN apt-get update && apt-get install -y \
    gnupg \
    libzip-dev \
    unzip \
    zlib1g-dev \
    cron \
    vim \
    && docker-php-ext-install \
    pdo_mysql \
    opcache \
    zip

COPY --from=composer:2.2.5 /usr/bin/composer /usr/bin/composer

COPY crontab /var/spool/cron/crontabs/root

RUN crontab /var/spool/cron/crontabs/root
