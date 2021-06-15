FROM php:7.4-fpm-alpine

RUN apk update && apk add --no-cache $PHPIZE_DEPS --update git php7-pear composer freetds freetds-dev libzip-dev \
    && pecl install xdebug redis \
    && docker-php-ext-enable redis \
    && docker-php-ext-install pdo pdo_mysql pdo_dblib zip

WORKDIR /var/www/

RUN	echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=1" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=1" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.idekey=PHPSTORM" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_port=9000" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_handler=dbgp" >> /usr/local/etc/php/conf.d/xdebug.ini

RUN deluser www-data \
    && adduser -D -s /bin/ash -u 1000 www-data \
    && echo "xdebug.remote_host=192.168.0.13" >> /usr/local/etc/php/conf.d/xdebug.ini
