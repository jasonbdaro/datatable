# Laravel jQuery Datatable
jQuery Datatable Server Processing with Laravel

## Pre-requisites
- PHP >= 7.1.3
  - OpenSSL PHP Extension
  - PDO PHP Extension
- Node >= 8.12.0
- [composer](https://getcomposer.org/download)

## Installation
### Backend

Create an `.env` file in your project root directory and ADD or UPDATE the variables from below

```python
APP_TIMEZONE=Asia/Manila

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=datatable
DB_USERNAME=root
DB_PASSWORD=password

API_PREFIX=api
API_SUBTYPE=rest
API_DEBUG=true
```

If needed, run `php artisan key:generate`

### FrontEnd

```bash
npm install
```

### Running the Application
```bash
cd <project-directory>
php artisan serve
npm run watch
```
Then navigate to http://localhost:8000
