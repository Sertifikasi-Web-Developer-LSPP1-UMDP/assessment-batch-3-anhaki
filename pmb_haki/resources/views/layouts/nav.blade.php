<nav class="bg-red border-gray-200 dark:bg-gray-900 dark:border-gray-700 shadow-md mb-4 px-10 bg-white">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto px-8">
        <a href="/" class="flex items-center space-x-3 rtl:space-x-reverse">
            <img src="https://mdp.ac.id/mdp2020/wp-content/uploads/2021/07/logo-umdp-1-300x248-2.png" class="h-24"
                alt="MDP Logo" />
        </a>
        <button data-collapse-toggle="navbar-multi-level" type="button"
            class="inline-flex items-center w-10 h-10 justify-center text-sm text-gray-500 rounded-lg md:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600"
            aria-controls="navbar-multi-level" aria-expanded="false">
            <span class="sr-only">Open main menu</span>
            <svg class="w-5 h-5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 17 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M1 1h15M1 7h15M1 13h15" />
            </svg>
        </button>
        <div class="hidden w-full md:flex md:w-auto mb-4 md:mb-0 items-center" id="navbar-multi-level">
            @auth
                <div class="py-2 px-3 md:me-4 flex flex-col">
                    <span class="font-bold text-black rounded md:border-0 md:p-0 inline">
                        Halo, {{ Auth::user()->name }}
                    </span>
                    <button data-modal-target="status-modal" data-modal-toggle="status-modal"
                        class="flex items-center text-sm">
                        <svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" viewBox="0 0 25 25">
                            <path
                                d="M12 2c5.514 0 10 4.486 10 10s-4.486 10-10 10-10-4.486-10-10 4.486-10 10-10zm0-2c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-.001 5.75c.69 0 1.251.56 1.251 1.25s-.561 1.25-1.251 1.25-1.249-.56-1.249-1.25.559-1.25 1.249-1.25zm2.001 12.25h-4v-1c.484-.179 1-.201 1-.735v-4.467c0-.534-.516-.618-1-.797v-1h3v6.265c0 .535.517.558 1 .735v.999z" />
                        </svg>

                        <span class="ms-2">Cek Status</span>
                    </button>
                </div>
            @endauth

            <ul
                class="h-fit flex flex-col font-medium mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                @auth
                    @if (Auth::user()->roles == 'user' && Auth::user()->mhs_status == 'unregistered')
                        <li>
                            <a href="/pendaftaran"
                                class="block md:bg-red-800 py-2 px-3 text-gray-900 md:text-white rounded hover:bg-gray-100 md:hover:bg-gray-400 md:border-0 md:hover:text-black dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                Daftar
                            </a>
                        </li>
                    @endif

                    <li class="flex items-center">
                        <form action="{{ route('logout') }}" method="POST"
                            class="block py-2 px-3 text-red-800 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                            @csrf
                            <button type="submit" class="">
                                Logout
                            </button>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="/register"
                            class="block md:bg-red-800 py-2 px-3 text-gray-900 md:text-white rounded hover:bg-gray-100 md:hover:bg-gray-400 md:border-0 md:hover:text-black dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                            Daftar
                        </a>
                    </li>
                    <li class="flex items-center">
                        <a href="/login"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                            Login
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>
@auth
    <div id="status-modal" tabindex="-1"
        class="hidden fixed top-0 left-0 right-0 z-50 w-full p-4 overflow-x-hidden overflow-y-auto md:inset-0 h-[calc(100%-1rem)] max-h-full">
        <div class="relative w-full max-w-md max-h-full">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 right-3 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="status-modal">
                    <svg class="w-3 h-3" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M1 1l6 6m0 0l6 6M7 7l6-6M7 7L1 13" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 md:p-5 text-center">
                    @php
                        $message = '';
                        if (Auth::user()->mhs_status == 'unregistered') {
                            $message = 'Anda belum terdaftar. Silakan mendaftar terlebih dahulu.';
                        } elseif (Auth::user()->mhs_status == 'pending') {
                            $message = 'Pendaftaran Anda sedang dalam proses verifikasi. Harap menunggu.';
                        } elseif (Auth::user()->mhs_status == 'accepted') {
                            $message = 'Selamat! Anda telah diterima sebagai mahasiswa.';
                        } elseif (Auth::user()->mhs_status == 'rejected') {
                            $message =
                                'Maaf, pendaftaran Anda ditolak. Silakan hubungi pihak kampus untuk informasi lebih lanjut.';
                        }
                    @endphp
                    <x-modalstatus :status="Auth::user()->mhs_status" />
                    <h3 class="mb-5 text-lg font-normal text-black dark:text-gray-400">{{ $message }}</h3>
                    <button data-modal-hide="status-modal" type="button"
                        class="text-white bg-red-800 hover:bg-red-900 focus:ring-4 focus:outline-none focus:ring-red-300 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center dark:focus:ring-blue-800">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    </div>
@endauth
