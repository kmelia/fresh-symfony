FROM php:7.1-apache

RUN a2enmod rewrite

# apt
RUN apt-get update
RUN apt-get install -y libcurl3 libcurl3-dev
RUN apt-get install -y libpng12-dev libjpeg-dev
RUN apt-get install -y libicu-dev
RUN apt-get install -y zip

# php extensions
RUN docker-php-ext-install -j$(nproc) pdo pdo_mysql mysqli
RUN docker-php-ext-install -j$(nproc) curl
RUN docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr
RUN docker-php-ext-install -j$(nproc) gd
RUN docker-php-ext-install -j$(nproc) intl

# configuration
COPY config/php.ini /usr/local/etc/php/
COPY config/VirtualHost.conf /etc/apache2/sites-enabled/000-default.conf

# timezone
RUN rm /etc/localtime
RUN ln -s /usr/share/zoneinfo/Europe/Paris /etc/localtime
