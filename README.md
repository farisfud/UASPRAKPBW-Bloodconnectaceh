# BloodConnect Aceh

## Deskripsi Singkat

BloodConnect Aceh adalah platform web yang menghubungkan pendonor darah dengan orang yang membutuhkan darah di wilayah Aceh. Pengguna dapat mendaftar sebagai donor, mengajukan permintaan darah darurat, dan sistem secara otomatis mencocokkan permintaan dengan donor berdasarkan golongan darah dan rhesus. Kesediaan donor tersimpan langsung ke database sehingga data tidak hilang saat halaman di-refresh.

---

## Teknologi yang Digunakan

| Komponen | Teknologi |
|---|---|
| Backend Framework | Laravel 11 (PHP 8.x) |
| Database | MySQL |
| Frontend | HTML, CSS, JavaScript (Vanilla) |
| Template Engine | Blade (bawaan Laravel) |
| Package Manager | Composer |
| Server Lokal | PHP Built-in Server via Artisan |

---

## Struktur Database

- **users** — data akun pengguna sekaligus data profil donor
- **blood_requests** — permintaan darah yang diajukan pengguna
- **donation_histories** — riwayat donor darah setiap pengguna
- **donor_commitments** — catatan kesediaan donor untuk setiap permintaan

---

## Prasyarat

Pastikan perangkat sudah terinstal:

- PHP >= 8.2
- Composer
- MySQL
- Git

---

## Langkah Instalasi & Menjalankan Aplikasi

### 1. Clone atau ekstrak project

```bash
git clone <url-repository>
cd backend-laravel
```

Atau jika sudah dalam bentuk folder, langsung masuk ke folder `backend-laravel`.

---

### 2. Install dependensi PHP

```bash
composer install
```

---

### 3. Salin file konfigurasi environment

```bash
cp .env.example .env
```

Di Windows (CMD):

```cmd
copy .env.example .env
```

---

### 4. Generate application key

```bash
php artisan key:generate
```

---

### 5. Buat database di MySQL

Buka phpMyAdmin atau MySQL client, lalu buat database baru:

```sql
CREATE DATABASE bloodconnect_db CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

---

### 6. Konfigurasi file `.env`

Buka file `.env`, sesuaikan bagian database:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=bloodconnect_db
DB_USERNAME=root
DB_PASSWORD=
```

---

### 7. Jalankan migrasi database

Perintah ini membuat semua tabel yang dibutuhkan:

```bash
php artisan migrate
```

---

### 8. (Opsional) Isi data dummy

Jika ingin mengisi data awal untuk keperluan demo atau presentasi:

```bash
php artisan db:seed
```

---

### 9. Jalankan server lokal

```bash
php artisan serve
```

Aplikasi akan berjalan di:

```
http://127.0.0.1:8000
```

---

## Akun Default (setelah db:seed)

| Role | Email | Password |
|---|---|---|
| User | faris@example.com | password123 |
| Admin | admin@bloodconnect.id | admin123 |

---

## Halaman yang Tersedia

| URL | Keterangan |
|---|---|
| `/` | Halaman utama |
| `/login` | Login pengguna |
| `/dashboard` | Dashboard setelah login |
| `/cari-donor` | Cari pendonor aktif |
| `/permintaan-darurat` | Ajukan permintaan darah |
| `/permintaan-cocok` | Lihat permintaan yang cocok dengan profil donor |
| `/riwayat-permintaan` | Riwayat permintaan yang pernah dibuat |
| `/riwayat-donor` | Riwayat donor darah |
| `/profil-donor` | Lengkapi dan kelola profil donor |
| `/pengaturan` | Pengaturan akun |
| `/admin/dashboard` | Dashboard admin |
