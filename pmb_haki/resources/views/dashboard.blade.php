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

        <div class="p-6 m-1 bg-white rounded shadow">
            {!! $chart->container() !!}
        </div>

        <script src="{{ $chart->cdn() }}"></script>

        {{ $chart->script() }}

    </div>

</body>

</html>
