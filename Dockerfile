FROM php:7.2.1-apache
MAINTAINER david.l.vergara@gmail.com
RUN echo "Iniciando la construccion"
RUN apt-get update && apt-get install -y \
    nano \
    git \
    curl \
    libpq-dev \
    libmcrypt-dev \
    libfreetype6-dev \
    libjpeg-dev \
    libldap2-dev \
#    libpng12-dev \
    zlib1g-dev \
    libxml2-dev \
    net-tools \
    zip \
    unzip

RUN apt-get upgrade -y && docker-php-ext-install pdo pdo_mysql mysqli soap \
  && docker-php-ext-configure gd --enable-gd-native-ttf --with-jpeg-dir=/usr/lib/x86_64-linux-gnu --with-png-dir=/usr/lib/x86_64-linux-gnu --with-freetype-dir=/usr/lib/x86_64-linux-gnu \
  && docker-php-ext-install gd

#COMPOSER
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer
#RUN a2enmod rewrite
#RUN service apache2 restart
RUN composer global require "fxp/composer-asset-plugin:^1.2.0"

RUN echo "date.timezone = America/Lima" > $PHP_INI_DIR/conf.d/php.ini

ENV TZ=America/Lima
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

# Create a volume
VOLUME ./app/

#APACHE CONF
COPY ./docker-conf/apache2.conf  /etc/apache2/apache2.conf
COPY ./docker-conf/000-default.conf  /etc/apache2/sites-available/000-default.conf

#RUN cd /var/www/html/ && composer development-enable