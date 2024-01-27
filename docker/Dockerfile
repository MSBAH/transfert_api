FROM php:8.2-apache

RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf 


RUN apt-get update \
    &&  apt-get install -y --no-install-recommends \
        locales apt-utils git libicu-dev g++ libpng-dev libxml2-dev libzip-dev libonig-dev libxslt-dev unzip libpq-dev nodejs npm wget \
        apt-transport-https lsb-release ca-certificates

ADD https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

RUN chmod +x /usr/local/bin/install-php-extensions && \
    install-php-extensions pdo pdo_mysql opcache intl zip calendar dom mbstring gd xsl

RUN pecl install apcu
  
RUN  echo "en_US.UTF-8 UTF-8" > /etc/locale.gen  \
  &&  echo "fr_FR.UTF-8 UTF-8" >> /etc/locale.gen \
  &&  locale-gen 

#ENV COMPOSER_ALLOW_SUPERUSER=1

RUN  curl -sS https://getcomposer.org/installer | php -- \
  &&  mv composer.phar /usr/local/bin/composer 

RUN curl -sL https://deb.nodesource.com/setup_18.x | bash \
  && apt-get install nodejs 

RUN  curl -sS https://get.symfony.com/cli/installer | bash \
  &&  mv /root/.symfony/bin/symfony /usr/local/bin 
   
#RUN docker-php-ext-configure \
  #intl \
  #&&  docker-php-ext-install \
 # pdo pdo_mysql opcache intl zip calendar dom mbstring gd xsl 

#RUN pecl install apcu && docker-php-ext-enable apcu

# COPY . /var/www/

# COPY ./docker/vhosts/vhosts.conf /etc/apache2/sites-available/000-default.conf

#RUN cd /var/www && \
 #   composer install

WORKDIR /var/www/

EXPOSE 80
