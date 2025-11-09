# Laravel Tasks API

Simple RESTful API for a task management system using Laravel and Sanctum.

## Requirements
- PHP 8.1+
- Composer
- MySQL / SQLite / Postgres
- Laravel 12

## Setup

1. Clone or create project:

2. Configure .env (DB_CONNECTION, DB_DATABASE, etc.)
3. Install Sanctum:
   - composer require laravel/sanctum
  - php artisan vendor:publish --provider="Laravel\Sanctum\SanctumServiceProvider"
4. Migrate: php artisan migrate
5. API Endpoints


- POST /api/createUser — createUser : name, email, password

- POST /api/login — login: email, password

- Protected (Bearer token)

- Add header Authorization: Bearer {token}

- GET /api/TaskList — list tasks (supports status filter and pagination per_page)

- POST /api/CreateTask — create

- GET /api/Task/{id} — show (supports status filter and pagination per_page)

- GET /api/TaskStatus/{status} - filtering by task status.

- PUT /api/updateTask/{recordID} — update (supports status filter and pagination per_page)

- DELETE /api/delete/{recordID} — delete