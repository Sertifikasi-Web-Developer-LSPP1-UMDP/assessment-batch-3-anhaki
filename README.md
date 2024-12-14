[![Review Assignment Due Date](https://classroom.github.com/assets/deadline-readme-button-22041afd0340ce965d47ae6ef1cefeee28c7c493a6346c4f15d667ab976d596c.svg)](https://classroom.github.com/a/UwpJJG2e)

# Aplikasi Web Penerimaan Mahasiswa Baru Universitas MDP

Projek wajib untuk menyelesaikan sertifikasi LSP Pengembang Web

## Installation

Silahkan clone project ini, copy file `.env.example` dan ganti menjadi `.env`. Untuk mendapatkan key pada file `.env`, jalankan command berikut pada terminal :

```bash
  npm install
  composer install
  php artisan key:generate
```

Kemudian, lakukan migrate :

```bash
  php artisan migrate
```

## Getting Started

Untuk memulai menjalankan project, silahkan ketik command pada terminal :

```bash
  npm run dev
```

Kemudian, buka terminal 1 lagi dan lakukan :

```bash
  php artisan serve
```

Terdapat 2 role yang dapat digunakan, jika ingin memulai membuat akun admin, silahkan lakukan :

```bash
  php artisan db:seed --class=AdminSeeder
```

## Usage

<img src="https://res-console.cloudinary.com/df6vxktfc/media_explorer_thumbnails/258f1cca38f9defdad37ec50f6864b1f/detailed" alt"anjay">
