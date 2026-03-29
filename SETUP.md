# E-Learning Laravel Setup

## 1) Requirement

- PHP 8.2+
- Composer 2+
- Node.js 20+

## 2) Install dependency

```bash
composer install
npm install
npm run build
```

## 3) SQLite setup

```bash
cp .env.example .env
touch database/database.sqlite
```

Pastikan `.env` mengarah ke:

```dotenv
DB_CONNECTION=sqlite
DB_DATABASE=/home/development/apps/elearning/database/database.sqlite
```

## 4) Generate key, migrate, seed

```bash
php artisan key:generate
php artisan migrate:fresh --seed
```

## 5) Login akun demo

- Admin: `admin@elearning.test` / `password123`
- Student: `student@elearning.test` / `password123`

## 6) Jalankan via PM2

```bash
pm2 start ecosystem.config.cjs
pm2 save
pm2 status
```

## 7) Cloudflare tunnel

Install dulu cloudflared pada server.

Login dan buat tunnel:

```bash
cloudflared tunnel login
cloudflared tunnel create elearning-laravel
```

Ambil `TUNNEL_ID` dari output lalu update file `deploy/cloudflared-config.yml` pada bagian `credentials-file`.

Map DNS hostname ke tunnel:

```bash
cloudflared tunnel route dns elearning-laravel elearning-laravel.andreasbilly.com
```

Jalankan tunnel:

```bash
cloudflared tunnel --config deploy/cloudflared-config.yml run elearning-laravel
```

Agar otomatis saat boot, gunakan systemd service untuk cloudflared.
