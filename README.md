
# Post Management API

## About the Application

This Laravel application is a RESTful API that provides a CRUD system for managing posts. It allows users to create, read, update, and delete posts. Users need to be authenticated to perform certain operations.


## Prerequisites

Before you begin, ensure you have met the following requirements:

- **PHP**: >= 8.1
- **Composer**: Latest version
- **Laravel**: >= 12
- **Database**: MySQL
- **Web Server**: Apache, Nginx, or built-in PHP server for development

### Environment Setup

1. **PHP**: Install PHP from the [official PHP website](https://www.php.net/downloads).
2. **Composer**: Install Composer from the [official Composer website](https://getcomposer.org/download/).
3. **Laravel**: You can install Laravel via Composer:
   ```bash
   composer global require laravel/installer
   ```
4. **Database**: Install MySQL or use a cloud database.

## Steps of Deployment

1. **Clone the Repository**:
   ```bash
   git clone https://github.com/ahmedmo2399/auth-api.git
   cd auth-api
   ```

2. **Install Dependencies**:
   ```bash
   composer install
   ```

3. **Environment Configuration**:
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   - Update the `.env` file with your DB and other environment settings.

4. **Run Migrations**:
   ```bash
   php artisan migrate
   ```

5. **Start the Development Server**:
   ```bash
   php artisan serve
   ```

## API Endpoints

### Authentication

- `POST /api/register` - Register a new user.
- `POST /api/login` - Login and get token.
- `GET /api/user` - Get authenticated user info.
- `POST /api/logout` - Logout the user.

### Posts CRUD

- `GET /api/posts` - Get all posts.
- `POST /api/posts` - Create a new post.
- `GET /api/posts/{id}` - Get a single post.
- `PUT /api/posts/{id}` - Update a post.
- `DELETE /api/posts/{id}` - Delete a post.

> Note: Use Bearer Token for authenticated routes.
