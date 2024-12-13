<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Form Pendaftaran Mahasiswa Baru</title>

    <!-- Fonts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="">
    @include('layouts.nav')

    <div class="w-10/12 m-auto mt-8 rounded-lg shadow-lg border border-gray-200 overflow-hidden">
        <div class="text-center text-white bg-red-800 p-6">
            <h2 class="text-4xl font-extrabold">Formulir Pendaftaran Mahasiswa Baru</h2>
            <p class="mt-2 text-lg">Silakan isi data di bawah ini untuk mendaftar menjadi mahasiswa Universitas MDP</p>
        </div>

        <div class="p-6">
            <form action="/pendaftaran" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf

                <!-- Nama Lengkap -->
                <div>
                    <label for="nama" class="block text-sm font-medium text-gray-700">Nama Lengkap</label>
                    <input type="text" name="nama" id="nama"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-800 focus:ring-red-800 @error('nama') border-red-500 @enderror"
                        value="{{ old('nama') }}">
                    @error('nama')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nomor Telepon -->
                <div>
                    <label for="telepon" class="block text-sm font-medium text-gray-700">Nomor Telepon</label>
                    <input type="text" name="telepon" id="telepon"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-800 focus:ring-red-800 @error('telepon') border-red-500 @enderror"
                        value="{{ old('telepon') }}">
                    @error('telepon')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Alamat -->
                <div>
                    <label for="alamat" class="block text-sm font-medium text-gray-700">Alamat</label>
                    <textarea name="alamat" id="alamat" rows="3"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-800 focus:ring-red-800 @error('alamat') border-red-500 @enderror"
                    >{{ old('alamat') }}</textarea>
                    @error('alamat')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Tanggal Lahir -->
                <div>
                    <label for="tanggal_lahir" class="block text-sm font-medium text-gray-700">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" id="tanggal_lahir"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-800 focus:ring-red-800 @error('tanggal_lahir') border-red-500 @enderror"
                        value="{{ old('tanggal_lahir') }}">
                    @error('tanggal_lahir')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Asal SMA -->
                <div>
                    <label for="asal_sma" class="block text-sm font-medium text-gray-700">Asal SMA</label>
                    <input type="text" name="asal_sma" id="asal_sma"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-800 focus:ring-red-800 @error('asal_sma') border-red-500 @enderror"
                        value="{{ old('asal_sma') }}">
                    @error('asal_sma')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Nilai Ijazah SMA -->
                <div>
                    <label for="nilai_ijazah" class="block text-sm font-medium text-gray-700">Nilai Ijazah SMA</label>
                    <input type="number" step="0.01" name="nilai_ijazah" id="nilai_ijazah"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-800 focus:ring-red-800 @error('nilai_ijazah') border-red-500 @enderror"
                        value="{{ old('nilai_ijazah') }}">
                    @error('nilai_ijazah')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Program Studi Pilihan -->
                <div>
                    <label for="program_studi" class="block text-sm font-medium text-gray-700">Program Studi
                        Pilihan</label>
                    <select name="program_studi" id="program_studi"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-800 focus:ring-red-800 @error('program_studi') border-red-500 @enderror"
                    >
                        <option value="">-- Pilih Program Studi --</option>
                        <option value="Teknik Informatika"
                            {{ old('program_studi') == 'Teknik Informatika' ? 'selected' : '' }}>Teknik
                            Informatika</option>
                        <option value="Sistem Informasi"
                            {{ old('program_studi') == 'Sistem Informasi' ? 'selected' : '' }}>Sistem
                            Informasi</option>
                        <option value="Manajemen" {{ old('program_studi') == 'Manajemen' ? 'selected' : '' }}>Manajemen
                        </option>
                        <option value="Akuntansi" {{ old('program_studi') == 'Akuntansi' ? 'selected' : '' }}>Akuntansi
                        </option>
                    </select>
                    @error('program_studi')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Upload Foto Mahasiswa -->
                <div>
                    <label for="foto" class="block text-sm font-medium text-gray-700">Upload Foto Mahasiswa
                        (JPEG/PNG)</label>
                    <input type="file" name="foto" id="foto" accept="image/jpeg, image/png"
                        class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-red-800 focus:ring-red-800 @error('foto') border-red-500 @enderror"
                    >
                    @error('foto')
                        <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                    @enderror
                </div>


                <!-- Submit Button -->
                <div class="text-center">
                    <button type="submit"
                        class="bg-red-800 text-white px-6 py-2 font-bold text-lg rounded-sm w-full md:w-auto">Daftar
                        Sekarang</button>
                </div>
            </form>
        </div>
    </div>

    @include('layouts.footer')

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>

</html>
