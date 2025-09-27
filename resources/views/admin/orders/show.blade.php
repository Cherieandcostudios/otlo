@extends('layouts.admin')
@section('title','Order Details')
@section('content')

<div style="padding: 20px;">
    <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
        <h2 style="font-size: 24px; font-weight: bold;">Order #{{ $order->order_number }}</h2>
        <div style="display: flex; gap: 10px;">
            <button onclick="editOrder()" style="background: #3b82f6; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer;">Edit</button>
            <button onclick="deleteOrder()" style="background: #dc2626; color: white; padding: 8px 16px; border: none; border-radius: 4px; cursor: pointer;">Delete</button>
            <a href="{{ route('admin.orders.index') }}" style="background: #6b7280; color: white; padding: 8px 16px; border-radius: 4px; text-decoration: none;">Back</a>
        </div>
    </div>

    <div style="display: grid; grid-template-columns: 1fr 1fr; gap: 20px;">
        <!-- Order Info -->
        <div style="background: white; border: 1px solid #e5e7eb; border-radius: 8px; padding: 20px;">
            <h3 style="margin-bottom: 15px; font-weight: 600;">Order Information</h3>
            <div style="margin-bottom: 10px;"><strong>Order Type:</strong> {{ ucfirst($order->order_type) }}</div>
            <div style="margin-bottom: 10px;"><strong>Status:</strong> {{ ucfirst($order->status) }}</div>
            <div style="margin-bottom: 10px;"><strong>Payment:</strong> {{ ucfirst($order->payment_method) }}</div>
            <div style="margin-bottom: 10px;"><strong>Total:</strong> ₹{{ number_format($order->total_amount, 2) }}</div>
            <div style="margin-bottom: 10px;"><strong>Date:</strong> {{ $order->created_at->format('M d, Y H:i') }}</div>
        </div>

        <!-- Customer Info -->
        <div style="background: white; border: 1px solid #e5e7eb; border-radius: 8px; padding: 20px;">
            <h3 style="margin-bottom: 15px; font-weight: 600;">Customer Information</h3>
            @if($order->customer)
                <div style="margin-bottom: 10px;"><strong>Name:</strong> {{ $order->customer->name }}</div>
                <div style="margin-bottom: 10px;"><strong>Email:</strong> {{ $order->customer->email }}</div>
                <div style="margin-bottom: 10px;"><strong>Mobile:</strong> {{ $order->customer->mobile }}</div>
                <div style="margin-bottom: 10px;"><strong>Reward Points:</strong> {{ $order->customer->reward_points }}</div>
            @else
                <div style="margin-bottom: 10px;"><strong>Name:</strong> {{ $order->guest_name }}</div>
                <div style="margin-bottom: 10px;"><strong>Mobile:</strong> {{ $order->guest_mobile }}</div>
                <div style="color: #666; font-style: italic;">Guest Order</div>
            @endif
        </div>
    </div>

    <!-- Order Items -->
    <div style="background: white; border: 1px solid #e5e7eb; border-radius: 8px; padding: 20px; margin-top: 20px;">
        <h3 style="margin-bottom: 15px; font-weight: 600;">Order Items</h3>
        <table style="width: 100%; border-collapse: collapse;">
            <thead>
                <tr style="background: #f9fafb;">
                    <th style="padding: 10px; text-align: left; border-bottom: 1px solid #e5e7eb;">Item</th>
                    <th style="padding: 10px; text-align: left; border-bottom: 1px solid #e5e7eb;">Price</th>
                    <th style="padding: 10px; text-align: left; border-bottom: 1px solid #e5e7eb;">Quantity</th>
                    <th style="padding: 10px; text-align: left; border-bottom: 1px solid #e5e7eb;">Total</th>
                </tr>
            </thead>
            <tbody>
                @foreach($order->orderItems as $item)
                <tr>
                    <td style="padding: 10px; border-bottom: 1px solid #f3f4f6;">{{ $item->menuItem->name }}</td>
                    <td style="padding: 10px; border-bottom: 1px solid #f3f4f6;">₹{{ number_format($item->price, 2) }}</td>
                    <td style="padding: 10px; border-bottom: 1px solid #f3f4f6;">{{ $item->quantity }}</td>
                    <td style="padding: 10px; border-bottom: 1px solid #f3f4f6;">₹{{ number_format($item->total_price, 2) }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<script>
function editOrder() {
    // Simple edit functionality - you can expand this
    const newStatus = prompt('Enter new status (pending, confirmed, preparing, ready, completed, cancelled):');
    if (newStatus) {
        fetch(`/admin/orders/{{ $order->id }}/status`, {
            method: 'PUT',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({ status: newStatus })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Order updated successfully');
                location.reload();
            } else {
                alert('Error updating order');
            }
        });
    }
}

function deleteOrder() {
    if (confirm('Are you sure you want to delete this order?')) {
        fetch(`/admin/orders/{{ $order->id }}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert('Order deleted successfully');
                window.location.href = '{{ route("admin.orders.index") }}';
            } else {
                alert('Error deleting order');
            }
        });
    }
}
</script>

@endsection