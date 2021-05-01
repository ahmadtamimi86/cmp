**Complaint Management Portal(CMP) Installation Steps:**

[**Server Requirements**](https://laravel.com/docs/7.x#server-requirements)

The Laravel framework has a few system requirements. All of these requirements are satisfied by laragon virtual machine(https://laragon.org/download/), so it's highly recommended that you use laragon  as your local Laravel development environment.

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

Below commands should be executed in sequence inside laragon terminal(or any other virtual server), and locate project root directory,  to run application and migrate needed tables, after you clone project

Commands:

php artisan serve // by default app link will be <http://127.0.0.1:8000/>

php artisan migrate

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

