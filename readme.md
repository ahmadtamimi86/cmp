**Complaint Management Portal(CMP) Installation Steps:**

[**Server Requirements**](https://laravel.com/docs/7.x#server-requirements)

The Laravel framework has a few system requirements. All of these requirements are satisfied by laragon virtual machine(https://laragon.org/download/).
However, if you are not using laragon, you will need to make sure your server(wamp,xamp…etc) meets the following requirements:

- PHP >= 7.2.5
- BCMath PHP Extension
- Ctype PHP Extension
- Fileinfo PHP extension
- JSON PHP Extension
- Mbstring PHP Extension
- OpenSSL PHP Extension
- PDO PHP Extension
- Tokenizer PHP Extension
- XML PHP Extension
- Composer

once Development enviroment is ready to run laravel application please make sure to execute below commands inside created project folder: 


git clone https://github.com/ahmadtamimi86/cmp.git <br/>
composer install <br/>
php artisan serve <br/>
php artisan migrate <br/>




Notes:
1. response can be updated to json instead of returning views(in app\Http\Controllers\ComplaintsController.php) as sample below:
return response()->json($complaint, 201);


2.Database config can be changed from .env file, below is the default params:

//Below Database config default :

Database Config in .env:

DB\_CONNECTION=mysql

DB\_HOST=127.0.0.1

DB\_PORT=3306

DB\_DATABASE=cmp

DB\_USERNAME=root

DB\_PASSWORD=


3. To update user account to Admin account, change is_admin flag in users table to 1, in this case admin will be able to change complain status.
4. to activate forget password email, SMTP configurations should be updated inside .env file first.

