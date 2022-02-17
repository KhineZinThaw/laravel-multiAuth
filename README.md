# Laravel MultiAuth
## Installation

Clone the repo locally:

```
git clone https://github.com/KhineZinThaw/laravel-multiAuth.git

cd laravel-multiAuth
```

Install PHP dependencies:

```
composer install
```

Install NPM dependencies:

```
npm install
```

Build assets:

```
npm run dev
```

Setup configuration:

```
cp .env.example .env
```

Generate application key:

```
php artisan key:generate
```

Create database and configure in `.env` file

eg.

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=multiAuth
DB_USERNAME=root
DB_PASSWORD=
```

Run database migrations:

```
php artisan migrate
```

Run database seeder:

```
php artisan db:seed
```

Run the dev server:

```
php artisan serve
```

Visit `localhost:8000` in your browser. 

### AdminUser Login

URL : `/admin/login`

- **Email:** admin@gmail.com
- **Password:** password
