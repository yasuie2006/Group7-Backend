# Group 7 - E-Commerce Backend API

## Project Description

The Group 7 E-Commerce Backend API is developed using Laravel 12 and MySQL. It provides RESTful API services for user authentication, product management, categories, and shopping cart items.

The system uses Laravel Sanctum for token-based authentication and role-based authorization to protect administrative operations.

## Technologies Used

- Laravel 12
- PHP
- MySQL
- Laravel Sanctum
- Composer
- Postman

## Features

- User Registration and Login
- Token-Based Authentication
- User Logout
- Admin and User Roles
- Protected API Routes
- Product Management
- Category Management
- User Management
- Shopping Cart Management
- Admin-Only Product Creation, Updating, and Deletion

## Installation Guide

1. Clone the repository:

   `git clone https://github.com/yasuie2006/Group7-Backend.git`

2. Navigate to the project folder:

   `cd Group7-Backend`

3. Install dependencies:

   `composer install`

4. Create the environment file:

   `cp .env.example .env`

5. Generate the application key:

   `php artisan key:generate`

6. Configure your MySQL database in the `.env` file.

7. Run database migrations:

   `php artisan migrate`

8. Start the Laravel development server:

   `php artisan serve`

## Authentication API Endpoints

| Method | Endpoint | Description |
|---|---|---|
| POST | `/api/register` | Register a user |
| POST | `/api/login` | Login a user |
| POST | `/api/logout` | Logout authenticated user |
| GET | `/api/user` | Get authenticated user |

## Product API Endpoints

| Method | Endpoint | Access |
|---|---|---|
| GET | `/api/products` | Authenticated users |
| GET | `/api/products/{id}` | Authenticated users |
| POST | `/api/products` | Admin only |
| PUT | `/api/products/{id}` | Admin only |
| PATCH | `/api/products/{id}` | Admin only |
| DELETE | `/api/products/{id}` | Admin only |

## Authorization

The system has two user roles:

- **Admin:** Can create, view, update, and delete products.
- **User:** Can access protected product viewing endpoints but cannot perform administrative product operations.

## Testing

API endpoints
