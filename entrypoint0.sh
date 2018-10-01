#!/bin/bash
set -e

[[ $DEBUG == true ]] && set -x

CONTAINER_ALREADY_STARTED="1"
if [ ! -e $CONTAINER_ALREADY_STARTED ]; then
	cd /var/www/
	ls /tmp/
	ls /var/www/
	mv -f /tmp/Juno /var/www/Juno/
	chown -R www-data:www-data /var/www/Juno
	mkdir -p /var/www/Juno/www/temp && chown -R www-data /var/www/Juno/www/temp
	mv /var/www/Juno/.htaccess /var/www/Juno/.htaccessZ
	chown -R www-data:www-data /var/www/Juno

else
    echo "-- Not first container startup --"
fi

exec "$@"
