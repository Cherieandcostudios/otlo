<!-- Footer -->
<footer>
    <div class="footer-content">
        <div class="footer-brand">
            <div class="footer-logo">
                <div class="logo-circle">
                    <img src="{{ asset('assets/image/logo.jpg') }}" alt="Otlo Cafe Logo">
                </div>
                <h3>Otlo Cafe</h3>
            </div>
            <p>Premium coffee experience with a modern touch. Join our community of coffee lovers and discover exceptional flavors.</p>
            <div class="social-links">
                <a href="#" class="social-link" aria-label="Facebook">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                    </svg>
                </a>
                <a href="#" class="social-link" aria-label="Instagram">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M12.017 0C5.396 0 .029 5.367.029 11.987c0 6.62 5.367 11.987 11.988 11.987s11.987-5.367 11.987-11.987C24.014 5.367 18.637.001 12.017.001zM8.449 16.988c-1.297 0-2.448-.49-3.323-1.297C4.198 14.895 3.708 13.744 3.708 12.447s.49-2.448 1.297-3.323c.875-.807 2.026-1.297 3.323-1.297s2.448.49 3.323 1.297c.807.875 1.297 2.026 1.297 3.323s-.49 2.448-1.297 3.323c-.875.807-2.026 1.297-3.323 1.297zm7.718-1.297c-.875.807-2.026 1.297-3.323 1.297s-2.448-.49-3.323-1.297c-.807-.875-1.297-2.026-1.297-3.323s.49-2.448 1.297-3.323c.875-.807 2.026-1.297 3.323-1.297s2.448.49 3.323 1.297c.807.875 1.297 2.026 1.297 3.323s-.49 2.448-1.297 3.323z"/>
                    </svg>
                </a>
                <a href="#" class="social-link" aria-label="Twitter">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                    </svg>
                </a>
                <a href="#" class="social-link" aria-label="YouTube">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                        <path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/>
                    </svg>
                </a>
            </div>
        </div>

        <div class="footer-section">
            <h3>Quick Links</h3>
            <a href="{{ route('frontend.about') }}">About Us</a>
            <a href="{{ route('frontend.our-caffe') }}">Our Caffe</a>
            <a href="{{ route('frontend.otlo-podcast') }}">Otlo Podcast</a>
            <a href="{{ route('frontend.contact') }}">Contact Us</a>
            <a href="{{ route('frontend.menu') }}">Menu</a>
        </div>

        <div class="footer-section">
            <h3>Otlo Activity</h3>
            <a href="{{ route('frontend.blog') }}">Blog</a>
            <a href="{{ route('frontend.library') }}">Otlo Library</a>
            <a href="{{ route('frontend.otlo-trust') }}">Otlo Trust</a>
            <a href="{{ route('frontend.otlo-poetry') }}">Otlo Poetry</a>
            <a href="{{ route('frontend.otlo-show') }}">Otlo Show</a>
            <a href="{{ route('frontend.calture-value') }}">Culture and Value</a>
        </div>

        <div class="footer-section">
            <h3>Services</h3>
            <a href="{{ route('frontend.franchise') }}">Franchise</a>
            <a href="{{ route('frontend.private-events') }}">Private Events</a>
            <a href="{{ route('frontend.location') }}">Delivery</a>
            <a href="{{ route('frontend.location') }}">Pickup</a>
        </div>

        <div class="footer-section">
            <h3>Support</h3>
            <a href="{{ route('frontend.customer-service') }}">Customer Service</a>
            <a href="{{ route('frontend.faq') }}">FAQ</a>
            <a href="{{ route('frontend.feedback') }}">Feedback</a>
            <a href="{{ route('frontend.accessibility') }}">Accessibility</a>
            <a href="{{ route('frontend.privacy') }}">Privacy Policy</a>
        </div>

        <div class="footer-section">
            <h3>Contact Info</h3>
            <p>📍 G70, 71, Silvar Business Point,<br>Near VIP Circle, Utran, - 394105</p>
            <p>📞 (555) 123-4567</p>
            <p>✉️ hello@otlocafe.com</p>
            <p>🕒 Mon-Fri: 6AM-8PM<br>Sat-Sun: 7AM-9PM</p>
        </div>
    </div>

    <div class="footer-bottom">
        <p>&copy; 2024 Otlo Cafe. All rights reserved. | <a href="{{ route('frontend.privacy') }}">Privacy Policy</a> | <a href="#">Terms of Use</a> | <a href="#">Cookie Preferences</a></p>
    </div>
</footer>