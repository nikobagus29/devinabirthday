# Gunakan image PHP + Apache
FROM php:8.2-apache

# Install ekstensi PHP yang diperlukan Laravel
RUN docker-php-ext-install pdo pdo_mysql

# Salin semua file Laravel ke dalam container
COPY . /var/www/html/

# Set working directory
WORKDIR /var/www/html

# Install Composer dan dependensi Laravel
RUN apt-get update && \
    apt-get install -y unzip && \
    curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer && \
    composer install --no-dev --optimize-autoloader

# Set permission untuk storage & cache Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Jalankan Apache
CMD ["apache2-foreground"]
