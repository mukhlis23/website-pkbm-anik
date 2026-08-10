<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Login Admin | PKBM ANIK</title>

    <link rel="preconnect" href="https://fonts.bunny.net">

    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

</head>

<body class="font-sans antialiased">

    <div class="min-h-screen flex items-center justify-center bg-gradient-to-br from-blue-100 via-white to-blue-200 px-4">

        <div class="w-full max-w-md">

            <!-- Card -->
            <div class="bg-white rounded-3xl shadow-2xl overflow-hidden">

                <!-- Header -->
                <div class="bg-blue-700 text-center py-8 px-4">

                    <a href="{{ route('beranda') }}">

                        <img src="{{ asset('storage/logo/logo-pkbm.png') }}"
                             class="w-24 h-24 mx-auto rounded-full bg-white p-2 shadow-lg">

                    </a>

                    <h1 class="text-3xl font-bold text-white mt-4">
                        Panel Admin
                    </h1>

                    <p class="text-blue-100 mt-2">
                        Website PKBM ANIK
                    </p>

                </div>

                <!-- Form -->
                <div class="p-8">

                    {{ $slot }}

                    <div class="mt-8 text-center">

                        <a href="{{ route('beranda') }}"
                           class="text-blue-700 hover:underline text-sm">

                            ← Kembali ke Website

                        </a>

                    </div>

                </div>

            </div>

        </div>

    </div>

</body>

</html>