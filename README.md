# Installation & use

```bash
git clone https://github.com/imamkoo/TK1Laravel.git
cd TK1Laravel/
composer install
mv .env.example .env
# Now, configure your file .env with your DATABASE
php artisan config:cache
php artisan migrate:refresh --seed
php artisan key:generate
php artisan serve
```
