@extends('frontend.layouts.app')

@section('title', 'Privacy Policy - Otlo Cafe')

@push('styles')
<link rel="stylesheet" href="{{ asset('assets/css/pages-style.css') }}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
@endpush

@section('content')
    <!-- Privacy Hero Section -->
    <div class="page-hero">
        <div class="container">
            <h1>Privacy <span class="highlight">Policy</span></h1>
            <p>Your privacy is important to us. Learn how we collect, use, and protect your personal information at Otlo Cafe.</p>
        </div>
    </div>

    <!-- Privacy Overview Section -->
    <div class="privacy-overview">
        <div class="container">
            <h2>Our Commitment to Your Privacy</h2>
            <div class="overview-grid">
                <div class="overview-card">
                    <i class="fas fa-handshake"></i>
                    <h3>Transparency</h3>
                    <p>We clearly explain what information we collect and how we use it.</p>
                </div>

                <div class="overview-card">
                    <i class="fas fa-user-cog"></i>
                    <h3>Control</h3>
                    <p>You have control over your personal information and privacy settings.</p>
                </div>

                <div class="overview-card">
                    <i class="fas fa-shield"></i>
                    <h3>Security</h3>
                    <p>We use industry-standard security measures to protect your data.</p>
                </div>

                <div class="overview-card">
                    <i class="fas fa-balance-scale"></i>
                    <h3>Compliance</h3>
                    <p>We comply with applicable privacy laws and regulations.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Privacy Content Section -->
    <div class="section">
        <div class="container">
            <div class="content-layout">
                <!-- Table of Contents -->
                <div class="privacy-nav">
                    <h3>Table of Contents</h3>
                    <ul>
                        <li><a href="#information-collection">Information We Collect</a></li>
                        <li><a href="#information-use">How We Use Your Information</a></li>
                        <li><a href="#information-sharing">Information Sharing</a></li>
                        <li><a href="#cookies">Cookies and Tracking</a></li>
                        <li><a href="#data-security">Data Security</a></li>
                        <li><a href="#your-rights">Your Rights</a></li>
                        <li><a href="#retention">Data Retention</a></li>
                        <li><a href="#children">Children's Privacy</a></li>
                        <li><a href="#updates">Policy Updates</a></li>
                        <li><a href="#contact-privacy">Contact Us</a></li>
                    </ul>
                </div>

                <!-- Main Content -->
                <div class="privacy-content">
                    <section id="information-collection" class="privacy-section">
                        <h2>Information We Collect</h2>
                        <p>We collect information you provide directly to us, information we obtain automatically when you use our services, and information from other sources.</p>

                        <h3>Information You Provide to Us</h3>
                        <ul>
                            <li><strong>Account Information:</strong> Name, email address, phone number, and password when you create an account</li>
                            <li><strong>Profile Information:</strong> Profile picture, preferences, and other optional profile details</li>
                            <li><strong>Payment Information:</strong> Credit card details, billing address, and payment history</li>
                            <li><strong>Order Information:</strong> Purchase history, delivery addresses, and special instructions</li>
                            <li><strong>Communications:</strong> Messages you send to us, feedback, and survey responses</li>
                            <li><strong>Marketing Preferences:</strong> Your preferences for receiving promotional communications</li>
                        </ul>

                        <h3>Information We Collect Automatically</h3>
                        <ul>
                            <li><strong>Usage Information:</strong> How you interact with our website and mobile app</li>
                            <li><strong>Device Information:</strong> Device type, operating system, browser type, and unique device identifiers</li>
                            <li><strong>Location Information:</strong> Approximate location based on IP address or precise location if you grant permission</li>
                            <li><strong>Log Information:</strong> Server logs, including IP address, date/time stamps, and pages visited</li>
                            <li><strong>Cookies and Similar Technologies:</strong> Information collected through cookies, web beacons, and similar technologies</li>
                        </ul>
                    </section>

                    <section id="information-use" class="privacy-section">
                        <h2>How We Use Your Information</h2>
                        <p>We use the information we collect to provide, maintain, and improve our services, process transactions, and communicate with you.</p>

                        <div class="use-categories">
                            <div class="use-category">
                                <h3><i class="fas fa-shopping-cart"></i> Service Provision</h3>
                                <ul>
                                    <li>Process and fulfill your orders</li>
                                    <li>Manage your account and preferences</li>
                                    <li>Provide customer support</li>
                                    <li>Send order confirmations and updates</li>
                                </ul>
                            </div>

                            <div class="use-category">
                                <h3><i class="fas fa-chart-line"></i> Service Improvement</h3>
                                <ul>
                                    <li>Analyze usage patterns and trends</li>
                                    <li>Develop new features and services</li>
                                    <li>Conduct research and analytics</li>
                                    <li>Improve our website and mobile app</li>
                                </ul>
                            </div>

                            <div class="use-category">
                                <h3><i class="fas fa-bullhorn"></i> Marketing and Communications</h3>
                                <ul>
                                    <li>Send promotional offers and updates</li>
                                    <li>Personalize your experience</li>
                                    <li>Conduct surveys and market research</li>
                                    <li>Send newsletters and notifications</li>
                                </ul>
                            </div>

                            <div class="use-category">
                                <h3><i class="fas fa-gavel"></i> Legal and Security</h3>
                                <ul>
                                    <li>Prevent fraud and abuse</li>
                                    <li>Comply with legal obligations</li>
                                    <li>Protect our rights and property</li>
                                    <li>Ensure platform security</li>
                                </ul>
                            </div>
                        </div>
                    </section>

                    <section id="data-security" class="privacy-section">
                        <h2>Data Security</h2>
                        <p>We implement appropriate security measures to protect your personal information against unauthorized access, alteration, disclosure, or destruction.</p>

                        <div class="security-measures">
                            <div class="security-item">
                                <i class="fas fa-lock"></i>
                                <h4>Encryption</h4>
                                <p>Data is encrypted in transit and at rest using industry-standard encryption protocols.</p>
                            </div>

                            <div class="security-item">
                                <i class="fas fa-server"></i>
                                <h4>Secure Infrastructure</h4>
                                <p>Our servers are hosted in secure data centers with physical and network security controls.</p>
                            </div>

                            <div class="security-item">
                                <i class="fas fa-user-check"></i>
                                <h4>Access Controls</h4>
                                <p>Access to personal information is restricted to authorized employees who need it for business purposes.</p>
                            </div>

                            <div class="security-item">
                                <i class="fas fa-shield-virus"></i>
                                <h4>Regular Monitoring</h4>
                                <p>We regularly monitor our systems for potential vulnerabilities and security threats.</p>
                            </div>
                        </div>
                    </section>

                    <section id="contact-privacy" class="privacy-section">
                        <h2>Contact Us</h2>
                        <p>If you have questions about this Privacy Policy or our privacy practices, please contact us:</p>

                        <div class="contact-privacy-methods">
                            <div class="contact-privacy-method">
                                <i class="fas fa-envelope"></i>
                                <div>
                                    <h4>Email</h4>
                                    <p>privacy@otlocafe.com</p>
                                </div>
                            </div>

                            <div class="contact-privacy-method">
                                <i class="fas fa-phone"></i>
                                <div>
                                    <h4>Phone</h4>
                                    <p>(555) 123-4567</p>
                                </div>
                            </div>

                            <div class="contact-privacy-method">
                                <i class="fas fa-map-marker-alt"></i>
                                <div>
                                    <h4>Mail</h4>
                                    <p>Otlo Cafe Privacy Team<br>123 Coffee Street<br>City, State 12345</p>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>
        </div>
    </div>
@endsection