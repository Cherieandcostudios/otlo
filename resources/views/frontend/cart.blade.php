@extends('frontend.layouts.app')

@section('title', 'Cart - Otlo Cafe')

@push('styles')
<style>
.cart-container {
    max-width: 1200px;
    margin: 40px auto;
    padding: 0 20px;
        margin-top: 100px;
}

.cart-header {
    text-align: center;
    margin-bottom: 40px;
}

.cart-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 10px;
}

.cart-content {
    display: grid;
    grid-template-columns: 1fr 350px;
    gap: 40px;
}

.cart-items {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    padding: 30px;
}

.cart-item {
    display: flex;
    align-items: center;
    padding: 20px 0;
    border-bottom: 1px solid #f0f0f0;
}

.cart-item:last-child {
    border-bottom: none;
}

.item-image {
    width: 80px;
    height: 80px;
    border-radius: 8px;
    overflow: hidden;
    margin-right: 20px;
}

.item-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.item-details {
    flex: 1;
}

.item-name {
    font-size: 1.1rem;
    font-weight: 600;
    color: #333;
    margin-bottom: 5px;
}

.item-description {
    color: #666;
    font-size: 0.9rem;
    margin-bottom: 10px;
}

.item-price {
    color: #b40c25;
    font-weight: 600;
    font-size: 1.1rem;
}

.quantity-controls {
    display: flex;
    align-items: center;
    gap: 10px;
    margin: 0 20px;
}

.qty-btn {
    width: 30px;
    height: 30px;
    border: 1px solid #ddd;
    background: #fff;
    border-radius: 4px;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
}

.qty-btn:hover {
    background: #f5f5f5;
}

.qty-input {
    width: 50px;
    text-align: center;
    border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
}

.remove-btn {
    background: #b40c25 ;
    color: #fff;
    border: none;
    padding: 8px 12px;
    border-radius: 4px;
    cursor: pointer;
    font-size: 0.9rem;
}

.remove-btn:hover {
    background: #9a0a20;
}

.cart-summary {
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
    padding: 30px;
    height: fit-content;
}

.summary-title {
    font-size: 1.3rem;
    font-weight: 600;
    margin-bottom: 20px;
    color: #333;
}

.summary-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 15px;
    padding-bottom: 15px;
    border-bottom: 1px solid #f0f0f0;
}

.summary-row:last-child {
    border-bottom: none;
    font-weight: 600;
    font-size: 1.1rem;
}

.checkout-btn {
    width: 100%;
    background: #b40c25;
    color: #fff;
    border: none;
    padding: 15px;
    border-radius: 8px;
    font-size: 1.1rem;
    font-weight: 600;
    cursor: pointer;
    margin-top: 20px;
}

.checkout-btn:hover {
    background: #9a0a20;
}

.empty-cart {
    text-align: center;
    padding: 60px 20px;
    background: #fff;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
}

.empty-cart-icon {
    font-size: 4rem;
    margin-bottom: 20px;
    opacity: 0.5;
}

.empty-cart-text {
    font-size: 1.2rem;
    color: #666;
    margin-bottom: 30px;
}

.continue-shopping {
    background: #b40c25;
    color: #fff;
    text-decoration: none;
    padding: 12px 30px;
    border-radius: 8px;
    font-weight: 600;
}

.continue-shopping:hover {
    background: #9a0a20;
    color: #fff;
}

@media (max-width: 768px) {
    .cart-content {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .cart-container {
        padding: 0 15px;
    }
    
    .cart-item {
        flex-direction: column;
        align-items: flex-start;
        gap: 15px;
    }
    
    .item-image {
        margin-right: 0;
    }
    
    .quantity-controls {
        margin: 0;
    }
}
</style>
@endpush

@section('content')
<div class="cart-container">
    <div class="cart-header">
        <h1 class="cart-title">Your Cafe Order</h1>
        <p class="cart-subtitle">Review your delicious selections</p>
    </div>


        @if($cartItems && $cartItems->count() > 0)
            <div class="cart-content">
                <div class="cart-items">
                    @foreach($cartItems as $item)
                    <div class="cart-item" data-item-id="{{ $item->id }}">
                        <div class="item-image">
                            <img src="{{ $item->menuItem->image ? asset('storage/' . $item->menuItem->image) : 'https://images.unsplash.com/photo-1495474472287-4d71bcdd2085?w=80&h=80&fit=crop' }}" alt="{{ $item->menuItem->name }}">
                        </div>
                        <div class="item-details">
                            <div class="item-name">{{ $item->menuItem->name }}</div>
                            <div class="item-description">{{ Str::limit($item->menuItem->description, 60) }}</div>
                            <div class="item-price">₹{{ $item->menuItem->price }}</div>
                        </div>
                        <div class="quantity-controls">
                            <button class="qty-btn" onclick="updateQuantity({{ $item->menuItem->id }}, {{ $item->quantity - 1 }})">-</button>
                            <input type="number" class="qty-input" value="{{ $item->quantity }}" min="1" onchange="updateQuantity({{ $item->menuItem->id }}, this.value)">
                            <button class="qty-btn" onclick="updateQuantity({{ $item->menuItem->id }}, {{ $item->quantity + 1 }})">+</button>
                        </div>
                        <button class="remove-btn" onclick="removeItem({{ $item->menuItem->id }})">Remove</button>
                    </div>
                    @endforeach
                </div>

                <div class="cart-summary">
                    <h3 class="summary-title">Order Summary</h3>
                    <div class="summary-row">
                        <span>Subtotal ({{ $cartItems->sum('quantity') }} items)</span>
                        <span>₹{{ number_format($total, 2) }}</span>
                    </div>
                    @auth('customer')
                    <div class="summary-row" style="color: #b40c25; border-bottom: none; margin-bottom: 5px;">
                        <span>🎁 Reward Points</span>
                        <span>+{{ floor($total) }} points</span>
                    </div>
                    @endauth
                    <div class="summary-row">
                        <span>Total</span>
                        <span>₹{{ number_format($total, 2) }}</span>
                    </div>
                    
                    {{-- <div class="delivery-options" style="margin: 20px 0; padding: 20px; background: #f8f9fa; border-radius: 8px;">
                        <h4 style="margin-bottom: 15px; font-weight: 600;">How would you like to receive your order?</h4>
                        <div style="display: flex; gap: 10px; margin-bottom: 15px;">
                            <label style="flex: 1; cursor: pointer;">
                                <input type="radio" name="order_type" value="pickup" checked style="margin-right: 8px;">
                                <span style="font-weight: 500;">🏪 Pickup</span>
                                <div style="font-size: 0.85rem; color: #666; margin-top: 5px;">Ready in 15-20 mins</div>
                            </label>
                            <label style="flex: 1; cursor: pointer;">
                                <input type="radio" name="order_type" value="delivery" style="margin-right: 8px;">
                                <span style="font-weight: 500;">🚚 Delivery</span>
                                <div style="font-size: 0.85rem; color: #666; margin-top: 5px;">30-45 mins</div>
                            </label>
                        </div>
                        <div id="pickup-info" style="padding: 10px; background: #e8f5e8; border-radius: 6px; font-size: 0.9rem;">
                            📍 Visit our cafe to collect your freshly prepared order
                        </div>
                        <div id="delivery-info" style="display: none; padding: 10px; background: #e3f2fd; border-radius: 6px; font-size: 0.9rem;">
                            🏠 We'll deliver your order to your doorstep
                        </div>
                    </div> --}}
                    
                    <button class="checkout-btn" onclick="window.location.href='{{ route('frontend.location') }}'">
                        Continue to Checkout
                    </button>
                </div>
            </div>
        @else
            <div class="empty-cart">
                <div class="empty-cart-icon">🛒</div>
                <div class="empty-cart-text">Your cart is empty</div>
                <a href="{{ route('frontend.menu') }}" class="continue-shopping">Continue Order</a>
            </div>
        @endif

</div>

<script>
function updateQuantity(itemId, newQuantity) {
    if (newQuantity < 1) {
        removeItem(itemId);
        return;
    }
    
    fetch(`{{ route('cart.update', '') }}/${itemId}`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            quantity: newQuantity
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            location.reload();
        } else {
            alert('Error updating quantity');
        }
    })
    .catch(error => {
        console.error('Error:', error);
        alert('Error updating quantity');
    });
}

function removeItem(itemId) {
    if (confirm('Remove this item from cart?')) {
        fetch(`{{ route('cart.destroy', '') }}/${itemId}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                location.reload();
            } else {
                alert('Error removing item');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error removing item');
        });
    }
}

function proceedToCheckout() {
    window.location.href = '{{ route('checkout') }}';
}
</script>
@endsection