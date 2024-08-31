<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pixel Position</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Hanken+Grotesk:wght@400;500;600&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-black text-white font-hanken-grotesk">
    <div class="px-10">
        <nav class="flex justify-between py-4 border-b border-white/10 ">
            <div class="flex space-x-5">
                <img class="w-16 h-16" src="{{ Vite::asset('resources/images/logo2.jpg') }}" alt="">
            </div>
            @auth
                <div class="space-x-10 flex font-bold mt-auto mb-5">
                    <x-heading> <a class="hover:bg-blue-900 rounded-xl px-2 py-1" href="/task">Tasks</a></x-heading>
                    <x-heading> <a class="hover:bg-blue-900 rounded-xl px-2 py-1"href="/project">Porjects</a></x-heading>
                </div>
            @endauth
            @yield('nav')
            @guest
                <div class="mt-4">
                    <x-heading><a href="/login" class="hover:bg-blue-900 rounded-xl px-2 py-1">Log In</a></x-heading>
                </div>
            @endguest
        </nav>
        <main class="mt-10 max-w-[968px] mx-auto">
            {{ $slot }}
        </main>
    </div>
</body>

</html>
