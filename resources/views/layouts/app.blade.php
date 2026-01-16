<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technical Test PT Kalanara Group Indonesia</title>
    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/js/product.js'])
</head>

<body class="bg-gray-50 text-gray-800 font-sans antialiased">
    <nav class="bg-white shadow-sm border-b border-gray-200">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <div class="shrink-0 flex items-center">
                        <a href="{{ route('products.index') }}" class="text-xl font-bold text-gray-900">
                            Technical Test PT Kalanara Group Indonesia
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="py-10">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @yield('content')
        </div>
    </main>
</body>

</html>
