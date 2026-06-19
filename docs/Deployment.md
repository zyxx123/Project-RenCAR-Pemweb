# Deployment & Testing Documentation

## 1. System Requirements
- PHP 8.2 or newer
- Composer 2.x
- Node.js & NPM
- MySQL 8.x / MariaDB
- Web Server (Apache/Nginx/Laravel Herd)

## 2. Local Installation (Development)

1. **Clone & Install Dependencies**
   ```bash
   git clone <repo-url>
   cd rentcar-app
   composer install
   npm install
   ```

2. **Environment Setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```
   Edit `.env` file and set up your Database connection (`DB_DATABASE`, `DB_USERNAME`, `DB_PASSWORD`).
   Also, set your mail driver:
   ```ini
   MAIL_MAILER=log # Or use smtp for production
   ```

3. **Run Migrations & Seeders**
   ```bash
   php artisan migrate --seed
   ```
   *(This will create the default admin account: admin@rentcar.com / password)*

4. **Link Storage**
   Because the system handles vehicle images and payment proofs, you must link the storage folder to the public directory:
   ```bash
   php artisan storage:link
   ```

5. **Start Servers**
   In one terminal, run the asset bundler:
   ```bash
   npm run dev
   ```
   In another terminal, run the PHP server:
   ```bash
   php artisan serve
   ```

## 3. Running Scheduled Tasks (Auto Cancel)
The application has a background job that automatically cancels bookings that have been pending for more than 24 hours.

**For Local Testing:**
You can manually run the schedule once to test:
```bash
php artisan schedule:run
```

**For Production:**
Add the following Cron entry to your server:
```bash
* * * * * cd /path-to-your-project && php artisan schedule:run >> /dev/null 2>&1
```

## 4. Production Deployment Notes
- Ensure you run `npm run build` instead of `npm run dev` to compile assets for production.
- Ensure `APP_ENV=production` and `APP_DEBUG=false` in `.env`.
- Ensure the `storage/` and `bootstrap/cache/` directories are writable by the web server user (e.g., `www-data`).
