FROM ubuntu:xenial
MAINTAINER ja <jkuna@denevy.eu>

RUN apt-get update
RUN apt-get install -y locales locales-all
ENV LC_ALL en_US.UTF-8
ENV LANG en_US.UTF-8
ENV LANGUAGE en_US.UTF-8

ENV APACHE_CONF_DIR=/etc/apache2 \
    PHP_CONF_DIR=/etc/php/7.2 \
    PHP_DATA_DIR=/var/lib/php

RUN     \
        buildDeps='software-properties-common python-software-properties' \
        && apt-get install --no-install-recommends -y $buildDeps \
        && add-apt-repository -y ppa:ondrej/php \
        && add-apt-repository -y ppa:ondrej/apache2 \
        && apt-get update \
&& apt-get install -y vim nano less php7.2-sqlite3 git \
    && apt-get install -y curl apache2 php7.2 php7.2-fpm php7.2-sqlite libapache2-mod-php7.2 php7.2-cli php7.2-readline php7.2-mbstring php7.2-zip php7.2-intl php7.2-xml php7.2-json php7.2-curl php7.2-gd php7.2-pgsql php7.2-mysql php-pear  \
    # Apache settings
    && cp /dev/null ${APACHE_CONF_DIR}/conf-available/other-vhosts-access-log.conf \
    && rm ${APACHE_CONF_DIR}/sites-enabled/000-default.conf ${APACHE_CONF_DIR}/sites-available/000-default.conf \
    && a2enmod rewrite php7.2 \
    && a2enconf php7.2-fpm \	
    # PHP settings
        && phpenmod mcrypt \
        # Install composer
        && curl -sS https://getcomposer.org/installer | php -- --version=1.4.1 --install-dir=/usr/local/bin --filename=composer \
        # Cleaning
        && apt-get purge -y --auto-remove $buildDeps locales \
        && apt-get autoremove -y \
        && rm -rf /var/lib/apt/lists/* \
        # Forward request and error logs to docker log collector
        && ln -sf /dev/stdout /var/log/apache2/access.log \
        && ln -sf /dev/stderr /var/log/apache2/error.log \
        && chown www-data:www-data ${PHP_DATA_DIR} -Rf

COPY ./configs/apache2.conf ${APACHE_CONF_DIR}/apache2.conf
COPY ./configs/app.conf ${APACHE_CONF_DIR}/sites-enabled/app.conf
COPY ./configs/php.ini  ${PHP_CONF_DIR}/apache2/conf.d/custom.ini
COPY ./configs/config.local.development.neon /tmp/config.local.development.neon
COPY ./junodb_new.sql /tmp/junodb_new.sql

WORKDIR /var/www/
RUN git clone http://jkuna:w1NxyRvgW5xHsvCWxWhF@git.denevy.eu/ArtexeSRO/Juno.git


ENV MYSQL_USER=mysql \
    MYSQL_DATA_DIR=/var/lib/mysql \
    MYSQL_RUN_DIR=/run/mysqld \
    MYSQL_LOG_DIR=/var/log/mysql

RUN apt-get update \
 && DEBIAN_FRONTEND=noninteractive apt-get install -y mysql-server \
 && rm -rf ${MYSQL_DATA_DIR} \
 && rm -rf /var/lib/apt/lists/*

COPY entrypoint.sh /sbin/entrypoint.sh
RUN chmod 755 /sbin/entrypoint.sh


RUN chown -R www-data:www-data /var/www/Juno
RUN mkdir /var/www/Juno/www/temp && chown -R www-data /var/www/Juno/www/temp
RUN mv /var/www/Juno/.htaccess /var/www/Juno/.htaccessZ
RUN composer update -d /var/www/Juno/


EXPOSE 80 3306/tcp
VOLUME ["${MYSQL_DATA_DIR}", "${MYSQL_RUN_DIR}"]
ENTRYPOINT ["/sbin/entrypoint.sh"]

CMD ["/usr/bin/mysqld_safe"]
