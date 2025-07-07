@extends('layouts.app')

@section('title', 'Accueil - Gestion de Produits')

@section('content')
    <!-- Hero Apple Style -->
    <section class="w-full text-center mb-16">
        <h1 class="text-5xl md:text-7xl font-extrabold tracking-tight mb-6 mt-8">Gérez vos produits<br><span class="text-purple-600">simplement</span></h1>
        <p class="text-xl md:text-2xl text-gray-500 mb-10 max-w-2xl mx-auto">Une interface élégante et moderne pour gérer votre inventaire comme chez Apple.</p>
        <a href="{{ route('products.create') }}" class="apple-btn bg-purple-600 text-white px-8 py-4 text-lg shadow-lg hover:bg-purple-700">Ajouter un produit</a>
    </section>

    <!-- Produits récents façon Apple Store -->
    <section class="mb-20">
        <h2 class="text-3xl font-bold text-center mb-10">Produits récents</h2>
        @if($products->count() > 0)
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 gap-10">
                @foreach($products as $product)
                    <div class="bg-white rounded-3xl apple-shadow p-6 flex flex-col items-center hover:scale-105 transition-transform">
                        @if($product->image)
                            <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-40 h-40 object-cover rounded-2xl mb-4">
                        @else
                            <div class="w-40 h-40 bg-gray-100 flex items-center justify-center rounded-2xl mb-4">
                                <i class="fas fa-image text-gray-300 text-5xl"></i>
                            </div>
                        @endif
                        <h3 class="text-xl font-semibold mb-2">{{ $product->name }}</h3>
                        <div class="text-lg text-gray-500 mb-2">{{ number_format($product->price, 2) }} €</div>
                        <a href="{{ route('products.show', $product) }}" class="apple-btn bg-gray-900 text-white px-6 py-2 mt-2 hover:bg-gray-800">Voir le produit</a>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-12">
                <i class="fas fa-box-open text-gray-200 text-6xl mb-4"></i>
                <h3 class="text-xl font-semibold text-gray-400 mb-2">Aucun produit trouvé</h3>
                <a href="{{ route('products.create') }}" class="apple-btn bg-purple-600 text-white px-6 py-3 mt-4 hover:bg-purple-700">Ajouter un Produit</a>
            </div>
        @endif
    </section>

    <!-- Statistiques -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-12">
        <div class="bg-white rounded-lg shadow-md p-6 card-hover">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-blue-100 text-blue-600">
                    <i class="fas fa-box text-2xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Total Produits</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $products->count() }}</p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 card-hover">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-green-100 text-green-600">
                    <i class="fas fa-dollar-sign text-2xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Valeur Totale</p>
                    <p class="text-2xl font-semibold text-gray-900">
                        {{ number_format($products->sum('price'), 2) }} €
                    </p>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-lg shadow-md p-6 card-hover">
            <div class="flex items-center">
                <div class="p-3 rounded-full bg-yellow-100 text-yellow-600">
                    <i class="fas fa-cubes text-2xl"></i>
                </div>
                <div class="ml-4">
                    <p class="text-sm font-medium text-gray-600">Stock Total</p>
                    <p class="text-2xl font-semibold text-gray-900">{{ $products->sum('quantity') }}</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Fonctionnalités -->
    <div class="bg-white rounded-lg shadow-md p-8">
        <h2 class="text-3xl font-bold text-gray-900 text-center mb-8">Fonctionnalités</h2>
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <div class="text-center">
                <div class="bg-purple-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-plus text-purple-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Ajout Simple</h3>
                <p class="text-gray-600">Ajoutez facilement de nouveaux produits avec images et descriptions détaillées</p>
            </div>
            <div class="text-center">
                <div class="bg-blue-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-edit text-blue-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Modification Rapide</h3>
                <p class="text-gray-600">Modifiez les informations de vos produits en quelques clics</p>
            </div>
            <div class="text-center">
                <div class="bg-green-100 rounded-full w-16 h-16 flex items-center justify-center mx-auto mb-4">
                    <i class="fas fa-chart-bar text-green-600 text-2xl"></i>
                </div>
                <h3 class="text-xl font-semibold text-gray-900 mb-2">Suivi en Temps Réel</h3>
                <p class="text-gray-600">Suivez vos stocks et valeurs en temps réel avec des statistiques détaillées</p>
            </div>
        </div>
    </div>
@endsection 