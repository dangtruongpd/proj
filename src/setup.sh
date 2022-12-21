#!/bin/sh

chmod -R 777 ./storage/* ./bootstrap/*
chown www-data:www-data ./storage/* ./bootstrap/*
composer install
npm install
php artisan key:generate
php artisan optimize