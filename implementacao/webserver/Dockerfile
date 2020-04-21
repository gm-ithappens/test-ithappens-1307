FROM php:7.3-apache
RUN apt-get update \
    && apt-get install -y libxml2-dev libpng-dev libzip-dev libxslt-dev zlib1g-dev libicu-dev g++ unzip libjpeg-dev libfreetype6-dev
RUN docker-php-ext-configure bcmath \
    && docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install bcmath gd pdo_mysql zip xsl soap intl opcache
RUN a2enmod rewrite
COPY ./apache-config/000-default.conf /etc/apache2/sites-enable/000-default.conf
COPY ./php-config/docker-php-memlimit.ini /usr/local/etc/php/conf.d/docker-php-memlimit.ini
COPY --from=composer /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html/