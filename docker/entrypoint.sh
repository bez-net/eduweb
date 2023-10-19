#!/bin/bash 
set -e

init() {
    if [ ! -f ".env" ]; then
        cp .env.example .env
        php artisan key:generate
    fi

    if [ ! -f "vendor/autoload.php"]; then
        composer install \
            --no-interaction \
            --no-plugins \
            --no-scripts \
            --no-dev \
            --prefer-dist
        
        composer dump-autoload --no-scripts
    fi

    find . -type f -exec chmod 644 {} \;
    find . -type d -exec chmod 775 {} \;
    chown -R www-data:root ./ 
    chmod -R 777 storage
    chmod -R 777 bootstrap/cache/
}

USER=${USER:-www}
USER_ID=${USER_ID:-1000}

if [ -z $(id -u $USER 2>/dev/null) ]; then
    adduser --disabled-password --gecos '' --uid ${USER_ID} ${USER}

    mkdir -p /home/${USER}/.composer

    chown ${USER}:${USER} -R /home/${USER}
    chown ${USER}:${USER} /mnt
fi

# allow user to write to stdout and stderr
chown --dereference ${USER} /proc/self/fd/1
chown --dereference ${USER} /proc/self/fd/2

init