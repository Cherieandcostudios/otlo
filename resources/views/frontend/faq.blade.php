@extends('frontend.layouts.app')

@section('title', 'FAQ - Otlo Cafe')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/pages-style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endpush

@section('content')
    <!-- FAQ Hero Section -->
    <div class="page-hero">
        <div class="container">
            <h1>Frequently Asked <span class="highlight">Questions</span></h1>
            <p>Find quick answers to common questions about our menu, services, rewards program, and more. Can't find what you're looking for? Contact our support team.</p>
        </div>
    </div>

    <!-- Search FAQ Section -->
    <div class="faq-search-section">
        <div class="container">
            <div class="search-box">
                <i class="fas fa-search"></i>
                <input type="text" id="faq-search" placeholder="Search frequently asked questions...">
            </div>
        </div>
    </div>

    <!-- FAQ Categories Section -->
    <div class="section">
        <div class="container">
            <div class="faq-layout">
                <!-- Category Navigation -->
                <div class="faq-categories">
                    <h3>Browse by Category</h3>
                    <ul class="category-list">
                        <li>
                            <a href="#orders" class="category-link active" data-category="orders">
                                <i class="fas fa-shopping-bag"></i> Orders & Delivery
                            </a>
                        </li>
                        <li>
                            <a href="#account" class="category-link" data-category="account">
                                <i class="fas fa-user-circle"></i> Account & Rewards
                            </a>
                        </li>
                        <li>
                            <a href="#menu" class="category-link" data-category="menu">
                                <i class="fas fa-coffee"></i> Menu & Products
                            </a>
                        </li>
                        <li>
                            <a href="#payment" class="category-link" data-category="payment">
                                <i class="fas fa-credit-card"></i> Payment & Billing
                            </a>
                        </li>
                        <li>
                            <a href="#locations" class="category-link" data-category="locations">
                                <i class="fas fa-map-marker-alt"></i> Store Locations
                            </a>
                        </li>
                        <li>
                            <a href="#technical" class="category-link" data-category="technical">
                                <i class="fas fa-mobile-alt"></i> Technical Support
                            </a>
                        </li>
                    </ul>
                </div>

                <!-- FAQ Content -->
                <div class="faq-content">
                    <!-- Orders & Delivery -->
                    <div id="orders" class="faq-category-section active">
                        <h2>Orders & Delivery</h2>

                        <div class="faq-item">
                            <div class="faq-question">
                                <h4>How do I place an order online?</h4>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>You can place an order through our website or mobile app. Simply browse our menu, add items to your cart, choose pickup or delivery, and complete your payment. You'll receive a confirmation email with your order details and estimated ready time.</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question">
                                <h4>What are your delivery hours and areas?</h4>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>We offer delivery from 7:00 AM to 9:00 PM daily. Delivery is available within a 5-mile radius of our store locations. You can check if delivery is available to your address during checkout. Delivery fees and minimum order requirements may apply.</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question">
                                <h4>Can I modify or cancel my order after placing it?</h4>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>You can modify or cancel your order within 5 minutes of placing it through the "Order Status" section in your account or by calling the store directly. Once preparation has begun, we cannot guarantee modifications or cancellations.</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question">
                                <h4>How long does it take to prepare my order?</h4>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Typical preparation time is 10-15 minutes for pickup orders and 25-35 minutes for delivery orders. During busy periods or for large orders, times may be longer. You'll receive notifications when your order is ready for pickup or out for delivery.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Account & Rewards -->
                    <div id="account" class="faq-category-section">
                        <h2>Account & Rewards</h2>

                        <div class="faq-item">
                            <div class="faq-question">
                                <h4>How do I create an Otlo Cafe account?</h4>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Click "Join now" on our website or app, then provide your email, create a password, and fill in your basic information. You'll receive a welcome email with account confirmation and information about our rewards program benefits.</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question">
                                <h4>How does the rewards program work?</h4>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Earn 1 star for every $1 spent. Collect stars to unlock rewards: 25 stars = free drink customization, 50 stars = free bakery item, 100 stars = free handcrafted drink, 200 stars = free lunch item. Stars never expire!</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question">
                                <h4>I forgot my password. How can I reset it?</h4>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Click "Sign in" then "Forgot password?" on our website or app. Enter your email address and we'll send you a password reset link. Follow the instructions in the email to create a new password.</p>
                            </div>
                        </div>

                        <div class="faq-item">
                            <div class="faq-question">
                                <h4>How can I check my rewards points balance?</h4>
                                <i class="fas fa-chevron-down"></i>
                            </div>
                            <div class="faq-answer">
                                <p>Log into your account on our website or app to view your current star balance, transaction history, and available rewards. You can also ask any team member at our stores to check your balance.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Still Need Help Section -->
    <div class="help-section">
        <div class="container">
            <div class="help-content">
                <h2>Still Need Help?</h2>
                <p>Can't find the answer you're looking for? Our customer service team is here to help.</p>
                <div class="help-options">
                    <a href="{{ route('frontend.customer-service') }}" class="help-option">
                        <i class="fas fa-headset"></i>
                        <span>Contact Support</span>
                    </a>
                    <a href="{{ route('frontend.feedback') }}" class="help-option">
                        <i class="fas fa-comment-dots"></i>
                        <span>Send Feedback</span>
                    </a>
                    <a href="tel:+15551234567" class="help-option">
                        <i class="fas fa-phone"></i>
                        <span>Call Us</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // FAQ JavaScript functionality
    document.addEventListener('DOMContentLoaded', function() {
        // FAQ accordion functionality
        const faqItems = document.querySelectorAll('.faq-item');
        faqItems.forEach(item => {
            const question = item.querySelector('.faq-question');
            const answer = item.querySelector('.faq-answer');

            question.addEventListener('click', () => {
                item.classList.toggle('active');
                if (item.classList.contains('active')) {
                    answer.style.maxHeight = answer.scrollHeight + 'px';
                } else {
                    answer.style.maxHeight = '0';
                }
            });
        });

        // Category navigation
        const categoryLinks = document.querySelectorAll('.category-link');
        const categorySections = document.querySelectorAll('.faq-category-section');

        categoryLinks.forEach(link => {
            link.addEventListener('click', (e) => {
                e.preventDefault();

                // Remove active class from all links and sections
                categoryLinks.forEach(l => l.classList.remove('active'));
                categorySections.forEach(s => s.classList.remove('active'));

                // Add active class to clicked link
                link.classList.add('active');

                // Show corresponding section
                const category = link.getAttribute('data-category');
                const section = document.getElementById(category);
                if (section) {
                    section.classList.add('active');
                }
            });
        });

        // Search functionality
        const searchInput = document.getElementById('faq-search');
        searchInput.addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            const allFaqItems = document.querySelectorAll('.faq-item');

            allFaqItems.forEach(item => {
                const question = item.querySelector('.faq-question h4').textContent.toLowerCase();
                const answer = item.querySelector('.faq-answer p').textContent.toLowerCase();

                if (question.includes(searchTerm) || answer.includes(searchTerm)) {
                    item.style.display = 'block';
                } else {
                    item.style.display = 'none';
                }
            });
        });
    });
</script>
@endpush