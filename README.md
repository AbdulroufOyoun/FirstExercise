# FirstExercise — Profiles API

Laravel API for managing user profiles (`first_name`, `last_name`, `followers`, `is_account_verified`).

## Requirements

- PHP 8.2+
- Composer
- MySQL 8+

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

Make sure MySQL is running and the database name in `.env` matches your setup (default: `first_exercise`). Then:

```bash
php artisan migrate --seed
```

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
