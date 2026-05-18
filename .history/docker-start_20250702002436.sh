composer install --no-dev --optimize-autoloader --no-interaction
php bin/console make:migration --no-interaction
php bin/console doctrine:migrations:migrate --no-interaction
