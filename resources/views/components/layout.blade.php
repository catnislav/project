@props([
    'title' => 'Project',
])

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>{{ $title }}</title>
    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style>
        .card {
            border: 1px solid #ccc;
            padding: 16px;
            border-radius: 8px;
        }
    </style>
</head>

<body class="max-w-xl mx-auto p-6">
    <header>
        <nav>
            <a href="/" class="underline hover:no-underline">Home</a>
            <a href="/about" class="underline hover:no-underline">About</a>
            <a href="/contact" class="underline hover:no-underline">Contact</a>
            <a href="/ideas" class="underline hover:no-underline">Ideas</a>
        </nav>

        <h1 class="text-lg font-medium mt-6">{{ $title }}</h1>
    </header>

    <main class="py-6">
        {{ $slot }}
    </main>
</body>
</html>
