@extends('frontend.layouts.app')

@section('title', 'Customer Service - Otlo Cafe')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/pages-style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endpush

@section('content')
    <!-- Customer Service Hero Section -->
    <div class="page-hero">
        <div class="container">
            <h1>Customer <span class="highlight">Service</span></h1>
            <p>We're here to help you have the best possible experience at Otlo Cafe. Find answers, get support, and connect with our friendly team.</p>
        </div>
    </div>

    <!-- Quick Support Section -->
    <div class="section">
        <div class="container">
            <h2>Quick Support Options</h2>
            <div class="support-options-grid">
                <div class="support-option-card">
                    <div class="support-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <h3>Live Chat</h3>
                    <p>Get instant help from our support team. Available 24/7 for your convenience.</p>
                    <a href="#" class="support-btn">Start Chat</a>
                </div>

                <div class="support-option-card">
                    <div class="support-icon">
                        <i class="fas fa-phone-alt"></i>
                    </div>
                    <h3>Phone Support</h3>
                    <p>Speak directly with our customer service representatives for personalized assistance.</p>
                    <a href="tel:+15551234567" class="support-btn">Call Now</a>
                </div>

                <div class="support-option-card">
                    <div class="support-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <h3>Email Support</h3>
                    <p>Send us detailed questions and we'll respond within 24 hours with solutions.</p>
                    <a href="mailto:support@otlocafe.com" class="support-btn">Send Email</a>
                </div>

                <div class="support-option-card">
                    <div class="support-icon">
                        <i class="fas fa-question-circle"></i>
                    </div>
                    <h3>FAQ</h3>
                    <p>Browse our comprehensive FAQ section for quick answers to common questions.</p>
                    <a href="{{ route('frontend.faq') }}" class="support-btn">View FAQ</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Information Section -->
    <div class="contact-info-section">
        <div class="container">
            <h2>Contact Information</h2>
            <div class="contact-details-grid">
                <div class="contact-detail-card">
                    <div class="detail-icon">
                        <i class="fas fa-phone"></i>
                    </div>
                    <div class="detail-content">
                        <h4>Customer Service Line</h4>
                        <p>(555) 123-4567</p>
                        <span>Available 24/7</span>
                    </div>
                </div>

                <div class="contact-detail-card">
                    <div class="detail-icon">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="detail-content">
                        <h4>Email Support</h4>
                        <p>support@otlocafe.com</p>
                        <span>Response within 24 hours</span>
                    </div>
                </div>

                <div class="contact-detail-card">
                    <div class="detail-icon">
                        <i class="fas fa-map-marker-alt"></i>
                    </div>
                    <div class="detail-content">
                        <h4>Headquarters</h4>
                        <p>123 Coffee Street<br>City, State 12345</p>
                        <span>Mon-Fri: 9AM-6PM</span>
                    </div>
                </div>

                <div class="contact-detail-card">
                    <div class="detail-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="detail-content">
                        <h4>Support Hours</h4>
                        <p>24/7 Live Chat & Phone</p>
                        <span>Email: Mon-Sun</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Service Categories Section -->
    <div class="section">
        <div class="container">
            <h2>How Can We Help You?</h2>
            <div class="service-categories-grid">
                <div class="service-category-card">
                    <div class="category-icon">
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                    <h3>Order Support</h3>
                    <p>Questions about your order, delivery status, or payment issues.</p>
                    <ul>
                        <li>Order tracking and delivery</li>
                        <li>Payment and billing inquiries</li>
                        <li>Order modifications and cancellations</li>
                        <li>Refunds and returns</li>
                    </ul>
                </div>

                <div class="service-category-card">
                    <div class="category-icon">
                        <i class="fas fa-user-circle"></i>
                    </div>
                    <h3>Account Help</h3>
                    <p>Assistance with your Otlo Cafe account and rewards program.</p>
                    <ul>
                        <li>Account registration and login</li>
                        <li>Password reset and security</li>
                        <li>Rewards points and benefits</li>
                        <li>Profile and preferences</li>
                    </ul>
                </div>

                <div class="service-category-card">
                    <div class="category-icon">
                        <i class="fas fa-coffee"></i>
                    </div>
                    <h3>Product Information</h3>
                    <p>Learn more about our menu items, ingredients, and nutritional information.</p>
                    <ul>
                        <li>Menu items and seasonal offerings</li>
                        <li>Allergen and dietary information</li>
                        <li>Nutritional facts and ingredients</li>
                        <li>Customization options</li>
                    </ul>
                </div>

                <div class="service-category-card">
                    <div class="category-icon">
                        <i class="fas fa-store"></i>
                    </div>
                    <h3>Store Locations</h3>
                    <p>Find store locations, hours, and specific location services.</p>
                    <ul>
                        <li>Store finder and directions</li>
                        <li>Store hours and holidays</li>
                        <li>Location-specific services</li>
                        <li>Accessibility features</li>
                    </ul>
                </div>

                <div class="service-category-card">
                    <div class="category-icon">
                        <i class="fas fa-mobile-alt"></i>
                    </div>
                    <h3>Technical Support</h3>
                    <p>Help with our website, mobile app, and digital services.</p>
                    <ul>
                        <li>Website and app troubleshooting</li>
                        <li>Mobile ordering assistance</li>
                        <li>Payment method issues</li>
                        <li>Digital receipt problems</li>
                    </ul>
                </div>

                <div class="service-category-card">
                    <div class="category-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3>General Inquiries</h3>
                    <p>Feedback, suggestions, and general questions about Otlo Cafe.</p>
                    <ul>
                        <li>Feedback and suggestions</li>
                        <li>Corporate information</li>
                        <li>Partnership opportunities</li>
                        <li>Media and press inquiries</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Emergency Contact Section -->
    <div class="emergency-contact-section">
        <div class="container">
            <div class="emergency-card">
                <div class="emergency-icon">
                    <i class="fas fa-exclamation-triangle"></i>
                </div>
                <div class="emergency-content">
                    <h3>Emergency or Urgent Issues</h3>
                    <p>For urgent matters such as food safety concerns, allergic reactions, or store emergencies, please call our 24/7 emergency line immediately.</p>
                    <div class="emergency-actions">
                        <a href="tel:+15551234567" class="emergency-btn">
                            <i class="fas fa-phone"></i> Emergency Line: (555) 123-4567
                        </a>
                        <a href="mailto:emergency@otlocafe.com" class="emergency-btn secondary">
                            <i class="fas fa-envelope"></i> emergency@otlocafe.com
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection