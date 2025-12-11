@extends('layout')

@section('title', 'Complete Your Booking')

@section('content')
<!-- Checkout Hero Section -->
<section class="checkout-hero py-5 position-relative overflow-hidden">
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
                <h1 class="checkout-title mb-4">Complete Your Booking</h1>
                <p class="checkout-subtitle mb-4">Finalize your luxury stay with our secure checkout process.</p>
                <div class="checkout-features">
                    <div class="feature-item">
                        <i class="bi bi-shield-check"></i>
                        <span>Secure Payment</span>
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

<!-- Checkout Form Section -->
<section class="checkout-form-section py-5">
    <div class="container">
        <div class="row">
            <!-- Checkout Form -->
            <div class="col-lg-8">
                <div class="checkout-form-container">
                    <h3 class="form-title mb-4">Guest Information</h3>
                    
                    <form id="checkoutForm" class="checkout-form">
                        <!-- Personal Information -->
                        <div class="form-section mb-5">
                            <h5 class="section-title mb-3">Personal Details</h5>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label">First Name *</label>
                                        <input type="text" class="form-control" name="first_name" required>
                                        <div class="form-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label">Last Name *</label>
                                        <input type="text" class="form-control" name="last_name" required>
                                        <div class="form-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label">Email Address *</label>
                                        <input type="email" class="form-control" name="email" required>
                                        <div class="form-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label">Phone Number *</label>
                                        <input type="tel" class="form-control" name="phone" required>
                                        <div class="form-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Payment Information -->
                        <div class="form-section mb-5">
                            <h5 class="section-title mb-3">Payment Details</h5>
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label">Card Number *</label>
                                        <input type="text" class="form-control" name="card_number" placeholder="1234 5678 9012 3456" required>
                                        <div class="form-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-6 mb-4">
                                    <div class="form-group">
                                        <label class="form-label">Cardholder Name *</label>
                                        <input type="text" class="form-control" name="cardholder_name" required>
                                        <div class="form-feedback"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-4 mb-4">
                                    <div class="form-group">
                                        <label class="form-label">Expiry Month *</label>
                                        <select class="form-control" name="expiry_month" required>
                                            <option value="">MM</option>
                                            <option value="01">01</option>
                                            <option value="02">02</option>
                                            <option value="03">03</option>
                                            <option value="04">04</option>
                                            <option value="05">05</option>
                                            <option value="06">06</option>
                                            <option value="07">07</option>
                                            <option value="08">08</option>
                                            <option value="09">09</option>
                                            <option value="10">10</option>
                                            <option value="11">11</option>
                                            <option value="12">12</option>
                                        </select>
                                        <div class="form-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="form-group">
                                        <label class="form-label">Expiry Year *</label>
                                        <select class="form-control" name="expiry_year" required>
                                            <option value="">YYYY</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                        </select>
                                        <div class="form-feedback"></div>
                                    </div>
                                </div>
                                <div class="col-md-4 mb-4">
                                    <div class="form-group">
                                        <label class="form-label">CVV *</label>
                                        <input type="text" class="form-control" name="cvv" placeholder="123" maxlength="4" required>
                                        <div class="form-feedback"></div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Special Requests -->
                        <div class="form-section mb-5">
                            <h5 class="section-title mb-3">Special Requests</h5>
                            <div class="form-group">
                                <label class="form-label">Additional Notes</label>
                                <textarea class="form-control" name="special_requests" rows="4" placeholder="Any special preferences, dietary requirements, or notes for your stay"></textarea>
                            </div>
                        </div>

                        <!-- Terms and Conditions -->
                        <div class="form-section mb-4">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="terms" name="terms" required>
                                <label class="form-check-label" for="terms">
                                    I agree to the <a href="#" class="text-decoration-none" style="color: var(--current-gold);">Terms and Conditions</a> and <a href="#" class="text-decoration-none" style="color: var(--current-gold);">Privacy Policy</a>
                                </label>
                                <div class="form-feedback"></div>
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="form-actions">
                            <a href="/cart" class="btn btn-outline-primary me-3">
                                <i class="bi bi-arrow-left me-2"></i>Back to Selection
                            </a>
                            <button type="submit" class="btn btn-primary">
                                <i class="bi bi-check-circle me-2"></i>Complete Booking
                            </button>
                        </div>
                    </form>
                </div>
            </div>
            
            <!-- Order Summary -->
            <div class="col-lg-4">
                <div class="order-summary">
                    <h4 class="summary-title mb-4">Booking Summary</h4>
                    
                    <!-- Room Summary -->
                    <div class="summary-section mb-4">
                        <h6 class="section-label">Selected Rooms</h6>
                        <div id="roomSummary">
                            <!-- Multiple rooms, each with:
                                 Room name, check-in, check-out, nights, subtotal per room -->
                        </div>
                    </div>
                    
                    <!-- Pricing Breakdown -->
                    <div class="summary-section mb-4">
                        <h6 class="section-label">Pricing</h6>
                        <div class="summary-item">
                            <span>Subtotal:</span>
                            <span id="subtotal">$0.00</span>
                        </div>
                        <div class="summary-item">
                            <span>Service Fee (10%):</span>
                            <span id="serviceFee">$0.00</span>
                        </div>
                        <div class="summary-item">
                            <span>Taxes:</span>
                            <span id="taxes">$0.00</span>
                        </div>
                        <div class="summary-item total">
                            <span>Total:</span>
                            <span id="totalAmount">$0.00</span>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Checkout Hero Section */
.checkout-hero {
    background: var(--current-gradient);
    position: relative;
    overflow: hidden;
}

.checkout-title {
    font-family: var(--font-primary);
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 700;
    color: var(--current-text);
    margin-bottom: 1.5rem;
}

.checkout-subtitle {
    font-size: 1.2rem;
    color: var(--current-text-light);
    line-height: 1.6;
    margin-bottom: 2rem;
}

.checkout-features {
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

/* Checkout Form Section */
.checkout-form-section {
    background: var(--current-primary);
}

.checkout-form-container {
    background: var(--current-secondary);
    border-radius: 20px;
    padding: 3rem;
    box-shadow: 0 10px 40px var(--current-shadow);
    border: 1px solid var(--current-accent);
}

.form-title {
    font-family: var(--font-primary);
    font-size: 1.8rem;
    color: var(--current-text);
    margin-bottom: 2rem;
}

.form-section {
    border-bottom: 1px solid var(--current-accent);
    padding-bottom: 2rem;
}

.section-title {
    font-family: var(--font-primary);
    font-size: 1.2rem;
    color: var(--current-text);
    margin-bottom: 1rem;
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

.form-control:focus {
    border-color: var(--current-gold);
    box-shadow: 0 0 0 0.2rem rgba(197, 165, 114, 0.25);
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

/* Select Box Styling */
select.form-control {
    background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' fill='none' viewBox='0 0 20 20'%3e%3cpath stroke='%23C5A572' stroke-linecap='round' stroke-linejoin='round' stroke-width='1.5' d='m6 8 4 4 4-4'/%3e%3c/svg%3e");
    background-position: right 1rem center;
    background-repeat: no-repeat;
    background-size: 1.5em 1.5em;
    padding-right: 3rem;
    appearance: none;
    cursor: pointer;
}

/* Checkbox Styling */
.form-check {
    display: flex;
    align-items: flex-start;
    gap: 0.75rem;
}

.form-check-input {
    width: 20px;
    height: 20px;
    margin: 0;
    accent-color: var(--current-gold);
}

.form-check-label {
    color: var(--current-text);
    font-size: 0.9rem;
    line-height: 1.5;
}

/* Form Actions */
.form-actions {
    display: flex;
    gap: 1rem;
    margin-top: 2rem;
    padding-top: 2rem;
    border-top: 1px solid var(--current-accent);
}

/* Order Summary */
.order-summary {
    background: var(--current-secondary);
    border-radius: 20px;
    padding: 2rem;
    box-shadow: 0 10px 40px var(--current-shadow);
    border: 1px solid var(--current-accent);
    position: sticky;
    top: 2rem;
}

.summary-title {
    font-family: var(--font-primary);
    font-size: 1.5rem;
    color: var(--current-text);
    margin-bottom: 1.5rem;
}

.summary-section {
    border-bottom: 1px solid var(--current-accent);
    padding-bottom: 1rem;
    margin-bottom: 1.5rem;
}

.section-label {
    font-weight: 600;
    color: var(--current-text);
    margin-bottom: 0.75rem;
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 1px;
}

.summary-item {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 0.5rem 0;
    color: var(--current-text-light);
}

.summary-item.total {
    font-weight: 700;
    font-size: 1.1rem;
    color: var(--current-text);
    border-top: 2px solid var(--current-gold);
    margin-top: 0.5rem;
    padding-top: 0.75rem;
}


/* Buttons */
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

.btn-primary:hover:not(:disabled) {
    background: var(--current-gold);
    color: var(--current-primary);
    transform: translateY(-2px);
    box-shadow: 0 10px 30px var(--current-shadow);
}

.btn-primary:disabled {
    opacity: 0.5;
    cursor: not-allowed;
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

/* Animations */
@keyframes shake {
    0%, 100% { transform: translateX(0); }
    25% { transform: translateX(-5px); }
    75% { transform: translateX(5px); }
}

/* Responsive Design */
@media (max-width: 768px) {
    .checkout-features {
        flex-direction: column;
        gap: 1rem;
    }
    
    .form-actions {
        flex-direction: column;
    }
    
    .btn {
        width: 100%;
    }
    
    .order-summary {
        position: static;
        margin-top: 2rem;
    }
}
</style>

<script>
// Checkout Management System
class HotelCheckout {
    constructor() {
        this.bookingDates = this.loadBookingDates();
        this.init();
    }

    init() {
        this.renderSummary();
        this.setupFormValidation();
        this.setupEventListeners();
    }

    loadBookingDates() {
        try {
            const dates = localStorage.getItem('bookingDates');
            return dates ? JSON.parse(dates) : null;
        } catch (e) {
            return null;
        }
    }

    renderSummary() {
        const roomSummary = document.getElementById('roomSummary');
        const subtotal = document.getElementById('subtotal');
        const serviceFee = document.getElementById('serviceFee');
        const taxes = document.getElementById('taxes');
        const totalAmount = document.getElementById('totalAmount');

        // Load cart data
        const cart = (() => {
            try {
                const saved = window.loadBookingCart ? window.loadBookingCart() : null;
                if (!saved) {
                    const stored = localStorage.getItem('bookingCart');
                    return stored ? JSON.parse(stored) : [];
                }
                return saved;
            } catch (e) {
                return [];
            }
        })();

        if (cart.length === 0) {
            roomSummary.innerHTML = '<p class="text-muted">No rooms selected</p>';
            subtotal.textContent = this.formatPrice(0);
            serviceFee.textContent = this.formatPrice(0);
            taxes.textContent = this.formatPrice(0);
            totalAmount.textContent = this.formatPrice(0);
            return;
        }

        // Calculate totals from cart
        const subtotalAmount = cart.reduce((sum, item) => sum + (item.subtotal || 0), 0);
        const serviceFeeAmount = subtotalAmount * 0.1;
        const taxAmount = subtotalAmount * 0.08;
        const total = subtotalAmount + serviceFeeAmount + taxAmount;

        // Update room summary
        roomSummary.innerHTML = cart.map(item => {
            const fmt = (n) => this.formatPrice(n || 0);
            return `
                <div class="mb-3 pb-3" style="border-bottom: 1px solid var(--current-accent);">
                    <div class="d-flex justify-content-between align-items-start mb-2">
                        <strong style="color: var(--current-text);">${item.roomName}</strong>
                        <span style="color: var(--current-gold); font-weight: 600;">${fmt(item.subtotal)}</span>
                    </div>
                    <div style="font-size: 0.85rem; color: var(--current-text-light);">
                        <div>Check-in: ${new Date(item.checkin).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' })}</div>
                        <div>Check-out: ${new Date(item.checkout).toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' })}</div>
                        <div>${item.nights} night(s) • ${item.guests} guest(s) • ${this.formatPrice(item.pricePerNight)}/night</div>
                    </div>
                </div>
            `;
        }).join('');

        // Update pricing
        subtotal.textContent = this.formatPrice(subtotalAmount);
        serviceFee.textContent = this.formatPrice(serviceFeeAmount);
        taxes.textContent = this.formatPrice(taxAmount);
        totalAmount.textContent = this.formatPrice(total);
    }

    calculateItemTotal(item) {
        const price = parseFloat(item.price.replace(/[^0-9.]/g, ''));
        return price * item.quantity;
    }

    calculateNights(checkin, checkout) {
        const checkinDate = new Date(checkin);
        const checkoutDate = new Date(checkout);
        const diffTime = Math.abs(checkoutDate - checkinDate);
        return Math.ceil(diffTime / (1000 * 60 * 60 * 24));
    }

    formatPrice(amount) {
        return new Intl.NumberFormat('en-US', {
            style: 'currency',
            currency: 'USD'
        }).format(amount);
    }

    setupFormValidation() {
        const form = document.getElementById('checkoutForm');
        const inputs = form.querySelectorAll('input[required], select[required]');
        
        inputs.forEach(input => {
            input.addEventListener('blur', () => this.validateField(input));
            input.addEventListener('input', () => this.clearFieldError(input));
        });
    }

    setupEventListeners() {
        const form = document.getElementById('checkoutForm');
        
        form.addEventListener('submit', (e) => {
            e.preventDefault();
            if (this.validateForm()) {
                this.processBooking();
            }
        });
    }

    validateForm() {
        const form = document.getElementById('checkoutForm');
        const requiredFields = form.querySelectorAll('[required]');
        let isValid = true;

        requiredFields.forEach(field => {
            if (!this.validateField(field)) {
                isValid = false;
            }
        });

        return isValid;
    }

    validateField(field) {
        const value = field.value.trim();
        const fieldName = field.name;
        let isValid = true;

        this.clearFieldError(field);

        if (!value) {
            this.showFieldError(field, 'This field is required');
            isValid = false;
        } else if (fieldName === 'email' && !this.isValidEmail(value)) {
            this.showFieldError(field, 'Please enter a valid email address');
            isValid = false;
        } else if (fieldName === 'phone' && !this.isValidPhone(value)) {
            this.showFieldError(field, 'Please enter a valid phone number');
            isValid = false;
        } else if (fieldName === 'card_number' && !this.isValidCardNumber(value)) {
            this.showFieldError(field, 'Please enter a valid card number');
            isValid = false;
        } else if (fieldName === 'cvv' && !this.isValidCVV(value)) {
            this.showFieldError(field, 'Please enter a valid CVV');
            isValid = false;
        } else {
            this.showFieldSuccess(field);
        }

        return isValid;
    }

    isValidEmail(email) {
        return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    }

    isValidPhone(phone) {
        return /^[\+]?[1-9][\d]{0,15}$/.test(phone.replace(/\s/g, ''));
    }

    isValidCardNumber(cardNumber) {
        const cleaned = cardNumber.replace(/\s/g, '');
        return /^\d{13,19}$/.test(cleaned);
    }

    isValidCVV(cvv) {
        return /^\d{3,4}$/.test(cvv);
    }

    showFieldError(field, message) {
        field.classList.add('error');
        field.classList.remove('success');
        const feedback = field.parentElement.querySelector('.form-feedback');
        if (feedback) {
            feedback.textContent = message;
            feedback.classList.add('error');
            feedback.classList.remove('success');
        }
    }

    showFieldSuccess(field) {
        field.classList.remove('error');
        field.classList.add('success');
        const feedback = field.parentElement.querySelector('.form-feedback');
        if (feedback) {
            feedback.textContent = '✓ Valid';
            feedback.classList.add('success');
            feedback.classList.remove('error');
        }
    }

    clearFieldError(field) {
        field.classList.remove('error', 'success');
        const feedback = field.parentElement.querySelector('.form-feedback');
        if (feedback) {
            feedback.textContent = '';
            feedback.classList.remove('error', 'success');
        }
    }

    async processBooking() {
        const submitBtn = document.querySelector('button[type="submit"]');
        const originalText = submitBtn.innerHTML;
        
        submitBtn.innerHTML = '<span class="loading"></span> Processing...';
        submitBtn.disabled = true;

        try {
            // Gather data
            const form = document.getElementById('checkoutForm');
            const formData = new FormData(form);
            const cart = JSON.parse(localStorage.getItem('bookingCart') || '[]');

            const payload = {
                first_name: formData.get('first_name'),
                last_name: formData.get('last_name'),
                email: formData.get('email'),
                phone: formData.get('phone'),
                cart: cart
            };

            // Send to backend
            const response = await fetch('/booking', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
                },
                body: JSON.stringify(payload)
            });

            const result = await response.json();

            if (result.success) {
                submitBtn.innerHTML = '<i class="bi bi-check-circle me-2"></i>Booking Confirmed!';
                submitBtn.classList.add('btn-success');
                
                this.showNotification('Booking confirmed! You will receive a confirmation email shortly.', 'success');
                
                // Clear booking data
                localStorage.removeItem('bookingCart');
                localStorage.removeItem('bookingDates');
                localStorage.removeItem('bookingPersonalInfo');
                
                setTimeout(() => {
                    window.location.href = '/';
                }, 2000);
            } else {
                throw new Error(result.message || 'Booking failed');
            }
        } catch (error) {
            console.error('Booking Error:', error);
            submitBtn.innerHTML = originalText;
            submitBtn.disabled = false;
            this.showNotification(error.message || 'Something went wrong. Please try again.', 'error');
        }
    }

    showNotification(message, type) {
        const notification = document.createElement('div');
        notification.className = `checkout-notification checkout-notification-${type}`;
        notification.innerHTML = `
            <div class="notification-content">
                <div class="notification-icon">
                    <i class="bi bi-${type === 'success' ? 'check-circle' : 'info-circle'}"></i>
                </div>
                <div class="notification-text">
                    <h6 class="notification-title">Booking Confirmed!</h6>
                    <p class="notification-message">${message}</p>
                </div>
            </div>
        `;
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.classList.add('show');
        }, 100);
        
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => {
                notification.remove();
            }, 500);
        }, 4000);
    }
}

// Initialize checkout when page loads
document.addEventListener('DOMContentLoaded', function() {
    // Get theme from multiple sources
    const urlTheme = new URLSearchParams(window.location.search).get('theme');
    const localStorageTheme = localStorage.getItem('theme');
    const bodyTheme = document.body.getAttribute('data-theme');
    
    const currentTheme = urlTheme || localStorageTheme || bodyTheme || 'solice';
    document.body.setAttribute('data-theme', currentTheme);
    
    // Load personal info and pre-fill form
    try {
        const personalInfo = localStorage.getItem('bookingPersonalInfo');
        if (personalInfo) {
            const info = JSON.parse(personalInfo);
            const form = document.getElementById('checkoutForm');
            if (form) {
                if (info.first_name) form.querySelector('[name="first_name"]').value = info.first_name;
                if (info.last_name) form.querySelector('[name="last_name"]').value = info.last_name;
                if (info.email) form.querySelector('[name="email"]').value = info.email;
                if (info.phone) form.querySelector('[name="phone"]').value = info.phone;
            }
        }
    } catch (e) {}
    
    // Initialize checkout
    new HotelCheckout();
    
    // Listen for theme changes
    window.addEventListener('themeChanged', (e) => {
        const newTheme = e.detail.theme;
        document.body.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
    });
});
</script>

<style>
/* Checkout Notifications */
.checkout-notification {
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

.checkout-notification::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--current-gold);
}

.checkout-notification.show {
    transform: translateX(0);
    opacity: 1;
}

.checkout-notification .notification-content {
    display: flex;
    align-items: center;
    padding: 1.5rem;
    gap: 1rem;
}

.checkout-notification .notification-icon {
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

.checkout-notification .notification-text {
    flex: 1;
}

.checkout-notification .notification-title {
    font-family: var(--font-primary);
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--current-text);
    margin: 0 0 0.5rem 0;
}

.checkout-notification .notification-message {
    font-size: 0.9rem;
    color: var(--current-text-light);
    margin: 0;
    line-height: 1.4;
}

/* Loading Animation */
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
</style>
@endsection
