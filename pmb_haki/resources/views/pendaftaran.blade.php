<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Form Pendaftaran Mahasiswa Baru</title>

        <!-- Fonts -->
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body class="">
        @include('layouts.nav')

        <div class="w-10/12 m-auto mt-8 rounded-lg shadow-lg border border-gray-200 overflow-hidden">
            <div class="text-center text-white bg-red-800 p-6">
                <h2 class="text-4xl font-extrabold">Formulir Pendaftaran Mahasiswa Baru</h2>
                <p class="mt-2 text-lg">Silakan isi data di bawah ini untuk mendaftar menjadi mahasiswa Universitas MDP</p>
            </div>

            <div class="p-6">
                <form action="/submit-registration" method="POST" enctype="multipart/form-data" class="space-y-4">
                    @csrf

                    <!-- Nama Lengkap -->
                    <div>
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                        <input type="text" name="nama" id="nama" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-800 focus:ring-red-800" required>
                    </div>

                    <!-- Email -->
                    <div>
                        <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                        <input type="email" name="email" id="email" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-800 focus:ring-red-800" required>
                    </div>

                    <!-- Nomor Telepon -->
                    <div>
                        <label for="telepon" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                        <input type="text" name="telepon" id="telepon" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-800 focus:ring-red-800" required>
                    </div>

                    <!-- Alamat -->
                    <div>
                        <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                        <textarea name="alamat" id="alamat" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-800 focus:ring-red-800" required></textarea>
                    </div>

                    <!-- Tanggal Lahir -->
                    <div>
                        <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                        <input type="date" name="tanggal_lahir" id="tanggal_lahir" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-800 focus:ring-red-800" required>
                    </div>

                    <!-- Program Studi Pilihan -->
                    <div>
                        <label for="program_studi" class="block text-sm font-medium text-gray-700">Program Studi Pilihan</label>
                        <select name="program_studi" id="program_studi" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-800 focus:ring-red-800" required>
                            <option value="">-- Pilih Program Studi --</option>
                            <option value="Teknik Informatika">Teknik Informatika</option>
                            <option value="Sistem Informasi">Sistem Informasi</option>
                            <option value="Manajemen">Manajemen</option>
                            <option value="Akuntansi">Akuntansi</option>
                        </select>
                    </div>

                    <!-- Upload Foto Mahasiswa -->
                    <div>
                        <label for="foto" class="block text-sm font-medium text-gray-700">Upload Foto Mahasiswa (JPEG/PNG)</label>
                        <input type="file" name="foto" id="foto" accept="image/jpeg, image/png" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-800 focus:ring-red-800" required>
                    </div>

                    <!-- Submit Button -->
                    <div class="text-center">
                        <button type="submit" class="bg-red-800 text-white px-6 py-2 font-bold text-lg rounded-sm w-full md:w-auto">Daftar Sekarang</button>
                    </div>
                </form>
            </div>
        </div>

        @include('layouts.footer')

        <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    </body>
</html>
