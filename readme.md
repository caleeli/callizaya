## Dependencias
PHP 7.1^
composer
NodeJS
Redis
Extensiones PHP:
- openssl
- mbstring
- sqlite3

## Start a new project

You could change the name of the project: `my_project`
```
composer create-project --prefer-dist --stability dev coredump/app my_project
cd my_project
php artisan app:config
php artisan app:install
npm install
npm run dev
php artisan serve
```
