<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet">

    <!-- Scripts -->
    @vite([
        'resources/css/app.css',
        'resources/js/app.js'
    ])

    <!-- SweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>


<body class="font-sans antialiased">

    <div class="admin-wrapper">

        {{-- Sidebar --}}
        @include('layouts.admin-sidebar')

        {{-- Content --}}
        <div class="admin-content">

            {{-- Top Header --}}
            
            <main>
                {{ $slot }}
            </main>

        </div>

    </div>


    <script>

        @if(session('success'))

            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "{{ session('success') }}",
                showConfirmButton: false,
                timer: 2000
            });

        @endif


        @if(session('error'))

            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: "{{ session('error') }}"
            });

        @endif

    </script>

</body>

</html>