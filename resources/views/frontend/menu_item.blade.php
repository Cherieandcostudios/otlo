@extends('frontend.layouts.app')

@section('title', $menuItem->name . ' - Otlo Cafe')

@section('content')
<div class="menu-item-container">
    <div class="menu-item-header">
        <a href="{{ route('frontend.menu') }}" class="back-btn">← Back to Menu</a>
        <div class="breadcrumb">
            {{ $menuItem->subCategory->category->name }} > {{ $menuItem->subCategory->name }} > {{ $menuItem->name }}
        </div>
    </div>

    <div class="menu-item-content">
        <div class="menu-item-image">
            <img src="{{ $menuItem->image ? asset('storage/' . $menuItem->image) : 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=400&h=400&fit=crop' }}" alt="{{ $menuItem->name }}">
        </div>
        
        <div class="menu-item-details">
            <h1 class="menu-item-title">{{ $menuItem->name }}</h1>
            <p class="menu-item-description">{{ $menuItem->description }}</p>
            
            <div class="menu-item-price">
                <span class="price">${{ $menuItem->price }}</span>
            </div>
            
            <div class="menu-item-actions">
                <div class="quantity-selector">
                    <button type="button" onclick="decreaseQuantity()">-</button>
                    <input type="number" id="quantity" value="1" min="1" max="10">
                    <button type="button" onclick="increaseQuantity()">+</button>
                </div>
                
                <button class="add-to-cart-btn-large" onclick="addToCart({{ $menuItem->id }})">
                    Add to Cart - $<span id="total-price">{{ $menuItem->price }}</span>
                </button>
            </div>
        </div>
    </div>
</div>

<style>
.menu-item-container {
    max-width: 1200px;
    margin: 0 auto;
    padding: 20px;
}

.menu-item-header {
    margin-bottom: 30px;
}

.back-btn {
    color: #00704a;
    text-decoration: none;
    font-weight: 500;
    margin-bottom: 10px;
    display: inline-block;
}

.breadcrumb {
    color: #666;
    font-size: 14px;
}

.menu-item-content {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 40px;
    align-items: start;
}

.menu-item-image img {
    width: 100%;
    height: 400px;
    object-fit: cover;
    border-radius: 8px;
}

.menu-item-title {
    font-size: 2rem;
    font-weight: bold;
    margin-bottom: 15px;
    color: #1e3932;
}

.menu-item-description {
    color: #666;
    line-height: 1.6;
    margin-bottom: 20px;
}

.menu-item-price {
    margin-bottom: 30px;
}

.price {
    font-size: 1.5rem;
    font-weight: bold;
    color: #00704a;
}

.menu-item-actions {
    display: flex;
    align-items: center;
    gap: 20px;
}

.quantity-selector {
    display: flex;
    align-items: center;
    border: 1px solid #ddd;
    border-radius: 4px;
}

.quantity-selector button {
    background: none;
    border: none;
    padding: 10px 15px;
    cursor: pointer;
    font-size: 18px;
}

.quantity-selector input {
    border: none;
    width: 60px;
    text-align: center;
    padding: 10px 5px;
}

.add-to-cart-btn-large {
    background: #00704a;
    color: white;
    border: none;
    padding: 15px 30px;
    border-radius: 25px;
    font-weight: bold;
    cursor: pointer;
    font-size: 16px;
}

.add-to-cart-btn-large:hover {
    background: #005a3a;
}

@media (max-width: 768px) {
    .menu-item-content {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .menu-item-actions {
        flex-direction: column;
        align-items: stretch;
        gap: 15px;
    }
}
</style>

<script>
const basePrice = {{ $menuItem->price }};

function increaseQuantity() {
    const quantityInput = document.getElementById('quantity');
    const currentValue = parseInt(quantityInput.value);
    if (currentValue < 10) {
        quantityInput.value = currentValue + 1;
        updateTotalPrice();
    }
}

function decreaseQuantity() {
    const quantityInput = document.getElementById('quantity');
    const currentValue = parseInt(quantityInput.value);
    if (currentValue > 1) {
        quantityInput.value = currentValue - 1;
        updateTotalPrice();
    }
}

function updateTotalPrice() {
    const quantity = parseInt(document.getElementById('quantity').value);
    const totalPrice = (basePrice * quantity).toFixed(2);
    document.getElementById('total-price').textContent = totalPrice;
}

function addToCart(menuItemId) {
    const quantity = parseInt(document.getElementById('quantity').value);
    
    fetch('/cart', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            menu_item_id: menuItemId,
            quantity: quantity
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert(`${quantity} item(s) added to cart!`);
            // Redirect to cart or menu
            window.location.href = '{{ route("frontend.cart") }}';
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Please login to add items to cart');
        window.location.href = '{{ route("frontend.signin") }}';
    });
}

// Update total price on quantity input change
document.getElementById('quantity').addEventListener('input', updateTotalPrice);
</script>
@endsection