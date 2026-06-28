composer install
npm install
cp .env.example .env
php artisan key:generate
php artisan migrate
npm run build
echo "Installation terminée! Lancez: php artisan serve"