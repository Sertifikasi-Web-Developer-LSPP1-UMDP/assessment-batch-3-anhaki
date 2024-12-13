<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>PMB UMDP</title>

    <style>
        #tooltip {
            position: absolute;
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            padding: 8px;
            border-radius: 4px;
            font-size: 12px;
            pointer-events: none;
            /* Avoid interfering with hover actions */
            transition: transform 0.1s ease;
        }
    </style>
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
                <div class="card h-72 w-full shadow-md border border-gray-200 rounded-lg overflow-hidden bg-no-repeat bg-cover bg-center cursor-pointer"
                    style="background-image: url('{{ asset('storage/' . $item->gambar) }}');"
                    data-id="{{ $item->id }}" data-judul="{{ $item->judul }}"
                    data-deskripsi="{{ $item->deskripsi }}" data-gambar="{{ $item->gambar }}"
                    data-modal-target="detail-modal" data-modal-toggle="detail-modal"
                    onmousemove="showTooltip(event, '{{ $item->judul }}')" onmouseleave="hideTooltip()">
                    <div class="h-full w-full flex flex-col justify-between">
                        <h4 class="bg-red-800 text-white p-3 text-sm font-bold truncate ...">{{ $item->judul }}
                        </h4>
                        <h3 class="mt-auto text-center text-sm p-3 font-bold bg-white">
                            {{ $item->created_at->format('d F Y') }}</h3>
                    </div>
                    <!-- Tooltip -->
                    <div id="tooltip" class="absolute hidden bg-gray-700 text-white p-2 rounded shadow-md text-xs">
                        Klik untuk detail
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <div id="detail-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-2xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <!-- Modal Header -->
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 bg-red-800 text-white">
                    <h3 class="text-xl font-semibold dark:text-white" id="modal-judul"></h3>
                    <button type="button"
                        class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-hide="detail-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal Body -->
                <div class="p-6 md:p-5 grid grid-cols-1 md:grid-cols-2 gap-4 items-start">
                    <img id="modal-gambar" class="hidden object-contain rounded-md w-full h-auto" alt="Gambar Detail">
                    <p id="modal-deskripsi" class="text-base leading-relaxed text-black mt-0 dark:text-gray-400"></p>
                </div>
            </div>
        </div>
    </div>

    <button class="me-2 card" data-id="{{ $item->id }}" data-judul="{{ $item->judul }}"
        data-deskripsi="{{ $item->deskripsi }}" data-gambar="{{ $item->gambar }}" data-modal-target="detail-modal"
        data-modal-toggle="detail-modal">
        <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round" stroke-miterlimit="2" viewBox="0 0 24 24"
            xmlns="http://www.w3.org/2000/svg" class="fill-white h-6">
            <path
                d="m11.998 5c-4.078 0-7.742 3.093-9.853 6.483-.096.159-.145.338-.145.517s.048.358.144.517c2.112 3.39 5.776 6.483 9.854 6.483 4.143 0 7.796-3.09 9.864-6.493.092-.156.138-.332.138-.507s-.046-.351-.138-.507c-2.068-3.403-5.721-6.493-9.864-6.493zm8.413 7c-1.837 2.878-4.897 5.5-8.413 5.5-3.465 0-6.532-2.632-8.404-5.5 1.871-2.868 4.939-5.5 8.404-5.5 3.518 0 6.579 2.624 8.413 5.5zm-8.411-4c2.208 0 4 1.792 4 4s-1.792 4-4 4-4-1.792-4-4 1.792-4 4-4zm0 1.5c-1.38 0-2.5 1.12-2.5 2.5s1.12 2.5 2.5 2.5 2.5-1.12 2.5-2.5-1.12-2.5-2.5-2.5z"
                fill-rule="nonzero" />
        </svg>
    </button>


    @include('layouts.footer')

    <script src="../path/to/flowbite/dist/flowbite.min.js"></script>
    <script>
        document.querySelectorAll('.card').forEach(button => {
            button.addEventListener('click', () => {
                const judul = button.getAttribute('data-judul');
                const deskripsi = button.getAttribute('data-deskripsi');
                const gambar = button.getAttribute('data-gambar');

                document.getElementById('modal-judul').textContent = judul;
                document.getElementById('modal-deskripsi').textContent = deskripsi;

                const imgElement = document.getElementById('modal-gambar');
                if (gambar) {
                    imgElement.src = 'storage/' + gambar;
                    imgElement.classList.remove('hidden');
                } else {
                    imgElement.classList.add('hidden');
                }
            });
        });

        let tooltip = document.getElementById('tooltip');

        function showTooltip(event, text) {
            tooltip.style.left = `${event.pageX + 10}px`; // Adjust position based on cursor's X
            tooltip.style.top = `${event.pageY + 10}px`; // Adjust position based on cursor's Y
            tooltip.classList.remove('hidden'); // Show the tooltip
        }

        function hideTooltip() {
            tooltip.classList.add('hidden'); // Hide the tooltip when mouse leaves
        }
    </script>
</body>

</html>
