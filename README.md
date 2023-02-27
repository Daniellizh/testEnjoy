step by step 
1. git clone https://github.com/Daniellizh/testEnjoy.git
2. composer install
3. npm install
4. cp .env.example .env
5. php artisan key:generate
6. Create an empty database for our application
7. In the .env file, add database information to allow Laravel to connect to the database.
In the .env file fill in the DB_HOST, DB_PORT, DB_DATABASE, DB_USERNAME, and DB_PASSWORD options to match the credentials of the database you just created. This will allow us to run migrations and seed the database in the next step.
8. php artisan migrate
(if you use my database, the following steps are unnecessary)
9. php artisan db:seed CreateSuperUserSeeder
10. php artisan db:seed PermissionsSeeder
And that's it.
Use these credentials to log in admin:
email: admin@gmail.com
password: 12341234