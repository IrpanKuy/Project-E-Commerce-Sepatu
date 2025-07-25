<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" />

    @vite('resources/css/app.css')
    @livewireStyles
</head>

<body class="font-sans bg-gray-50">

    @include('partials.header')

    {{ $slot }}

    @include('partials.footer')

    @livewireScripts
    @vite('resources/js/app.js')
</body>

</html>
