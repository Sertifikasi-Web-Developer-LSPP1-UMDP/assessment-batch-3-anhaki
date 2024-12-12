@extends('layouts.admin')
@section('title', 'Daftar Voucher')
@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
@endsection

@section('content')
    <h1 class="text-2xl font-bold">Verifikasi akun user</h1>
    <table id="tableAkun">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                        <form action="{{ route('user.toggleStatus', $user->id) }}" method="post">
                            @csrf
                            @method('PATCH')

                            <select name="status" onchange="this.form.submit()">
                                <option value="verified" {{ $user->status === 'verified' ? 'selected' : '' }}>Verified
                                </option>
                                <option value="unverified" {{ $user->status === 'unverified' ? 'selected' : '' }}>Unverified
                                </option>
                                <option value="rejected" {{ $user->status === 'rejected' ? 'selected' : '' }}>Rejected
                                </option>
                            </select>
                        </form>
                    </td>
                </tr>
            @endforeach

        </tbody>
    </table>

    <div id="success-modal" tabindex="-1"
        class="hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full md:inset-0 h-screen bg-black/40">
        <div class="relative p-4 w-full max-w-md">
            <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                <button type="button"
                    class="absolute top-3 end-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
                    data-modal-hide="success-modal" onclick="closeSuccessModal()">
                    <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                        viewBox="0 0 14 14">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
                    </svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="p-4 text-center">
                    <svg class="mx-auto mb-4 text-green-500 w-12 h-12 dark:text-green-400" aria-hidden="true"
                        xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M10 9V6m0 8h.01M19 10a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                    </svg>
                    <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">{{ session('success') }}</h3>
                    <button data-modal-hide="success-modal" type="button" onclick="closeSuccessModal()"
                        class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center">
                        Close
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('script')
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

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/2.1.8/js/dataTables.js"></script>
    <script>
        $(document).ready(function() {
            $('#tableAkun').DataTable();
        });
    </script>
@endsection
