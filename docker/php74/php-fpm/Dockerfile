FROM phpdockerio/php74-fpm:latest

MAINTAINER NguyenQuocDai <quocdaijr@gmail.com>

COPY ./config/overrides.conf /etc/php/7.4/fpm/pool.d/z-overrides.conf

RUN apt-get update \
    && apt-get -y --no-install-recommends install libmcrypt-dev mysql-client php7.4-redis php7.4-amqp php7.4-intl \
    php7.4-mysql php7.4-pgsql php7.4-bcmath php7.4-gd php7.4-igbinary php7.4-imagick php7.4-intl php7.4-mongodb \
    php7.4-memcached php7.4-xmlrpc php7.4-xsl php7.4-yaml \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN apt-get update \
    && apt-get -y install git net-tools vim iputils-ping\
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/*

RUN apt-get update \
    && apt-get -y install supervisor \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* \
    && service supervisor start \
    && supervisorctl reload

RUN cp /usr/share/zoneinfo/Asia/Ho_Chi_Minh /etc/localtime

CMD ["/usr/sbin/php-fpm7.4", "-O"]

EXPOSE 9000