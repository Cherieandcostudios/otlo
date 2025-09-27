@extends('frontend.layouts.app')

@section('title', 'Franchise Opportunities - Otlo Cafe')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/franchise.css') }}">
@endpush

@section('content')
    <!-- Franchise Hero Section -->
    <section class="franchise-hero">
        <div class="franchise-hero-content">
            <div class="franchise-hero-text">
                <h1>Own Your <span class="highlight">Otlo Cafe</span> Franchise</h1>
                <p>Join our growing family of successful franchise partners. Build your business with a trusted brand that customers love.</p>
                <div class="hero-stats">
                    <div class="stat">
                        <span class="stat-number">500+</span>
                        <span class="stat-label">Locations</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">95%</span>
                        <span class="stat-label">Success Rate</span>
                    </div>
                    <div class="stat">
                        <span class="stat-number">25+</span>
                        <span class="stat-label">Years Experience</span>
                    </div>
                </div>
            </div>
            <div class="franchise-hero-image">
                <img src="{{ asset('assets/image/fen1.jpeg') }}" alt="Franchise Opportunity">
            </div>
        </div>
    </section>

    <!-- Why Choose Us Section -->
    <section class="why-choose-us">
        <div class="container">
            <h2 class="section-title">Why Choose Otlo Cafe Franchise?</h2>
            <div class="benefits-grid">
                <div class="benefit-card">
                    <div class="benefit-icon">🏪</div>
                    <h3>Proven Business Model</h3>
                    <p>25+ years of successful operations with a tested franchise system that delivers results.</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">📈</div>
                    <h3>Strong ROI</h3>
                    <p>Average return on investment of 25-30% with comprehensive financial support and guidance.</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">🎓</div>
                    <h3>Complete Training</h3>
                    <p>Extensive training program covering operations, marketing, and customer service excellence.</p>
                </div>
                <div class="benefit-card">
                    <div class="benefit-icon">🤝</div>
                    <h3>Ongoing Support</h3>
                    <p>Dedicated support team providing marketing, operations, and business development assistance.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Franchise Form Section -->
    <section class="franchise-form-section">
        <div class="container">
            <div class="form-container">
                <div class="form-header">
                    <h2>Start Your Franchise Journey</h2>
                    <p>Fill out the form below and our franchise team will contact you within 24 hours.</p>
                </div>

                <form class="franchise-form" id="franchiseForm">
                    <div class="form-row">
                        <div class="form-group">
                            <label for="firstName">First Name *</label>
                            <input type="text" id="firstName" name="firstName" required>
                        </div>
                        <div class="form-group">
                            <label for="lastName">Last Name *</label>
                            <input type="text" id="lastName" name="lastName" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="email">Email Address *</label>
                            <input type="email" id="email" name="email" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone Number *</label>
                            <input type="tel" id="phone" name="phone" required>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="city">Preferred City *</label>
                            <input type="text" id="city" name="city" required>
                        </div>
                        <div class="form-group">
                            <label for="investment">Investment Budget *</label>
                            <select id="investment" name="investment" required>
                                <option value="">Select Budget Range</option>
                                <option value="50k-100k">₹50L - ₹1Cr</option>
                                <option value="100k-200k">₹1Cr - ₹2Cr</option>
                                <option value="200k-500k">₹2Cr - ₹5Cr</option>
                                <option value="500k+">₹5Cr+</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="experience">Business Experience</label>
                        <select id="experience" name="experience">
                            <option value="">Select Experience Level</option>
                            <option value="none">No Business Experience</option>
                            <option value="some">Some Business Experience</option>
                            <option value="extensive">Extensive Business Experience</option>
                            <option value="franchise">Previous Franchise Experience</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="timeline">Expected Timeline</label>
                        <select id="timeline" name="timeline">
                            <option value="">Select Timeline</option>
                            <option value="immediate">Immediate (0-3 months)</option>
                            <option value="short">Short term (3-6 months)</option>
                            <option value="medium">Medium term (6-12 months)</option>
                            <option value="long">Long term (12+ months)</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="message">Additional Information</label>
                        <textarea id="message" name="message" rows="4" placeholder="Tell us about your goals, location preferences, or any questions you have..."></textarea>
                    </div>

                    <div class="form-group checkbox-group">
                        <label class="checkbox-label">
                            <input type="checkbox" id="agree" name="agree" required>
                            <span class="checkmark"></span>
                            I agree to receive information about franchise opportunities and understand that this is not an offer to sell a franchise. *
                        </label>
                    </div>

                    <button type="submit" class="submit-btn">Submit Application</button>
                </form>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
<script>
    // Franchise form handling
    document.getElementById('franchiseForm').addEventListener('submit', function(e) {
        e.preventDefault();

        // Show success message
        const submitBtn = document.querySelector('.submit-btn');
        const originalText = submitBtn.textContent;
        submitBtn.textContent = 'Application Submitted!';
        submitBtn.style.background = '#28a745';
        submitBtn.disabled = true;

        // Reset after 3 seconds
        setTimeout(() => {
            submitBtn.textContent = originalText;
            submitBtn.style.background = '#b40c25';
            submitBtn.disabled = false;
            this.reset();
        }, 3000);
    });
</script>
@endpush