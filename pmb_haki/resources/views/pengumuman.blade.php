<!DOCTYPE html>
<html lang="en" class="w-full h-full bg-gray-200">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Pengumuman</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    @include('components.sidebar')

    <div class="sm:pl-64 pt-20 pl-4 pr-4 pb-4 text-sm">
        <div class="mb-4 flex justify-between items-center">
            <button data-modal-target="crud-modal" data-modal-toggle="crud-modal"
                class="block text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800"
                type="button">
                Tambahkan Pengumuman
            </button>
            <input type="text" id="search-input" placeholder="Cari berdasarkan judul..."
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-64 p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white">
        </div>
        <div id="announcement-container"
            class="{{ $pengumuman->isEmpty() ? '' : 'grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-4' }}">
            @if ($pengumuman->isEmpty())
                <p id="no-announcement" class="text-gray-500 text-center w-full">Belum ada pengumuman.</p>
            @else
                @foreach ($pengumuman as $item)
                    <div class="announcement-item h-72 w-full shadow-md border border-gray-200 rounded-lg overflow-hidden bg-no-repeat bg-cover bg-center"
                        style="background-image: url('{{ asset('storage/' . $item->gambar) }}');"
                        data-title="{{ strtolower($item->judul) }}">
                        <div class="h-full w-full flex flex-col justify-between">
                            <div class="bg-red-800 text-white p-3 flex">
                                <h4 class="text-sm font-bold truncate ... flex-1 me-1">{{ $item->judul }}</h4>
                                {{-- Btn detail --}}
                                <button class="me-2 detail-button" data-id="{{ $item->id }}"
                                    data-judul="{{ $item->judul }}" data-deskripsi="{{ $item->deskripsi }}"
                                    data-gambar="{{ $item->gambar }}" data-modal-target="detail-modal"
                                    data-modal-toggle="detail-modal">
                                    <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round"
                                        stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                        class="fill-white h-6">
                                        <path
                                            d="m11.998 5c-4.078 0-7.742 3.093-9.853 6.483-.096.159-.145.338-.145.517s.048.358.144.517c2.112 3.39 5.776 6.483 9.854 6.483 4.143 0 7.796-3.09 9.864-6.493.092-.156.138-.332.138-.507s-.046-.351-.138-.507c-2.068-3.403-5.721-6.493-9.864-6.493zm8.413 7c-1.837 2.878-4.897 5.5-8.413 5.5-3.465 0-6.532-2.632-8.404-5.5 1.871-2.868 4.939-5.5 8.404-5.5 3.518 0 6.579 2.624 8.413 5.5zm-8.411-4c2.208 0 4 1.792 4 4s-1.792 4-4 4-4-1.792-4-4 1.792-4 4-4zm0 1.5c-1.38 0-2.5 1.12-2.5 2.5s1.12 2.5 2.5 2.5 2.5-1.12 2.5-2.5-1.12-2.5-2.5-2.5z"
                                            fill-rule="nonzero" />
                                    </svg>
                                </button>
                                {{-- Btn edit --}}
                                <button class="me-3 edit-button" data-id="{{ $item->id }}"
                                    data-judul="{{ $item->judul }}" data-deskripsi="{{ $item->deskripsi }}"
                                    data-gambar="{{ $item->gambar }}">
                                    <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round"
                                        stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                        class="fill-white h-5">
                                        <path
                                            d="m19 20.25c0-.402-.356-.75-.75-.75-2.561 0-11.939 0-14.5 0-.394 0-.75.348-.75.75s.356.75.75.75h14.5c.394 0 .75-.348.75-.75zm-12.023-7.083c-1.334 3.916-1.48 4.232-1.48 4.587 0 .527.46.749.749.749.352 0 .668-.137 4.574-1.493zm1.06-1.061 3.846 3.846 8.824-8.814c.195-.195.293-.451.293-.707 0-.255-.098-.511-.293-.706-.692-.691-1.742-1.741-2.435-2.432-.195-.195-.451-.293-.707-.293-.254 0-.51.098-.706.293z"
                                            fill-rule="nonzero" />
                                    </svg>
                                </button>
                                {{-- Btn hapus --}}
                                <button data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                                    class="me-1 delete-button" data-id="{{ $item->id }}">
                                    <svg clip-rule="evenodd" fill-rule="evenodd" stroke-linejoin="round"
                                        stroke-miterlimit="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"
                                        class="fill-white h-4">
                                        <path
                                            d="M19 24h-14c-1.104 0-2-.896-2-2v-17h-1v-2h6v-1.5c0-.827.673-1.5 1.5-1.5h5c.825 0 1.5.671 1.5 1.5v1.5h6v2h-1v17c0 1.104-.896 2-2 2zm0-19h-14v16.5c0 .276.224.5.5.5h13c.276 0 .5-.224.5-.5v-16.5zm-9 4c0-.552-.448-1-1-1s-1 .448-1 1v9c0 .552.448 1 1 1s1-.448 1-1v-9zm6 0c0-.552-.448-1-1-1s-1 .448-1 1v9c0 .552.448 1 1 1s1-.448 1-1v-9zm-2-7h-4v1h4v-1z" />
                                    </svg>
                                </button>
                            </div>
                            <h3 class="mt-auto text-center text-sm p-3 font-bold bg-white">
                                {{ $item->created_at->format('d F Y') }}</h3>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
        <p id="no-results" class="hidden text-gray-500 text-center">Tidak ada hasil pencarian.</p>
    </div>

    <div id="crud-modal" tabindex="-1" aria-hidden="true"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-3xl max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <div
                    class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600 bg-red-800 text-white">
                    <h3 class="text-lg font-semibold">
                        Tambahkan Pengumuman
                    </h3>
                    <button type="button"
                        class="bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                        data-modal-toggle="crud-modal">
                        <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 14 14">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <form id="pengumuman-form" method="POST" action="{{ route('pengumuman.store') }}"
                    enctype="multipart/form-data" class="p-4 md:p-5">
                    @csrf
                    <input type="hidden" id="form-method" name="_method" value="POST">
                    <input type="hidden" id="pengumuman-id" name="id">

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4 items-start">
                        <div
                            class="w-full min-h-64 h-full border-2 border-dashed border-gray-300 bg-gray-50 rounded-lg relative flex justify-center items-center">
                            <img id="preview" class="hidden w-full h-full object-contain" alt="Pratinjau Gambar">
                            <span id="placeholder" class="text-gray-500">Pratinjau gambar</span>
                        </div>
                        <div>
                            <div class="col-span-2">
                                <label for="judul"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Judul</label>
                                <input type="text" name="judul" id="judul"
                                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-primary-600 focus:border-primary-600 block w-full p-2.5 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-primary-500 dark:focus:border-primary-500"
                                    placeholder="Judul pengumuman" required>
                            </div>
                            <div class="col-span-2 mt-4">
                                <label for="deskripsi"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Deskripsi</label>
                                <textarea name="deskripsi" id="deskripsi" rows="4"
                                    class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-600 dark:border-gray-500 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                                    placeholder="Deskripsi pengumuman" required></textarea>
                            </div>
                            <div class="col-span-2 mt-4">
                                <label for="gambar"
                                    class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Gambar
                                    (Opsional)</label>
                                <input type="file" name="gambar" id="gambar" accept="image/*"
                                    class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400">
                            </div>
                        </div>
                    </div>
                    <button type="submit" id="modalbtn"
                        class="text-white mt-3 inline-flex items-center bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                        Tambahkan Pengumuman
                    </button>
                </form>
            </div>
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
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round"
                                stroke-width="2" d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                        </svg>
                        <span class="sr-only">Close modal</span>
                    </button>
                </div>
                <!-- Modal Body -->
                <div class="p-6 md:p-5 grid grid-cols-1 md:grid-cols-2 gap-4 items-start">
                    <img id="modal-gambar" class="hidden object-contain rounded-md w-full h-auto"
                        alt="Gambar Detail">
                    <p id="modal-deskripsi" class="text-base leading-relaxed text-black mt-0 dark:text-gray-400"></p>
                </div>
            </div>
        </div>
    </div>

    @if (session('success'))
        <div id="success-modal" class="fixed inset-0 flex items-center justify-center bg-black/40">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="text-center">
                    <svg class="w-12 h-12 text-green-500 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-700">{{ session('success') }}</h3>
                    <button onclick="closeSuccessModal()"
                        class="mt-4 bg-red-800 text-white px-4 py-2 rounded">Close</button>
                </div>
            </div>
        </div>
    @endif
    @if ($errors->any())
        <div id="error-modal" class="fixed inset-0 flex items-center justify-center bg-black/40">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="text-center">
                    <svg class="w-12 h-12 text-red-500 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg"
                        fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M12 9v2m0 4h.01M12 7h.01m9 5c0-4.97-4.03-9-9-9S3 7.03 3 12s4.03 9 9 9 9-4.03 9-9z" />
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-700">Terjadi Kesalahan</h3>
                    <ul class="mt-4 text-sm text-gray-500">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                    <button onclick="closeErrorModal()"
                        class="mt-4 bg-red-800 text-white px-4 py-2 rounded">Close</button>
                </div>
            </div>
        </div>
    @endif

    <div id="popup-modal" tabindex="-1"
        class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative p-4 w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="popup-modal">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    <svg class="mx-auto mb-4 text-gray-400 w-12 h-12 dark:text-gray-200" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 11V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Hapus pengumuman ini?</h3>
                    <div class="flex w-full justify-center">
                        <form id="delete-form" method="POST" action="{{ route('pengumuman.destroy', 'ID') }}">
                            @csrf
                            @method('DELETE')
                            <button data-modal-hide="popup-modal" type="submit"
                                class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 dark:focus:ring-red-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                                Hapus
                            </button>
                        </form>
                        <button data-modal-hide="popup-modal" type="button"
                            class="py-2.5 px-5 ms-3 text-sm font-medium text-gray-900 focus:outline-none bg-white rounded-lg border border-gray-200 hover:bg-gray-100 hover:text-blue-700 focus:z-10 focus:ring-4 focus:ring-gray-100 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700">Tidak</button>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.getElementById('gambar').addEventListener('change', function(event) {
            const file = event.target.files[0];
            const preview = document.getElementById('preview');
            const placeholder = document.getElementById('placeholder');

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.classList.remove('hidden');
                    placeholder.classList.add('hidden');
                }
                reader.readAsDataURL(file);
            } else {
                preview.src = '';
                preview.classList.add('hidden');
                placeholder.classList.remove('hidden');
            }
        });

        const searchInput = document.getElementById('search-input');
        const announcementContainer = document.getElementById('announcement-container');
        const noResults = document.getElementById('no-results');
        const noAnnouncement = document.getElementById('no-announcement');

        searchInput.addEventListener('input', function() {
            const query = searchInput.value.toLowerCase();
            const items = document.querySelectorAll('.announcement-item');
            let hasResults = false;

            items.forEach(item => {
                const title = item.getAttribute('data-title');
                if (title.includes(query)) {
                    item.style.display = '';
                    hasResults = true;
                } else {
                    item.style.display = 'none';
                }
            });

            noResults.classList.toggle('hidden', hasResults || query === '');
            announcementContainer.classList.toggle('hidden', items.length === 0);
        });
    </script>
    <script>
        const modal = document.getElementById('crud-modal');
        const modalTitle = modal.querySelector('h3');
        const modalButton = modal.querySelector('#modalbtn');

        document.querySelectorAll('.edit-button').forEach(button => {
            button.addEventListener('click', function() {
                modalTitle.textContent = 'Edit Pengumuman';
                modalButton.textContent = 'Simpan Perubahan';
                const id = this.getAttribute('data-id');
                const judul = this.getAttribute('data-judul');
                const deskripsi = this.getAttribute('data-deskripsi');
                const gambar = this.getAttribute('data-gambar');

                document.getElementById('judul').value = judul;
                document.getElementById('deskripsi').value = deskripsi;

                if (gambar) {
                    document.getElementById('preview').src = `/storage/${gambar}`;
                    document.getElementById('preview').classList.remove('hidden');
                    document.getElementById('placeholder').classList.add('hidden');
                }

                const form = document.getElementById('pengumuman-form');
                form.action = `/pengumuman/${id}`;
                document.getElementById('form-method').value = 'PATCH';
                document.getElementById('pengumuman-id').value = id;

                document.querySelector('[data-modal-toggle="crud-modal"]').click();
            });
        });
    </script>
    @if (session('success'))
        <script>
            document.addEventListener('DOMContentLoaded', function() {
                const modal = document.getElementById('success-modal');
                modal.classList.remove('hidden');
                modal.classList.add('flex');
            });
        </script>
    @endif

    <script>
        function closeSuccessModal() {
            const modal = document.getElementById('success-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    </script>

    <script>
        function closeErrorModal() {
            const modal = document.getElementById('error-modal');
            modal.classList.add('hidden');
            modal.classList.remove('flex');
        }
    </script>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('crud-modal');
            const form = document.getElementById('pengumuman-form');
            const previewImage = document.getElementById('preview');
            const placeholder = document.getElementById('placeholder');

            function resetModal() {
                // Reset semua field dalam form
                form.reset();
                modalTitle.textContent = 'Tambahkan Pengumuman'; // Reset judul menjadi "Tambah"
                modalButton.textContent = 'Simpan';

                // Mengembalikan pratinjau gambar ke keadaan awal
                previewImage.classList.add('hidden');
                placeholder.classList.remove('hidden');
                previewImage.src = ''; // Bersihkan src gambar
            }

            // Deteksi ketika modal ditutup
            const observer = new MutationObserver((mutations) => {
                mutations.forEach((mutation) => {
                    if (mutation.attributeName === 'class') {
                        const isHidden = modal.classList.contains('hidden');
                        if (isHidden) {
                            resetModal();
                        }
                    }
                });
            });

            // Amati perubahan atribut pada modal
            observer.observe(modal, {
                attributes: true
            });

            // Event listener untuk input gambar
            const gambarInput = document.getElementById('gambar');
            gambarInput.addEventListener('change', function(event) {
                const file = event.target.files[0];
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        previewImage.src = e.target.result;
                        previewImage.classList.remove('hidden');
                        placeholder.classList.add('hidden');
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    </script>

    <script>
        document.querySelectorAll('.delete-button').forEach(button => {
            button.addEventListener('click', function() {
                const announcementId = button.getAttribute('data-id');
                const deleteForm = document.getElementById('delete-form');
                deleteForm.action = '/pengumuman/' +
                    announcementId; // Update the form action with the correct ID
            });
        });
    </script>

    <script>
        document.querySelectorAll('.detail-button').forEach(button => {
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
    </script>
</body>

</html>
