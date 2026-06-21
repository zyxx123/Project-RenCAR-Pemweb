# 🚗 Sistem Pemesanan RentCar

Aplikasi **Sistem Pemesanan RentCar** berbasis Web yang dibangun menggunakan framework **Laravel**, **Livewire**, dan **Tailwind CSS**. Aplikasi ini memungkinkan pelanggan untuk menyewa mobil secara online dan memudahkan admin dalam mengelola data kendaraan serta penyewaan.

## ✨ Fitur Utama
- **Halaman Pelanggan:** Katalog mobil (SUV, MPV, Sedan, dll) lengkap dengan detail harga dan gambar, serta fitur pemesanan mobil.
- **Halaman Admin:** Dashboard untuk mengelola data mobil, kategori, dan transaksi penyewaan.
- **Sistem Autentikasi:** Login dan Register untuk pengguna dengan pembagian *Role* (Admin & Customer).
- **Responsif:** Desain UI/UX yang modern dan ramah digunakan di semua ukuran layar perangkat (HP, Tablet, Desktop).

## 🛠️ Teknologi yang Digunakan
- **Backend:** Laravel, PHP 8.3
- **Frontend:** Livewire, Blade, Tailwind CSS
- **Database:** MySQL
- **Lainnya:** Vite (Asset Bundling)

## 🚀 Cara Menjalankan Project di Localhost (Laptop)

1. Pastikan **PHP**, **Composer**, dan **Node.js** sudah ter-install di laptop kamu.
2. *Clone* repositori ini atau download *ZIP*-nya:
   ```bash
   git clone https://github.com/zyxx123/Project-RenCAR-Pemweb.git
   ```
3. Buka terminal di dalam folder project dan jalankan perintah instalasi berikut:
   ```bash
   composer install
   npm install
   ```
4. Salin file konfigurasi *environment*:
   ```bash
   cp .env.example .env
   ```
5. Buka file `.env` dan atur koneksi database kamu (misal: `DB_DATABASE=rentcar`).
6. *Generate key* untuk aplikasi:
   ```bash
   php artisan key:generate
   ```
7. *Migrate* database beserta *Seeder* (akun default):
   ```bash
   php artisan migrate:fresh --seed
   ```
8. Buat *symlink* untuk gambar / penyimpanan:
   ```bash
   php artisan storage:link
   ```
9. Terakhir, jalankan server Laravel dan Vite secara bersamaan di terminal yang berbeda:
   ```bash
   # Terminal 1:
   php artisan serve

   # Terminal 2:
   npm run dev
   ```

Aplikasi dapat diakses melalui browser di alamat: `http://localhost:8000`

## 🔑 Akun Default (Seeder)
Kamu bisa menggunakan akun ini untuk login:
- **Admin** 👉 Email: `admin@rentcar.com` | Password: `password`
- **Customer** 👉 Email: `customer@rentcar.com` | Password: `password`

---
*Dibuat untuk tugas/project mata kuliah Pemrograman Web - Informatika UNJEDIR.*
