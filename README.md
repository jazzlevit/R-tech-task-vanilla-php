# RecMan test

##

first page is `public/index.php`


### Set up configuration
install composer dependencies  
`composer install`

copy config file and set up db connection

`cp config/config.php.example config/config.php`

```php
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'recman');
```

set up a server, open `public` as root, as example

```
cd public
php -S localhost:8000
```

### Database
open and run sql script in prepared database - migrations/create_tables.sql

that will create `users` table

### TODO (improvements)
- routing system
- validation system
- authorization protection system
