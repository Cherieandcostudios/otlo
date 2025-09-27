@extends('frontend.layouts.app')

@section('title', 'Otlo Cafe Rewards - Earn Points & Get Free Coffee')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/rewards-override.css') }}">
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endpush

@section('content')
    <!-- Hero Section -->
    <section class="rewards-hero" id="home">
        <div class="rewards-hero-content">
            <h1>Welcome to Our Rewards Program</h1>
            <p>Earn points with every purchase and redeem them for amazing rewards!</p>
            <div class="points-display">
                <div class="points-card">
                    <i class="fas fa-star"></i>
                    <div class="points-info">
                        <span class="points-number" id="userPoints">1,250</span>
                        <span class="points-label">Points Available</span>
                    </div>
                </div>
            </div>
            <button class="cta-button" onclick="scrollToSection('rewards')">View Rewards</button>
        </div>
        <div class="rewards-hero-image">
            <i class="fas fa-coffee rewards-hero-icon"></i>
        </div>
    </section>

    <!-- How It Works Section -->
    <section class="how-it-works">
        <div class="container">
            <h2>How It Works</h2>
            <div class="steps-grid">
                <div class="step">
                    <div class="step-icon">
                        <i class="fas fa-shopping-cart"></i>
                    </div>
                    <h3>1. Make a Purchase</h3>
                    <p>Earn 1 point for every $1 spent at our cafe</p>
                </div>
                <div class="step">
                    <div class="step-icon">
                        <i class="fas fa-coins"></i>
                    </div>
                    <h3>2. Collect Points</h3>
                    <p>Points are automatically added to your account</p>
                </div>
                <div class="step">
                    <div class="step-icon">
                        <i class="fas fa-gift"></i>
                    </div>
                    <h3>3. Redeem Rewards</h3>
                    <p>Use your points to get free drinks and food</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Rewards Section -->
    <section class="rewards-section" id="rewards">
        <div class="container">
            <h2>Available Rewards</h2>
            <div class="rewards-grid">
                <div class="reward-card" data-points="100">
                    <div class="reward-image">
                        <i class="fas fa-coffee"></i>
                    </div>
                    <div class="reward-content">
                        <h3>Free Espresso</h3>
                        <p>Classic espresso shot to kickstart your day</p>
                        <div class="reward-bottom">
                            <div class="points-cost">
                                <i class="fas fa-star"></i>
                                <span>100 Points</span>
                            </div>
                            <button class="redeem-btn" onclick="redeemReward(100, 'Free Espresso')">Redeem Now</button>
                        </div>
                    </div>
                </div>

                <div class="reward-card" data-points="200">
                    <div class="reward-image">
                        <i class="fas fa-mug-hot"></i>
                    </div>
                    <div class="reward-content">
                        <h3>Free Cappuccino</h3>
                        <p>Creamy cappuccino with perfect foam art</p>
                        <div class="reward-bottom">
                            <div class="points-cost">
                                <i class="fas fa-star"></i>
                                <span>200 Points</span>
                            </div>
                            <button class="redeem-btn" onclick="redeemReward(200, 'Free Cappuccino')">Redeem Now</button>
                        </div>
                    </div>
                </div>

                <div class="reward-card" data-points="300">
                    <div class="reward-image">
                        <i class="fas fa-ice-cream"></i>
                    </div>
                    <div class="reward-content">
                        <h3>Iced Latte</h3>
                        <p>Refreshing iced latte perfect for warm days</p>
                        <div class="reward-bottom">
                            <div class="points-cost">
                                <i class="fas fa-star"></i>
                                <span>300 Points</span>
                            </div>
                            <button class="redeem-btn" onclick="redeemReward(300, 'Iced Latte')">Redeem Now</button>
                        </div>
                    </div>
                </div>

                <div class="reward-card" data-points="150">
                    <div class="reward-image">
                        <i class="fas fa-cookie-bite"></i>
                    </div>
                    <div class="reward-content">
                        <h3>Free Pastry</h3>
                        <p>Choose from our selection of fresh pastries</p>
                        <div class="reward-bottom">
                            <div class="points-cost">
                                <i class="fas fa-star"></i>
                                <span>150 Points</span>
                            </div>
                            <button class="redeem-btn" onclick="redeemReward(150, 'Free Pastry')">Redeem Now</button>
                        </div>
                    </div>
                </div>

                <div class="reward-card" data-points="500">
                    <div class="reward-image">
                        <i class="fas fa-birthday-cake"></i>
                    </div>
                    <div class="reward-content">
                        <h3>Free Slice of Cake</h3>
                        <p>Indulge in our homemade cake selection</p>
                        <div class="reward-bottom">
                            <div class="points-cost">
                                <i class="fas fa-star"></i>
                                <span>500 Points</span>
                            </div>
                            <button class="redeem-btn" onclick="redeemReward(500, 'Free Slice of Cake')">Redeem Now</button>
                        </div>
                    </div>
                </div>

                <div class="reward-card" data-points="1000">
                    <div class="reward-image">
                        <i class="fas fa-utensils"></i>
                    </div>
                    <div class="reward-content">
                        <h3>Free Lunch Combo</h3>
                        <p>Complete lunch with sandwich, drink and side</p>
                        <div class="reward-bottom">
                            <div class="points-cost">
                                <i class="fas fa-star"></i>
                                <span>1000 Points</span>
                            </div>
                            <button class="redeem-btn" onclick="redeemReward(1000, 'Free Lunch Combo')">Redeem Now</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Points Status Section -->
    <section class="points-status" id="points">
        <div class="container">
            <h2>Your Rewards Status</h2>
            <div class="status-grid">
                <div class="status-card">
                    <i class="fas fa-star"></i>
                    <h3>Current Points</h3>
                    <span class="big-number" id="currentPoints">1,250</span>
                </div>
                <div class="status-card">
                    <i class="fas fa-trophy"></i>
                    <h3>Rewards Claimed</h3>
                    <span class="big-number" id="rewardsClaimed">8</span>
                </div>
                <div class="status-card">
                    <i class="fas fa-calendar"></i>
                    <h3>Member Since</h3>
                    <span class="big-number">Jan 2024</span>
                </div>
            </div>

            <div class="progress-section">
                <h3>Progress to Next Reward</h3>
                <div class="progress-bar">
                    <div class="progress-fill" style="width: 75%"></div>
                </div>
                <p>75 more points to unlock a free cappuccino!</p>
            </div>
        </div>
    </section>

    <!-- Success Modal -->
    <div class="modal" id="successModal">
        <div class="modal-content">
            <span class="close" onclick="closeModal()">&times;</span>
            <div class="modal-body">
                <i class="fas fa-check-circle success-icon"></i>
                <h2>Reward Redeemed!</h2>
                <p id="rewardMessage">Your reward has been successfully redeemed.</p>
                <button class="modal-btn" onclick="closeModal()">Continue</button>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script src="{{ asset('assets/js/rewards.js') }}"></script>
@endpush