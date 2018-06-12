# Laravel-SQLite
How to use SQLite as default Database with Laravel.

Here I am trying to demonstrate how to use Laravel with SQLite as default database. I am using Laravel 5.4 but I am similar configuration will work for some prrvious and latest versions.

# Step 1: Create a fresh Laravel Project.
composer create-project --prefer-dist laravel/laravel myLaravel

# Step 2: Changes in config\database.php
```'default' => env('DB_CONNECTION', 'mysql')``` "default connection is 'mysql' make it 'sqlite'",
```'default' => env('DB_CONNECTION', 'sqlite')```. It will make "sqlite" your default connection.

# Step 3: Changes in .env
```DB_HOST=****
DB_PORT=****
DB_DATABASE=****
DB_USERNAME=****
DB_PASSWORD=****
```
Remove this block of code as you dont need this and it was creating issues. Code will work fine after removing this code.

# Step 4: Create a database.sqlite file.
Now create a ```database.sqlite``` file (this file is your database now) in ```database``` folder. I have not tried with different location and with different name, but I am sure you can try with different name and location for database.sqlite file.

# Step 5: Create Login and Registration Form.
Run ```php artisan make:auth``` this command will give a login and registration form. (More info refer this https://laravel.com/docs/5.4/authentication#included-views)

# Step 6: Creating Tables.
Run ```php artisan migrate``` it will create ```users```,```password_resets``` and ```migrations``` table in database.

Thats it your working project is ready. Now you can Register and Login in your preoject.

# Step 7: Creating Table
Run ```php artisan make:migration PersonInfo```. It will create file in ```migrations``` folder. Add this code in up() to create table Schema
```
Schema::create('person_info', function(Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->integer('age');
            $table->string('address');
            $table->string('profession');
            $table->timestamps();
        });
```
Now again run ```php artisan migrate```. It will create ```person_info``` in database.

Now you can perform your CRUD operations on this table just like any other tables. So there almost no different the way you use ```mysql``` and ```sqlite``` database with Laravel.
