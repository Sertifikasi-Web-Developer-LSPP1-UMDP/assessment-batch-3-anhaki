<!DOCTYPE html>
<html lang="en" class="w-full h-full bg-gray-200">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>Verifikasi Mahasiswa</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
</head>

<body>
    @include('components.sidebar')

    <div class="sm:pl-64 pt-20 pl-4 pr-4 pb-4 text-sm">
        <!-- Tabs Navigation -->
        <div class="flex space-x-1 border-b">
            @foreach (['pending' => 'Mahasiswa Pending', 'accepted' => 'Mahasiswa Diterima', 'rejected' => 'Mahasiswa Ditolak'] as $status => $title)
                <button data-tab="{{ $status }}" class="tab-button py-2 px-4 text-gray-600 hover:text-white hover:bg-red-800 focus:outline-none">
                    {{ $title }}
                </button>
            @endforeach
        </div>

        <!-- Tab Content -->
        @foreach (['pending', 'accepted', 'rejected'] as $status)
            <div id="tab-{{ $status }}" class="tab-content hidden">
                <div class="bg-white rounded-lg divide-y-2 divide-solid shadow-md overflow-hidden mt-6">
                    <div class="text-center text-white bg-red-800 p-6">
                        <h1 class="text-3xl font-extrabold">{{ ['pending' => 'Mahasiswa Pending', 'accepted' => 'Mahasiswa Diterima', 'rejected' => 'Mahasiswa Ditolak'][$status] }}</h1>
                    </div>
                    <div class="p-6 overflow-x-scroll">
                        <table id="table{{ ucfirst($status) }}" class="min-w-full bg-white border border-gray-200">
                            <thead>
                                <tr class="bg-gray-200">
                                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-700">Nama</th>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-700">Telepon</th>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-700">Alamat</th>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-700">Tanggal Lahir</th>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-700">Program Studi</th>
                                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-700">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($mahasiswa as $mhs)
                                    @if ($mhs->user->mhs_status === $status)
                                        <tr class="border-b">
                                            <td class="px-6 py-4 text-sm text-gray-600">{{ $mhs->nama }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-600">{{ $mhs->telepon }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-600">{{ $mhs->alamat }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-600">{{ $mhs->tanggal_lahir }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-600">{{ $mhs->program_studi }}</td>
                                            <td class="px-6 py-4 text-sm text-gray-600">
                                                <form action="{{ route('mahasiswa.toggleStatus', $mhs->user->id) }}" method="post"
                                                    class="inline-block">
                                                    @csrf
                                                    @method('PATCH')
                                                    <select name="mhs_status" onchange="this.form.submit()"
                                                        class="p-2 border border-gray-300 rounded">
                                                        <option value="accepted" {{ $status === 'accepted' ? 'selected' : '' }}>Accepted</option>
                                                        <option value="pending" {{ $status === 'pending' ? 'selected' : '' }}>Pending</option>
                                                        <option value="rejected" {{ $status === 'rejected' ? 'selected' : '' }}>Rejected</option>
                                                    </select>
                                                </form>
                                            </td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    @if (session('success'))
        <div id="success-modal" class="fixed inset-0 flex items-center justify-center bg-black/40">
            <div class="bg-white p-6 rounded-lg shadow-lg">
                <div class="text-center">
                    <svg class="w-12 h-12 text-green-500 mx-auto mb-4" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
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

        document.addEventListener('DOMContentLoaded', function() {
            const tabButtons = document.querySelectorAll('.tab-button');
            const tabContents = document.querySelectorAll('.tab-content');

            tabButtons.forEach(button => {
                button.addEventListener('click', () => {
                    const targetTab = button.getAttribute('data-tab');

                    tabContents.forEach(content => {
                        content.classList.add('hidden');
                    });

                    tabButtons.forEach(btn => {
                        btn.classList.remove('bg-red-800', 'text-white');
                        btn.classList.add('text-gray-600');
                    });

                    document.getElementById(`tab-${targetTab}`).classList.remove('hidden');
                    button.classList.add('bg-red-800', 'text-white');
                });
            });

            // Activate the first tab by default
            tabButtons[0].click();
        });
    </script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            ['Pending', 'Accepted', 'Rejected'].forEach(status => {
                $(`#table${status}`).DataTable();
            });
        });
    </script>

</body>

</html>
