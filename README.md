#Dashboard project - backend

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

API Endpoints

Authentication:

GET|HEAD api/auth/dashboard: AuthController@dashboard

POST api/auth/login: AuthController@login

POST api/auth/logout: AuthController@logout

POST api/auth/refresh: AuthController@refresh

POST api/auth/register: AuthController@register

Messages:

GET|HEAD api/auth/messages: MessageController@get_messages

Endpoint Documentation

Authentication

Authentication for this API is handled using JWT (JSON Web Tokens).

Steps for Authentication:

Registration: Create an account by sending a POST request to /api/register with required user details.

username: Your username

password: Your password

Login: Obtain a JWT token by sending a POST request to /api/auth/login.

password: Your password

This will return a token. Use this token in the Authorization header for subsequent requests.

Logout: Invalidate the token by sending a POST request to /api/logout.

API Routes

Users:

Register:

Endpoint: /api/auth/register

Method: POST

Description: Create a new user account.

Parameters:

username: Username (Required)

password: Password (Required)

Login:

Endpoint: /api/auth/login

Method: POST

Description: Log in and obtain a JWT token.

Parameters:

username: User's email (Required)

password: User's password (Required)

Logout:

Endpoint: /api/auth/logout

Method: POST

Description: Log out and invalidate the JWT token.

Authorization: Bearer <valid_token>

Messages:

GetMessages:

Endpoint: /api/auth/messages

Method: GET

Description: Fetch messages for the application.

Notice

⚠️ All API responses are in JSON Format.
