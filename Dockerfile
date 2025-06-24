FROM php:8.2-fpm
RUN apt-get update && apt-get install -y curl unzip nginx openssh-server \
    libpq-dev libpng-dev libxml2-dev libzip-dev
RUN docker-php-ext-install pdo_mysql gd xml zip bcmath mbstring
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
WORKDIR /app
COPY . /app
RUN composer install --no-dev --optimize-autoloader
EXPOSE 8080 22