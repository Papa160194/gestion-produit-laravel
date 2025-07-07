@extends('layouts.app')

@section('title', $product->name)

@section('content')
    <div class="max-w-5xl mx-auto bg-white rounded-3xl apple-shadow p-10 flex flex-col md:flex-row gap-10 items-center">
        <!-- Image du produit -->
        <div class="flex-shrink-0 w-full md:w-1/2 flex justify-center">
            @if($product->image)
                <img src="{{ Storage::url($product->image) }}" alt="{{ $product->name }}" class="w-72 h-72 object-cover rounded-2xl shadow-md">
            @else
                <div class="w-72 h-72 bg-gray-100 flex items-center justify-center rounded-2xl">
                    <i class="fas fa-image text-gray-300 text-7xl"></i>
                </div>
            @endif
        </div>
        <!-- Infos produit -->
        <div class="flex-1 flex flex-col justify-between h-full">
            <div>
                <h1 class="text-4xl font-extrabold mb-4">{{ $product->name }}</h1>
                <div class="text-2xl text-purple-600 font-bold mb-2">{{ number_format($product->price, 2) }} €</div>
                <div class="text-gray-400 mb-6">Stock : <span class="font-semibold text-gray-700">{{ $product->quantity }}</span></div>
                <p class="text-lg text-gray-600 mb-8">{{ $product->description }}</p>
            </div>
            <div class="flex gap-3 mt-6">
                <a href="{{ route('products.edit', $product) }}" class="apple-btn bg-gray-900 text-white px-8 py-3 hover:bg-gray-800">Modifier</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce produit ?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="apple-btn bg-red-100 text-red-600 px-8 py-3 hover:bg-red-200">Supprimer</button>
                </form>
                <a href="{{ route('products.index') }}" class="apple-btn bg-gray-200 text-gray-900 px-8 py-3 hover:bg-gray-300">Retour</a>
            </div>
            <div class="mt-10 text-sm text-gray-400">
                <span>ID : {{ $product->id }}</span> &middot;
                <span>Créé le : {{ $product->created_at->format('d/m/Y à H:i') }}</span>
                @if($product->updated_at != $product->created_at)
                    &middot; <span>Modifié le : {{ $product->updated_at->format('d/m/Y à H:i') }}</span>
                @endif
            </div>
        </div>
    </div>
@endsection 