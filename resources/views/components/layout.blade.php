<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    <title> {{ isset($title) ? $title . ' - GRIPPI ' : 'GRIPPI '}}</title>
</head>
<body class="bg-slate-900">
    {{ $slot }}
</body>
</html>