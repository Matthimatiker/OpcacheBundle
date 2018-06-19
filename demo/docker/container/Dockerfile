FROM php:7.2

RUN apt-get update && apt-get install -y \
    openssl \
    git \
    unzip

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --version

WORKDIR /usr/app/opcachebundledemo

RUN composer create-project symfony/symfony-demo app

RUN composer require --dev matthimatiker/opcache-bundle

WORKDIR /usr/app/opcachebundledemo/app

RUN bin/console server:run 0.0.0.0:80
