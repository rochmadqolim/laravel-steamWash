# DriveRent

Aplikasi tracking kendaraan yang menggunakan layanan cuci steam yang dibangun menggunakan laravel 10.

## Fitur aplikasi

-   User dapat melakukan registrasi, login dan logout
-   User dapat melihat log order yang sudah dibuat
-   User dapat memfilter order dengan fitur pencarian
-   User dapat mengupdate profile
-   User dapat menghapus histori order yang sudah dibuat
-   User dapat memilih tarif sesuai jenis kendaraan

## Technology Stack

-   Laravel 10
-   PHP 8.1.9
-   MySql 5.2.1

## Installation

Buka file directory laravel-rentApp menggunakan code editor
Download dependensi dengan menjalankan perintah:

```sh
composer install
```

Renama file .env.example menjadi .env
Set up .env seperti berikut

```sh
    # Config to database
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=steamwash
    DB_USERNAME=root
    DB_PASSWORD=
```

Jalankan Apache dan Mysql server menggunakan XAMPP atau Laragon dan buat database mysql dengan nama steamwash

Lalu jalankan perintah berikut pada terminal

```sh
php artisan migrate
php artisan db:seed --class=CategorySeeder
php artisan db:seed --class=LoginSeeder # untuk migrasi dummy account (opsional)
php artisan key:generate
```

## Running App

Jalankan laravel server menggunakan perintah:

```sh
php artisan serve
```

Arahkan dan jalankan server pada alamat `http://127.0.0.1:8000/login` untuk melakukan login atau `http://127.0.0.1:8000/register` untuk mendaftarkan account baru.

List Dummy account yang dapat digunakan:

Dummy 1

-   fullname: user pertama
-   username: user111
-   password: 123

Dummy 2

-   fullname: user kedua
-   username: user222'
-   password: 123

Tampilan halaman login

![alt text](https://github.com/rochmadqolim/laravel-steamWash/blob/main/public/img/login.jpg?raw=true)

Tampilan halaman Register untuk mendaftarkan account baru

![alt text](https://github.com/rochmadqolim/laravel-steamWash/blob/main/public/img/register.jpg?raw=true)

Tampilan Halaman Dashboard untuk melihat logs dan delete log order

![alt text](https://github.com/rochmadqolim/laravel-steamWash/blob/main/public/img/dashboard.jpg?raw=true)

Tampilan halaman Order untuk melakukan order dan melihat price list

![alt text](https://github.com/rochmadqolim/laravel-steamWash/blob/main/public/img/order.jpg?raw=true)

Tampilan halaman User Setting untuk mengupdate profile user

![alt text](https://github.com/rochmadqolim/laravel-steamWash/blob/main/public/img/profile.jpg?raw=true)

Untuk update aplikasi dapat melakukan pull atau clone pada repository:

```sh
https://github.com/rochmadqolim/laravel-steamWash.git
```
