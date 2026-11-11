# FirstExercise — Profiles API

Laravel API for managing user profiles (`first_name`, `last_name`, `followers`, `is_account_verified`).

## Requirements

- PHP 8.2+
- Composer
- SQLite (default) or MySQL/PostgreSQL

Optional: [Laravel Herd](https://herd.laravel.com/) for local serving on Windows/macOS.

## Setup

```bash
git clone https://github.com/AbdulroufOyoun/FirstExercise.git
cd FirstExercise

composer install

copy .env.example .env
php artisan key:generate
```

On Linux/macOS use `cp .env.example .env` instead of `copy`.

Create the SQLite database file if it does not exist:

```bash
# Windows (PowerShell)
New-Item -ItemType File -Path database/database.sqlite -Force

# Linux / macOS
touch database/database.sqlite
```

Run migrations and seed sample profiles:

```bash
php artisan migrate --seed
```

### Using MySQL instead of SQLite

In `.env` set:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=first_exercise
DB_USERNAME=root
DB_PASSWORD=
```

Then create the database and run `php artisan migrate --seed`.

## Run the app

**With Herd:** link the project folder (or place it under Herd’s sites directory). The site is usually available at `http://FirstExercise.test`.

**With Artisan:**

```bash
php artisan serve
```

API base URL: `http://127.0.0.1:8000/api` (or your Herd domain + `/api`).

## API endpoints

| Method | Endpoint | Description |
|--------|----------|-------------|
| `GET` | `/api/profiles` | List all profiles |
| `GET` | `/api/profiles/{id}` | Get one profile |
| `POST` | `/api/profiles` | Create a profile |
| `PUT` / `PATCH` | `/api/profiles/{id}` | Update a profile |
| `DELETE` | `/api/profiles/{id}` | Delete a profile |

### Create example

```http
POST /api/profiles
Content-Type: application/json

{
  "first_name": "Ahmad",
  "last_name": "Zuwayl",
  "followers": 15200,
  "is_account_verified": true
}
```

### Partial update example

```http
PATCH /api/profiles/1
Content-Type: application/json

{
  "followers": 16000
}
```

`first_name` and `last_name` are required on create. On update, only sent fields are validated and updated.

## Project layout

- `app/Models/Profile.php` — Eloquent model
- `app/Http/Controllers/ProfileController.php` — CRUD actions
- `routes/api.php` — API routes
- `database/migrations/*_create_profiles_table.php` — profiles table
- `database/seeders/ProfileSeeder.php` — sample data
- `_starter/` — exercise starter files (reference)

## License

MIT
