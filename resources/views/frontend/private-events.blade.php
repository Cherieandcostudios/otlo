@extends('frontend.layouts.app')

@section('title', 'Private Events - Otlo Cafe')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/pages-style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endpush

@section('content')
    <!-- Events Hero Section -->
    <div class="page-hero">
        <div class="container">
            <h1>Private <span class="highlight">Events</span></h1>
            <p>Create unforgettable moments at Otlo Cafe. From intimate gatherings to corporate meetings, we provide the perfect setting for your special events.</p>
            <div class="hero-stats">
                <div class="stat">
                    <span class="stat-number">500+</span>
                    <span class="stat-label">Events Hosted</span>
                </div>
                <div class="stat">
                    <span class="stat-number">50</span>
                    <span class="stat-label">Max Capacity</span>
                </div>
                <div class="stat">
                    <span class="stat-number">24/7</span>
                    <span class="stat-label">Event Support</span>
                </div>
            </div>
        </div>
    </div>

    <!-- Event Types Section -->
    <div class="events-section">
        <div class="container">
            <h2>Perfect Venue for Every Occasion</h2>
            <div class="events-grid">
                <div class="event-type-card">
                    <div class="type-icon">
                        <i class="fas fa-briefcase"></i>
                    </div>
                    <h3>Corporate Events</h3>
                    <p>Professional atmosphere for business meetings, team building, product launches, and corporate training sessions.</p>
                    <ul class="features">
                        <li>AV Equipment Available</li>
                        <li>Free WiFi & Power Outlets</li>
                        <li>Flexible Seating Arrangements</li>
                        <li>Catering Packages</li>
                    </ul>
                </div>

                <div class="event-type-card">
                    <div class="type-icon">
                        <i class="fas fa-birthday-cake"></i>
                    </div>
                    <h3>Birthday Parties</h3>
                    <p>Celebrate special birthdays in our cozy atmosphere with personalized decorations and custom cake options.</p>
                    <ul class="features">
                        <li>Custom Decorations</li>
                        <li>Birthday Cake Service</li>
                        <li>Photo Opportunities</li>
                        <li>Party Favors Available</li>
                    </ul>
                </div>

                <div class="event-type-card">
                    <div class="type-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <h3>Intimate Celebrations</h3>
                    <p>Perfect for anniversaries, engagement parties, baby showers, and other personal milestones.</p>
                    <ul class="features">
                        <li>Romantic Ambiance</li>
                        <li>Personalized Service</li>
                        <li>Custom Menu Options</li>
                        <li>Special Occasion Treats</li>
                    </ul>
                </div>

                <div class="event-type-card">
                    <div class="type-icon">
                        <i class="fas fa-graduation-cap"></i>
                    </div>
                    <h3>Educational Events</h3>
                    <p>Host workshops, book clubs, study groups, and educational seminars in our inspiring environment.</p>
                    <ul class="features">
                        <li>Quiet Study Areas</li>
                        <li>Presentation Equipment</li>
                        <li>Learning-Friendly Environment</li>
                        <li>Group Discounts</li>
                    </ul>
                </div>

                <div class="event-type-card">
                    <div class="type-icon">
                        <i class="fas fa-paint-brush"></i>
                    </div>
                    <h3>Creative Workshops</h3>
                    <p>Artistic events, craft workshops, poetry readings, and creative gatherings in our inspirational space.</p>
                    <ul class="features">
                        <li>Inspiring Atmosphere</li>
                        <li>Flexible Space Layout</li>
                        <li>Art Supply Storage</li>
                        <li>Natural Lighting</li>
                    </ul>
                </div>

                <div class="event-type-card">
                    <div class="type-icon">
                        <i class="fas fa-handshake"></i>
                    </div>
                    <h3>Networking Events</h3>
                    <p>Professional networking, industry meetups, and community gatherings in a welcoming environment.</p>
                    <ul class="features">
                        <li>Open Floor Plans</li>
                        <li>Networking Areas</li>
                        <li>Professional Atmosphere</li>
                        <li>Business Card Displays</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <!-- Contact Section -->
    <div class="contact-section" id="contact-events">
        <div class="container">
            <h2>Plan Your Event Today</h2>
            <p>Ready to create an unforgettable event? Get in touch with our event planning team.</p>

            <div class="contact-grid">
                <div class="contact-info">
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <div>
                            <h4>Call Us</h4>
                            <p>(555) 123-4567</p>
                            <span>Monday - Sunday: 8AM - 10PM</span>
                        </div>
                    </div>

                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <div>
                            <h4>Email Events Team</h4>
                            <p>events@otlocafe.com</p>
                            <span>Response within 24 hours</span>
                        </div>
                    </div>

                    <div class="contact-item">
                        <i class="fas fa-calendar-check"></i>
                        <div>
                            <h4>Schedule a Visit</h4>
                            <p>Tour our event spaces</p>
                            <span>By appointment only</span>
                        </div>
                    </div>

                    <div class="contact-item">
                        <i class="fas fa-map-marker-alt"></i>
                        <div>
                            <h4>Visit Us</h4>
                            <p>123 Coffee Street</p>
                            <span>City, State 12345</span>
                        </div>
                    </div>
                </div>

                <div class="contact-form">
                    <h3>Quick Event Inquiry</h3>
                    <form class="event-form">
                        <div class="form-row">
                            <div class="form-group">
                                <label for="event-name">Your Name</label>
                                <input type="text" id="event-name" required>
                            </div>
                            <div class="form-group">
                                <label for="event-email">Email Address</label>
                                <input type="email" id="event-email" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="event-phone">Phone Number</label>
                                <input type="tel" id="event-phone">
                            </div>
                            <div class="form-group">
                                <label for="event-date">Event Date</label>
                                <input type="date" id="event-date" required>
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group">
                                <label for="event-type">Event Type</label>
                                <select id="event-type" required>
                                    <option value="">Select Event Type</option>
                                    <option value="corporate">Corporate Event</option>
                                    <option value="birthday">Birthday Party</option>
                                    <option value="celebration">Celebration</option>
                                    <option value="workshop">Workshop</option>
                                    <option value="networking">Networking</option>
                                    <option value="other">Other</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="event-guests">Number of Guests</label>
                                <select id="event-guests" required>
                                    <option value="">Select Guest Count</option>
                                    <option value="5-10">5-10 guests</option>
                                    <option value="11-20">11-20 guests</option>
                                    <option value="21-30">21-30 guests</option>
                                    <option value="31-40">31-40 guests</option>
                                    <option value="41-50">41-50 guests</option>
                                    <option value="50+">50+ guests</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="event-message">Additional Details</label>
                            <textarea id="event-message" rows="4" placeholder="Tell us more about your event..."></textarea>
                        </div>

                        <button type="submit" class="hero-btn">Submit Inquiry</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection