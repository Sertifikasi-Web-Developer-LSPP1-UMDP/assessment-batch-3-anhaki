<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PMB UMDP</title>

    <!-- Fonts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100">
    @include('layouts.nav')
    <div class="border border-gray-200 w-10/12 m-auto shadow-lg overflow-hidden">
        @include('layouts.carousel')
    </div>

    <div class="w-10/12 m-auto mt-4 rounded-lg shadow-lg border border-gray-200 overflow-hidden bg-white">
        <div class="text-center text-white bg-red-800 p-6">
            <h2 class="text-4xl font-extrabold">Penerimaan Mahasiswa Baru Universitas MDP</h2>
            <p class="mt-2 text-lg">Ayo daftar dan buka kesempatan untuk masa depan yang cerah!</p>
        </div>
        <div class="p-6">
            <p>Universitas MDP membuka peluang emas bagi Anda yang ingin meraih masa depan gemilang! Dengan program
                pendidikan berkualitas, fasilitas modern, dan dosen berpengalaman, kami berkomitmen mencetak lulusan
                unggul yang siap bersaing di era global. Jangan lewatkan kesempatan ini—daftarkan diri Anda sekarang dan
                mulailah perjalanan menuju impian Anda bersama Universitas MDP!</p>
            @auth
                <a href="/pendaftaran" class="">
                    <button
                        class="bg-red-800 text-white p-2 block m-auto px-6 font-bold text-lg rounded-sm mt-6 w-full md:w-auto">Daftar</button>
                </a>
            @else
                <a href="/register" class="">
                    <button
                        class="bg-red-800 text-white p-2 block m-auto px-6 font-bold text-lg rounded-sm mt-6 w-full md:w-auto">Daftar</button>
                </a>
            @endauth
        </div>
    </div>

    <div class="w-10/12 m-auto mt-8">
        <div class="text-center p-6">
            <h2 class="text-4xl font-extrabold">Pengumuman Penting</h2>
            <p class="mt-2 text-lg">Informasi penting yang untuk MDPeople!</p>
        </div>
        <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-4">
            @foreach ($pengumuman as $item)
                <div class="h-72 w-full shadow-md border border-gray-200 rounded-lg overflow-hidden bg-no-repeat bg-cover bg-center"
                    style="background-image: url('{{ asset('storage/' . $item->gambar) }}');">
                    <div class="h-full w-full flex flex-col justify-between">
                        <h4 class="bg-red-800 text-white p-3 text-sm font-bold truncate ...">{{ $item->judul }}
                        </h4>
                        <h3 class="mt-auto text-center text-sm p-3 font-bold bg-white">
                            {{ $item->created_at->format('d F Y') }}</h3>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    @include('layouts.footer')

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
</body>

</html>
