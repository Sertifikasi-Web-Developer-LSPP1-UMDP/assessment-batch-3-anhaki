[![Review Assignment Due Date](https://classroom.github.com/assets/deadline-readme-button-22041afd0340ce965d47ae6ef1cefeee28c7c493a6346c4f15d667ab976d596c.svg)](https://classroom.github.com/a/UwpJJG2e)

# Aplikasi Web Penerimaan Mahasiswa Baru Universitas MDP
#### Projek wajib untuk menyelesaikan sertifikasi **LSP Pengembang Web**

Aplikasi ini menggunakan bahasa pemrograman **PHP** dengan *framework* **Laravel**.
<hr>

## Specification
### User Side
- Halaman utama
- Halaman login
- Halaman register
- Halaman pendaftaran mahasiswa
- Cek status pendaftaran

### Admin side
- Halaman login
- Halaman verifikasi akun pengguna
- Halaman verifikasi pendaftaran mahasiswa
- Halaman untuk mengontrol informasi & pengumuman


<hr>

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
Untuk login sebagai admin default, dapat menggunakan email dan password sebagai berikut:
**admin1@gmail.com** atau **admin2@gmail.com** dengan masing-masing passwordnya **admin123**

## Usage

<hr>

### User Side
Halaman utama berisi navigasi ke daftar & login, banner, informasi Penerimaan Mahasiswa Baru (PMB), dan pengumuman
<br/>
![screencapture-127-0-0-1-8000-2024-12-14-10_17_47](https://github.com/user-attachments/assets/bd0771b0-10b6-46d8-a54c-8d1e89cc2295)

Untuk mendaftar menjadi mahasiswa, user membuat akun terlebih dahulu dengan menekan tombol **Daftar** pada bagian navigasi maupun pada bagian informasi PMB, yang nantinya akan diarahkan ke halaman **Register**
<br/>
![image](https://github.com/user-attachments/assets/bf0066e3-998e-4388-9be9-acec058c6e02)

Setelah selesai mendaftarkan akun, pengguna diarahkan ke halaman login dan diberikan informasi bahwa diharuskan menunggu admin untuk memverifikasi akun agar dapat login
<br/>
![image](https://github.com/user-attachments/assets/cbb35719-7592-4972-b427-4ea3a24c4ecd)

Jika akun belum diverifikasi atau ditolak namun user mencoba login, akan muncul error pada form
<br/>
![image](https://github.com/user-attachments/assets/837ae46c-a1ff-4d24-8591-d3d5f69016ec) ![image](https://github.com/user-attachments/assets/cbfc399b-9415-49e3-a273-61e17809c844)

Jika akun sudah disetujui, maka user dapat login dan diarahkan kembali ke halaman utama, user dapat melihat statusnya sebagai mahasiswa dengan menekan **Cek Status** dan dapat memulai untuk mendaftar sebagai mahasiswa dengan menekan kembali tombol **Daftar** dan akan diarahkan ke halaman pendaftaran
<br/>
![image](https://github.com/user-attachments/assets/3f1899f6-d214-4868-9350-50488cd9744d)
![image](https://github.com/user-attachments/assets/fc8b64f2-4271-4800-bf36-e773079e7218)
![image](https://github.com/user-attachments/assets/07a8a06a-264e-4bcd-b52f-2a43f1c45cf8)

Pengguna diwajibkan untuk mengisi seluruh form, kemudian jika sudah selesai maka pengguna akan diarahkan kembali ke halaman utama dan dapat mengecek kembali status pendaftaran mahasiswanya
Pengguna dapat melihat apakah pendaftarannya masih menunggu verifikasi admin, diterima, atau ditolak.
<br/>
![image](https://github.com/user-attachments/assets/e7ed1a79-b128-4615-aff0-8e63045791dc)
![image](https://github.com/user-attachments/assets/b378dc82-c1a7-4bfb-a43d-57ac225281d4)
![image](https://github.com/user-attachments/assets/dcdaf4aa-e30c-4ce1-9305-fa852c661e6e)

<hr>

### Admin Side
Setelah login, admin dapat mengakses halaman **Dashboard**, **Verifikasi Akun**, **Verifikasi  Pendaftaran Mahasiswa**, dan **Pengumuman**. Pada halaman dashboard, admin dapat melihat grafik statistik berapa jumlah mahasiswa yang diterima dan ditolak di setiap bulan selama 1 tahun.
<br/>
![image](https://github.com/user-attachments/assets/69a1cd6d-3eb7-4ec0-a9c4-017fc0fb167d)

Pada halaman verifikasi akun, admin dapat melakukan verifikasi terhadap akun pengguna, apakah disetujui atau ditolak menggunakan dropdown pada tabel
<br/>
![image](https://github.com/user-attachments/assets/066ce287-0a45-4fb2-add3-918487dfddd0)
![image](https://github.com/user-attachments/assets/58cda1ec-778e-4fd0-b56e-ca981f210f08)

Pada halaman Pendaftaran mahasiswa, admin dapat memverifikasi pendaftaran mahasiswa dengan melakukan hal yang serupa
<br/>
![image](https://github.com/user-attachments/assets/bb19291e-48fc-410c-961e-c3cdf52b2c96)
![image](https://github.com/user-attachments/assets/ecca0bea-0f4c-4e9a-afe0-db6f56e23263)

Terakhir, pada halaman pengumuman, admin dapat mengelola pengumuman seperti menambahkan, mencari berdasarkan judul, mengedit, dan menghapus pengumuman yang tersedia
<br/>
![image](https://github.com/user-attachments/assets/51223013-ab25-47d8-896d-fe2341ba7fcf)
![image](https://github.com/user-attachments/assets/743c3f8b-b22f-4735-957c-91c4f3e095a7)
![image](https://github.com/user-attachments/assets/13fa8ae6-795d-4341-8878-b1e63eaf6d10)
![image](https://github.com/user-attachments/assets/214d3253-aa6e-41bf-9fc5-bf6bd93239d6)
![image](https://github.com/user-attachments/assets/4aba4c77-6287-49a7-ae22-19a54e07f7d6)
![image](https://github.com/user-attachments/assets/c2cd459f-f082-45f9-98aa-d4547ae8dc28)
![image](https://github.com/user-attachments/assets/8e8ea33d-74e9-46e1-848b-d6e3aaae6e95)

Admin juga dapat melihat nama pembuat pengumuman
<br/>
![image](https://github.com/user-attachments/assets/0d520649-5d96-48ed-86e0-693904265b6b)

Pengumuman yang ditambahkan di halaman ini akan muncul di Home Page yang juga dapat dilihat oleh user
![image](https://github.com/user-attachments/assets/12f422a0-82f6-4f93-aac4-bddee0e0c34e)
![image](https://github.com/user-attachments/assets/b61404be-3c9f-449a-b9ab-8abf0d5bfe7f)
![image](https://github.com/user-attachments/assets/d6b317d9-0cc7-4e62-848a-24843594bd20)
![image](https://github.com/user-attachments/assets/07de8275-6763-4b56-ac76-c11105881c91)

