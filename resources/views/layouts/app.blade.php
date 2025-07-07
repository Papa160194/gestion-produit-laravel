<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Gestion de Produits')</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body { font-family: 'Inter', 'San Francisco', 'Segoe UI', Arial, sans-serif; }
        .apple-shadow { box-shadow: 0 4px 24px 0 rgba(0,0,0,0.06); }
        .apple-btn { border-radius: 9999px; font-weight: 500; transition: all 0.2s; }
        .apple-btn:hover { box-shadow: 0 2px 8px 0 rgba(80,80,80,0.10); transform: translateY(-2px) scale(1.03); }
        .mobile-menu { transform: translateX(-100%); transition: transform 0.3s ease-in-out; }
        .mobile-menu.open { transform: translateX(0); }
    </style>
</head>
<body class="bg-white min-h-screen text-gray-900">
    <!-- Header Apple Style -->
    <header class="w-full bg-white apple-shadow sticky top-0 z-30">
        <div class="max-w-7xl mx-auto flex justify-between items-center h-16 px-4">
            <!-- Logo -->
            <a href="{{ route('home') }}" class="flex items-center space-x-2">
                <span class="inline-block w-7 h-7 bg-gradient-to-tr from-gray-200 to-gray-400 rounded-2xl flex items-center justify-center">
                    <i class="fas fa-cube text-gray-700 text-lg"></i>
                </span>
                <span class="font-bold text-xl tracking-tight">GestionProduit</span>
            </a>

            <!-- Desktop Navigation -->
            <nav class="hidden md:flex items-center space-x-6">
                <a href="{{ route('home') }}" class="hover:text-purple-600 transition-colors duration-200">Accueil</a>
                <a href="{{ route('products.index') }}" class="hover:text-purple-600 transition-colors duration-200">Produits</a>
                <a href="{{ route('products.create') }}" class="apple-btn bg-purple-600 text-white px-5 py-2 ml-2 hover:bg-purple-700">Nouveau</a>
            </nav>

            <!-- Mobile Menu Button -->
            <button id="mobile-menu-btn" class="md:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors duration-200">
                <i class="fas fa-bars text-gray-700 text-xl"></i>
            </button>
        </div>

        <!-- Mobile Navigation -->
        <div id="mobile-menu" class="mobile-menu md:hidden fixed top-16 left-0 w-full h-screen bg-white z-20">
            <div class="flex flex-col items-center justify-center h-full space-y-8">
                <a href="{{ route('home') }}" class="text-2xl font-medium hover:text-purple-600 transition-colors duration-200">Accueil</a>
                <a href="{{ route('products.index') }}" class="text-2xl font-medium hover:text-purple-600 transition-colors duration-200">Produits</a>
                <a href="{{ route('products.create') }}" class="apple-btn bg-purple-600 text-white px-8 py-3 text-lg hover:bg-purple-700">Nouveau Produit</a>
            </div>
        </div>
    </header>

    <!-- Flash messages -->
    @if(session('success'))
        <div class="max-w-2xl mx-auto mt-6 px-4">
            <div class="bg-green-50 border border-green-200 text-green-700 px-4 py-3 rounded-xl shadow-sm flex items-center">
                <i class="fas fa-check-circle mr-2"></i>
                <span>{{ session('success') }}</span>
            </div>
        </div>
    @endif
    @if(session('error'))
        <div class="max-w-2xl mx-auto mt-6 px-4">
            <div class="bg-red-50 border border-red-200 text-red-700 px-4 py-3 rounded-xl shadow-sm flex items-center">
                <i class="fas fa-exclamation-circle mr-2"></i>
                <span>{{ session('error') }}</span>
            </div>
        </div>
    @endif

    <!-- Main content -->
    <main class="max-w-7xl mx-auto px-4 py-12">
        @yield('content')
    </main>

    <!-- Footer Apple Style -->
    <footer class="w-full bg-gray-50 border-t border-gray-100 py-8 mt-16">
        <div class="max-w-7xl mx-auto text-center text-gray-400 text-sm px-4">
            <span>&copy; {{ date('Y') }} GestionProduit. Inspiré par Apple. Projet étudiant.</span>
        </div>
    </footer>

    <!-- Mobile Menu JavaScript -->
    <script>
        const mobileMenuBtn = document.getElementById('mobile-menu-btn');
        const mobileMenu = document.getElementById('mobile-menu');
        const menuIcon = mobileMenuBtn.querySelector('i');

        mobileMenuBtn.addEventListener('click', function() {
            mobileMenu.classList.toggle('open');
            if (mobileMenu.classList.contains('open')) {
                menuIcon.classList.remove('fa-bars');
                menuIcon.classList.add('fa-times');
            } else {
                menuIcon.classList.remove('fa-times');
                menuIcon.classList.add('fa-bars');
            }
        });

        // Fermer le menu en cliquant sur un lien
        const mobileLinks = mobileMenu.querySelectorAll('a');
        mobileLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.remove('open');
                menuIcon.classList.remove('fa-times');
                menuIcon.classList.add('fa-bars');
            });
        });

        // Fermer le menu en cliquant en dehors
        document.addEventListener('click', function(event) {
            if (!mobileMenuBtn.contains(event.target) && !mobileMenu.contains(event.target)) {
                mobileMenu.classList.remove('open');
                menuIcon.classList.remove('fa-times');
                menuIcon.classList.add('fa-bars');
            }
        });
    </script>
</body>
</html> 