@extends('layout')

@section('title', 'Book Your Luxury Stay')

@section('content')
<!-- Booking Hero Section -->
<section class="booking-hero py-5 position-relative overflow-hidden">
    <!-- Floating Particles -->
    <div class="luxury-particles">
        <div class="particle particle-1"></div>
        <div class="particle particle-2"></div>
        <div class="particle particle-3"></div>
        <div class="particle particle-4"></div>
        <div class="particle particle-5"></div>
        <div class="particle particle-6"></div>
        <div class="particle particle-7"></div>
        <div class="particle particle-8"></div>
    </div>
    
    <div class="container">
        <div class="row align-items-center min-vh-50">
            <div class="col-lg-6" data-aos="fade-right">
                <h1 class="booking-title mb-4">Reserve Your Perfect Stay</h1>
                <p class="booking-subtitle mb-4">Experience unparalleled luxury with our seamless booking process. Every detail is crafted to ensure your stay exceeds expectations.</p>
                <div class="booking-features">
                    <div class="feature-item">
                        <i class="bi bi-shield-check"></i>
                        <span>Secure Booking</span>
                    </div>
                    <div class="feature-item">
                        <i class="bi bi-clock"></i>
                        <span>Instant Confirmation</span>
                    </div>
                    <div class="feature-item">
                        <i class="bi bi-telephone"></i>
                        <span>24/7 Support</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
            </div>
        </div>
    </div>
</section>

<!-- Booking Form Section -->
<section class="booking-form-section py-5">
    <div class="container">
    <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="booking-form-container">
                    <!-- Progress Steps -->
                    <div class="booking-progress mb-5" data-aos="fade-up">
                        <div class="progress-steps">
                            <div class="step active" data-step="1">
                                <div class="step-number">1</div>
                                <div class="step-label">Personal Info</div>
                            </div>
                            <div class="step" data-step="2">
                                <div class="step-number">2</div>
                                <div class="step-label">Room Selection</div>
                            </div>
                            <div class="step" data-step="3">
                                <div class="step-number">3</div>
                                <div class="step-label">Dates & Preferences</div>
                            </div>
                            <div class="step" data-step="4">
                                <div class="step-number">4</div>
                                <div class="step-label">Confirmation</div>
                            </div>
                        </div>
                    </div>

                    <!-- Booking Form -->
                    <form id="bookingForm" class="booking-form" data-aos="fade-up" data-aos-delay="200">
                        <!-- Step 1: Personal Information Only -->
                        <div class="form-step active" data-step="1" id="personalInfoStep">
                            <h3 class="step-title mb-4">Personal Information</h3>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label">First Name *</label>
                                        <input type="text" class="form-control" name="first_name" placeholder="Enter your first name" required>
                                        <div class="form-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label">Last Name *</label>
                                        <input type="text" class="form-control" name="last_name" placeholder="Enter your last name" required>
                                        <div class="form-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label">Email Address *</label>
                                        <input type="email" class="form-control" name="email" placeholder="example@email.com" required>
                                        <div class="form-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label">Phone Number *</label>
                                        <input type="tel" class="form-control" name="phone" placeholder="+1 (555) 123-4567" required>
                                        <div class="form-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Step 2: Room Selection -->
                        <div class="form-step" data-step="2" id="roomSelectionStep">
                            <h3 class="step-title mb-4">Select Your Room(s)</h3>
                            <p class="mb-4" style="color: var(--current-text-light);">Choose one or more rooms for your stay. Selected rooms will glow with a gold border.</p>
                            <div class="room-selection">
                                <div class="row" id="roomOptions">
                                    <!-- Room options will be loaded dynamically -->
                                </div>
                            </div>
                            <div id="roomSelectionError" class="form-feedback error mb-3" style="display:none;"></div>
                        </div>

                        <!-- Step 3: Dates & Preferences -->
                        <div class="form-step" data-step="3" id="datesStep">
                            <h3 class="step-title mb-4">Dates & Guests Per Room</h3>
                            <p class="mb-4" style="color: var(--current-text-light);">Please provide check-in, check-out dates and number of guests for each selected room.</p>
                            <div id="datesPerRoomFields">
                                <!-- Date fields will be generated dynamically for each selected room -->
                            </div>
                            <div id="datesPerRoomError" class="form-feedback error mb-3" style="display:none;"></div>
                        </div>

                        <!-- Step 4: Confirmation & Cart -->
                        <div class="form-step" data-step="4" id="summaryStep">
                            <h3 class="step-title mb-4">Booking Confirmation</h3>
                            <div class="booking-summary">
                                <div class="summary-card">
                                    <h5 class="mb-4">Review Your Booking</h5>
                                    <div class="summary-details" id="bookingSummary">
                                        <!-- Summary will be generated dynamically -->
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Form Navigation -->
                        <div class="form-navigation mt-5">
                            <button type="button" class="btn btn-outline-primary" id="prevBtn" style="display: none;">
                                <i class="bi bi-arrow-left me-2"></i>Previous
                            </button>
                            <button type="button" class="btn btn-primary ms-auto" id="nextBtn">
                                Next<i class="bi bi-arrow-right ms-2"></i>
                            </button>
                            <button type="button" class="btn btn-success ms-auto" id="proceedToCartBtn" style="display: none;">
                                <i class="bi bi-cart-check me-2"></i>Proceed to Cart
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Additional Services Section -->
<section class="additional-services py-5">
    <div class="container">
        <h3 class="text-center mb-5" data-aos="fade-up">Enhance Your Stay</h3>
        <div class="row">
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="bi bi-airplane"></i>
                    </div>
                    <h5 class="service-title">Airport Transfer</h5>
                    <p class="service-desc">Private luxury car service for seamless airport arrivals and departures.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="bi bi-cup-hot"></i>
                    </div>
                    <h5 class="service-title">In-Suite Dining</h5>
                    <p class="service-desc">Gourmet meals curated by our chefs, served in the comfort of your room.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="bi bi-heart-pulse"></i>
                    </div>
                    <h5 class="service-title">Aurora Pool</h5>
                    <p class="service-desc">Infinity pool illuminated by ambient lights for tranquil night swims.</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-6 mb-4" data-aos="fade-up" data-aos-delay="400">
                <div class="service-card">
                    <div class="service-icon">
                        <i class="bi bi-car-front"></i>
                    </div>
                    <h5 class="service-title">Library Lounge</h5>
                    <p class="service-desc">Accessible lounge with rare books and vintage spirits.</p>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>

<!-- Notification Container -->
<div id="bookingNotification" class="booking-notification">
    <div class="notification-content">
        <div class="notification-icon">
            <i class="bi bi-exclamation-circle"></i>
        </div>
        <div class="notification-text">
            <h5 class="notification-title">Notification</h5>
            <p class="notification-message">Message goes here</p>
        </div>
    </div>
</div>

<style>
/* Booking Hero Section */
.booking-hero {
    background: var(--current-gradient);
    position: relative;
    overflow: hidden;
}

/* Booking Page Navigation - Matches Page Gradient */
body[data-theme="vault"] .navbar {
    background: linear-gradient(135deg, #0E0E10 0%, #17181B 100%) !important;
    backdrop-filter: blur(20px) !important;
    border-bottom: 1px solid rgba(197, 165, 114, 0.2) !important;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3) !important;
}

body[data-theme="solice"] .navbar {
    background: linear-gradient(135deg, #F5F1EB 0%, #E8E2D5 100%) !important;
    backdrop-filter: blur(20px) !important;
    border-bottom: 1px solid rgba(197, 165, 114, 0.2) !important;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1) !important;
}

.booking-title {
    font-family: var(--font-primary);
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 700;
    color: var(--current-text);
    margin-bottom: 1.5rem;
}

.booking-subtitle {
    font-size: 1.2rem;
    color: var(--current-text-light);
    line-height: 1.6;
    margin-bottom: 2rem;
}

.booking-features {
    display: flex;
    gap: 2rem;
    flex-wrap: wrap;
}

.feature-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: var(--current-text);
    font-weight: 500;
}

.feature-item i {
    color: var(--current-gold);
    font-size: 1.2rem;
}

.booking-hero-image {
    height: 400px;
    border-radius: 20px;
    overflow: hidden;
    position: relative;
}

.image-placeholder {
    width: 100%;
    height: 100%;
    background: var(--current-accent);
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    font-size: 3rem;
    color: var(--current-text-light);
}

/* Booking Form Section */
.booking-form-section {
    background: var(--current-primary);
}

.booking-form-container {
    background: var(--current-secondary);
    border-radius: 20px;
    padding: 3rem;
    box-shadow: 0 20px 60px var(--current-shadow);
    position: relative;
    overflow: hidden;
}

.booking-form-container::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--current-gradient);
}

/* Progress Steps */
.booking-progress {
    margin-bottom: 3rem;
}

.progress-steps {
    display: flex;
    justify-content: space-between;
    position: relative;
}

.progress-steps::before {
    content: '';
    position: absolute;
    top: 20px;
    left: 0;
    right: 0;
    height: 2px;
    background: var(--current-accent);
    z-index: 1;
}

.step {
    display: flex;
    flex-direction: column;
    align-items: center;
    position: relative;
    z-index: 2;
}

.step-number {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background: var(--current-accent);
    color: var(--current-text);
    display: flex;
    align-items: center;
    justify-content: center;
    font-weight: 600;
    margin-bottom: 0.5rem;
    transition: var(--transition-smooth);
}

.step.active .step-number {
    background: var(--current-gold);
    color: var(--current-primary);
    transform: scale(1.1);
}

.step-label {
    font-size: 0.9rem;
    color: var(--current-text-light);
    text-align: center;
}

/* Form Steps */
.form-step {
    display: none;
    animation: fadeInUp 0.5s ease-out;
}

.form-step.active {
    display: block;
}

.step-title {
    font-family: var(--font-primary);
    font-size: 1.8rem;
    color: var(--current-text);
    margin-bottom: 2rem;
}

/* Form Groups */
.form-group {
    position: relative;
    margin-bottom: 1.5rem;
}

.form-label {
    font-weight: 600;
    color: var(--current-text);
    margin-bottom: 0.5rem;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.form-control {
    border: 2px solid var(--current-accent);
    border-radius: 15px;
    padding: 1rem 1.5rem;
    font-size: 1rem;
    transition: var(--transition-smooth);
    background: var(--current-primary);
    color: var(--current-text);
    font-family: 'Inter', sans-serif;
    font-weight: 500;
}

/* Select Box */
select.form-control {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23C5A572' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
    background-position: right 1rem center;
    background-repeat: no-repeat;
    background-size: 1.5em 1.5em;
    padding-right: 3rem;
    appearance: none;
    cursor: pointer;
}

select.form-control:focus {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23C5A572' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
}

select.form-control option {
    background: var(--current-primary);
    color: var(--current-text);
    padding: 0.5rem;
    font-family: 'Inter', sans-serif;
    font-weight: 500;
}

/* Select Box Effects */
select.form-control:hover {
    border-color: var(--current-gold);
    transform: translateY(-1px);
    box-shadow: 0 4px 15px var(--current-shadow);
}

select.form-control:invalid {
    color: var(--current-text-light);
}

select.form-control:valid {
    color: var(--current-text);
}

.form-group select {
    position: relative;
}

.form-group select::after {
    content: '';
    position: absolute;
    top: 50%;
    right: 1rem;
    transform: translateY(-50%);
    width: 0;
    height: 0;
    border-left: 5px solid transparent;
    border-right: 5px solid transparent;
    border-top: 5px solid var(--current-gold);
    pointer-events: none;
}

.form-control:focus {
    border-color: var(--current-gold);
    box-shadow: 0 0 0 0.2rem rgba(255, 215, 0, 0.25);
    transform: translateY(-2px);
}

.form-control.error {
    border-color: #dc3545;
    animation: shake 0.5s ease-in-out;
}

.form-control.success {
    border-color: #28a745;
}

.form-feedback {
    font-size: 0.8rem;
    margin-top: 0.25rem;
    min-height: 1rem;
}

.form-feedback.error {
    color: #dc3545;
}

.form-feedback.success {
    color: #28a745;
}

@keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    75% { transform: translateX(5px); }
}

/* Room Selection */
.room-selection {
    margin-bottom: 2rem;
}

.room-option {
    border: 2px solid var(--current-accent);
    border-radius: 15px;
    padding: 1.5rem;
    margin-bottom: 1rem;
    cursor: pointer;
    transition: var(--transition-smooth);
    background: var(--current-primary);
}

.room-option:hover {
    border-color: var(--current-gold);
    transform: translateY(-2px);
    box-shadow: 0 10px 30px var(--current-shadow);
}

.room-option.selected {
    border-color: var(--current-gold) !important;
    border-width: 3px !important;
    background: var(--current-primary);
    box-shadow: 0 0 20px rgba(197, 165, 114, 0.4), 0 0 40px rgba(197, 165, 114, 0.2), inset 0 0 20px rgba(197, 165, 114, 0.1);
    transform: translateY(-5px) scale(1.02);
    position: relative;
}

.room-option.selected::before {
    content: '';
    position: absolute;
    top: -3px;
    left: -3px;
    right: -3px;
    bottom: -3px;
    border: 2px solid var(--current-gold);
    border-radius: 15px;
    animation: goldGlow 2s ease-in-out infinite;
    z-index: -1;
}

@keyframes goldGlow {
    0%, 100% {
        box-shadow: 0 0 15px rgba(197, 165, 114, 0.5), 0 0 30px rgba(197, 165, 114, 0.3);
        opacity: 1;
    }
    50% {
        box-shadow: 0 0 25px rgba(197, 165, 114, 0.7), 0 0 50px rgba(197, 165, 114, 0.5);
        opacity: 0.8;
    }
}

.room-option.selected .room-option-name {
    color: var(--current-gold) !important;
    font-weight: 700;
}

.room-option.selected .room-option-price {
    color: var(--current-gold) !important;
    font-size: 1.2rem;
}

.room-option-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 1rem;
}

.room-option-name {
    font-family: var(--font-primary);
    font-size: 1.2rem;
    font-weight: 600;
    color: var(--current-text);
}

.room-option-price {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--current-gold);
}

.room-option-desc {
    color: var(--current-text-light);
    margin-bottom: 1rem;
}

.room-option-features {
    display: flex;
    flex-wrap: wrap;
    gap: 0.5rem;
}

.feature-tag {
    background: var(--current-accent);
    color: var(--current-text);
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 0.8rem;
    font-weight: 500;
}

/* Booking Summary */
.booking-summary {
    background: var(--current-primary);
    border-radius: 15px;
    padding: 2rem;
    border: 1px solid var(--current-accent);
}

.summary-card h5 {
    font-family: var(--font-primary);
    color: var(--current-text);
    margin-bottom: 1.5rem;
}

.summary-details {
    color: var(--current-text-light);
}

.summary-item {
    display: flex;
    justify-content: space-between;
    padding: 0.5rem 0;
    border-bottom: 1px solid var(--current-accent);
}

.summary-item:last-child {
    border-bottom: none;
    font-weight: 600;
    color: var(--current-text);
}

/* Form Navigation */
.form-navigation {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 2rem;
    border-top: 1px solid var(--current-accent);
}

.btn {
    border-radius: 50px;
    padding: 0.75rem 2rem;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: var(--transition-smooth);
    border: none;
}

.btn-primary {
    background: var(--current-gold);
    color: var(--current-primary);
}

.btn-primary:hover {
    background: var(--current-gold);
    color: var(--current-primary);
    transform: translateY(-2px);
    box-shadow: 0 10px 30px var(--current-shadow);
}

.btn-outline-primary {
    border: 2px solid var(--current-gold);
    color: var(--current-gold);
    background: transparent;
}

.btn-outline-primary:hover {
    background: var(--current-gold);
    color: var(--current-primary);
}

.btn-success {
    background: var(--current-gold);
    color: var(--current-primary);
    border: none;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: var(--transition-smooth);
    box-shadow: 0 10px 30px var(--current-shadow);
}

.btn-success:hover {
    background: var(--current-gold);
    color: var(--current-primary);
    transform: translateY(-2px);
    box-shadow: 0 15px 40px var(--current-shadow);
}

/* Additional Services */
.additional-services {
    background: var(--current-secondary);
}

.service-card {
    text-align: center;
    padding: 2rem;
    background: var(--current-primary);
    border-radius: 15px;
    transition: var(--transition-smooth);
    height: 100%;
    border: 1px solid var(--current-accent);
}

.service-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 15px 40px var(--current-shadow);
}

.service-icon {
    width: 60px;
    height: 60px;
    background: var(--current-gradient);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1rem;
    font-size: 1.5rem;
    color: var(--current-primary);
}

.service-title {
    font-family: var(--font-primary);
    font-size: 1.25rem;
    color: var(--current-text);
    margin-bottom: 1rem;
}

.service-desc {
    color: var(--current-text-light);
    line-height: 1.6;
}

/* Responsive Design */
@media (max-width: 768px) {
    .booking-form-container {
        padding: 2rem 1.5rem;
    }
    
    .progress-steps {
        flex-direction: column;
        gap: 1rem;
    }
    
    .progress-steps::before {
        display: none;
    }
    
    .booking-features {
        flex-direction: column;
        gap: 1rem;
    }
    
    .form-navigation {
        flex-direction: column;
        gap: 1rem;
    }
    
    .btn {
        width: 100%;
    }
}

/* Loading States */
.loading {
    display: inline-block;
    width: 20px;
    height: 20px;
    border: 2px solid var(--current-accent);
    border-radius: 50%;
    border-top-color: var(--current-gold);
    animation: spin 1s ease-in-out infinite;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}

/* Success Animation */
@keyframes fadeInUp {
    0% {
        opacity: 0;
        transform: translateY(30px);
    }
    100% {
        opacity: 1;
        transform: translateY(0);
    }
}

/* Booking Notification */
.booking-notification {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 9999;
    min-width: 350px;
    max-width: 400px;
    background: var(--current-secondary);
    border: 1px solid var(--current-gold);
    border-radius: 15px;
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
    transform: translateX(100%);
    opacity: 0;
    transition: all 0.5s cubic-bezier(0.4, 0, 0.2, 1);
    overflow: hidden;
}

.booking-notification::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--current-gold);
}

.booking-notification.show {
    transform: translateX(0);
    opacity: 1;
}

.notification-content {
    display: flex;
    align-items: center;
    padding: 1.5rem;
    gap: 1rem;
}

.notification-icon {
    width: 50px;
    height: 50px;
    background: var(--current-gold);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.5rem;
    color: var(--current-primary);
    flex-shrink: 0;
}

.notification-text {
    flex: 1;
}

.notification-title {
    font-family: var(--font-primary);
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--current-text);
    margin: 0 0 0.5rem 0;
}

.notification-message {
    font-size: 0.9rem;
    color: var(--current-text-light);
    margin: 0;
    line-height: 1.4;
}
/* Form Navigation */
.form-navigation {
    display: flex !important;
    justify-content: space-between;
    align-items: center;
    padding-top: 2rem;
    border-top: 1px solid var(--current-accent);
    margin-top: 2rem;
}
</style>

<script>
// Utility functions
function safeNumber(n) { 
    const x = parseFloat(n); 
    return isNaN(x) ? 0 : x; 
}

function buildDatesPerRoomFields() {
    const container = document.getElementById('datesPerRoomFields');
    if (!container) return 0;
    
    const selected = [...document.querySelectorAll('.room-option.selected')];
    if (!selected.length) { 
        container.innerHTML = ''; 
        return 0; 
    }
    
    const today = new Date().toISOString().split('T')[0];
    container.innerHTML = selected.map((el, index) => {
        const name = el.dataset.room || 'Selected Room';
        const priceDisplay = el.dataset.priceDisplay || '';
        const price = safeNumber((el.dataset.price || '').toString().replace(/[^0-9.]/g, ''));
        
        return `
        <div class="dates-per-room-fields mb-4 p-4 rounded" style="border: 2px solid var(--current-accent); background: var(--current-secondary);">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h6 class="mb-0" style="color: var(--current-text); font-family: var(--font-primary);">${name}</h6>
                <span class="badge" style="background: var(--current-gold); color: var(--current-primary);">${priceDisplay}</span>
            </div>
            <input type="hidden" name="roomName_${index}" value="${name}">
            <input type="hidden" name="price_${index}" value="${price}">
            <div class="row g-3">
                <div class="col-md-4">
                    <label class="form-label">Check-in Date *</label>
                    <input type="date" class="form-control" name="checkin_date_${index}" min="${today}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Check-out Date *</label>
                    <input type="date" class="form-control" name="checkout_date_${index}" min="${today}" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Number of Guests *</label>
                    <select class="form-control" name="guests_${index}" required>
                        <option value="">Select Guests</option>
                        <option value="1">1 Guest</option>
                        <option value="2">2 Guests</option>
                        <option value="3">3 Guests</option>
                        <option value="4">4 Guests</option>
                        <option value="5+">5+ Guests</option>
                    </select>
                </div>
            </div>
        </div>`;
    }).join('');
    
    return selected.length;
}

// Booking Page JS
document.addEventListener('DOMContentLoaded', function() {
    // Get theme from multiple sources to handle localhost 127.0.0.1 issue
    const urlTheme = new URLSearchParams(window.location.search).get('theme');
    const localStorageTheme = localStorage.getItem('theme');
    const bodyTheme = document.body.getAttribute('data-theme');
    
    // Priority: URL param > localStorage > body attribute > default
    const currentTheme = urlTheme || localStorageTheme || bodyTheme || 'solice';
    document.body.setAttribute('data-theme', currentTheme);
    
    // Persist theme to localStorage and URL if not already set
    try { 
        if (!localStorage.getItem('theme')) {
            localStorage.setItem('theme', currentTheme);
        }
        
        // If no URL theme param, add it for consistency
        if (!urlTheme && currentTheme !== 'solice') {
            const url = new URL(window.location);
            url.searchParams.set('theme', currentTheme);
            window.history.replaceState({}, '', url);
        }
    } catch (e) {}
    
    // Initialize booking form
    initializeBookingForm();
    
    // Setup theme change listener
    window.addEventListener('themeChanged', (e) => {
        const newTheme = e.detail.theme;
        document.body.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
        
        // Update URL parameter for consistency across domains
        const url = new URL(window.location);
        url.searchParams.set('theme', newTheme);
        window.history.replaceState({}, '', url);
        
        loadRoomOptions(newTheme);
    });
    
    function initializeBookingForm() {
        const form = document.getElementById('bookingForm');
        const nextBtn = document.getElementById('nextBtn');
        const prevBtn = document.getElementById('prevBtn');
        const proceedToCartBtn = document.getElementById('proceedToCartBtn');
        
        let currentStep = 1;
        const totalSteps = 4;
        
        // Load room options on page load
        loadRoomOptions(currentTheme);
        
        // Step management functions
        function showStep(step) {
            currentStep = step;
            
            // Hide all steps
            document.querySelectorAll('.form-step').forEach(stepEl => {
                stepEl.classList.remove('active');
                stepEl.style.display = 'none';
            });
            
            // Show current step
            const currentStepEl = document.querySelector(`.form-step[data-step="${step}"]`);
            if (currentStepEl) {
                currentStepEl.style.display = 'block';
                currentStepEl.classList.add('active');
                
                // Trigger AOS refresh for animations
                if (typeof AOS !== 'undefined') {
                    setTimeout(() => AOS.refresh(), 100);
                }
            }
            
            // Update progress indicators
            updateProgress();
            updateButtons();
            
            // Special handling for each step
            if (step === 2) {
                // Step 2: Load room options if not already loaded
                if (document.getElementById('roomOptions').children.length === 0) {
                    loadRoomOptions(currentTheme);
                }
            } else if (step === 3) {
                // Step 3: Build date fields for selected rooms
                buildDatesPerRoomFields();
            } else if (step === 4) {
                // Step 4: Build summary
                updateBookingSummary();
            }
        }
        
        function updateProgress() {
            document.querySelectorAll('.progress-steps .step').forEach(step => {
                const stepNum = parseInt(step.dataset.step);
                step.classList.toggle('active', stepNum === currentStep);
                step.classList.toggle('completed', stepNum < currentStep);
            });
        }
        
        function updateButtons() {
            prevBtn.style.display = currentStep > 1 ? 'block' : 'none';
            nextBtn.style.display = currentStep < totalSteps ? 'block' : 'none';
            proceedToCartBtn.style.display = currentStep === totalSteps ? 'block' : 'none';
        }
        
        function validateCurrentStep() {
            const currentStepEl = document.querySelector(`.form-step[data-step="${currentStep}"]`);
            if (!currentStepEl) return false;
            
            let isValid = true;
            
            // Step 1: Validate personal info
            if (currentStep === 1) {
                const requiredFields = currentStepEl.querySelectorAll('[required]');
                requiredFields.forEach(field => {
                    if (!validateField(field)) {
                        isValid = false;
                    }
                });
            }
            
            // Step 2: Validate room selection
            if (currentStep === 2) {
                const selected = document.querySelectorAll('.room-option.selected');
                if (selected.length === 0) {
                    const errorEl = document.getElementById('roomSelectionError');
                    if (errorEl) {
                        errorEl.textContent = 'Please select at least one room';
                        errorEl.style.display = 'block';
                    }
                    isValid = false;
                } else {
                    const errorEl = document.getElementById('roomSelectionError');
                    if (errorEl) errorEl.style.display = 'none';
                }
            }
            
            // Step 3: Validate dates for all rooms
            if (currentStep === 3) {
                const dateFields = document.querySelectorAll('.dates-per-room-fields');
                if (dateFields.length === 0) {
                    isValid = false;
                } else {
                    dateFields.forEach(fieldBlock => {
                        const inputs = fieldBlock.querySelectorAll('[required]');
                        inputs.forEach(input => {
                            if (!input.value.trim()) {
                                isValid = false;
                                input.classList.add('error');
                            } else {
                                input.classList.remove('error');
                            }
                        });
                        
                        // Validate date range for each room
                        const checkinInput = fieldBlock.querySelector('input[type="date"][name^="checkin_date"]');
                        const checkoutInput = fieldBlock.querySelector('input[type="date"][name^="checkout_date"]');
                        if (checkinInput && checkoutInput && checkinInput.value && checkoutInput.value) {
                            const checkin = new Date(checkinInput.value);
                            const checkout = new Date(checkoutInput.value);
                            if (checkout <= checkin) {
                                isValid = false;
                                checkoutInput.classList.add('error');
                                const errorEl = document.getElementById('datesPerRoomError');
                                if (errorEl) {
                                    errorEl.textContent = 'Check-out date must be after check-in date for all rooms';
                                    errorEl.style.display = 'block';
                                }
                            } else {
                                // Set checkout minimum to day after check-in
                                const minCheckout = new Date(checkin);
                                minCheckout.setDate(minCheckout.getDate() + 1);
                                checkoutInput.min = minCheckout.toISOString().split('T')[0];
                            }
                        }
                        
                        // Set checkout minimum based on check-in
                        const checkinField = fieldBlock.querySelector('input[type="date"][name^="checkin_date"]');
                        const checkoutField = fieldBlock.querySelector('input[type="date"][name^="checkout_date"]');
                        if (checkinField && checkoutField) {
                            checkinField.addEventListener('change', function() {
                                if (this.value) {
                                    const minCheckout = new Date(this.value);
                                    minCheckout.setDate(minCheckout.getDate() + 1);
                                    checkoutField.min = minCheckout.toISOString().split('T')[0];
                                    if (checkoutField.value && new Date(checkoutField.value) <= new Date(this.value)) {
                                        checkoutField.value = '';
                                    }
                                }
                            });
                        }
                    });
                    
                    if (!isValid) {
                        const errorEl = document.getElementById('datesPerRoomError');
                        if (errorEl && !errorEl.textContent) {
                            errorEl.textContent = 'Please fill in all required fields for each room';
                            errorEl.style.display = 'block';
                        }
                    } else {
                        const errorEl = document.getElementById('datesPerRoomError');
                        if (errorEl) errorEl.style.display = 'none';
                    }
                }
            }
            
            return isValid;
        }
        
        function validateField(field) {
            const value = field.value.trim();
            const fieldName = field.name;
            let isValid = true;
            
            // Clear previous errors
            clearFieldError(field);
            
            if (!value) {
                showFieldError(field, 'This field is required');
                isValid = false;
            } else if (fieldName === 'email' && !isValidEmail(value)) {
                showFieldError(field, 'Please enter a valid email address');
                isValid = false;
            } else if (fieldName === 'phone' && !isValidPhone(value)) {
                showFieldError(field, 'Please enter a valid phone number');
                isValid = false;
            } else {
                showFieldSuccess(field);
            }
            
            return isValid;
        }
        
        function validateDates() {
            const checkin = document.querySelector('input[name="checkin_date"]').value;
            const checkout = document.querySelector('input[name="checkout_date"]').value;
            
            if (checkin && checkout) {
                const checkinDate = new Date(checkin);
                const checkoutDate = new Date(checkout);
                
                if (checkoutDate <= checkinDate) {
                    showFieldError(document.querySelector('input[name="checkout_date"]'), 'Check-out date must be after check-in date');
                    return false;
                }
            }
            
            // If we are on summary step, refresh the summary to reflect date changes
            if (typeof currentStep !== 'undefined' && currentStep === 4) {
                updateBookingSummary();
            }
            return true;
        }
        
        function showFieldError(field, message) {
            field.classList.add('error');
            field.classList.remove('success');
            const feedback = field.parentElement.querySelector('.form-feedback');
            if (feedback) {
                feedback.textContent = message;
                feedback.classList.add('error');
                feedback.classList.remove('success');
            }
        }
        
        function showFieldSuccess(field) {
            field.classList.remove('error');
            field.classList.add('success');
            const feedback = field.parentElement.querySelector('.form-feedback');
            if (feedback) {
                feedback.textContent = '✓ Valid';
                feedback.classList.add('success');
                feedback.classList.remove('error');
            }
        }
        
        function clearFieldError(field) {
            field.classList.remove('error', 'success');
            const feedback = field.parentElement.querySelector('.form-feedback');
            if (feedback) {
                feedback.textContent = '';
                feedback.classList.remove('error', 'success');
            }
        }
        
        function isValidEmail(email) {
            return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
        }
        
        function isValidPhone(phone) {
            return /^[\+]?[1-9][\d]{0,15}$/.test(phone.replace(/\s/g, ''));
        }
        
        // Event handlers
        nextBtn.addEventListener('click', (e) => {
            e.preventDefault();
            if (validateCurrentStep()) {
                if (currentStep === 3) {
                    // Before moving to step 4, save cart data
                    saveCartData();
                }
                showStep(currentStep + 1);
            }
        });
        
        prevBtn.addEventListener('click', (e) => {
            e.preventDefault();
            if (currentStep > 1) {
                showStep(currentStep - 1);
            }
        });
        
        proceedToCartBtn.addEventListener('click', (e) => {
            e.preventDefault();
            saveCartData();
            
            // Check if cart is empty
            const cart = JSON.parse(localStorage.getItem('bookingCart') || '[]');
            if (cart.length === 0) {
                showNotification('Cart is Empty', 'Please select at least one room to proceed.');
                showStep(2); // Go back to room selection
                return;
            }

            // Save personal info to localStorage
            const formData = new FormData(form);
            const personalInfo = {
                first_name: formData.get('first_name'),
                last_name: formData.get('last_name'),
                email: formData.get('email'),
                phone: formData.get('phone')
            };
            try {
                localStorage.setItem('bookingPersonalInfo', JSON.stringify(personalInfo));
            } catch (e) {}
            
            // Redirect to cart page
            const theme = localStorage.getItem('theme') || currentTheme;
            window.location.href = '/cart' + (theme ? `?theme=${encodeURIComponent(theme)}` : '');
        });
        
        // Save cart data function
        function saveCartData() {
            const dateFields = document.querySelectorAll('.dates-per-room-fields');
            const cart = [];
            
            dateFields.forEach((fieldBlock, index) => {
                const roomName = fieldBlock.querySelector(`input[name="roomName_${index}"]`)?.value || '';
                const pricePerNight = safeNumber(fieldBlock.querySelector(`input[name="price_${index}"]`)?.value || '0');
                const checkin = fieldBlock.querySelector(`input[name="checkin_date_${index}"]`)?.value || '';
                const checkout = fieldBlock.querySelector(`input[name="checkout_date_${index}"]`)?.value || '';
                const guests = fieldBlock.querySelector(`select[name="guests_${index}"]`)?.value || '';
                
                if (roomName && checkin && checkout && guests) {
                    const nights = Math.max(1, Math.ceil((new Date(checkout) - new Date(checkin)) / (1000 * 60 * 60 * 24)));
                    const subtotal = pricePerNight * nights;
                    cart.push({ 
                        roomName, 
                        checkin, 
                        checkout, 
                        guests, 
                        nights, 
                        pricePerNight, 
                        subtotal 
                    });
                }
            });
            
            if (cart.length > 0) {
                if (typeof window.saveBookingCart === 'function') {
                    window.saveBookingCart(cart);
                } else {
                    try {
                        localStorage.setItem('bookingCart', JSON.stringify(cart));
                    } catch (e) {}
                }
            }
        }
        
        function loadRoomOptions(theme) {
            const roomOptions = document.getElementById('roomOptions');
            // Dynamic data from controller
            const roomsData = {!! json_encode($roomsData) !!};
            
            const selectedRooms = roomsData[theme] || roomsData.solice;
            
            roomOptions.innerHTML = selectedRooms.map(room => `
                <div class="col-md-6 mb-3">
                    <div class="room-option" data-room="${room.name}" data-price="${room.price}" data-price-display="${room.priceDisplay}" data-category="${room.category}" data-desc="${room.desc}" data-features='${JSON.stringify(room.features)}' data-img="${room.img}">
                        <div class="room-option-header">
                            <div class="room-option-name">${room.name}</div>
                            <div class="room-option-price">${room.priceDisplay}</div>
                        </div>
                        <div class="room-option-desc">${room.desc}</div>
                        <div class="room-option-features">
                            ${room.features.map(feature => `<span class="feature-tag">${feature}</span>`).join('')}
                        </div>
                    </div>
                </div>
            `).join('');
            
            // Multi-select room selection logic instead of single
            const selectedRoomNames = new Set();
            document.querySelectorAll('.room-option').forEach(option => {
                option.addEventListener('click', () => {
                    const roomName = option.dataset.room;
                    if (option.classList.contains('selected')) {
                        option.classList.remove('selected');
                        selectedRoomNames.delete(roomName);
                    } else {
                        option.classList.add('selected');
                        selectedRoomNames.add(roomName);
                    }
                    document.getElementById('roomSelectionError').style.display = 'none';
                });
            });
            
            // Removed Add to selection button logic - multi-selection only now
        }
        
        function updateBookingSummary() {
            const summary = document.getElementById('bookingSummary');
            if (!summary) return;
            
            const formData = new FormData(form);
            const cart = (() => {
                try {
                    const saved = localStorage.getItem('bookingCart');
                    return saved ? JSON.parse(saved) : [];
                } catch (e) {
                    return [];
                }
            })();
            
            const fmt = (n) => new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(n || 0);
            
            let summaryHTML = `
                <div class="summary-item mb-3">
                    <h6 style="color: var(--current-text); font-family: var(--font-primary);">Guest Information</h6>
                </div>
                <div class="summary-item">
                    <span>Name:</span>
                    <span>${formData.get('first_name') || ''} ${formData.get('last_name') || ''}</span>
                </div>
                <div class="summary-item">
                    <span>Email:</span>
                    <span>${formData.get('email') || ''}</span>
                </div>
                <div class="summary-item mb-4 pb-3" style="border-bottom: 2px solid var(--current-accent);">
                    <span>Phone:</span>
                    <span>${formData.get('phone') || ''}</span>
                </div>`;
            
            if (cart.length > 0) {
                summaryHTML += `
                    <div class="summary-item mb-3 mt-3">
                        <h6 style="color: var(--current-text); font-family: var(--font-primary);">Room Details</h6>
                    </div>`;
                
                cart.forEach((item, index) => {
                    summaryHTML += `
                        <div class="summary-item mb-3">
                            <div>
                                <strong style="color: var(--current-text);">${item.roomName}</strong>
                                <div style="font-size: 0.9rem; color: var(--current-text-light); margin-top: 0.25rem;">
                                    ${item.checkin} → ${item.checkout} • ${item.nights} night(s) • ${item.guests} guest(s)
                                </div>
                            </div>
                            <div style="text-align: right;">
                                <div style="color: var(--current-gold); font-weight: 600;">${fmt(item.subtotal)}</div>
                                <small style="color: var(--current-text-light);">${fmt(item.pricePerNight)}/night</small>
                            </div>
                        </div>`;
                });
                
                const totalNightly = cart.reduce((sum, item) => sum + (item.pricePerNight || 0), 0);
                const totalSubtotal = cart.reduce((sum, item) => sum + (item.subtotal || 0), 0);
                const serviceFee = totalSubtotal * 0.1;
                const taxes = totalSubtotal * 0.08;
                const grandTotal = totalSubtotal + serviceFee + taxes;
                
                summaryHTML += `
                    <div class="summary-item mt-4 pt-3" style="border-top: 2px solid var(--current-accent);">
                        <span>Subtotal:</span>
                        <span>${fmt(totalSubtotal)}</span>
                    </div>
                    <div class="summary-item">
                        <span>Service Fee (10%):</span>
                        <span>${fmt(serviceFee)}</span>
                    </div>
                    <div class="summary-item">
                        <span>Taxes (8%):</span>
                        <span>${fmt(taxes)}</span>
                    </div>
                    <div class="summary-item mt-3 pt-3" style="border-top: 2px solid var(--current-gold); font-size: 1.2rem;">
                        <strong style="color: var(--current-text);">Total:</strong>
                        <strong style="color: var(--current-gold);">${fmt(grandTotal)}</strong>
                    </div>`;
            } else {
                summaryHTML += `
                    <div class="summary-item">
                        <span style="color: var(--current-text-light);">No rooms selected yet</span>
                    </div>`;
            }
            
            summary.innerHTML = summaryHTML;
        }
        
        function showNotification(title, message) {
            const notification = document.getElementById('bookingNotification');
            if (!notification) return;
            
            notification.querySelector('.notification-title').textContent = title;
            notification.querySelector('.notification-message').textContent = message;
            
            notification.classList.add('show');
            
            setTimeout(() => {
                notification.classList.remove('show');
            }, 3000);
        }
        
        // Initialize - show step 1
        showStep(1);
    }
});

</script>
@endsection
