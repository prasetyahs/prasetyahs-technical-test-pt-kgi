# Laravel Product CRUD + JWT Auth + Blade + Tailwind

## Kebutuhan
- PHP >= 8.2
- Node.js + NPM
- PostgreSQL

## Setup Project

### 1. Install dependencies backend
```bash
composer install
```

### 2. Install dependencies frontend
```bash
npm install
```
### 3. Salin file konfigurasi environment
```bash
cp .env.example .env
```

### 3. Generate Application key
```bash
php artisan key:generate
```

### 3. Generate JWT Secret
```bash
php artisan jwt:secret
```
### 4. Setup Koneksi database .env sesuikan dengan local anda
```bash
DB_CONNECTION=pgsql
DB_HOST=127.0.0.1
DB_PORT=5432
DB_DATABASE=technical-test
DB_USERNAME=postgres
DB_PASSWORD=postgres
```

### 5. Jalankan Migrasi dan DB seeder untuk user default
```bash
php artisan migrate
php artisan db:seed
```

## Jalakan Aplikasi
Start Backend
```bash
php artisan serve
```
Start Frontend (Vite)
```bash
npm run dev
```




