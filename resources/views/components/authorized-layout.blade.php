<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title> {{ isset($title) ? $title . ' - GRIPPI ' : 'GRIPPI '}}</title>
</head>
<body class="bg-base-100 h-screen overflow-hidden">
    {{-- headr section --}}
    <x-header />
    <div class="flex h-[calc(100vh-4rem)] min-h-0">
        <x-sidebar />

        {{-- Main setion --}}
        <main class="flex-1 min-w-0 min-h-0 flex flex-col">
            <x-navbar/>
            {{-- Page content goes here whenever it is called --}}
            <section class="flex-1 p-6 overflow-y-auto min-h-0">
                {{ $slot }}
            </section>
        </main>
    </div>
</body>
</html>