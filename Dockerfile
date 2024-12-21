FROM php:8.2-apache

# Install ekstensi PostgreSQL untuk PHP
RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-install pdo_pgsql

# Copy aplikasi PHP ke container
COPY ./src /var/www/html/

# Aktifkan mod_rewrite untuk Apache
#RUN a2enmod mod_rewrite -

EXPOSE 80