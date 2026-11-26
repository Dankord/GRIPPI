<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title> {{ isset($title) ? $title . ' - GRIPPI ' : 'GRIPPI '}}</title>
</head>
<body class="bg-base-100 h-screen overflow-hidden">
    @if(session('success'))
        <div class="toast toast-top toast-center mt-16 z-[9999]">
            <div class="alert alert-success text-black animate-fade-out">
                <svg mlns="<http://www.w3.org/2000/svg>" class="h-6 w-6 shrink-0 stroke-current" fill="none" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <span> {{ session('success') }}</span>
            </div>
        </div>
    @endif
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