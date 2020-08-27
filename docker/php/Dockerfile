FROM php:7.4-fpm
RUN apt-get update && apt-get install -y \
        zip \
        unzip \
        wget \
        git \
          --no-install-recommends

RUN docker-php-ext-install pdo_mysql

COPY ./install-composer.sh /
COPY ./php.ini /usr/local/etc/php/
COPY ./www.conf /usr/local/etc/php/

RUN apt-get purge -y g++ \
    && apt-get autoremove -y \
    && rm -r /var/lib/apt/lists/* \
    && rm -rf /tmp/* \
    && sh /install-composer.sh \
    && rm /install-composer.sh

RUN usermod -u 1000 www-data

VOLUME /root/.composer
WORKDIR /app

# expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
