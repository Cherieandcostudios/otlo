@extends('frontend.layouts.app')

@section('title', 'Checkout - Otlo Cafe')

@push('styles')
<style>
.checkout-container {
    max-width: 800px;
    margin: 100px auto 50px;
    padding: 0 20px;
}
.checkout-form {
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    padding: 40px;
}
.form-section {
    margin-bottom: 30px;
}
.section-title {
    font-size: 18px;
    font-weight: 600;
    margin-bottom: 15px;
    color: #333;
}
.form-group {
    margin-bottom: 20px;
}
.form-label {
    display: block;
    margin-bottom: 5px;
    font-weight: 500;
    color: #333;
}
.form-input {
    width: 100%;
    padding: 12px 16px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    font-size: 16px;
    outline: none;
    transition: border-color 0.3s ease;
}
.form-input:focus {
    border-color: #b40c25;
}
.payment-options {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 15px;
    margin-top: 15px;
}
.payment-option {
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    padding: 20px;
    text-align: center;
    cursor: pointer;
    transition: all 0.3s ease;
}
.payment-option:hover {
    border-color: #b40c25;
}
.payment-option.selected {
    border-color: #b40c25;
    background: #fff5f5;
}
.payment-icon {
    font-size: 24px;
    margin-bottom: 10px;
}
.order-summary {
    background: #f8f9fa;
    border-radius: 8px;
    padding: 20px;
    margin-bottom: 30px;
}
.summary-item {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}
.summary-total {
    border-top: 1px solid #ddd;
    padding-top: 10px;
    font-weight: 600;
    font-size: 18px;
}
.checkout-btn {
    width: 100%;
    background: #b40c25;
    color: white;
    border: none;
    padding: 15px;
    border-radius: 8px;
    font-size: 18px;
    font-weight: 600;
    cursor: pointer;
    transition: background 0.3s ease;
}
.checkout-btn:hover {
    background: #9a0a20;
}
@media (max-width: 768px) {
    .payment-options {
        grid-template-columns: 1fr;
    }
    .checkout-form {
        padding: 20px;
    }
}
</style>
@endpush

@section('content')
<div class="checkout-container">
    <div class="checkout-form">
        <h1 style="font-size: 28px; font-weight: 700; margin-bottom: 30px; text-align: center;">Checkout</h1>
        
        <div class="order-summary">
            <h3 style="margin-bottom: 15px;">Order Summary</h3>
            @if($cartItems->count() > 0)
                @foreach($cartItems as $item)
                <div class="summary-item">
                    <span>{{ $item->menuItem->name }} × {{ $item->quantity }}</span>
                    <span>₹{{ number_format($item->total_price, 2) }}</span>
                </div>
                @endforeach
                <div class="summary-item">
                    <span>Subtotal ({{ $itemCount }} items)</span>
                    <span>₹{{ number_format($total, 2) }}</span>
                </div>
                <div class="summary-item summary-total">
                    <span>Total</span>
                    <span>₹{{ number_format($total, 2) }}</span>
                </div>
            @else
                <div class="summary-item">
                    <span>No items in cart</span>
                    <span>₹0.00</span>
                </div>
            @endif
        </div>

        <form id="checkoutForm">
            <div class="form-section">
                <h3 class="section-title">Contact Information</h3>
                <div class="form-group">
                    <label class="form-label">Full Name</label>
                    <input type="text" class="form-input" name="name" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Phone Number</label>
                    <input type="tel" class="form-input" name="phone" required>
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input type="email" class="form-input" name="email" required>
                </div>
            </div>

            <div class="form-section" id="addressSection" style="display:none;">
                <h3 class="section-title">Delivery Details</h3>
                <div class="form-group">
                    <label class="form-label">Street Address</label>
                    <input type="text" class="form-input" name="address">
                </div>
                <div class="form-group">
                    <label class="form-label">City</label>
                    <input type="text" class="form-input" name="city">
                </div>
                <div class="form-group">
                    <label class="form-label">Postal Code</label>
                    <input type="text" class="form-input" name="postal_code">
                </div>
                <div class="form-group">
                    <label class="form-label">Delivery Time</label>
                    <select class="form-input" name="delivery_time">
                        <option value="">Select delivery time</option>
                        <option value="30-45 mins">30-45 minutes</option>
                        <option value="1-1.5 hours">1-1.5 hours</option>
                        <option value="1.5-2 hours">1.5-2 hours</option>
                    </select>
                </div>
            </div>



            <div class="form-section">
                <h3 class="section-title">Payment Method</h3>
                <div class="payment-options">
                    <div class="payment-option selected" data-payment="cod">
                        <div class="payment-icon">💵</div>
                        <div>Cash on Delivery</div>
                    </div>
                    <div class="payment-option" data-payment="razorpay">
                        <div class="payment-icon">💳</div>
                        <div>Online Payment</div>
                    </div>
                </div>
            </div>

            <button type="submit" class="checkout-btn">Place Order</button>
        </form>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const orderType = sessionStorage.getItem('orderType');
    const addressSection = document.getElementById('addressSection');
    
    if (orderType === 'delivery') {
        addressSection.style.display = 'block';
        addressSection.querySelectorAll('input').forEach(input => input.required = true);
    }

    // Payment option selection
    document.querySelectorAll('.payment-option').forEach(option => {
        option.addEventListener('click', function() {
            document.querySelectorAll('.payment-option').forEach(opt => opt.classList.remove('selected'));
            this.classList.add('selected');
        });
    });

    // Form submission
    document.getElementById('checkoutForm').addEventListener('submit', function(e) {
        e.preventDefault();
        
        const selectedPayment = document.querySelector('.payment-option.selected').dataset.payment;
        
        if (selectedPayment === 'cod') {
            // Process COD order
            alert('Order placed successfully! Pay on delivery.');
            window.location.href = '/';
        } else {
            // Process Razorpay payment
            processRazorpayPayment();
        }
    });
});

function processRazorpayPayment() {
    const options = {
        key: 'rzp_test_1234567890', // Replace with your Razorpay key
        amount: {{ $total * 100 }}, // Amount in paise
        currency: 'INR',
        name: 'Otlo Cafe',
        description: 'Order Payment',
        image: '{{ asset("images/logo.jpg") }}',
        handler: function(response) {
            alert('Payment successful! Order ID: ' + response.razorpay_payment_id);
            window.location.href = '/';
        },
        prefill: {
            name: document.querySelector('input[name="name"]').value,
            email: document.querySelector('input[name="email"]').value,
            contact: document.querySelector('input[name="phone"]').value
        },
        theme: {
            color: '#b40c25'
        }
    };
    
    const rzp = new Razorpay(options);
    rzp.open();
}
</script>
@endpush