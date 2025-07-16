#!/bin/bash

# Copy .env dari environment Railway ke file
echo "Setting up Laravel..."
php artisan config:clear
php artisan config:cache
php artisan migrate --force || true

php artisan serve --host=0.0.0.0 --port=$PORT
