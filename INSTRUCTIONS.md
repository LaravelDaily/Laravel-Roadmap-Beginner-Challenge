## Instruction to install and use

### Config your database
- rename .env.example to .env
- setup your .env file according your database

### Install
```
    $ composer install
    $ php artisan migrate:fresh --seed
    $ npm install
    $ npm run dev
```

### Run

```
    $ php artisan serve
```

###  Login in Dashboard

 One user is created in when you seed the database

 Use the data below:
```
 email: admin@admin
 password: admin
```
