FROM php:8.2-apache-bullseye

RUN apt-get update \
 && apt-get install -y zlib1g-dev libzip-dev unzip vim iputils-ping net-tools sudo\
 && docker-php-ext-install zip

RUN pecl install xdebug \
 && docker-php-ext-enable xdebug

RUN apt-get install -y gnupg

RUN apt-get update &&\
  # JPEG 対応
  apt-get install -y libpng-dev libjpeg62-turbo-dev &&\
  docker-php-ext-configure gd --with-jpeg &&\
  docker-php-ext-install -j$(nproc) gd

RUN a2enmod rewrite
RUN docker-php-ext-install pdo_mysql

COPY --from=composer /usr/bin/composer /usr/bin/composer

ADD docker/apache/php.ini /usr/local/etc/php/

ADD docker/apache/config/000-default.conf /etc/apache2/sites-available/
RUN a2ensite 000-default

RUN curl -sL https://deb.nodesource.com/setup_20.x | bash -
RUN rm -rf node_modules
RUN apt-get install -y nodejs
RUN npm install npm -g n --save-dev cross-env
RUN npm cache clear --force

WORKDIR /var/www/vhosts/webapp/
COPY ./webapp /var/www/vhosts/webapp

RUN chown www-data storage/ -R \
&& COMPOSER_ALLOW_SUPERUSER=1 composer install
