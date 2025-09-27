@extends('frontend.layouts.app')

@section('title', 'Menu - Otlo Cafe')

@section('content')
<!-- Menu Tabs -->
<div class="menu-tabs">
    <a href="{{ route('frontend.menu') }}" class="menu-tab active">Menu</a>
    <a href="{{ route('frontend.feature') }}" class="menu-tab">Featured</a>
    <a href="javascript:void(0)" class="menu-tab">Previous</a>
    <a href="javascript:void(0)" class="menu-tab">Favorites</a>
</div>

<!-- Menu Container -->
<div class="menu-container">
    <!-- Sidebar -->
    <div class="menu-sidebar">
        @foreach($categories as $index => $category)
        <div class="menu-category">
            <div class="category-title {{ $index === 0 ? 'active' : '' }}" onclick="showCategory('{{ $category->id }}')">{{ $category->name }}</div>
            <ul class="category-items">
                @foreach($category->subCategories as $subIndex => $subCategory)
                <li><a href="javascript:void(0)" class="{{ $index === 0 && $subIndex === 0 ? 'active' : '' }}" onclick="filterSubCategory('{{ $subCategory->id }}'); this.parentNode.parentNode.querySelectorAll('a').forEach(a => a.classList.remove('active')); this.classList.add('active');">{{ $subCategory->name }}</a></li>
                @endforeach
            </ul>
        </div>
        @endforeach
    </div>

    <!-- Main Content -->
    <div class="menu-content">
        <div class="menu-header">
            <h1 class="menu-title">Menu</h1>
            <h2 class="menu-subtitle" id="current-category">{{ $categories->first()->name ?? 'Menu' }}</h2>
        </div>

        @foreach($categories as $categoryIndex => $category)
        <!-- {{ $category->name }} Section -->
        <div class="menu-section" id="category-{{ $category->id }}" style="{{ $categoryIndex === 0 ? '' : 'display: none;' }}">
            <div class="drinks-grid">
                <!-- Dynamic Subcategory Cards -->
                @foreach($category->subCategories as $subCategory)
                <div class="subcategory-card" data-category="{{ $category->id }}" data-subcategory="{{ $subCategory->id }}" onclick="filterSubCategory('{{ $subCategory->id }}')">
                    <div class="menu-item-image">
                        <img src="{{ $subCategory->image ? asset('storage/' . $subCategory->image) : 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=120&h=120&fit=crop' }}" alt="{{ $subCategory->name }}">
                    </div>
                    <div class="menu-item-middle">
                        <h3 class="menu-item-name">{{ $subCategory->name }}</h3>
                        <p class="menu-item-desc">{{ $subCategory->menuItems->count() }} items available</p>
                    </div>
                    <div class="menu-item-actions">
                        <button class="menu-add-cart-btn" onclick="event.stopPropagation(); filterSubCategory('{{ $subCategory->id }}')">
                            View Items
                        </button>
                    </div>
                </div>
                @endforeach
                
                <!-- Menu Items -->
                @foreach($category->subCategories as $subCategoryIndex => $subCategory)
                    @foreach($subCategory->menuItems as $menuItem)
                    <div class="menu-item-card" data-subcategory="{{ $subCategory->id }}" data-category="{{ $category->id }}" data-type="{{ strtolower(str_replace(' ', '-', $subCategory->name)) }}" style="display: none;" >
                        <div class="menu-item-image">
                            <img src="{{ $menuItem->image ? asset('storage/' . $menuItem->image) : 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=120&h=120&fit=crop' }}" alt="{{ $menuItem->name }}">
                        </div>
                        <div class="menu-item-middle">
                            <h3 class="menu-item-name">{{ $menuItem->name }}</h3>
                            <p class="menu-item-desc">{{ Str::limit($menuItem->description, 40) }}</p>
                            <div class="menu-item-price">₹{{ $menuItem->price }}</div>
                        </div>
                        <div class="menu-item-actions">
                            <button class="menu-add-cart-btn" onclick="event.stopPropagation(); addToCart({{ $menuItem->id }})">
                                Add to Cart
                            </button>
                            <div class="menu-item-rewards">{{ intval($menuItem->price) }} reward points</div>
                        </div>
                    </div>
                    @endforeach
                @endforeach
            </div>
        </div>
        @endforeach
    </div>
</div>

<!-- Bottom Bar -->
<div class="menu-bottom-bar">
    <div style="display: flex; align-items: center; gap: 20px;">
        <div class="availability-notice">For item availability</div>
        <a href="{{ route('frontend.location') }}" class="store-selector">Choose a store</a>
    </div>
    <a href="{{ route('frontend.cart') }}" class="cart-icon">
        🛒
        <div class="cart-count" id="cart-count">0</div>
    </a>
</div>

<script>
function showCategory(categoryId) {
    document.querySelectorAll('.menu-section').forEach(section => {
        section.style.display = 'none';
    });
    
    const categorySection = document.getElementById('category-' + categoryId);
    if (categorySection) {
        categorySection.style.display = 'block';
    }
    
    document.querySelectorAll('.category-title').forEach(title => {
        title.classList.remove('active');
    });
    event.target.classList.add('active');
    
    document.getElementById('current-category').textContent = event.target.textContent;
    
    document.querySelectorAll('.menu-item-card').forEach(item => {
        item.style.display = 'none';
    });
    
    document.querySelectorAll('.subcategory-card').forEach(card => {
        if (card.dataset.category == categoryId) {
            card.style.display = 'block';
        } else {
            card.style.display = 'none';
        }
    });
    
    const currentCategory = event.target.closest('.menu-category');
    if (currentCategory) {
        currentCategory.querySelectorAll('.category-items a').forEach(link => {
            link.classList.remove('active');
        });
    }
}

function filterSubCategory(subCategoryId) {
    const subCategoryCard = document.querySelector(`[data-subcategory="${subCategoryId}"]`);
    if (subCategoryCard) {
        const categoryId = subCategoryCard.dataset.category;
        
        document.querySelectorAll('.menu-section').forEach(section => {
            section.style.display = 'none';
        });
        document.getElementById('category-' + categoryId).style.display = 'block';
        
        document.querySelectorAll('.category-title').forEach(title => {
            title.classList.remove('active');
        });
        document.querySelector(`[onclick="showCategory('${categoryId}')"]`).classList.add('active');
        
        const categoryName = document.querySelector(`[onclick="showCategory('${categoryId}')"]`).textContent;
        document.getElementById('current-category').textContent = categoryName;
    }
    
    document.querySelectorAll('.subcategory-card').forEach(card => {
        card.style.display = 'none';
    });
    
    document.querySelectorAll('.menu-item-card').forEach(item => {
        item.style.display = 'none';
    });
    
    document.querySelectorAll('.menu-item-card').forEach(item => {
        if (item.dataset.subcategory == subCategoryId) {
            item.style.display = 'block';
        }
    });
}

document.addEventListener('DOMContentLoaded', function() {
    const firstCategory = document.querySelector('.category-title.active');
    if (firstCategory) {
        const categoryId = firstCategory.getAttribute('onclick').match(/'([^']+)'/)[1];
        const firstSubCategory = document.querySelector('.category-items a.active');
        if (firstSubCategory) {
            const subCategoryId = firstSubCategory.getAttribute('onclick').match(/'([^']+)'/)[1];
            filterSubCategory(subCategoryId);
        }
    }
});

// function viewMenuItem(menuItemId) {
//     window.location.href = `/frontend/menu-item/${menuItemId}`;
// }

function addToCart(menuItemId) {
    fetch('{{ route('cart.store') }}', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            menu_item_id: menuItemId,
            quantity: 1
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            const cartCount = document.getElementById('cart-count');
            cartCount.textContent = parseInt(cartCount.textContent) + 1;
            alert('Item added to cart!');
        } else {
            alert(data.message || 'Error adding item to cart');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error adding item to cart');
    });
}
</script>

@endsection