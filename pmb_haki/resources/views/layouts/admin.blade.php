<!DOCTYPE html>
<html lang="en" class="w-full h-full bg-gray-200">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">
    <title>@yield('title')</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    @yield('style')
</head>

<body>
    @include('components.sidebar')

    <div class="md:pl-64 pt-20 pl-4 pr-4 pb-4 text-sm">
        <div class="bg-white rounded-lg divide-y-2 divide-solid shadow-md overflow-hidden">
            @yield('content')
        </div>
    </div>
    @yield('script')
</body>

</html>