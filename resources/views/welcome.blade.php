<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Flibber</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

        <!-- Styles -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
<body class="antialiased font-sans bg-gray-50 text-gray-800 dark:bg-gray-900 dark:text-gray-200">
    <div class="min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
        <!-- Background Image -->
        <div class="absolute inset-0">
            <img class="w-full h-full object-cover opacity-20 dark:opacity-30" 
                 src="https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ftse3.mm.bing.net%2Fth%3Fid%3DOIP.64TjU7UEIrHyqk-Jo77sgQHaEK%26pid%3DApi&f=1&ipt=81215c35c9fd12ab115a29c22a1ac779d6ec6b0a40fd25d8ae988d781759ae7d&ipo=images" 
                 alt="Background Image">
        </div>

        <!-- Content Wrapper -->
        <div class="relative z-10 w-full max-w-3xl px-6 lg:px-10">
            <!-- Header -->
            <header class="flex justify-between items-center">
                <h1 class="text-4xl font-bold text-black dark:text-white">
                    Flibber
                </h1>
                @if (Route::has('login'))
                    <livewire:welcome.navigation />
                @endif
            </header>

            <!-- Main Content -->
            <main class="mt-12">
                <!-- Centered Welcome Message -->
                <h2 class="text-2xl font-bold text-center text-black dark:text-white mb-12">
                    Welcome to Flibber
                </h2>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-8 space-y-2 md:space-y-0">
                    <div class="p-6 bg-white dark:bg-gray-700 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold mb-2">Collaborate Seamlessly</h3>
                        <p class="text-gray-800 dark:text-white">
                            Work with researchers, share insights, and get feedback in real-time to enhance the quality and efficiency of your research.
                        </p>
                    </div>
                    <div class="p-6 bg-white dark:bg-gray-700 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold mb-2">AI-driven Insights</h3>
                        <p class="text-gray-800 dark:text-white">
                            Leverage our AI to analyze, organize, and draw meaningful conclusions from complex data and papers.
                        </p>
                    </div>
                    <div class="p-6 bg-white dark:bg-gray-700 rounded-lg shadow-lg">
                        <h3 class="text-xl font-semibold mb-2">Community Engagement</h3>
                        <p class="text-gray-800 dark:text-white">
                            Connect with other researchers, discover their work, and build a network in the research community.
                        </p>
                    </div>
                </div>
            </main>

            <!-- Footer -->
            <footer class="mt-16 py-4 text-center text-sm text-gray-500 dark:text-gray-400">
                Flibber v1.0.0 | Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
            </footer>
        </div>
    </div>
</body>
</html>

