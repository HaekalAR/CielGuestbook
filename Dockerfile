# Use PHP image
FROM php:8.2-cli

# Installing PHP dependency
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev sqlite3 libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite zip

# Install Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /app

# Copy project folder
COPY . .

# Install Laravel 
RUN composer install --no-dev --optimize-autoloader

# Generate key & migrate database
# RUN php artisan key:generate

# Open port
EXPOSE 8000

# Run Laravel
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]
