# SB Admin 2 - Diskominfotik - Laravel
Boilerplate/Starter Pack laravel.

## Prerequisites
- [php](https://www.php.net/downloads.php)
- [laravel](http://laravel.com/)
- [composer](https://getcomposer.org/download/)

## Installation
- Siapkan database baru untuk project `Contoh : example_db`
- Clone [repo](https://github.com/RayhanYulanda/SbAdmin2-Laravel).
- `cd nama-folder` untuk masuk ke direktori.
- Jalankan command.
```bash
composer install
```
- Copy file `.env.example` dan paste dengan nama `.env`
- Sesuaikan informasi aplikasi pada file `.env`
```env
APP_NAME="Laravel"
APP_ENV=local
APP_KEY=
APP_DEBUG=true
APP_URL=https://example.com
```
- Sambungkan database dengan nama database yang sudah dibuat sebelumnya
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=example_db
DB_USERNAME=root
DB_PASSWORD=
```
- Generate app key
```bash
php artisan key:generate
```
- Lakukan migrasi database dan mengisi database
```bash
php artisan migrate:fresh --seed
```

## Run Project
### Development
- Penyesuaian aplikasi
    - Ubah welcome page
    - Ubah nama aplikasi pada env
- Untuk memulai server jalankan command
```bash
php artisan serve
```
- Jalankan `localhost:8000` pada browser.
- Akun dari seeder
    - Super Admin : `superadmin@admin.com`, Pass : `password`
    - Admin : `admin@admin.com`, Pass : `password`
- Pengembangan
    - Generate model, controller dan view
    - Ubah urutan route pada `routes/web.php` (masuk ke dalam bagian admin) dan `use namespace` ke paling atas
    - Jika ada generate API maka ubah admin menjadi `v1`
    - Tambah permission sesuai nama menu
    - Ubah pada view (CRUD) dan controller jika ada relationship (ManyToMany, ManyToOne, OneToMany, OneToOne)
    - Untuk rollback jalankan dulu migrate rollback, setelah itu rollback generator builder pada infyom isi pada model
```bash
php artisan migrate:rollback --step=1
```
    - Jika diperlukan, generate schema file untuk memudahkan regenerate.
```bash
Example :
OneToMany - Comment on Post, Files on Datum //hasMany (2 table)
ManyToOne - Post on Comment, Status on Post, Author on Post //belongsTo (2 table) 
OneToOne - Phone on User //hasOne, belongsTo

ManyToMany - AllCode on Divisi, Student on Lesson //belongsToMany (3 table)
```
### Production
- Pointing domain ke folder `public` di project (Ex. `/var/www/html/example/public`)
- Uji coba dengan mengakses domain server.
- Install wkhtmltopdf
- Update snappy path di `config/snappy.php` atau `env`
- Update `datatables-buttons.php` pada 'pdf_generator' menjadi snappy/dompdf
- (Opsional) Update `config/app.php` pada 'providers' dan 'aliases' menjadi snappy/dompdf
- `.env` ubah debug jadi false `APP_DEBUG=false`

## Features
1. Authentication
2. Authorization
3. [Super Admin] Roles Management
4. [Super Admin] Users Management
5. [Super Admin] Permissions Management
6. [Admin] Profile

## Frameworks
- Laravel 7
- Bootstrap 3
- jQuery 3.2.1

## Third Parties
- DataTables
- Laravel-snappy (PDF)
- Maatwebsite/excel (Excel)
- Spatie (Permission)
- Form collective
- Swagger
- Log-viewer
- [Dev] Debugbar
- [Dev] Faker
- [Dev] Dusk and Pest

## Third Parties CLI
- DataTable :
```bash
php artisan datatables:make Post
```
- Excel Export :
```bash
php artisan make:export UsersExport --model=User
```
- Browser Test :
```bash
php artisan dusk:make LoginTest
```

Copyright © Diskominfotik Banda Aceh 2021   
