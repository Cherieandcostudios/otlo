@extends('frontend.layouts.app')

@section('title', 'Find a Store - Otlo Cafe')

@push('styles')
<style>
.main-container {
    display: flex;
    height: calc(100vh - 72px);
    margin: 0 auto;
    background: white;
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    padding-top: 100px;
}
.left-panel {
    flex: 0 0 400px;
    padding: 32px 24px;
    overflow-y: auto;
    border-right: 1px solid #e0e0e0;
}
.order-toggle {
    display: flex;
    background: #f5f5f5;
    border-radius: 50px;
    margin-bottom: 24px;
    padding: 4px;
}
.toggle-btn {
    flex: 1;
    text-align: center;
    padding: 12px 16px;
    border-radius: 50px;
    background: transparent;
    border: none;
    font-weight: 600;
    font-size: 14px;
    cursor: pointer;
    transition: all 0.3s ease;
}
.toggle-btn.active {
    background: #b40c25;
    color: white;
}
.search-container {
    position: relative;
    margin-bottom: 24px;
}
.search-box {
    width: 100%;
    padding: 16px 20px 16px 50px;
    border: 2px solid #e0e0e0;
    border-radius: 8px;
    font-size: 16px;
    outline: none;
    transition: border-color 0.3s ease;
}
.search-box:focus {
    border-color: #b40c25;
}
.search-icon {
    position: absolute;
    left: 18px;
    top: 50%;
    transform: translateY(-50%);
    color: #999;
    font-size: 16px;
}
.filter-btn {
    background: #f5f5f5;
    border: 2px solid #e0e0e0;
    padding: 12px 20px;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    margin-left: 12px;
    transition: all 0.3s ease;
}
.filter-btn:hover {
    border-color: #b40c25;
    color: #b40c25;
}
.store-results {
    margin-top: 32px;
}
.results-header {
    font-size: 24px;
    font-weight: 700;
    color: #333;
    margin-bottom: 8px;
}
.results-subtitle {
    color: #666;
    font-size: 14px;
    margin-bottom: 24px;
}
.no-results {
    text-align: center;
    padding: 60px 20px;
}
.no-results h3 {
    font-size: 20px;
    color: #333;
    margin-bottom: 8px;
}
.no-results p {
    color: #666;
    line-height: 1.5;
}
.store-card {
    border: 1px solid #e0e0e0;
    border-radius: 12px;
    padding: 20px;
    margin-bottom: 16px;
    background: white;
    transition: all 0.3s ease;
    cursor: pointer;
}
.store-card:hover {
    box-shadow: 0 4px 20px rgba(180, 12, 37, 0.1);
    border-color: #b40c25;
}
.store-name {
    font-size: 18px;
    font-weight: 700;
    color: #333;
    margin-bottom: 8px;
}
.store-address {
    color: #666;
    font-size: 14px;
    margin-bottom: 12px;
    line-height: 1.4;
}
.store-status {
    display: flex;
    align-items: center;
    gap: 8px;
    margin-bottom: 12px;
}
.status-dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: #00a862;
}
.status-dot.closed {
    background: #d62b1f;
}
.store-distance {
    font-size: 12px;
    color: #666;
    font-weight: 600;
}
.store-features {
    display: flex;
    gap: 12px;
    margin-top: 12px;
}
.feature-tag {
    background: #f5f5f5;
    padding: 4px 8px;
    border-radius: 12px;
    font-size: 11px;
    color: #666;
}
.right-panel {
    flex: 1;
    position: relative;
    background: #e8f5e8;
    display: flex;
    align-items: center;
    justify-content: center;
}
.map-container {
    width: 100%;
    height: 100vh;
    position: relative;
    background: linear-gradient(45deg, #4a90a4 0%, #8ac4d0 25%, #a8d5ba 50%, #c8e6c9 75%, #e8f5e8 100%);
    overflow: hidden;
}
.order-content {
    width: 100%;
    height: 100%;
}
.main-container {
    height: 100vh;
}
.footer-links {
    padding: 20px 24px;
    border-top: 1px solid #e0e0e0;
    background: #f9f9f9;
}
.footer-links a {
    color: #666;
    text-decoration: none;
    font-size: 12px;
    margin-right: 20px;
    transition: color 0.3s ease;
}
.footer-links a:hover {
    color: #b40c25;
}
.mobile-toggle {
    display: none;
    position: fixed;
    bottom: 20px;
    left: 50%;
    transform: translateX(-50%);
    z-index: 1001;
    gap: 8px;
}
.mobile-btn {
    background: #b40c25;
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 50px;
    font-weight: 600;
    cursor: pointer;
    transition: all 0.3s ease;
}
.mobile-btn:hover {
    background: #8a0a1d;
}
.mobile-btn.active {
    background: #333;
}
@media (max-width: 768px) {
    .main-container {
        flex-direction: column;
        height: auto;
        min-height: calc(100vh - 72px);
    }
    .left-panel {
        flex: none;
        height: 50vh;
        order: 2;
    }
    .right-panel {
        flex: none;
        height: 50vh;
        order: 1;
    }
    .mobile-toggle {
        display: flex;
    }
    .left-panel.hidden {
        display: none;
    }
    .right-panel.hidden {
        display: none;
    }
    .left-panel.mobile-show {
        height: calc(100vh - 132px);
        order: 1;
    }
    .right-panel.mobile-show {
        height: calc(100vh - 132px);
        order: 1;
    }
}
    .footer-bottom{
        padding-bottom: 0% !important;
    }
    .reward-popup {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 1000;
    }
    .popup-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.5);
    }
    .popup-content {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background: white;
        border-radius: 16px;
        padding: 0;
        max-width: 400px;
        width: 90%;
        box-shadow: 0 20px 40px rgba(0, 0, 0, 0.2);
    }
    .popup-header {
        text-align: center;
        padding: 30px 20px 20px;
        border-bottom: 1px solid #f0f0f0;
    }
    .popup-header h3 {
        font-size: 24px;
        margin: 0 0 10px;
        color: #333;
    }
    .popup-header p {
        color: #666;
        margin: 0;
        line-height: 1.5;
    }
    .popup-body {
        padding: 20px;
    }
    .reward-benefits {
        display: flex;
        flex-direction: column;
        gap: 15px;
    }
    .benefit-item {
        display: flex;
        align-items: center;
        gap: 12px;
        font-size: 16px;
    }
    .benefit-icon {
        font-size: 20px;
    }
    .popup-footer {
        padding: 20px;
        display: flex;
        gap: 10px;
    }
    .signin-btn {
        flex: 1;
        background: #b40c25;
        color: white;
        border: none;
        padding: 12px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
    }
    .skip-btn {
        flex: 1;
        background: #f5f5f5;
        color: #666;
        border: none;
        padding: 12px;
        border-radius: 8px;
        font-weight: 600;
        cursor: pointer;
    }
</style>
@endpush

@section('content')
    <!-- Main Container -->
    <div class="main-container">
        <!-- Left Panel -->
        <div class="left-panel" id="leftPanel">
            <!-- Order Type Toggle -->
            <div class="order-toggle">
                <button class="toggle-btn active" id="pickupBtn">Pickup</button>
                <button class="toggle-btn" id="deliveryBtn">Delivery</button>
                <button class="toggle-btn" id="diningBtn">Dine In</button>
            </div>

            <!-- Search -->
            <div class="search-container">
                <div style="display: flex; align-items: center;">
                    <div style="position: relative; flex: 1;">
                        <span class="search-icon">🔍</span>
                        <input type="text" class="search-box" placeholder="Find a store" id="searchInput">
                    </div>
                    <button class="filter-btn" id="filterBtn">Filter</button>
                </div>
            </div>

            <!-- Results -->
            <div class="store-results">
                <div class="no-results" id="noResults">
                    <h3>Zoomed out too far</h3>
                    <p>Try searching for a location or zooming in to see results.</p>
                </div>

                <div class="store-list" id="storeList" style="display: none;">
                    <div class="results-header">6 stores nearby</div>
                    <div class="results-subtitle">Showing stores within 10 miles</div>

                    <!-- Store Cards -->
                    <div class="store-card">
                        <div class="store-name">Otlo Cafe - Downtown</div>
                        <div class="store-address">123 Main Street<br>Rajkot, Gujarat 360001</div>
                        <div class="store-status">
                            <div class="status-dot"></div>
                            <span style="color: #00a862; font-weight: 600; font-size: 14px;">Open until 10:00 PM</span>
                        </div>
                        <div class="store-distance">0.5 mi</div>
                        <div class="store-features">
                            <span class="feature-tag">Wi-Fi</span>
                            <span class="feature-tag">Live Music</span>
                            <span class="feature-tag">Audio Equipment</span>
                        </div>
                    </div>

                    <div class="store-card">
                        <div class="store-name">Otlo Cafe - University</div>
                        <div class="store-address">456 College Road<br>Rajkot, Gujarat 360005</div>
                        <div class="store-status">
                            <div class="status-dot"></div>
                            <span style="color: #00a862; font-weight: 600; font-size: 14px;">Open until 11:00 PM</span>
                        </div>
                        <div class="store-distance">1.2 mi</div>
                        <div class="store-features">
                            <span class="feature-tag">Drive-thru</span>
                            <span class="feature-tag">24/7</span>
                            <span class="feature-tag">Recording Studio</span>
                        </div>
                    </div>

                    <div class="store-card">
                        <div class="store-name">Otlo Cafe - Mall</div>
                        <div class="store-address">789 Shopping Center<br>Rajkot, Gujarat 360002</div>
                        <div class="store-status">
                            <div class="status-dot"></div>
                            <span style="color: #00a862; font-weight: 600; font-size: 14px;">Open until 9:00 PM</span>
                        </div>
                        <div class="store-distance">2.1 mi</div>
                        <div class="store-features">
                            <span class="feature-tag">Parking</span>
                            <span class="feature-tag">Open Mic</span>
                        </div>
                    </div>

                    <div class="store-card">
                        <div class="store-name">Otlo Cafe - Airport</div>
                        <div class="store-address">Airport Terminal 1<br>Rajkot, Gujarat 360007</div>
                        <div class="store-status">
                            <div class="status-dot"></div>
                            <span style="color: #00a862; font-weight: 600; font-size: 14px;">Open 24 hours</span>
                        </div>
                        <div class="store-distance">3.5 mi</div>
                        <div class="store-features">
                            <span class="feature-tag">24/7</span>
                            <span class="feature-tag">Quick Service</span>
                        </div>
                    </div>

                    <div class="store-card">
                        <div class="store-name">Otlo Cafe - Business District</div>
                        <div class="store-address">101 Corporate Plaza<br>Rajkot, Gujarat 360003</div>
                        <div class="store-status">
                            <div class="status-dot closed"></div>
                            <span style="color: #d62b1f; font-weight: 600; font-size: 14px;">Closed • Opens 6:00 AM</span>
                        </div>
                        <div class="store-distance">4.2 mi</div>
                        <div class="store-features">
                            <span class="feature-tag">Meeting Rooms</span>
                            <span class="feature-tag">Conference Mics</span>
                        </div>
                    </div>

                    <div class="store-card">
                        <div class="store-name">Otlo Cafe - Seaside</div>
                        <div class="store-address">Beach Road 55<br>Rajkot, Gujarat 360004</div>
                        <div class="store-status">
                            <div class="status-dot"></div>
                            <span style="color: #00a862; font-weight: 600; font-size: 14px;">Open until 12:00 AM</span>
                        </div>
                        <div class="store-distance">5.8 mi</div>
                        <div class="store-features">
                            <span class="feature-tag">Outdoor Seating</span>
                            <span class="feature-tag">Live Performances</span>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Footer Links -->
            <div class="footer-links">
                <a href="#">Privacy Notice ↗</a>
                <a href="#">Terms of Use ↗</a>
                <a href="#">Do Not Share My Personal Information ↗</a>
            </div>
        </div>

        <!-- Right Panel -->
        <div class="right-panel" id="rightPanel">
            <!-- Pickup Content -->
            <div id="pickupContent" class="order-content">
                <div style="display:flex;height:100%;">
                    <div style="flex:1;">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3718.9547796446814!2d72.8632609!3d21.233641700000003!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04f9357d13cf3%3A0x1553fdce99250693!2sOtlo%20Cafe!5e0!3m2!1sen!2sin!4v1758681212893!5m2!1sen!2sin"
                            width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                    <div style="width:350px;padding:20px;background:white;overflow-y:auto;">
                        <h3 style="margin-bottom:20px;font-weight:600;">Pickup Order</h3>
                        <form id="pickupForm">
                            <div style="margin-bottom:15px;">
                                <label style="display:block;margin-bottom:5px;font-weight:500;">Customer Name</label>
                                <input type="text" name="customer_name" required style="width:100%;padding:8px;border:1px solid #ddd;border-radius:4px;">
                            </div>
                            <div style="margin-bottom:15px;">
                                <label style="display:block;margin-bottom:5px;font-weight:500;">Mobile Number</label>
                                <input type="tel" name="customer_mobile" required style="width:100%;padding:8px;border:1px solid #ddd;border-radius:4px;">
                            </div>
                            <div style="margin-bottom:15px;">
                                <label style="display:block;margin-bottom:5px;font-weight:500;">Pickup Date</label>
                                <input type="date" name="pickup_date" required style="width:100%;padding:8px;border:1px solid #ddd;border-radius:4px;">
                            </div>
                            <div style="margin-bottom:15px;">
                                <label style="display:block;margin-bottom:5px;font-weight:500;">Pickup Time</label>
                                <input type="time" name="pickup_time" required style="width:100%;padding:8px;border:1px solid #ddd;border-radius:4px;">
                            </div>
                           
                            <button type="button" onclick="placeOrder('pickup')" style="width:100%;background:#b40c25;color:white;border:none;padding:12px;border-radius:6px;font-weight:600;cursor:pointer;">Place Order</button>
                        </form>
                    </div>
                </div>
            </div>
            
            <!-- Delivery Content -->
            <div id="deliveryContent" class="order-content" style="display:none;">
                <div style="display:flex;align-items:center;justify-content:center;height:100%;background:#f8f9fa;">
                    <div style="text-align:center;padding:40px;">
                        <img src="https://images.unsplash.com/photo-1566576912321-d58ddd7a6088?w=300&h=200&fit=crop" alt="Delivery" style="width:300px;height:200px;border-radius:12px;margin-bottom:20px;">
                        <h3 style="font-size:24px;margin-bottom:10px;color:#333;">Fast Delivery</h3>
                        <p style="color:#666;margin-bottom:30px;">Get your order delivered to your doorstep</p>
                        <button onclick="proceedToCheckout('delivery')" style="background:#b40c25;color:white;border:none;padding:15px 30px;border-radius:8px;font-weight:600;cursor:pointer;">Get Started</button>
                    </div>
                </div>
            </div>
            
            <!-- Dining Content -->
            <div id="diningContent" class="order-content" style="display:none;">
                <div style="padding:40px;background:#f8f9fa;height:100%;overflow-y:auto;">
                    <h2 style="text-align:center;margin-bottom:30px;font-size:24px;color:#333;">Dine In Order</h2>
                    
                    <!-- Order Summary -->
                    <div style="background:white;border-radius:12px;padding:20px;margin-bottom:20px;">
                        <h3 style="margin-bottom:15px;font-weight:600;">Your Order</h3>
                        <div id="diningCartItems">Loading cart...</div>
                        <div style="border-top:1px solid #ddd;padding-top:15px;margin-top:15px;">
                            <div style="display:flex;justify-content:space-between;font-weight:600;font-size:18px;">
                                <span>Total: </span>
                                <span id="diningTotal">₹0.00</span>
                            </div>
                        </div>
                    </div>
               
                    <!-- Payment Method -->
                    <div style="background:white;border-radius:12px;padding:20px;">
                        <h3 style="margin-bottom:15px;font-weight:600;">Payment Method</h3>
                        <form id="diningForm">
                            <div style="margin-bottom:15px;">
                                <label style="display:flex;align-items:center;padding:10px;border:1px solid #ddd;border-radius:6px;margin-bottom:10px;cursor:pointer;">
                                    <input type="radio" name="payment_method" value="cash" checked style="margin-right:10px;">
                                    <span>💵 Cash Payment</span>
                                </label>
                                <label style="display:flex;align-items:center;padding:10px;border:1px solid #ddd;border-radius:6px;cursor:pointer;">
                                    <input type="radio" name="payment_method" value="online" style="margin-right:10px;">
                                    <span>💳 Online Payment</span>
                                </label>
                            </div>
                            <button type="button" onclick="placeGuestOrder()" style="width:100%;background:#b40c25;color:white;border:none;padding:15px;border-radius:8px;font-weight:600;cursor:pointer;">Place Order</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Toggle Buttons -->
        <div class="mobile-toggle" id="mobileToggle">
            <button class="mobile-btn" id="listViewBtn">List</button>
            <button class="mobile-btn active" id="mapViewBtn">Map</button>
        </div>
    </div>

    <!-- Reward Points Popup -->
    <div id="rewardPopup" class="reward-popup" style="display:none;">
        <div class="popup-overlay"></div>
        <div class="popup-content">
            <div class="popup-header">
                <h3>🎁 Collect Reward Points!</h3>
                <p>Sign in to earn points with every purchase and unlock exclusive rewards</p>
            </div>
            <div class="popup-body">
                <div class="reward-benefits">
                    <div class="benefit-item">
                        <span class="benefit-icon">⭐</span>
                        <span>Earn <span id="totalPoints">0</span> points from your current order</span>
                    </div>
                    <div class="benefit-item">
                        <span class="benefit-icon">🎯</span>
                        <span>Redeem points for free items</span>
                    </div>
                    <div class="benefit-item">
                        <span class="benefit-icon">🎉</span>
                        <span>Get exclusive member offers</span>
                    </div>
                    <div class="benefit-item">
                        <span class="benefit-icon">🎁</span>
                        <span>Birthday rewards & special discounts</span>
                    </div>
                    <div class="benefit-item">
                        <span class="benefit-icon">🔔</span>
                        <span>Early access to new menu items</span>
                    </div>
                </div>
            </div>
            <div class="popup-footer">
                <button onclick="signInForRewards()" class="signin-btn">Sign In</button>
                <button onclick="skipToCheckout()" class="skip-btn">Skip</button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Toggle between pickup, delivery and dining
    const pickupBtn = document.getElementById('pickupBtn');
    const deliveryBtn = document.getElementById('deliveryBtn');
    const diningBtn = document.getElementById('diningBtn');

    function setActiveButton(activeBtn, type) {
        [pickupBtn, deliveryBtn, diningBtn].forEach(btn => btn.classList.remove('active'));
        activeBtn.classList.add('active');
        showOrderContent(type);
    }

    function showOrderContent(type) {
        document.querySelectorAll('.order-content').forEach(content => content.style.display = 'none');
        document.getElementById(type + 'Content').style.display = 'block';
    }

    pickupBtn.addEventListener('click', () => {
        @guest('customer')
            window.location.href = '{{ route("frontend.signin") }}';
            return;
        @endguest
        setActiveButton(pickupBtn, 'pickup');
    });
    
    deliveryBtn.addEventListener('click', () => {
        @guest('customer')
            window.location.href = '{{ route("frontend.signin") }}';
            return;
        @endguest
        setActiveButton(deliveryBtn, 'delivery');
    });
    
    diningBtn.addEventListener('click', () => {
        setActiveButton(diningBtn, 'dining');
        loadDiningCart();
        @guest('customer')
            showRewardPopup();
        @endguest
    });

    function proceedToCheckout(orderType) {
        if (orderType === 'delivery') {
            @guest('customer')
                window.location.href = '{{ route("frontend.signin") }}';
                return;
            @endguest
            sessionStorage.setItem('orderType', orderType);
            window.location.href = '{{ route("checkout") }}';
        }
    }
    
    function placeOrder(orderType) {
        let formData = new FormData();
        formData.append('order_type', orderType);
        
        if (orderType === 'pickup') {
            const form = document.getElementById('pickupForm');
            const formElements = form.elements;
            
            for (let element of formElements) {
                if (element.name && element.value) {
                    formData.append(element.name, element.value);
                }
            }
        }
        
        if (orderType === 'dining') {
            const form = document.getElementById('diningForm');
            const paymentMethod = form.payment_method.value;
            formData.append('payment_method', paymentMethod);
        }
        
        // Add CSRF token to form data
        formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        
        // Submit order
        fetch('{{ route("orders.store") }}', {
            method: 'POST',
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            console.log('Response data:', data);
            if (data.success) {
                alert(`Order placed successfully! Order Number: ${data.order_number}\nReward Points Earned: ${data.reward_points}`);
                window.location.href = '{{ route("orders.show", "") }}/' + data.order_id;
            } else {
                alert('Error placing order. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error placing order. Please try again.');
        });
    }
    
    function loadDiningCart() {
        @auth('customer')
            // Load from database for logged-in users
            fetch('{{ route("cart.session") }}')
                .then(response => response.json())
                .then(data => {
                    displayCartItems(data.items, data.total);
                });
        @else
            // Load from session for guest users
            fetch('{{ route("cart.session") }}')
                .then(response => response.json())
                .then(data => {
                    displayCartItems(data.items, data.total);
                })
                .catch(() => {
                    const guestCart = @json(session()->get('guest_cart', []));
                    const cartItems = Object.values(guestCart);
                    let total = 0;
                    
                    cartItems.forEach(item => {
                        total += item.price * item.quantity;
                    });
                    
                    displayCartItems(cartItems, total);
                });
        @endauth
    }
    
    function displayCartItems(items, total) {
        let html = '';
        
        if (items.length === 0) {
            html = '<div style="text-align:center;color:#666;">No items in cart</div>';
        } else {
            items.forEach(item => {
                const itemTotal = item.price * item.quantity;
                html += `<div style="display:flex;justify-content:space-between;margin-bottom:10px;">
                            <span>${item.name} × ${item.quantity}</span>
                            <span>₹${itemTotal}</span>
                         </div>`;
            });
        }
        
        document.getElementById('diningCartItems').innerHTML = html;
        document.getElementById('diningTotal').textContent = `₹${total}`;
    }

    // Search functionality
    const searchInput = document.getElementById('searchInput');
    const noResults = document.getElementById('noResults');
    const storeList = document.getElementById('storeList');

    searchInput.addEventListener('input', (e) => {
        if (e.target.value.length > 0) {
            noResults.style.display = 'none';
            storeList.style.display = 'block';
        } else {
            noResults.style.display = 'block';
            storeList.style.display = 'none';
        }
    });

    // Mobile view toggle
    const listViewBtn = document.getElementById('listViewBtn');
    const mapViewBtn = document.getElementById('mapViewBtn');
    const leftPanel = document.getElementById('leftPanel');
    const rightPanel = document.getElementById('rightPanel');

    listViewBtn.addEventListener('click', () => {
        listViewBtn.classList.add('active');
        mapViewBtn.classList.remove('active');

        leftPanel.classList.add('mobile-show');
        leftPanel.classList.remove('hidden');
        rightPanel.classList.add('hidden');
    });

    mapViewBtn.addEventListener('click', () => {
        mapViewBtn.classList.add('active');
        listViewBtn.classList.remove('active');

        rightPanel.classList.add('mobile-show');
        rightPanel.classList.remove('hidden');
        leftPanel.classList.add('hidden');
    });

    // Initialize with search results hidden
    window.addEventListener('load', () => {
        if (window.innerWidth > 768) {
            noResults.style.display = 'block';
            storeList.style.display = 'none';
        } else {
            // On mobile, show map view by default
            rightPanel.classList.add('mobile-show');
            leftPanel.classList.add('hidden');
        }
    });

    // Handle window resize
    window.addEventListener('resize', () => {
        if (window.innerWidth > 768) {
            leftPanel.classList.remove('hidden', 'mobile-show');
            rightPanel.classList.remove('hidden', 'mobile-show');
        }
    });
    
    // Reward popup functions
    function showRewardPopup() {
        // Calculate total points from cart
        @guest('customer')
            const guestCart = @json(session()->get('guest_cart', []));
            let totalPrice = 0;
            Object.values(guestCart).forEach(item => {
                totalPrice += item.price * item.quantity;
            });
            const totalPoints = Math.floor(totalPrice);
            document.getElementById('totalPoints').textContent = totalPoints;
        @endguest
        
        document.getElementById('rewardPopup').style.display = 'block';
    }
    
    function closeRewardPopup() {
        document.getElementById('rewardPopup').style.display = 'none';
    }
    
    function skipToCheckout() {
        closeRewardPopup();
        // Show dine-in content with billing details
        loadDiningCart();
    }
    
    function signInForRewards() {
        // Store current page URL for redirect after signin
        sessionStorage.setItem('redirect_after_signin', window.location.href);
        window.location.href = '{{ route("frontend.signin") }}';
    }
    
    function placeGuestOrder() {

        const paymentMethod = document.querySelector('input[name="payment_method"]:checked').value;
        
        const formData = new FormData();
        formData.append('order_type', 'dining');
        formData.append('payment_method', paymentMethod);
        formData.append('_token', document.querySelector('meta[name="csrf-token"]').getAttribute('content'));
        
        fetch('{{ route("orders.store") }}', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                alert(`Order placed successfully! Order Number: ${data.order_number}`);
                // Clear cart display
                document.getElementById('diningCartItems').innerHTML = '<div style="text-align:center;color:#666;">No items in cart</div>';
                document.getElementById('diningTotal').textContent = '₹0';
                window.location.href = '{{ route("home") }}';
            } else {
                alert('Error placing order. Please try again.');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            alert('Error placing order. Please try again.');
        });
    }
</script>
@endpush