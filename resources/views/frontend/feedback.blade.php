@extends('frontend.layouts.app')

@section('title', 'Feedback - Otlo Cafe')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/pages-style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endpush

@section('content')
    <!-- Feedback Hero Section -->
    <div class="page-hero">
        <div class="container">
            <h1>Share Your <span class="highlight">Feedback</span></h1>
            <p>Your opinion matters to us. Help us improve by sharing your thoughts, suggestions, and experiences at Otlo Cafe.</p>
        </div>
    </div>

    <!-- Feedback Options Section -->
    <div class="section">
        <div class="container">
            <h2>How Would You Like to Share Feedback?</h2>
            <div class="feedback-options-grid">
                <div class="feedback-option-card">
                    <div class="feedback-icon">
                        <i class="fas fa-thumbs-up"></i>
                    </div>
                    <h3>General Feedback</h3>
                    <p>Share your overall experience, suggestions for improvement, or compliments about our service.</p>
                    <a href="#feedback-form" class="feedback-btn">Give Feedback</a>
                </div>

                <div class="feedback-option-card">
                    <div class="feedback-icon">
                        <i class="fas fa-exclamation-circle"></i>
                    </div>
                    <h3>Report an Issue</h3>
                    <p>Let us know about any problems you've encountered with our service, products, or facilities.</p>
                    <a href="#feedback-form" class="feedback-btn">Report Issue</a>
                </div>

                <div class="feedback-option-card">
                    <div class="feedback-icon">
                        <i class="fas fa-lightbulb"></i>
                    </div>
                    <h3>Suggest Improvements</h3>
                    <p>Have ideas for new menu items, services, or ways we can enhance your Otlo Cafe experience?</p>
                    <a href="#feedback-form" class="feedback-btn">Share Ideas</a>
                </div>

                <div class="feedback-option-card">
                    <div class="feedback-icon">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3>Rate Your Experience</h3>
                    <p>Rate your recent visit and let us know what we did well and what we can do better.</p>
                    <a href="#feedback-form" class="feedback-btn">Leave Rating</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Feedback Stats Section -->
    <div class="feedback-stats-section">
        <div class="container">
            <h2>Your Voice Makes a Difference</h2>
            <div class="stats-grid">
                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-comments"></i>
                    </div>
                    <div class="stat-number">10,000+</div>
                    <div class="stat-label">Feedback Received</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-rocket"></i>
                    </div>
                    <div class="stat-number">250+</div>
                    <div class="stat-label">Improvements Made</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <div class="stat-number">24 Hours</div>
                    <div class="stat-label">Average Response Time</div>
                </div>

                <div class="stat-card">
                    <div class="stat-icon">
                        <i class="fas fa-heart"></i>
                    </div>
                    <div class="stat-number">98%</div>
                    <div class="stat-label">Customer Satisfaction</div>
                </div>
            </div>
        </div>
    </div>

    <!-- Feedback Form Section -->
    <div class="feedback-form-section" id="feedback-form">
        <div class="container">
            <div class="form-layout">
                <div class="form-intro">
                    <h2>Tell Us About Your Experience</h2>
                    <p>We value every piece of feedback and use it to continually improve our service. Please take a few minutes to share your thoughts with us.</p>

                    <div class="form-benefits">
                        <div class="benefit-item">
                            <i class="fas fa-check-circle"></i>
                            <span>Quick and easy to complete</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-shield-alt"></i>
                            <span>Your information is secure</span>
                        </div>
                        <div class="benefit-item">
                            <i class="fas fa-reply"></i>
                            <span>We respond to all feedback</span>
                        </div>
                    </div>
                </div>

                <div class="feedback-form-container">
                    <form class="feedback-form" id="feedbackForm">
                        <div class="form-step active" id="step1">
                            <h3>Basic Information</h3>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="feedback-name">Your Name</label>
                                    <input type="text" id="feedback-name" required>
                                </div>
                                <div class="form-group">
                                    <label for="feedback-email">Email Address</label>
                                    <input type="email" id="feedback-email" required>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group">
                                    <label for="feedback-phone">Phone Number (Optional)</label>
                                    <input type="tel" id="feedback-phone">
                                </div>
                                <div class="form-group">
                                    <label for="visit-location">Which Location Did You Visit?</label>
                                    <select id="visit-location" required>
                                        <option value="">Select Location</option>
                                        <option value="downtown">Downtown Location</option>
                                        <option value="uptown">Uptown Location</option>
                                        <option value="riverside">Riverside Location</option>
                                        <option value="mall">Shopping Mall Location</option>
                                        <option value="online">Online Order</option>
                                        <option value="other">Other</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="visit-date">When Did You Visit?</label>
                                <input type="date" id="visit-date" required>
                            </div>

                            <button type="button" class="form-btn next-btn" onclick="nextStep(1)">Next</button>
                        </div>

                        <div class="form-step" id="step2">
                            <h3>Rate Your Experience</h3>

                            <div class="rating-section">
                                <label>Overall Experience</label>
                                <div class="star-rating" data-rating="overall">
                                    <i class="fas fa-star" data-value="1"></i>
                                    <i class="fas fa-star" data-value="2"></i>
                                    <i class="fas fa-star" data-value="3"></i>
                                    <i class="fas fa-star" data-value="4"></i>
                                    <i class="fas fa-star" data-value="5"></i>
                                </div>
                            </div>

                            <div class="rating-section">
                                <label>Food Quality</label>
                                <div class="star-rating" data-rating="food">
                                    <i class="fas fa-star" data-value="1"></i>
                                    <i class="fas fa-star" data-value="2"></i>
                                    <i class="fas fa-star" data-value="3"></i>
                                    <i class="fas fa-star" data-value="4"></i>
                                    <i class="fas fa-star" data-value="5"></i>
                                </div>
                            </div>

                            <div class="rating-section">
                                <label>Service Quality</label>
                                <div class="star-rating" data-rating="service">
                                    <i class="fas fa-star" data-value="1"></i>
                                    <i class="fas fa-star" data-value="2"></i>
                                    <i class="fas fa-star" data-value="3"></i>
                                    <i class="fas fa-star" data-value="4"></i>
                                    <i class="fas fa-star" data-value="5"></i>
                                </div>
                            </div>

                            <div class="rating-section">
                                <label>Atmosphere</label>
                                <div class="star-rating" data-rating="atmosphere">
                                    <i class="fas fa-star" data-value="1"></i>
                                    <i class="fas fa-star" data-value="2"></i>
                                    <i class="fas fa-star" data-value="3"></i>
                                    <i class="fas fa-star" data-value="4"></i>
                                    <i class="fas fa-star" data-value="5"></i>
                                </div>
                            </div>

                            <div class="form-buttons">
                                <button type="button" class="form-btn back-btn" onclick="prevStep(2)">Back</button>
                                <button type="submit" class="form-btn submit-btn">Submit Feedback</button>
                            </div>
                        </div>

                        <div class="form-step" id="success-message" style="display: none;">
                            <div class="success-content">
                                <i class="fas fa-check-circle success-icon"></i>
                                <h3>Thank You for Your Feedback!</h3>
                                <p>Your feedback has been successfully submitted. We appreciate you taking the time to help us improve.</p>
                                <p><strong>What happens next?</strong></p>
                                <ul>
                                    <li>Our team will review your feedback within 24 hours</li>
                                    <li>If you requested follow-up, we'll contact you within 2-3 business days</li>
                                    <li>Your suggestions will be shared with the appropriate team members</li>
                                </ul>
                                <button type="button" class="form-btn" onclick="resetForm()">Submit Another Feedback</button>
                            </div>
                        </div>

                        <div class="form-progress">
                            <div class="progress-step active" data-step="1">1</div>
                            <div class="progress-line"></div>
                            <div class="progress-step" data-step="2">2</div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Alternative Feedback Methods -->
    <div class="alternative-feedback-section">
        <div class="container">
            <h2>Other Ways to Reach Us</h2>
            <div class="alternative-methods">
                <div class="method-card">
                    <i class="fas fa-phone-alt"></i>
                    <h4>Call Us</h4>
                    <p>Speak directly with our customer service team</p>
                    <a href="tel:+15551234567" class="method-link">(555) 123-4567</a>
                </div>

                <div class="method-card">
                    <i class="fas fa-envelope"></i>
                    <h4>Email Us</h4>
                    <p>Send detailed feedback via email</p>
                    <a href="mailto:feedback@otlocafe.com" class="method-link">feedback@otlocafe.com</a>
                </div>

                <div class="method-card">
                    <i class="fas fa-comments"></i>
                    <h4>Live Chat</h4>
                    <p>Get instant support through our website</p>
                    <a href="#" class="method-link">Start Chat</a>
                </div>

                <div class="method-card">
                    <i class="fas fa-map-marker-alt"></i>
                    <h4>In-Person</h4>
                    <p>Visit any of our locations to speak with management</p>
                    <a href="{{ route('frontend.location') }}" class="method-link">Find Locations</a>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
<script>
    // Feedback form functionality
    let currentStep = 1;
    const ratings = {};

    // Star rating functionality
    document.querySelectorAll('.star-rating').forEach(ratingContainer => {
        const stars = ratingContainer.querySelectorAll('.fas.fa-star');
        const ratingType = ratingContainer.getAttribute('data-rating');

        stars.forEach((star, index) => {
            star.addEventListener('click', () => {
                const rating = index + 1;
                ratings[ratingType] = rating;

                // Update visual state
                stars.forEach((s, i) => {
                    if (i < rating) {
                        s.classList.add('active');
                    } else {
                        s.classList.remove('active');
                    }
                });
            });

            star.addEventListener('mouseenter', () => {
                stars.forEach((s, i) => {
                    if (i <= index) {
                        s.style.color = '#b40c25';
                    } else {
                        s.style.color = '#ddd';
                    }
                });
            });
        });

        ratingContainer.addEventListener('mouseleave', () => {
            const currentRating = ratings[ratingType] || 0;
            stars.forEach((s, i) => {
                if (i < currentRating) {
                    s.style.color = '#b40c25';
                } else {
                    s.style.color = '#ddd';
                }
            });
        });
    });

    function nextStep(step) {
        if (validateStep(step)) {
            document.getElementById(`step${step}`).classList.remove('active');
            document.getElementById(`step${step + 1}`).classList.add('active');

            // Update progress
            document.querySelector(`[data-step="${step + 1}"]`).classList.add('active');
            currentStep = step + 1;
        }
    }

    function prevStep(step) {
        document.getElementById(`step${step}`).classList.remove('active');
        document.getElementById(`step${step - 1}`).classList.add('active');

        // Update progress
        document.querySelector(`[data-step="${step}"]`).classList.remove('active');
        currentStep = step - 1;
    }

    function validateStep(step) {
        if (step === 1) {
            const name = document.getElementById('feedback-name').value;
            const email = document.getElementById('feedback-email').value;
            const location = document.getElementById('visit-location').value;
            const date = document.getElementById('visit-date').value;

            if (!name || !email || !location || !date) {
                alert('Please fill in all required fields.');
                return false;
            }
        }

        if (step === 2) {
            if (!ratings.overall || !ratings.food || !ratings.service || !ratings.atmosphere) {
                alert('Please provide ratings for all categories.');
                return false;
            }
        }

        return true;
    }

    function resetForm() {
        document.getElementById('feedbackForm').reset();
        document.getElementById('success-message').style.display = 'none';
        document.getElementById('step1').classList.add('active');

        // Reset progress
        document.querySelectorAll('.progress-step').forEach(step => {
            step.classList.remove('active');
        });
        document.querySelector('[data-step="1"]').classList.add('active');

        // Reset ratings
        document.querySelectorAll('.star-rating .fas').forEach(star => {
            star.classList.remove('active');
            star.style.color = '#ddd';
        });

        Object.keys(ratings).forEach(key => delete ratings[key]);
        currentStep = 1;
    }

    // Form submission
    document.getElementById('feedbackForm').addEventListener('submit', function(e) {
        e.preventDefault();

        // Hide form steps and show success message
        document.querySelectorAll('.form-step').forEach(step => {
            step.classList.remove('active');
        });
        document.getElementById('success-message').style.display = 'block';

        // Here you would normally send the data to your server
        console.log('Feedback submitted:', {
            name: document.getElementById('feedback-name').value,
            email: document.getElementById('feedback-email').value,
            phone: document.getElementById('feedback-phone').value,
            location: document.getElementById('visit-location').value,
            date: document.getElementById('visit-date').value,
            ratings: ratings
        });
    });

    // Smooth scroll for feedback form links
    document.querySelectorAll('a[href="#feedback-form"]').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            document.getElementById('feedback-form').scrollIntoView({
                behavior: 'smooth'
            });
        });
    });
</script>
@endpush