<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 2000 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

- **[Vehikl](https://vehikl.com/)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Cubet Techno Labs](https://cubettech.com)**
- **[Cyber-Duck](https://cyber-duck.co.uk)**
- **[Many](https://www.many.co.uk)**
- **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
- **[DevSquad](https://devsquad.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
- **[OP.GG](https://op.gg)**
- **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**
- **[Lendio](https://lendio.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

steps to run the project-
-Clone the github repository: git@github.com:gertzMan/dashboard.git

- cd in the project folder
  -Run "composer install" to install the project packages specified in the composer.json file
- In have added the .env file to make to make the application easy to test. THIS WOULD NEVER BE DONE IN A REAL PROJECT
- Run "php artisan key:generate" to generate the application key
- Create a database in mysql with the name "dashboard_project" by running "CREATE DATABASE dashboard_project"
- Run "php artisan migrate" to generate the database tables specified in the migrations folder. This will create the users and messages tables
  -Next, we create fake data for the messages so we can generate some messages for the api
- To generate the fake messages, run "php artisan db:seed --class=MessagesTableSeeder"

-To start the api, run "php artisan serve"

API ENDPOINTS:
GET|HEAD api/auth/dashboard ............. AuthController@dashboard
POST api/auth/login ..................... AuthController@login
POST api/auth/logout ................... AuthController@logout

GET|HEAD api/auth/messages ................ MessageController@get_messages
POST api/auth/refresh ................. AuthController@refresh
POST api/auth/register ............... AuthController@register

ENDPOINT DOCUMENTATION

Authentication
Authentication for this API is handled using JWT (JSON Web Tokens). To authenticate, you need to follow these steps:

Registration: Create an account by sending a POST request to /api/register with the required user information (name, email, password).

Login: Obtain a JWT token by sending a POST request to /api/login with your registered email and password. This will return a token that you must include in the Authorization header for subsequent requests.

Token Refresh: If your token expires, you can obtain a new one by sending a POST request to /api/refresh. Use the expired token as a bearer token in the Authorization header.

Logout: To invalidate your token and log out, send a POST request to /api/logout. The token will no longer be valid for authentication.

API Routes
Users
Register
Endpoint: /api/auth/register
Method: POST
Description: Create a new user account.
Parameters:
username (string, required) - Username.
password (string, required) - User's password.

Login
Endpoint: /api/auth/login
Method: POST
Description: Log in and obtain a JWT token.
Parameters:
usename (string, required) - User's email.
password (string, required) - User's password.
Logout
Endpoint: /api/auth/logout
Method: POST
Description: Log out and invalidate the JWT token.
Authorization Header: Bearer <valid_token>

Messages
GetMessages
Endpoint: /api/auth/messages
Method: GET
Description: fetch messages to be used by the application

NOTICE

All API responses are in JSON Format
