@extends('layouts.admin')
@section('title', 'Daftar Voucher')
@section('style')
    <link rel="stylesheet" href="https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css" />
@endsection

@section('content')
    <div class="text-center text-white bg-red-800 p-6">
        <h1 class="text-4xl font-extrabold">Verifikasi Akun User</h1>
    </div>
    <div class="p-6">
        <table id="tableAkun" class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-200">
                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-700">Nama</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-700">Email</th>
                    <th class="px-6 py-3 text-left text-sm font-bold text-gray-700">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="border-b">
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $user->name }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">{{ $user->email }}</td>
                        <td class="px-6 py-4 text-sm text-gray-600">
                            <form action="{{ route('user.toggleStatus', $user->id) }}" method="post" class="inline-block">
                                @csrf
                                @method('PATCH')
                                <select name="status" onchange="this.form.submit()"
                                    class="p-2 border border-gray-300 rounded">
                                    <option value="verified" {{ $user->status === 'verified' ? 'selected' : '' }}>
                                        Verified</option>
                                    <option value="unverified" {{ $user->status === 'unverified' ? 'selected' : '' }}>
                                        Unverified</option>
                                    <option value="rejected" {{ $user->status === 'rejected' ? 'selected' : '' }}>
                                        Rejected</option>
                                </select>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
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
