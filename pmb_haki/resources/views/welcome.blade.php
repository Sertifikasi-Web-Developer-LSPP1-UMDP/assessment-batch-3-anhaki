<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
        @vite(['resources/css/app.css','resources/js/app.js'])
    </head>
    <body class="">
        @include('layouts.nav')
        <div class="border border-gray-200 w-10/12 m-auto shadow-lg overflow-hidden">
            @include('layouts.carousel')
        </div>

        <div class="w-10/12 m-auto rounded-lg shadow-lg border border-gray-200 mt-4 overflow-hidden">
            <div class="text-center text-white bg-red-800 p-6">
                <h2 class="text-4xl font-extrabold">Penerimaan Mahasiswa Baru Universitas MDP</h2>
                <p class="mt-2 text-lg">Ayo daftar dan buka kesempatan untuk masa depan yang cerah!</p>
            </div>
            <div class="p-6">
                <p>Universitas MDP membuka peluang emas bagi Anda yang ingin meraih masa depan gemilang! Dengan program pendidikan berkualitas, fasilitas modern, dan dosen berpengalaman, kami berkomitmen mencetak lulusan unggul yang siap bersaing di era global. Jangan lewatkan kesempatan ini—daftarkan diri Anda sekarang dan mulailah perjalanan menuju impian Anda bersama Universitas MDP!</p>
                <a href="" class="">
                    <button class="bg-red-800 text-white p-2 block m-auto px-6 font-bold text-lg rounded-sm mt-6 w-full md:w-auto">Daftar</button>
                </a>    
            </div>
        </div>
        
        <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    </body>
</html>
