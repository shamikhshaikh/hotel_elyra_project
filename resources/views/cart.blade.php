@extends('layout')

@section('title', 'Shopping Cart')

@section('content')
<!-- Cart Hero Section -->
<section class="cart-hero py-5 position-relative overflow-hidden">
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
                <h1 class="cart-title mb-4">Your Booking Cart</h1>
                <p class="cart-subtitle mb-4">Review and finalize your luxury stay selections before proceeding to checkout.</p>
                <div class="cart-features">
                    <div class="feature-item">
                        <i class="bi bi-shield-check"></i>
                        <span>Secure Booking</span>
                    </div>
                    <div class="feature-item">
                        <i class="bi bi-clock"></i>
                        <span>Instant Confirmation</span>
                    </div>
                    <div class="feature-item">
                        <i class="bi bi-credit-card"></i>
                        <span>Secure Payment</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
            </div>
        </div>
    </div>
</section>

<!-- Cart Content Section -->
<section class="cart-content-section py-5">
    <div class="container">
        <div class="row">
            <!-- Cart Items -->
            <div class="col-lg-8 mb-4">
                <div class="cart-container">
                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <h3 class="cart-section-title">Selected Rooms</h3>
                        <a href="/booking" class="btn btn-outline-primary btn-sm">
                            <i class="bi bi-arrow-left me-2"></i>Continue Booking
                        </a>
                    </div>
                    
                    <!-- Cart Items Container -->
                    <div id="cartItems">
                        <!-- Cart items will be loaded dynamically -->
                        <div class="text-center py-5" id="emptyCart">
                            <i class="bi bi-cart-x display-1" style="color: var(--current-text-light);"></i>
                            <h4 class="mt-3" style="color: var(--current-text);">Your cart is empty</h4>
                            <p class="mb-4" style="color: var(--current-text-light);">Start by selecting rooms in our booking section.</p>
                            <a href="/booking" class="btn btn-primary">
                                <i class="bi bi-calendar-check me-2"></i>Start Booking
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Order Summary Sidebar -->
            <div class="col-lg-4">
                <div class="cart-summary">
                    <h4 class="summary-title mb-4">Booking Summary</h4>
                    
                    <!-- Guest Information -->
                    <div class="summary-section mb-4">
                        <h6 class="section-label">Guest Information</h6>
                        <div id="guestInfoSummary">
                            <p class="text-muted">Not provided</p>
                        </div>
                    </div>
                    
                    <!-- Price Breakdown -->
                    <div class="summary-section mb-4">
                        <h6 class="section-label">Price Breakdown</h6>
                        <div class="summary-item">
                            <span>Subtotal:</span>
                            <span id="cartSubtotal">$0.00</span>
                        </div>
                        <div class="summary-item">
                            <span>Service Fee (10%):</span>
                            <span id="cartServiceFee">$0.00</span>
                        </div>
                        <div class="summary-item">
                            <span>Taxes (8%):</span>
                            <span id="cartTaxes">$0.00</span>
                        </div>
                        <div class="summary-item total">
                            <span>Total:</span>
                            <span id="cartTotal">$0.00</span>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="cart-actions">
                        <a href="/checkout" class="btn btn-primary w-100 mb-3" id="checkoutBtn">
                            <i class="bi bi-credit-card me-2"></i>Proceed to Checkout
                        </a>
                        <button type="button" class="btn btn-outline-secondary w-100" id="clearCartBtn">
                            <i class="bi bi-trash me-2"></i>Clear Cart
                        </button>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Cart Hero Section */
.cart-hero {
    background: var(--current-gradient);
    position: relative;
    overflow: hidden;
}

.cart-title {
    font-family: var(--font-primary);
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 700;
    color: var(--current-text);
    margin-bottom: 1.5rem;
}

.cart-subtitle {
    font-size: 1.2rem;
    color: var(--current-text-light);
    line-height: 1.6;
    margin-bottom: 2rem;
}

.cart-features {
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

/* Cart Content Section */
.cart-content-section {
    background: var(--current-primary);
}

.cart-container {
    background: var(--current-secondary);
    border-radius: 20px;
    padding: 3rem;
    box-shadow: 0 10px 40px var(--current-shadow);
    border: 1px solid var(--current-accent);
}

.cart-section-title {
    font-family: var(--font-primary);
    font-size: 1.8rem;
    color: var(--current-text);
}

/* Cart Item Card */
.cart-item {
    background: var(--current-primary);
    border-radius: 15px;
    padding: 2rem;
    margin-bottom: 1.5rem;
    border: 2px solid var(--current-accent);
    transition: var(--transition-smooth);
    position: relative;
}

.cart-item:hover {
    border-color: var(--current-gold);
    transform: translateY(-2px);
    box-shadow: 0 15px 40px var(--current-shadow);
}

.cart-item-header {
    display: flex;
    justify-content: space-between;
    align-items: start;
    margin-bottom: 1.5rem;
}

.cart-item-title {
    font-family: var(--font-primary);
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--current-text);
    margin: 0;
}

.cart-item-price {
    font-size: 1.3rem;
    font-weight: 700;
    color: var(--current-gold);
}

.cart-item-details {
    display: grid;
    grid-template-columns: repeat(auto-fit, minmax(200px, 1fr));
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.detail-item {
    display: flex;
    flex-direction: column;
}

.detail-label {
    font-size: 0.85rem;
    color: var(--current-text-light);
    text-transform: uppercase;
    letter-spacing: 0.5px;
    margin-bottom: 0.25rem;
}

.detail-value {
    font-size: 1rem;
    font-weight: 600;
    color: var(--current-text);
}

.cart-item-total {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 1rem;
    border-top: 1px solid var(--current-accent);
}

.cart-item-subtotal {
    font-size: 1.1rem;
    font-weight: 700;
    color: var(--current-gold);
}

.remove-item-btn {
    background: transparent;
    border: 2px solid #dc3545;
    color: #dc3545;
    padding: 0.5rem 1rem;
    border-radius: 10px;
    font-weight: 600;
    transition: var(--transition-smooth);
    cursor: pointer;
}

.remove-item-btn:hover {
    background: #dc3545;
    color: white;
    transform: translateY(-2px);
}

/* Cart Summary */
.cart-summary {
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

/* Cart Actions */
.cart-actions {
    margin-top: 2rem;
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

.btn-outline-secondary {
    border: 2px solid var(--current-accent);
    color: var(--current-text);
    background: transparent;
}

.btn-outline-secondary:hover {
    background: var(--current-accent);
    color: var(--current-text);
}


/* Empty Cart State */
#emptyCart {
    padding: 4rem 2rem;
}

#emptyCart i {
    opacity: 0.5;
}

/* Responsive Design */
@media (max-width: 768px) {
    .cart-features {
        flex-direction: column;
        gap: 1rem;
    }
    
    .cart-item-header {
        flex-direction: column;
        gap: 1rem;
    }
    
    .cart-item-details {
        grid-template-columns: 1fr;
    }
    
    .cart-summary {
        position: static;
        margin-top: 2rem;
    }
}

/* Loading State */
.cart-loading {
    text-align: center;
    padding: 3rem;
    color: var(--current-text-light);
}

.cart-loading .spinner-border {
    width: 3rem;
    height: 3rem;
    border-width: 0.3rem;
    border-color: var(--current-accent);
    border-top-color: var(--current-gold);
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Get theme
    const urlTheme = new URLSearchParams(window.location.search).get('theme');
    const localStorageTheme = localStorage.getItem('theme');
    const bodyTheme = document.body.getAttribute('data-theme');
    const currentTheme = urlTheme || localStorageTheme || bodyTheme || 'solice';
    document.body.setAttribute('data-theme', currentTheme);
    
    try {
        if (!localStorage.getItem('theme')) {
            localStorage.setItem('theme', currentTheme);
        }
    } catch (e) {}
    
    // Initialize cart
    renderCart();
    setupEventListeners();
    
    // Listen for theme changes
    window.addEventListener('themeChanged', (e) => {
        const newTheme = e.detail.theme;
        document.body.setAttribute('data-theme', newTheme);
        localStorage.setItem('theme', newTheme);
    });
    
    function renderCart() {
        const cartItemsContainer = document.getElementById('cartItems');
        const emptyCart = document.getElementById('emptyCart');
        
        // Load cart from localStorage
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
        
        // Load personal info
        const personalInfo = (() => {
            try {
                const stored = localStorage.getItem('bookingPersonalInfo');
                return stored ? JSON.parse(stored) : null;
            } catch (e) {
                return null;
            }
        })();
        
        // Display guest info
        const guestInfoSummary = document.getElementById('guestInfoSummary');
        if (personalInfo) {
            guestInfoSummary.innerHTML = `
                <div><strong>${personalInfo.first_name} ${personalInfo.last_name}</strong></div>
                <div style="font-size: 0.9rem; color: var(--current-text-light);">${personalInfo.email}</div>
                <div style="font-size: 0.9rem; color: var(--current-text-light);">${personalInfo.phone}</div>
            `;
        } else {
            guestInfoSummary.innerHTML = '<p style="color: var(--current-text-light);">Not provided</p>';
        }
        
        if (cart.length === 0) {
            emptyCart.style.display = 'block';
            cartItemsContainer.innerHTML = '';
            cartItemsContainer.appendChild(emptyCart);
            updatePricing([]);
            return;
        }
        
        emptyCart.style.display = 'none';
        
        // Clear container first
        cartItemsContainer.innerHTML = '';
        
        // Render cart items
        const itemsHTML = cart.map((item, index) => {
            const fmt = (n) => new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(n || 0);
            const isEditing = item._editing || false;
            
            if (isEditing) {
                // Edit mode
                const today = new Date().toISOString().split('T')[0];
                const minCheckout = item.checkin ? new Date(new Date(item.checkin).getTime() + 86400000).toISOString().split('T')[0] : today;
                
                return `
                    <div class="cart-item cart-item-editing" data-index="${index}">
                        <div class="cart-item-header">
                            <h5 class="cart-item-title">${item.roomName}</h5>
                            <div class="cart-item-price">${fmt(item.pricePerNight)}/night</div>
                        </div>
                        <form class="cart-edit-form" data-index="${index}">
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label class="form-label">Check-in Date *</label>
                                    <input type="date" class="form-control edit-checkin" value="${item.checkin}" min="${today}" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label">Check-out Date *</label>
                                    <input type="date" class="form-control edit-checkout" value="${item.checkout}" min="${minCheckout}" required>
                                </div>
                                <div class="col-md-12">
                                    <label class="form-label">Number of Guests *</label>
                                    <select class="form-control edit-guests" required>
                                        <option value="1" ${item.guests === '1' ? 'selected' : ''}>1 Guest</option>
                                        <option value="2" ${item.guests === '2' ? 'selected' : ''}>2 Guests</option>
                                        <option value="3" ${item.guests === '3' ? 'selected' : ''}>3 Guests</option>
                                        <option value="4" ${item.guests === '4' ? 'selected' : ''}>4 Guests</option>
                                        <option value="5+" ${item.guests === '5+' ? 'selected' : ''}>5+ Guests</option>
                                    </select>
                                </div>
                            </div>
                            <div class="cart-item-actions mt-3">
                                <button type="button" class="btn btn-sm btn-outline-secondary cancel-edit-btn" data-index="${index}">
                                    Cancel
                                </button>
                                <button type="submit" class="btn btn-sm btn-primary save-edit-btn" data-index="${index}">
                                    <i class="bi bi-check-circle me-1"></i>Save Changes
                                </button>
                            </div>
                        </form>
                    </div>
                `;
            } else {
                // Display mode
                return `
                    <div class="cart-item" data-index="${index}">
                        <div class="cart-item-header">
                            <h5 class="cart-item-title">${item.roomName}</h5>
                            <div class="cart-item-price">${fmt(item.pricePerNight)}/night</div>
                        </div>
                        <div class="cart-item-details">
                            <div class="detail-item">
                                <span class="detail-label">Check-in</span>
                                <span class="detail-value">${formatDate(item.checkin)}</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Check-out</span>
                                <span class="detail-value">${formatDate(item.checkout)}</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Nights</span>
                                <span class="detail-value">${item.nights}</span>
                            </div>
                            <div class="detail-item">
                                <span class="detail-label">Guests</span>
                                <span class="detail-value">${item.guests}</span>
                            </div>
                        </div>
                        <div class="cart-item-total">
                            <div>
                                <span style="color: var(--current-text-light);">Subtotal: </span>
                                <span class="cart-item-subtotal">${fmt(item.subtotal)}</span>
                            </div>
                            <div class="cart-item-buttons">
                                <button type="button" class="btn btn-sm btn-outline-primary edit-item-btn" data-index="${index}">
                                    <i class="bi bi-pencil me-1"></i>Edit
                                </button>
                                <button type="button" class="remove-item-btn" data-index="${index}">
                                    <i class="bi bi-trash me-1"></i>Remove
                                </button>
                            </div>
                        </div>
                    </div>
                `;
            }
        }).join('');
        
        cartItemsContainer.innerHTML = itemsHTML;
        
        // Update pricing
        updatePricing(cart);
    }
    
    function editCartItem(index) {
        // Show loading overlay
        showLoadingOverlay();
        
        // Get fresh cart data
        const cart = (() => {
            try {
                const saved = window.loadBookingCart ? window.loadBookingCart() : null;
                if (!saved) {
                    const stored = localStorage.getItem('bookingCart');
                    return stored ? JSON.parse(stored) : [];
                }
                return saved || [];
            } catch (e) {
                return [];
            }
        })();
        
        if (index >= 0 && index < cart.length) {
            // Set editing flag
            cart[index]._editing = true;
            
            // Save cart with editing flag
            if (typeof window.saveBookingCart === 'function') {
                window.saveBookingCart(cart);
            } else {
                try {
                    localStorage.setItem('bookingCart', JSON.stringify(cart));
                } catch (e) {
                    console.error('Error saving cart:', e);
                    hideLoadingOverlay();
                    return;
                }
            }
            
            // Reload page after a short delay to ensure data is saved
            setTimeout(() => {
                reloadPage();
            }, 300);
        } else {
            hideLoadingOverlay();
        }
    }
    
    function cancelCartItemEdit(index) {
        // Show loading overlay
        showLoadingOverlay();
        
        // Get fresh cart data
        const cart = (() => {
            try {
                const saved = window.loadBookingCart ? window.loadBookingCart() : null;
                if (!saved) {
                    const stored = localStorage.getItem('bookingCart');
                    return stored ? JSON.parse(stored) : [];
                }
                return saved || [];
            } catch (e) {
                return [];
            }
        })();
        
        if (index >= 0 && index < cart.length) {
            // Remove editing flag
            delete cart[index]._editing;
            
            // Save cart without editing flag
            if (typeof window.saveBookingCart === 'function') {
                window.saveBookingCart(cart);
            } else {
                try {
                    localStorage.setItem('bookingCart', JSON.stringify(cart));
                } catch (e) {
                    console.error('Error saving cart:', e);
                    hideLoadingOverlay();
                    return;
                }
            }
            
            // Reload page after a short delay to ensure data is saved
            setTimeout(() => {
                reloadPage();
            }, 300);
        } else {
            hideLoadingOverlay();
        }
    }
    
    function saveCartItemEdit(index, form) {
        const checkinInput = form.querySelector('.edit-checkin');
        const checkoutInput = form.querySelector('.edit-checkout');
        const guestsInput = form.querySelector('.edit-guests');
        
        if (!checkinInput || !checkoutInput || !guestsInput) {
            showNotification('Error: Form fields not found', 'error');
            return;
        }
        
        if (!checkinInput.value || !checkoutInput.value || !guestsInput.value) {
            showNotification('Please fill in all fields', 'error');
            return;
        }
        
        const checkin = new Date(checkinInput.value);
        const checkout = new Date(checkoutInput.value);
        
        if (checkout <= checkin) {
            showNotification('Check-out date must be after check-in date', 'error');
            return;
        }
        
        // Show loading overlay
        showLoadingOverlay();
        
        // Get fresh cart data
        const cart = (() => {
            try {
                const saved = window.loadBookingCart ? window.loadBookingCart() : null;
                if (!saved) {
                    const stored = localStorage.getItem('bookingCart');
                    return stored ? JSON.parse(stored) : [];
                }
                return saved || [];
            } catch (e) {
                return [];
            }
        })();
        
        if (index >= 0 && index < cart.length) {
            const nights = Math.max(1, Math.ceil((checkout - checkin) / (1000 * 60 * 60 * 24)));
            const subtotal = cart[index].pricePerNight * nights;
            
            // Update cart item
            cart[index].checkin = checkinInput.value;
            cart[index].checkout = checkoutInput.value;
            cart[index].guests = guestsInput.value;
            cart[index].nights = nights;
            cart[index].subtotal = subtotal;
            delete cart[index]._editing;
            
            // Save updated cart
            if (typeof window.saveBookingCart === 'function') {
                window.saveBookingCart(cart);
            } else {
                try {
                    localStorage.setItem('bookingCart', JSON.stringify(cart));
                } catch (e) {
                    console.error('Error saving cart:', e);
                    hideLoadingOverlay();
                    return;
                }
            }
            
            // Reload page after a short delay to ensure data is saved
            setTimeout(() => {
                reloadPage();
            }, 300);
        } else {
            hideLoadingOverlay();
        }
    }
    
    function formatDate(dateStr) {
        if (!dateStr) return 'N/A';
        const date = new Date(dateStr);
        return date.toLocaleDateString('en-US', { year: 'numeric', month: 'short', day: 'numeric' });
    }
    
    function updatePricing(cart) {
        const fmt = (n) => new Intl.NumberFormat('en-US', { style: 'currency', currency: 'USD' }).format(n || 0);
        
        const subtotal = cart.reduce((sum, item) => sum + (item.subtotal || 0), 0);
        const serviceFee = subtotal * 0.1;
        const taxes = subtotal * 0.08;
        const total = subtotal + serviceFee + taxes;
        
        document.getElementById('cartSubtotal').textContent = fmt(subtotal);
        document.getElementById('cartServiceFee').textContent = fmt(serviceFee);
        document.getElementById('cartTaxes').textContent = fmt(taxes);
        document.getElementById('cartTotal').textContent = fmt(total);
    }
    
    function removeCartItem(index) {
        // Show loading overlay
        showLoadingOverlay();
        
        // Get fresh cart data
        const cart = (() => {
            try {
                const saved = window.loadBookingCart ? window.loadBookingCart() : null;
                if (!saved) {
                    const stored = localStorage.getItem('bookingCart');
                    return stored ? JSON.parse(stored) : [];
                }
                return saved || [];
            } catch (e) {
                return [];
            }
        })();
        
        if (index >= 0 && index < cart.length) {
            // Remove the item
            cart.splice(index, 1);
            
            // Save updated cart
            if (typeof window.saveBookingCart === 'function') {
                window.saveBookingCart(cart);
            } else {
                try {
                    localStorage.setItem('bookingCart', JSON.stringify(cart));
                } catch (e) {
                    console.error('Error saving cart:', e);
                }
            }
            
            // Reload page after a short delay to ensure data is saved
            setTimeout(() => {
                reloadPage();
            }, 300);
        } else {
            hideLoadingOverlay();
        }
    }
    
    function showLoadingOverlay() {
        // Remove existing overlay if any
        const existing = document.getElementById('cart-loading-overlay');
        if (existing) existing.remove();
        
        const overlay = document.createElement('div');
        overlay.id = 'cart-loading-overlay';
        overlay.className = 'cart-loading-overlay';
        overlay.innerHTML = `
            <div class="loading-content">
                <div class="loading-spinner"></div>
                <p>Updating cart...</p>
            </div>
        `;
        document.body.appendChild(overlay);
        
        setTimeout(() => {
            overlay.classList.add('show');
        }, 10);
    }
    
    function hideLoadingOverlay() {
        const overlay = document.getElementById('cart-loading-overlay');
        if (overlay) {
            overlay.classList.remove('show');
            setTimeout(() => {
                overlay.remove();
            }, 300);
        }
    }
    
    function reloadPage() {
        const theme = localStorage.getItem('theme') || currentTheme;
        window.location.href = '/cart' + (theme ? `?theme=${encodeURIComponent(theme)}` : '');
    }
    
    function showNotification(message, type) {
        const notification = document.createElement('div');
        notification.className = `cart-notification cart-notification-${type}`;
        notification.innerHTML = `
            <div class="notification-content">
                <div class="notification-icon">
                    <i class="bi bi-${type === 'success' ? 'check-circle-fill' : 'exclamation-circle-fill'}"></i>
                </div>
                <div class="notification-text">
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
        }, 3000);
    }
    
    function setupEventListeners() {
        const clearCartBtn = document.getElementById('clearCartBtn');
        const checkoutBtn = document.getElementById('checkoutBtn');
        
        clearCartBtn.addEventListener('click', () => {
            // Show confirmation notification
            const confirmNotification = document.createElement('div');
            confirmNotification.className = 'cart-confirm-dialog';
            confirmNotification.innerHTML = `
                <div class="confirm-content">
                    <p>Are you sure you want to clear your cart? This action cannot be undone.</p>
                    <div class="confirm-buttons">
                        <button class="btn btn-sm btn-outline-secondary confirm-no">Cancel</button>
                        <button class="btn btn-sm btn-primary confirm-yes">Clear Cart</button>
                    </div>
                </div>
            `;
            document.body.appendChild(confirmNotification);
            
            setTimeout(() => confirmNotification.classList.add('show'), 100);
            
            confirmNotification.querySelector('.confirm-yes').addEventListener('click', () => {
                try {
                    // Hide confirmation dialog
                    confirmNotification.classList.remove('show');
                    setTimeout(() => confirmNotification.remove(), 300);
                    
                    // Show loading overlay
                    showLoadingOverlay();
                    
                    // Clear cart
                    localStorage.removeItem('bookingCart');
                    if (typeof window.saveBookingCart === 'function') {
                        window.saveBookingCart([]);
                    }
                    
                    // Reload page after a short delay to ensure data is saved
                    setTimeout(() => {
                        reloadPage();
                    }, 300);
                } catch (e) {
                    console.error('Error clearing cart:', e);
                    hideLoadingOverlay();
                }
            });
            
            confirmNotification.querySelector('.confirm-no').addEventListener('click', () => {
                confirmNotification.classList.remove('show');
                setTimeout(() => confirmNotification.remove(), 300);
            });
        });
        
        checkoutBtn.addEventListener('click', (e) => {
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
                e.preventDefault();
                showNotification('Your cart is empty. Please add rooms to your booking first.', 'error');
                // Redirect to booking page after notification
                setTimeout(() => {
                    const theme = localStorage.getItem('theme') || currentTheme;
                    window.location.href = '/booking' + (theme ? `?theme=${encodeURIComponent(theme)}` : '');
                }, 1500);
                return;
            }
        });
    }
    
    // Use event delegation for dynamic elements
    document.addEventListener('click', function(e) {
        // Handle remove button
        if (e.target.closest('.remove-item-btn')) {
            const btn = e.target.closest('.remove-item-btn');
            const index = parseInt(btn.dataset.index);
            if (!isNaN(index)) {
                removeCartItem(index);
            }
        }
        
        // Handle edit button
        if (e.target.closest('.edit-item-btn')) {
            const btn = e.target.closest('.edit-item-btn');
            const index = parseInt(btn.dataset.index);
            if (!isNaN(index)) {
                editCartItem(index);
            }
        }
        
        // Handle cancel edit button
        if (e.target.closest('.cancel-edit-btn')) {
            const btn = e.target.closest('.cancel-edit-btn');
            const index = parseInt(btn.dataset.index);
            if (!isNaN(index)) {
                cancelCartItemEdit(index);
            }
        }
        
        // Handle save edit button
        if (e.target.closest('.save-edit-btn')) {
            e.preventDefault();
            const btn = e.target.closest('.save-edit-btn');
            const form = btn.closest('.cart-edit-form');
            if (form) {
                const index = parseInt(form.dataset.index);
                if (!isNaN(index)) {
                    saveCartItemEdit(index, form);
                }
            }
        }
    });
    
    // Handle checkin date change for dynamic forms
    document.addEventListener('change', function(e) {
        if (e.target.classList.contains('edit-checkin')) {
            const form = e.target.closest('.cart-edit-form');
            const checkoutInput = form ? form.querySelector('.edit-checkout') : null;
            if (e.target.value && checkoutInput) {
                const minCheckout = new Date(e.target.value);
                minCheckout.setDate(minCheckout.getDate() + 1);
                checkoutInput.min = minCheckout.toISOString().split('T')[0];
                if (checkoutInput.value && new Date(checkoutInput.value) <= new Date(e.target.value)) {
                    checkoutInput.value = '';
                }
            }
        }
    });
});
</script>

<style>
/* Cart Notifications */
.cart-notification {
    position: fixed;
    top: 20px;
    right: 20px;
    z-index: 9999;
    min-width: 300px;
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

.cart-notification::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--current-gold);
}

.cart-notification.show {
    transform: translateX(0);
    opacity: 1;
}

.cart-notification .notification-content {
    display: flex;
    align-items: center;
    padding: 1.5rem;
    gap: 1rem;
}

.cart-notification .notification-icon {
    width: 40px;
    height: 40px;
    background: var(--current-gold);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1.2rem;
    color: var(--current-primary);
    flex-shrink: 0;
}

.cart-notification.error .notification-icon {
    background: #dc3545;
}

.cart-notification .notification-text {
    flex: 1;
}

.cart-notification .notification-message {
    font-size: 0.95rem;
    color: var(--current-text);
    margin: 0;
    line-height: 1.4;
}

/* Confirm Dialog */
.cart-confirm-dialog {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.5);
    z-index: 10000;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.cart-confirm-dialog.show {
    opacity: 1;
}

.cart-confirm-dialog .confirm-content {
    background: var(--current-secondary);
    border-radius: 20px;
    padding: 2rem;
    max-width: 400px;
    width: 90%;
    border: 1px solid var(--current-accent);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.3);
}

.cart-confirm-dialog .confirm-content p {
    color: var(--current-text);
    margin-bottom: 1.5rem;
    font-size: 1rem;
}

.cart-confirm-dialog .confirm-buttons {
    display: flex;
    gap: 1rem;
    justify-content: flex-end;
}

/* Cart Item Buttons */
.cart-item-buttons {
    display: flex;
    gap: 0.5rem;
    align-items: center;
}

.cart-item-editing {
    border-color: var(--current-gold) !important;
    background: var(--current-primary);
}

.cart-edit-form .form-label {
    font-size: 0.85rem;
    font-weight: 600;
    color: var(--current-text);
    margin-bottom: 0.5rem;
    text-transform: uppercase;
    letter-spacing: 0.5px;
}

.cart-edit-form .form-control {
    border: 2px solid var(--current-accent);
    border-radius: 10px;
    padding: 0.75rem 1rem;
    background: var(--current-secondary);
    color: var(--current-text);
}

.cart-edit-form .form-control:focus {
    border-color: var(--current-gold);
    box-shadow: 0 0 0 0.2rem rgba(197, 165, 114, 0.25);
}

.cart-item-actions {
    display: flex;
    gap: 1rem;
    justify-content: flex-end;
    padding-top: 1rem;
    border-top: 1px solid var(--current-accent);
}

.btn-sm {
    padding: 0.5rem 1rem;
    font-size: 0.875rem;
}

/* Loading Overlay */
.cart-loading-overlay {
    position: fixed;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: rgba(0, 0, 0, 0.7);
    backdrop-filter: blur(5px);
    z-index: 10001;
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.cart-loading-overlay.show {
    opacity: 1;
}

.cart-loading-overlay .loading-content {
    background: var(--current-secondary);
    border-radius: 20px;
    padding: 3rem;
    border: 2px solid var(--current-gold);
    box-shadow: 0 20px 60px rgba(0, 0, 0, 0.5);
    text-align: center;
}

.cart-loading-overlay .loading-spinner {
    width: 60px;
    height: 60px;
    border: 4px solid var(--current-accent);
    border-top-color: var(--current-gold);
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin: 0 auto 1.5rem;
}

.cart-loading-overlay .loading-content p {
    color: var(--current-text);
    font-size: 1.1rem;
    font-weight: 500;
    margin: 0;
}

@keyframes spin {
    to { transform: rotate(360deg); }
}
</style>
@endsection
