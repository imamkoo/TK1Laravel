git clone https://github.com/deltcod/LaravelTube.git
cd LaravelTube/
composer install
npm install
mv .env.example .env

# Now, configure your file .env with your DATABASE

php artisan migrate:refresh --seed
php artisan key:generate
gulp
php artisan serve
