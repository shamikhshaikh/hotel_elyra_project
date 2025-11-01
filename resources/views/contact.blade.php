@extends('layout')

@section('title', 'Contact')

@section('content')
<section class="container py-5 marbled-effect position-relative overflow-hidden">
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
    
    <div class="row align-items-start g-4">
        <div class="col-lg-5" data-aos="fade-right">
            <div class="p-4 p-lg-5 rounded shadow-elegant" style="background: var(--current-secondary); border:1px solid var(--current-accent);">
                <h1 class="mb-3 contact-title" style="font-family: var(--font-primary);">Contact Hotel Elyra</h1>
                <p class="mb-4" style="color: var(--current-text-light);">We’re here to help with bookings, queries, or special requests.</p>
                <div class="d-flex flex-column gap-2">
                    <div><i class="bi bi-geo-alt me-2" style="color: var(--current-gold);"></i><span>123 Blvd, London, United Kingdom</span></div>
                    <div><i class="bi bi-telephone me-2" style="color: var(--current-gold);"></i><span>(021) 123 456 789</span></div>
                    <div><i class="bi bi-envelope me-2" style="color: var(--current-gold);"></i><span>info@hotelelyra.com</span></div>
                </div>
                <hr class="my-4"/>
                <h6 class="fw-semibold mb-3">Follow Us</h6>
                <div class="d-flex gap-3 fs-4">
                    <a href="#" class="text-decoration-none" style="color: var(--current-text);"><i class="bi bi-facebook"></i></a>
                    <a href="#" class="text-decoration-none" style="color: var(--current-text);"><i class="bi bi-instagram"></i></a>
                    <a href="#" class="text-decoration-none" style="color: var(--current-text);"><i class="bi bi-twitter-x"></i></a>
                </div>
                <div class="mt-4">
                    <div class="ratio ratio-16x9 overflow-hidden rounded" style="border:1px solid var(--current-accent);">
                        <iframe 
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3621.8347903672016!2d67.05075677466598!3d24.80538594858392!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3eb33d54f72a2ed5%3A0x2c5cb9a91c02a260!2sKarachi%2C%20Pakistan!5e0!3m2!1sen!2s!4v1696873440582!5m2!1sen!2s" 
                            style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-7" data-aos="fade-left">
            <div class="p-4 p-lg-5 rounded shadow-elegant" style="background: var(--current-secondary); border:1px solid var(--current-accent);">
                <h4 class="mb-4" style="font-family: var(--font-primary);">Send Us a Message or Feedback</h4>
                <form id="contactForm" novalidate>
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">First Name</label>
                            <input type="text" class="form-control" name="first_name" placeholder="Your first name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Last Name</label>
                            <input type="text" class="form-control" name="last_name" placeholder="Your last name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" placeholder="you@example.com" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Phone</label>
                            <input type="tel" class="form-control" name="phone" placeholder="+92 ..." required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Subject</label>
                            <input type="text" class="form-control" name="subject" placeholder="How can we assess you?" required>
                        </div>
                        <div class="col-12">
                            <label class="form-label">Message</label>
                            <textarea class="form-control" name="message" rows="5" placeholder="Write your message here..." required></textarea>
                        </div>
                        <div class="col-12 d-flex align-items-center justify-content-between mt-2">
                            <small style="color: var(--current-text-light);">We respond within 24 hours.</small>
                            <button type="submit" class="btn btn-primary contact-send-btn">
                                <i class="bi bi-send me-2"></i>Send Message
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>

<style>
/*  Solice Particles for Contact Page */
body[data-theme="solice"] .particle {
    background: rgba(197, 165, 114, 1) !important;
    box-shadow: 0 0 20px rgba(197, 165, 114, 0.8) !important;
    width: 8px !important;
    height: 8px !important;
    opacity: 0.9 !important;
}

/* Contact Form Button Styling */
.contact-send-btn {
    background: var(--current-gold) !important;
    border: 2px solid var(--current-gold) !important;
    color: var(--current-primary) !important;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.3s ease;
    border-radius: 50px;
    padding: 0.75rem 2rem;
}

.contact-send-btn:hover {
    background: var(--current-gold) !important;
    color: var(--current-primary) !important;
    transform: translateY(-2px);
    box-shadow: 0 10px 30px var(--current-shadow);
}

.contact-send-btn:focus {
    background: var(--current-gold) !important;
    color: var(--current-primary) !important;
    box-shadow: 0 0 0 0.2rem rgba(197, 165, 114, 0.25);
}

.contact-send-btn.sending {
    background: var(--current-gold) !important;
    color: var(--current-primary) !important;
    opacity: 0.8;
}

.contact-send-btn.success {
    background: #28a745 !important;
    border-color: #28a745 !important;
    color: white !important;
}

/* Contact Notification */
.contact-notification {
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

.contact-notification::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--current-gold);
}

.contact-notification.show {
    transform: translateX(0);
    opacity: 1;
}

.contact-notification .notification-content {
    display: flex;
    align-items: center;
    padding: 1.5rem;
    gap: 1rem;
}

.contact-notification .notification-icon {
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

.contact-notification .notification-text {
    flex: 1;
}

.contact-notification .notification-title {
    font-family: var(--font-primary);
    font-size: 1.1rem;
    font-weight: 600;
    color: var(--current-text);
    margin: 0 0 0.5rem 0;
}

.contact-notification .notification-message {
    font-size: 0.9rem;
    color: var(--current-text-light);
    margin: 0;
    line-height: 1.4;
}
</style>

<script>
// Get theme from multiple sources to handle localhost 127.0.0.1 issue
const urlTheme = new URLSearchParams(window.location.search).get('theme');
const localStorageTheme = localStorage.getItem('theme');
const bodyTheme = document.body.getAttribute('data-theme');

// Priority: URL param > localStorage > body attribute > default
const contactTheme = urlTheme || localStorageTheme || bodyTheme || 'solice';
document.body.setAttribute('data-theme', contactTheme);

// Persist theme to localStorage and URL if not already set
try { 
    if (!localStorage.getItem('theme')) {
        localStorage.setItem('theme', contactTheme);
    }
    
    // If no URL theme param, add it for consistency
    if (!urlTheme && contactTheme !== 'solice') {
        const url = new URL(window.location);
        url.searchParams.set('theme', contactTheme);
        window.history.replaceState({}, '', url);
    }
} catch (e) {}

// Listen for theme changes from other pages
window.addEventListener('themeChanged', (e) => {
    const newTheme = e.detail.theme;
    document.body.setAttribute('data-theme', newTheme);
    localStorage.setItem('theme', newTheme);
    
    // Update URL parameter for consistency across domains
    const url = new URL(window.location);
    url.searchParams.set('theme', newTheme);
    window.history.replaceState({}, '', url);
});

// Contact Form Handling
document.addEventListener('DOMContentLoaded', function() {
    const contactForm = document.getElementById('contactForm');
    const sendBtn = document.querySelector('.contact-send-btn');
    
    if (contactForm && sendBtn) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            sendBtn.classList.add('sending');
            sendBtn.innerHTML = '<i class="bi bi-hourglass-split me-2"></i>Sending...';
            sendBtn.disabled = true;
            
            // Simulate form submission
            setTimeout(() => {
                // Show success state
                sendBtn.classList.remove('sending');
                sendBtn.classList.add('success');
                sendBtn.innerHTML = '<i class="bi bi-check-circle me-2"></i>Message Sent!';
                
                // Show success notification
                showContactNotification('Your message has been sent successfully! We\'ll respond within 24 hours.', 'success');
                
                // Reset form after delay
                setTimeout(() => {
                    contactForm.reset();
                    sendBtn.classList.remove('success');
                    sendBtn.innerHTML = '<i class="bi bi-send me-2"></i>Send Message';
                    sendBtn.disabled = false;
                }, 3000);
            }, 2000);
        });
    }
});

function showContactNotification(message, type) {
    const notification = document.createElement('div');
    notification.className = `contact-notification contact-notification-${type}`;
    notification.innerHTML = `
        <div class="notification-content">
            <div class="notification-icon">
                <i class="bi bi-check-circle-fill"></i>
            </div>
            <div class="notification-text">
                <h6 class="notification-title">Message Sent!</h6>
                <p class="notification-message">${message}</p>
            </div>
        </div>
    `;
    document.body.appendChild(notification);
    
    // Animate in
    setTimeout(() => {
        notification.classList.add('show');
    }, 100);
    
    // Animate out and remove
    setTimeout(() => {
        notification.classList.remove('show');
        setTimeout(() => {
            notification.remove();
        }, 500);
    }, 4000);
}
</script>
@endsection
