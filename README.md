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

### Examples:

##### index page

GET /index.php - main page (Guest or Authorized)

Guest

![screenshot](images/guest.png)

Authorized

![screenshot](images/authorized.png)

##### login page

GET /login.php - login form (Guest)

POST /login.php - sending login form (Guest)

![screenshot](images/login.png)

##### registration page

GET /registration.php - registration form (Guest)

POST /registration.php - sending registration form (Guest)

![screenshot](images/registration.png)

### TODO (improvements)
- routing system
- validation system
  - better mobile_phone validation
- authorization protection system
- write auto tests
