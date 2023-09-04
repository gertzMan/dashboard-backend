steps to run the project-
-Clone the github repository: https://github.com/gertzMan/dashboard-backend

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
