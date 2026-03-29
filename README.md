# E-Learning App

A simple fullstack e-learning application built with Laravel, SQLite, and Tailwind CSS.

## Features

-   Role-based login (`admin` and `student`)
-   Admin dashboard with learning statistics
-   Admin CRUD for learning materials (`video` and `text`)
-   Student access to published materials after login
-   Public landing page for non-authenticated users
-   SQLite file database for easy local setup

## Tech Stack

-   Laravel 13
-   PHP 8.3+
-   SQLite
-   Tailwind CSS (via Vite)
-   PM2 (process management)
-   Cloudflare Tunnel (optional deployment)

## 1) Clone the Repository

```bash
git clone git@github.com:billy93/elearning-laravel.git
cd elearning-laravel
```

## 2) Install Dependencies

Install backend and frontend dependencies:

```bash
composer install
npm install
```

## 3) Configure Environment

Create environment file:

```bash
cp .env.example .env
```

Create SQLite database file:

```bash
touch database/database.sqlite
```

The default `.env.example` is already configured for SQLite.

## 4) Generate App Key

```bash
php artisan key:generate
```

## 5) Run Database Migration + Seed

```bash
php artisan migrate:fresh --seed
```

This command will create tables and insert demo users + materials.

## 6) Build Frontend Assets

```bash
npm run build
```

For development mode, use:

```bash
npm run dev
```

## 7) Run the Application Locally

```bash
php artisan serve --host=127.0.0.1 --port=8000
```

Open:

`http://127.0.0.1:8000`

## 8) Demo Accounts

-   Admin

    -   Email: `admin@elearning.test`
    -   Password: `password123`

-   Student
    -   Email: `student@elearning.test`
    -   Password: `password123`

## 9) Run with PM2 (Production-like)

If you want to keep the app running in the background:

```bash
pm2 start ecosystem.config.cjs
pm2 save
pm2 status
```

Restart app:

```bash
pm2 restart elearning-laravel
```

## 10) Optional: Expose with Cloudflare Tunnel

Login and create tunnel:

```bash
cloudflared tunnel login
cloudflared tunnel create elearning-laravel
```

Add DNS route:

```bash
cloudflared tunnel route dns elearning-laravel elearning-laravel.andreasbilly.com
```

Run tunnel:

```bash
cloudflared tunnel --config deploy/cloudflared-config.yml run elearning-laravel
```

Or run tunnel with PM2:

```bash
pm2 start bash --name elearning-cloudflared -- -lc "cloudflared tunnel --config /home/development/apps/elearning/deploy/cloudflared-config.yml run elearning-laravel"
pm2 save
```

## Notes

-   If `npm run build` fails due optional dependency issue, reinstall Node modules:

```bash
rm -rf node_modules package-lock.json
npm install
npm run build
```

-   If you need a clean DB reset:

```bash
php artisan migrate:fresh --seed
```
