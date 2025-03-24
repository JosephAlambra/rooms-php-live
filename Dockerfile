FROM php:8.2-apache

# Install mysqli extension
RUN docker-php-ext-install mysqli

# Copy project files to Apache's web directory
COPY . /var/www/html/

# Expose port 80
EXPOSE 80
