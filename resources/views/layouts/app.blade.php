<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <title>{{ config('app.name', 'Wind Farm') }}</title>
        <script src="https://cdn.tailwindcss.com"></script>
    </head>
    <body class=" flex flex-col bg-gray-100 min-h-screen">

        <nav class="bg-white shadow-md">
            <div class="flex container justify-between items-center mx-auto px-4 py-4">
                <a href="{{ url('/') }}" class="text-blue-700 text-xl font-bold">{{ config('app.name', 'Wind Farm') }}</a>
        </nav>

        <main class="flex-grow container mx-auto px-4 py-8">
            @yield('content')
        </main>

        <footer class="text-gray-700 bg-white text-center py-4">
            &copy; {{ date('Y') }} Wind Farm. All rights reserved.
        </footer>
    </body>
</html>
