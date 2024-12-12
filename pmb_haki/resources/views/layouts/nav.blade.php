<nav class="bg-red border-gray-200 dark:bg-gray-900 dark:border-gray-700 shadow-md mb-4 px-10">
    <div class="max-w-screen-xl flex flex-wrap items-center justify-between mx-auto px-8">
        <a href="#" class="flex items-center space-x-3 rtl:space-x-reverse">
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
                    @if (Auth::user()->roles == 'user' && Auth::user()->is_mahasiswa == false)
                        <span class="text-red-800 rounded md:border-0 md:p-0 text-sm ">
                            Kamu belum menjadi mahasiswa
                        </span>
                    @elseif (Auth::user()->roles == 'user' && Auth::user()->is_mahasiswa == true)
                        <span class="text-green-700 rounded md:border-0 md:p-0 text-sm ">
                            Mahasiswa
                        </span>
                    @endif
                </div>
            @endauth

            <ul
                class="h-fit flex flex-col font-medium mt-4 border border-gray-100 rounded-lg bg-gray-50 md:space-x-8 rtl:space-x-reverse md:flex-row md:mt-0 md:border-0 dark:bg-gray-800 md:dark:bg-gray-900 dark:border-gray-700">
                @auth
                    @if (Auth::user()->roles == 'user' && Auth::user()->is_mahasiswa == false)
                        <li>
                            <a href="/register"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                Daftar
                            </a>
                        </li>
                    @endif

                    <li>
                        <form action="{{ route('logout') }}" method="POST"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                            @csrf
                            <button type="submit"
                                class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                                Logout
                            </button>
                        </form>
                    </li>
                @else
                    <li>
                        <a href="/register"
                            class="block py-2 px-3 text-gray-900 rounded hover:bg-gray-100 md:hover:bg-transparent md:border-0 md:hover:text-blue-700 md:p-0 dark:text-white md:dark:hover:text-blue-500 dark:hover:bg-gray-700 dark:hover:text-white md:dark:hover:bg-transparent">
                            Daftar
                        </a>
                    </li>
                    <li>
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
