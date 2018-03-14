#!/bin/bash

source /etc/apache2/envvars
#tail -F /var/log/apache2/* &
exec apache2 -D FOREGROUND

#cd /var/www/
#chown -R www-data:www-data Juno
#cd /var/www/Juno/
#rm -R temp/cache/*
#mkdir www/temp && chown -R www-data www/temp
#service apache2 restart
