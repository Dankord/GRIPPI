<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title> {{ isset($title) ? $title . ' - GRIPPI ' : 'GRIPPI '}}</title>
</head>
<body class="bg-base-100 min-h-screen">
    {{-- headr section --}}
    <x-header />
    <div class="flex min-h-[calc(100vh-4rem)]">
        <x-sidebar />

        {{-- Main setion --}}
        <main class="flex-1 min-w-0 flex flex-col">
            <x-navbar/>
            {{-- Page content goes here whenever it is called --}}
            <section class="flex-1 p-6">
                {{ $slot }}
            </section>
        </main>
    </div>
</body>
</html>