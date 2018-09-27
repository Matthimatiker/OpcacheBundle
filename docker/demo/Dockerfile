# Run a symfony demo application in a small PHP container.
FROM php:7.2

# Install selected extensions and other stuff
RUN apt-get update \
     && apt-get install -y \
        zip \
        unzip \
        git

# Install and enable PHP OPCache
RUN docker-php-ext-install opcache && \
    docker-php-ext-enable opcache

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /usr/app/opcachebundle

RUN composer create-project symfony/symfony-demo .
RUN composer require --dev matthimatiker/opcache-bundle
