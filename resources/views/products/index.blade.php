@extends('layouts.app')

@section('title', 'Liste des Produits')

@section('content')
    <div class="flex flex-col md:flex-row md:items-center md:justify-between mb-10 gap-4">
        <h1 class="text-4xl font-extrabold tracking-tight">Tous les produits</h1>
        <a href="{{ route('products.create') }}" class="apple-btn bg-purple-600 text-white px-8 py-3 text-lg shadow-lg hover:bg-purple-700">Ajouter un produit</a>
    </div>

    <!-- Recherche -->
    <form method="GET" action="{{ route('products.index') }}" class="mb-12 max-w-xl mx-auto flex items-center gap-2">
        <input type="text" name="search" value="{{ request('search') }}" placeholder="Rechercher un produit..." class="flex-1 px-5 py-3 border border-gray-200 rounded-full focus:ring-2 focus:ring-purple-500 focus:border-transparent text-lg">
        <button type="submit" class="apple-btn bg-gray-900 text-white px-6 py-3 hover:bg-gray-800"><i class="fas fa-search"></i></button>
        @if(request('search'))
            <a href="{{ route('products.index') }}" class="ml-2 text-gray-400 hover:text-gray-600"><i class="fas fa-times-circle"></i></a>
        @endif
    </form>

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
                    <h3 class="text-xl font-semibold mb-2 text-center">{{ $product->name }}</h3>
                    <div class="text-lg text-gray-500 mb-2">{{ number_format($product->price, 2) }} €</div>
                    <div class="text-sm text-gray-400 mb-4">Stock : <span class="font-semibold text-gray-700">{{ $product->quantity }}</span></div>
                    <div class="flex gap-2 w-full">
                        <a href="{{ route('products.show', $product) }}" class="apple-btn bg-gray-900 text-white flex-1 py-2 text-center hover:bg-gray-800">Voir</a>
                        <a href="{{ route('products.edit', $product) }}" class="apple-btn bg-gray-200 text-gray-900 flex-1 py-2 text-center hover:bg-gray-300">Modifier</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="inline w-auto" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="apple-btn bg-red-100 text-red-600 px-4 py-2 hover:bg-red-200" title="Supprimer"><i class="fas fa-trash"></i></button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-12 flex justify-center">
            {{ $products->links() }}
        </div>
    @else
        <div class="text-center py-24">
            <i class="fas fa-box-open text-gray-200 text-7xl mb-6"></i>
            <h3 class="text-2xl font-semibold text-gray-400 mb-4">Aucun produit trouvé</h3>
            <a href="{{ route('products.create') }}" class="apple-btn bg-purple-600 text-white px-8 py-3 mt-4 hover:bg-purple-700">Ajouter un Produit</a>
        </div>
    @endif
@endsection 