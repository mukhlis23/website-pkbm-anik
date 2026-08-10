<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PKBM ANIK</title>

    @vite([
        'resources/css/website.css',
        'resources/js/website.js',
    ])
</head>

<body>

    @include('website-partials.navbar')

    <main>
        @yield('content')
    </main>

    @include('website-partials.footer')

</body>

</html>