# -------------------------------
# Stage 1: Build / Composer dependencies
# -------------------------------
FROM php:8.4-fpm-alpine AS base

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apk add --no-cache \
    bash \
    git \
    curl \
    postgresql-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    libwebp-dev \
    freetype-dev \
    zip \
    unzip \
    oniguruma-dev \
    icu-dev \
    libxml2-dev \
    $PHPIZE_DEPS \
    libzip-dev \
    autoconf \
    make \
    g++

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_pgsql bcmath mbstring exif pcntl gd intl xml opcache zip

# Copy composer files
COPY composer.json composer.lock ./

# Install Composer globally
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

RUN echo "opcache.enable=0" > /usr/local/etc/php/conf.d/opcache-dev.ini \
    && echo "opcache.enable_cli=0" >> /usr/local/etc/php/conf.d/opcache-dev.ini

# Install PHP dependencies
RUN composer install --no-autoloader --no-scripts

# Copy entire application
COPY . .

# Generate autoload files
RUN composer dump-autoload --optimize

EXPOSE 8000

# Environment variable for Laravel
ENV APP_ENV=local
ENV APP_DEBUG=true
ENV LOG_CHANNEL=stack
    
CMD php artisan serve --host=0.0.0.0 --port=8000