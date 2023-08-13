FROM php:apache-buster

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin --filename=composer

RUN a2enmod rewrite

COPY . /var/www/

COPY ./docker/app/virtual.conf /etc/apache2/sites-available/000-default.conf
