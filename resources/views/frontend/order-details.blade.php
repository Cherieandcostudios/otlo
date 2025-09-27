@extends('frontend.layouts.app')

@section('title', 'Order Details - Otlo Cafe')

@push('styles')
<style>
.order-container {
    max-width: 800px;
    margin: 100px auto 50px;
    padding: 0 20px;
}
.order-card {
    background: white;
    border-radius: 12px;
    box-shadow: 0 4px 20px rgba(0,0,0,0.1);
    padding: 40px;
    margin-bottom: 20px;
}
.order-header {
    text-align: center;
    margin-bottom: 30px;
    padding-bottom: 20px;
    border-bottom: 2px solid #e0e0e0;
}
.order-number {
    font-size: 24px;
    font-weight: 700;
    color: #b40c25;
    margin-bottom: 10px;
}
.order-status {
    display: inline-block;
    padding: 8px 16px;
    border-radius: 20px;
    font-weight: 600;
    text-transform: uppercase;
    font-size: 12px;
}
.status-pending { background: #fff3cd; color: #856404; }
.status-confirmed { background: #d4edda; color: #155724; }
.status-preparing { background: #cce5ff; color: #004085; }
.status-ready { background: #d1ecf1; color: #0c5460; }
.status-completed { background: #d4edda; color: #155724; }
.order-info {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 20px;
    margin-bottom: 30px;
}
.info-item {
    padding: 15px;
    background: #f8f9fa;
    border-radius: 8px;
}
.info-label {
    font-weight: 600;
    color: #666;
    font-size: 14px;
    margin-bottom: 5px;
}
.info-value {
    font-size: 16px;
    color: #333;
}
.order-items {
    margin-bottom: 30px;
}
.item-row {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 15px 0;
    border-bottom: 1px solid #e0e0e0;
}
.item-details {
    flex: 1;
}
.item-name {
    font-weight: 600;
    margin-bottom: 5px;
}
.item-quantity {
    color: #666;
    font-size: 14px;
}
.item-price {
    font-weight: 600;
    color: #b40c25;
}
.order-total {
    background: #f8f9fa;
    padding: 20px;
    border-radius: 8px;
    margin-bottom: 30px;
}
.total-row {
    display: flex;
    justify-content: space-between;
    margin-bottom: 10px;
}
.total-final {
    font-size: 18px;
    font-weight: 700;
    border-top: 1px solid #ddd;
    padding-top: 10px;
}
.reward-info {
    background: linear-gradient(135deg, #b40c25, #d63447);
    color: white;
    padding: 20px;
    border-radius: 8px;
    text-align: center;
}
@media (max-width: 768px) {
    .order-info {
        grid-template-columns: 1fr;
    }
    .order-card {
        padding: 20px;
    }
}
</style>
@endpush

@section('content')
<div class="order-container">
    <div class="order-card">
        <div class="order-header">
            <div class="order-number">{{ $order->order_number }}</div>
            <div class="order-status status-{{ $order->order_status }}">{{ ucfirst($order->order_status) }}</div>
        </div>

        <div class="order-info">
            <div class="info-item">
                <div class="info-label">Order Type</div>
                <div class="info-value">{{ ucfirst(str_replace('_', ' ', $order->order_type)) }}</div>
            </div>
            <div class="info-item">
                <div class="info-label">Payment Method</div>
                <div class="info-value">{{ ucfirst($order->payment_method) }}</div>
            </div>
            @if($order->order_date)
            <div class="info-item">
                <div class="info-label">{{ $order->order_type === 'pickup' ? 'Pickup Date' : 'Order Date' }}</div>
                <div class="info-value">{{ \Carbon\Carbon::parse($order->order_date)->format('M d, Y') }}</div>
            </div>
            @endif
            @if($order->order_time)
            <div class="info-item">
                <div class="info-label">{{ $order->order_type === 'pickup' ? 'Pickup Time' : 'Order Time' }}</div>
                <div class="info-value">{{ \Carbon\Carbon::parse($order->order_time)->format('h:i A') }}</div>
            </div>
            @endif
        </div>

        @if($order->delivery_address)
        <div class="info-item" style="margin-bottom: 30px;">
            <div class="info-label">Delivery Address</div>
            <div class="info-value">{{ $order->delivery_address }}</div>
        </div>
        @endif

        <div class="order-items">
            <h3 style="margin-bottom: 20px; font-weight: 600;">Order Items</h3>
            @foreach($order->orderItems as $item)
            <div class="item-row">
                <div class="item-details">
                    <div class="item-name">{{ $item->menuItem->name }}</div>
                    <div class="item-quantity">Quantity: {{ $item->quantity }} × ₹{{ $item->price }}</div>
                </div>
                <div class="item-price">₹{{ $item->total_price }}</div>
            </div>
            @endforeach
        </div>

        <div class="order-total">
            <div class="total-row">
                <span>Subtotal</span>
                <span>₹{{ number_format($order->total_amount, 2) }}</span>
            </div>
            <div class="total-row total-final">
                <span>Total Amount</span>
                <span>₹{{ number_format($order->total_amount, 2) }}</span>
            </div>
        </div>

        @if($order->reward_points > 0)
        <div class="reward-info">
            <h3 style="margin-bottom: 10px;">🎉 Congratulations!</h3>
            <p>You earned <strong>{{ $order->reward_points }} reward points</strong> with this order!</p>
        </div>
        @endif
    </div>
</div>
@endsection