FROM php:fpm

ADD src/ /var/www/bsideslv

RUN apt-get update;
RUN apt-get install -y libjpeg-dev libpng-dev;
RUN rm -rf /var/lib/apt/lists/*;
RUN docker-php-ext-configure gd --with-png-dir=/usr --with-jpeg-dir=/usr;
RUN docker-php-ext-install gd mysqli opcache;

WORKDIR /var/www/bsideslv
