![imge_alt](https://github.com/ujjalroy1/BookEase/blob/fb9500d74b26abba9879caae0110f0eb327c1a55/13.Home%20page.png)

## BookEase - Bus and Hotel Booking System

BookEase is a platform designed to facilitate the booking of buses and hotels. It allows users to register, log in, and manage bookings while providing administrators with the ability to manage services and view all bookings. This project was created by Ujjal Roy and implemented using Laravel 12.

### Project Overview
BookEase allows:

### Users:

Register and log in.

View available services (bus or hotel).

Book buses or hotels.

View their own bookings.

### Admins:

Manage services (create, update, delete).

View all bookings made by customers.

Technologies Used
Backend: Laravel 11/12

Authentication: Laravel Sanctum

Database: MySQL

API: RESTful APIs

Middleware: Custom AdminMiddleware middleware to manage admin access

Routing: Routes grouped by user type (admin, customer)

Security: Token-based authentication for secure access


## Installation & Setup

Prerequisites

PHP >= 8.1

Composer (for dependency management)

MySQL or any other relational database
### Clone the Repository


Clone the repository to your local machine:

git clone https://github.com/ujjalroy1/BookEase.git


### Install Dependencies
Navigate to the project directory and install the required dependencies:

cd BookEase
composer install


### Environment Configuration
1.Copy the .env.example file to .env

2.Update the .env file with your database credentials and other environment variables:

DB_CONNECTION=mysql

DB_HOST=127.0.0.1

DB_PORT=3306

DB_DATABASE=bookease

DB_USERNAME=root

DB_PASSWORD=


3.Generate the application key:

php artisan key:generate

4.Run the migrations to create the necessary tables in the database:

php artisan migrate

5.You can  seed the database with some initial data (e.g., admin user, services) by running:

php artisan db:seed

## Serve the Application

php artisan serve

## API Documentation

### POST /api/register: Register a new user

### Request body:
{
  "name": "John Doe",
  
  "email": "johndoe@example.com",
  
  "password": "password",
  
  "password_confirmation": "password"
  
}


### POST /api/login: Log in with existing user credentials

### Request body:

json
{
  "email": "johndoe@example.com",
  
  "password": "password"
}


#### Admin Routes
Protected by auth:sanctum and admin middleware.

POST /api/services: Create a new service (Admin only)

### Request body:

json
{
  "type": "Hotel",
  
  "name": "Grand Plaza",
  
  "description": "Luxury Hotel Stay",
  
  "price": 1000,
  
  "room": "20"
}
##### PUT /api/services/{id}: Update an existing service (Admin only)

##### DELETE /api/services/{id}: Delete a service (Admin only)

#### GET /api/admin/bookings: View all bookings (Admin only)


### User Routes
Protected by auth:sanctum middleware.

GET /api/services: View all available services (User only)

POST /api/bookings: Make a booking for a service (User only)

### Request body:

json
{
  "service_id": 1,
  "booking_date": "2025-07-30 10:00:00",
  "start_date": "2025-08-01 14:00:00",
  "end_date": "2025-08-05 12:00:00"
}
#### GET /api/bookings: View all bookings made by the authenticated user


## How to Test the API
#### 1. Register a User
Make a POST request to /api/register to register a new user.

#### 2. Log In as User
Make a POST request to /api/login with the user credentials to get a Bearer token.

#### 3. Access User Routes
Use the Bearer token to make requests to authenticated routes such as:

GET /api/services: List available services

POST /api/bookings: Book a service

GET /api/bookings: View your bookings

#### 4. Admin Routes
Login as an admin user (where role = 1), and use the admin Bearer token to access:

POST /api/services: Create a new service

PUT /api/services/{id}: Update a service

DELETE /api/services/{id}: Delete a service

GET /api/admin/bookings: View all bookings made by users


## Output/Testing Photo
in testing photo Folder all the photo are stored





