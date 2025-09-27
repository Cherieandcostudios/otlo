@extends('layouts.main')

@section('content')
<div class="container mx-auto px-4 py-6">
    <h1 class="text-3xl font-bold text-center mb-8">Café Menu</h1>

    @if(session('status'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-4">{{ session('status') }}</div>
    @endif

    @foreach($categories as $category)
    <div class="mb-12">
        <h2 class="text-2xl font-bold mb-6 text-gray-800 border-b-2 border-gray-200 pb-2">{{ $category->name }}</h2>
        
        @foreach($category->subCategories as $subCategory)
        <div class="mb-8">
            <h3 class="text-xl font-semibold mb-4 text-gray-700">{{ $subCategory->name }}</h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($subCategory->menuItems as $item)
                <div class="bg-white rounded-lg shadow-md overflow-hidden hover:shadow-lg transition-shadow">
                    @if($item->image)
                        <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" class="w-full h-48 object-cover">
                    @else
                        <div class="w-full h-48 bg-gray-200 flex items-center justify-center">
                            <span class="text-gray-500">No Image</span>
                        </div>
                    @endif
                    
                    <div class="p-4">
                        <h4 class="font-semibold text-lg mb-2">{{ $item->name }}</h4>
                        @if($item->description)
                            <p class="text-gray-600 text-sm mb-3">{{ $item->description }}</p>
                        @endif
                        
                        <div class="flex justify-between items-center">
                            <span class="text-xl font-bold text-green-600">₹{{ $item->price }}</span>
                            
                            @auth
                                <form method="POST" action="{{ route('cart.store') }}" class="flex items-center space-x-2">
                                    @csrf
                                    <input type="hidden" name="menu_item_id" value="{{ $item->id }}">
                                    <input type="number" name="quantity" value="1" min="1" max="10" 
                                           class="w-16 px-2 py-1 border border-gray-300 rounded text-center">
                                    <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 text-sm">
                                        Add to Cart
                                    </button>
                                </form>
                            @else
                                <a href="{{ route('login') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 text-sm">
                                    Login to Order
                                </a>
                            @endauth
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
    @endforeach

    @auth
        <div class="fixed bottom-4 right-4">
            <a href="{{ route('cart.index') }}" class="bg-green-500 text-white px-6 py-3 rounded-full shadow-lg hover:bg-green-600 flex items-center space-x-2">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4m0 0L7 13m0 0l-1.5 6M7 13l-1.5-6M17 13v6a2 2 0 01-2 2H9a2 2 0 01-2-2v-6"></path>
                </svg>
                <span>View Cart</span>
            </a>
        </div>
    @endauth
</div>
@endsection