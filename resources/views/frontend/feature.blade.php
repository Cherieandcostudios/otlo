@extends('frontend.layouts.app')

@section('title', 'Featured - Otlo Cafe')

@section('content')
    <!-- Fall Section -->
    <section class="fall-section">
        <div class="fall-container">
            <!-- Section Header -->
            <div class="section-header">
                <h1 class="section-title">Fall. Starts. <span class="highlight">Now.</span></h1>
                <p class="section-subtitle">Discover our signature autumn flavors, crafted with care and served with warmth. Limited time seasonal favorites await you.</p>
            </div>

            <!-- Cards Grid -->
            <div class="cards-grid">
                <!-- Pumpkin Spice Latte Card -->
                <div class="product-card" onclick="orderDrink('Pumpkin Spice Latte')">
                    <div class="card-image">
                        <div class="drink-visual">
                            <div class="cup">
                                <div class="whipped-cream"></div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <h2 class="card-title">Pumpkin Spice Latte</h2>
                        <p class="card-description">Classic fall favorite. Handcrafted with Otlo signature espresso. Real pumpkin, cinnamon and nutmeg. Topped with whipped cream and real pumpkin-pie spice. Enjoy while it's in season.</p>
                        <a href="#" class="card-button">Order now</a>
                    </div>
                </div>

                <!-- Iced Pumpkin Spice Latte Card -->
                <div class="product-card" onclick="orderDrink('Iced Pumpkin Spice Latte')">
                    <div class="card-image cold">
                        <div class="drink-visual">
                            <div class="glass">
                                <div class="ice-cubes">
                                    <div class="ice-cube"></div>
                                    <div class="ice-cube"></div>
                                    <div class="ice-cube"></div>
                                    <div class="ice-cube"></div>
                                    <div class="ice-cube"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-content">
                        <h2 class="card-title">Iced Pumpkin Spice Latte</h2>
                        <p class="card-description">Our iconic Pumpkin Spice Latte on ice. With whipped cream and a real pumpkin-pie spice finish. Limited-time fan favorite.</p>
                        <a href="#" class="card-button">Start an order</a>
                    </div>
                </div>
            </div>

            <!-- Special Offer -->
            <div class="special-offer">
                <h2 class="special-title">Join Otlo Rewards Today</h2>
                <p class="special-description">Get a free drink with your first purchase when you join our rewards program. Plus, earn points on every order and unlock exclusive seasonal offers.</p>
                <a href="#" class="special-button">Join & Save Now</a>
            </div>
        </div>
    </section>

@endsection