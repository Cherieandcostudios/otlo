@extends('layouts.admin')
@section('title','Orders Management')
@section('content')

<div style="padding: 20px;">
    <div style="display: flex; justify-content: space-between; margin-bottom: 20px;">
        <h2 style="font-size: 24px; font-weight: bold;">Orders Management</h2>
        
        <!-- Order Type Filter -->
        <div style="display: flex; gap: 10px;">
            <select onchange="filterOrders(this.value)" style="padding: 8px; border: 1px solid #ddd; border-radius: 4px;">
                <option value="all" {{ $orderType == 'all' ? 'selected' : '' }}>All Orders</option>
                <option value="pickup" {{ $orderType == 'pickup' ? 'selected' : '' }}>Pickup Orders</option>
                <option value="delivery" {{ $orderType == 'delivery' ? 'selected' : '' }}>Delivery Orders</option>
                <option value="dining" {{ $orderType == 'dining' ? 'selected' : '' }}>Dining Orders</option>
            </select>
        </div>
    </div>

    <div style="background: white; border: 1px solid #e5e7eb; border-radius: 8px; overflow: hidden;">
        <table style="width: 100%; border-collapse: collapse;">
            <thead style="background: #f9fafb;">
                <tr>
                    <th style="padding: 12px; text-align: left; border-bottom: 1px solid #e5e7eb;">Order #</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 1px solid #e5e7eb;">Customer</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 1px solid #e5e7eb;">Type</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 1px solid #e5e7eb;">Total</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 1px solid #e5e7eb;">Status</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 1px solid #e5e7eb;">Date</th>
                    <th style="padding: 12px; text-align: left; border-bottom: 1px solid #e5e7eb;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($orders as $order)
                <tr>
                    <td style="padding: 12px; border-bottom: 1px solid #f3f4f6;">{{ $order->order_number }}</td>
                    <td style="padding: 12px; border-bottom: 1px solid #f3f4f6;">
                        {{ $order->customer ? $order->customer->name : $order->guest_name }}
                        @if($order->guest_mobile)
                            <br><small>{{ $order->guest_mobile }}</small>
                        @endif
                    </td>
                    <td style="padding: 12px; border-bottom: 1px solid #f3f4f6;">
                        <span style="background: #{{ $order->order_type == 'pickup' ? 'fbbf24' : ($order->order_type == 'delivery' ? '3b82f6' : '10b981') }}; color: white; padding: 4px 8px; border-radius: 12px; font-size: 12px;">
                            {{ ucfirst($order->order_type) }}
                        </span>
                    </td>
                    <td style="padding: 12px; border-bottom: 1px solid #f3f4f6;">₹{{ number_format($order->total_amount, 2) }}</td>
                    <td style="padding: 12px; border-bottom: 1px solid #f3f4f6;">
                        <select onchange="updateStatus({{ $order->id }}, this.value)" style="padding: 4px; border: 1px solid #ddd; border-radius: 4px; font-size: 12px;">
                            <option value="pending" {{ $order->status == 'pending' ? 'selected' : '' }}>Pending</option>
                            <option value="confirmed" {{ $order->status == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                            <option value="preparing" {{ $order->status == 'preparing' ? 'selected' : '' }}>Preparing</option>
                            <option value="ready" {{ $order->status == 'ready' ? 'selected' : '' }}>Ready</option>
                            <option value="completed" {{ $order->status == 'completed' ? 'selected' : '' }}>Completed</option>
                            <option value="cancelled" {{ $order->status == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                        </select>
                    </td>
                    <td style="padding: 12px; border-bottom: 1px solid #f3f4f6;">{{ $order->created_at->format('M d, Y H:i') }}</td>
                    <td style="padding: 12px; border-bottom: 1px solid #f3f4f6;">
                        <a href="{{ route('admin.orders.show', $order) }}" style="background: #b40c25; color: white; padding: 6px 12px; border-radius: 4px; text-decoration: none; font-size: 12px;">View</a>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" style="padding: 40px; text-align: center; color: #666;">No orders found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
    
    <div style="margin-top: 20px;">
        {{ $orders->links() }}
    </div>
</div>

<script>
function filterOrders(type) {
    window.location.href = '{{ route("admin.orders.index") }}?type=' + type;
}

function updateStatus(orderId, status) {
    fetch(`/admin/orders/${orderId}/status`, {
        method: 'PUT',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({ status: status })
    })
    .then(response => response.json())
    .then(data => {
        if (data.success) {
            alert('Order status updated successfully');
        } else {
            alert('Error updating status');
        }
    });
}
</script>

@endsection