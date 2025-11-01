/* ======================
   HOTEL ELYRA - JS
   ======================
*/

/**
 * Main Hotel Elyra Application Class
 * Handles all core functionality including themes, animations, and user interactions
 */
class HotelElyra {
    constructor() {
        // Initialize theme from multiple sources with priority order
        // Priority: URL parameter > localStorage > cookie > default 'solice'
        const urlTheme = HotelElyra.getThemeFromUrl();
        const cookieTheme = HotelElyra.getThemeFromCookie();
        this.currentTheme = urlTheme || localStorage.getItem('theme') || cookieTheme || 'solice';
        
        // Sync theme across all storage methods for consistency
        if (urlTheme) {
            try { localStorage.setItem('theme', urlTheme); } catch (e) {}
            HotelElyra.setThemeCookie(urlTheme);
        } else if (!localStorage.getItem('theme') && cookieTheme) {
            try { localStorage.setItem('theme', cookieTheme); } catch (e) {}
        }
        
        // Prevent multiple theme transitions from running simultaneously
        this.isTransitioning = false;
        
        // Initialize all application features
        this.init();
    }

    /**
     * Initialize all application features
     * Sets up animations, theme system, page transitions, and user interactions
     */
    init() {
        this.initializeAOS();           // Initialize scroll animations
        this.setupThemeSystem();        // Set up theme switching functionality
        this.setupPageTransitions();    // Enable smooth page transitions
        this.setupScrollAnimations();   // Set up scroll-triggered animations
        this.setupLoadingStates();      // Handle loading overlays
        this.setupFormAnimations();     // Add form interaction animations
        this.setupNavigation();         // Enhance navigation functionality
        this.applyTheme(this.currentTheme);  // Apply the current theme
        this.syncLinksWithTheme(this.currentTheme);  // Update navigation links
    }

    /**
     * Initialize AOS library
     * Provides smooth animations when elements come into view
     */
    initializeAOS() {
        if (typeof AOS !== 'undefined') {
            AOS.init({
                duration: 1000,         // Animation duration in milliseconds
                easing: 'ease-in-out',  // Animation easing function
                once: true,             // Animate elements only once
                offset: 100             // Trigger point offset from viewport
            });
        }
    }

    setupThemeSystem() {
        const themeButtons = document.querySelectorAll('.theme-btn');
        const body = document.body;

        themeButtons.forEach(btn => {
            btn.addEventListener('click', (e) => {
                e.preventDefault();
                const theme = btn.dataset.theme;
                if (theme && !this.isTransitioning) {
                    this.switchTheme(theme);
                }
            });
        });

        // Split tile support on home hero
        const tileSolice = document.getElementById('tileSolice');
        const tileVault = document.getElementById('tileVault');
        if (tileSolice) {
            tileSolice.addEventListener('click', (e) => {
                e.preventDefault();
                this.switchTheme('solice');
            });
        }
        if (tileVault) {
            tileVault.addEventListener('click', (e) => {
                e.preventDefault();
                this.switchTheme('vault');
            });
        }

        // Theme persistence
        window.addEventListener('beforeunload', () => {
            localStorage.setItem('theme', this.currentTheme);
        });
    }

    /**
     * Switch between Solice and Vault themes with smooth transition
     * @param {string} newTheme - The theme to switch to ('solice' or 'vault')
     */
    switchTheme(newTheme) {
        // Prevent multiple transitions and unnecessary switches
        if (this.isTransitioning || newTheme === this.currentTheme) return;

        this.isTransitioning = true;
        const body = document.body;
        
        // Add transition class for CSS animations
        body.classList.add('theme-transitioning');
        
        // Create and show transition overlay for smooth visual effect
        const overlay = this.createThemeOverlay();
        document.body.appendChild(overlay);

        // Apply theme change after overlay animation
        setTimeout(() => {
            body.setAttribute('data-theme', newTheme);
            this.currentTheme = newTheme;
            
            // Persist theme choice across browser sessions
            try { localStorage.setItem('theme', newTheme); } catch (e) {}
            HotelElyra.setThemeCookie(newTheme);
            
            // Update UI elements to reflect new theme
            this.updateThemeButtons(newTheme);
            
            // Notify other components about theme change
            window.dispatchEvent(new CustomEvent('themeChanged', { detail: { theme: newTheme } }));
            this.syncLinksWithTheme(newTheme);
            
            // Update home page content if currently on home page
            if (window.location.pathname === '/') {
                this.updateHomeContent(newTheme);
            }

            // Remove overlay and complete transition
            setTimeout(() => {
                overlay.remove();
                body.classList.remove('theme-transitioning');
                this.isTransitioning = false;
            }, 300);
        }, 300);
    }

    createThemeOverlay() {
        const overlay = document.createElement('div');
        overlay.className = 'theme-overlay';
        overlay.innerHTML = `
            <div class="theme-overlay-content">
                <div class="theme-spinner"></div>
                <p class="theme-text">Applying ${this.currentTheme === 'solice' ? 'Vault' : 'Solice'} aesthetic...</p>
            </div>
        `;
        return overlay;
    }

    updateThemeButtons(theme) {
        const themeButtons = document.querySelectorAll('.theme-btn');
        themeButtons.forEach(btn => {
            btn.classList.remove('active');
            if (btn.dataset.theme === theme) {
                btn.classList.add('active');
            }
        });
    }

    updateRoomContent(theme) {
        const container = document.getElementById('roomsContainer');
        if (!container) return;

        const roomsData = {
            solice: [
                { 
                    name: 'Deluxe Solice Suite', 
                    img: 'https://images.unsplash.com/photo-1600585154340-be6161a56a0c?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 
                    desc: 'Soft beige tones and sunlit interiors create a serene sanctuary.',
                    price: '$299/night',
                    features: ['Ocean View', 'Balcony', 'Mini Bar', 'Spa Access']
                },
                { 
                    name: 'Executive Solice Room', 
                    img: 'https://images.unsplash.com/photo-1615461066841-6116e4a86a86?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 
                    desc: 'Minimalist luxury designed for the discerning traveler.',
                    price: '$199/night',
                    features: ['City View', 'Work Desk', 'Coffee Machine', 'Concierge']
                },
                { 
                    name: 'Garden Solice Villa', 
                    img: 'https://images.unsplash.com/photo-1590490360182-c33d57733427?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 
                    desc: 'Private retreat surrounded by lush tropical gardens.',
                    price: '$399/night',
                    features: ['Garden View', 'Private Pool', 'Butler Service', 'Gourmet Kitchen']
                }
            ],
            vault: [
                { 
                    name: 'Vault King Suite', 
                    img: 'https://images.unsplash.com/photo-1600585154350-46e4bdaaf3c9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 
                    desc: 'Dark marble finishes with modern design elements.',
                    price: '$399/night',
                    features: ['Skyline View', 'Private Bar', 'Jacuzzi', '24/7 Room Service']
                },
                { 
                    name: 'Vault Premium Room', 
                    img: 'https://images.unsplash.com/photo-1598300054083-3de4e6ecfef3?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 
                    desc: 'Sophisticated interiors with sleek lighting design.',
                    price: '$299/night',
                    features: ['City View', 'Smart TV', 'Wine Cellar', 'Personal Concierge']
                },
                { 
                    name: 'Vault Penthouse', 
                    img: 'https://images.unsplash.com/photo-1600047509807-ba9f7fd2c58b?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80', 
                    desc: 'Top-floor luxury with panoramic city views.',
                    price: '$599/night',
                    features: ['360° View', 'Private Elevator', 'Chef Kitchen', 'Personal Butler']
                }
            ]
        };

        const selectedRooms = roomsData[theme] || roomsData.solice;
        
        container.innerHTML = selectedRooms.map(room => `
            <div class="col-md-4 mb-4" data-aos="fade-up" data-aos-delay="${Math.random() * 300}">
                <div class="card room-card h-100">
                    <div class="card-img-container">
                        <img src="${room.img}" class="card-img-top" alt="${room.name}" loading="lazy">
                        <div class="card-overlay">
                            <div class="price-tag">${room.price}</div>
                        </div>
                    </div>
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">${room.name}</h5>
                        <p class="card-text flex-grow-1">${room.desc}</p>
                        <div class="features mb-3">
                            ${room.features.map(feature => `<span class="feature-tag">${feature}</span>`).join('')}
                        </div>
                        <a href="/booking" class="btn btn-primary w-100">
                            <i class="bi bi-calendar-check me-2"></i>Book Now
                        </a>
                    </div>
                </div>
            </div>
        `).join('');

        // Reinitialize AOS for new elements
        if (typeof AOS !== 'undefined') {
            AOS.refresh();
        }
    }

    updateHomeContent(theme) {
        const heroContent = document.querySelector('.hero-content');
        if (!heroContent) return;

        const content = {
            solice: {
                title: 'Solice',
                subtitle: 'Where Serenity Meets Luxury',
                description: 'Experience the perfect blend of tranquility and elegance in our light, airy spaces designed for ultimate relaxation.'
            },
            vault: {
                title: 'Vault',
                subtitle: 'Where Darkness Meets Sophistication',
                description: 'Discover the allure of our dark, luxurious spaces crafted for those who appreciate the finer things in life.'
            }
        };

        const themeContent = content[theme];
        if (themeContent) {
            const titleLine2 = document.getElementById('heroTitleLine2');
            const subtitle = document.getElementById('themeSubtitle') || heroContent.querySelector('.lead');
            const description = heroContent.querySelector('.description');

            if (titleLine2) titleLine2.textContent = themeContent.title;
            if (subtitle) subtitle.textContent = themeContent.subtitle;
            if (description) description.textContent = themeContent.description;
        }
    }

    // Page Transition System
    setupPageTransitions() {
        const links = document.querySelectorAll('a[href]');
        links.forEach(link => {
            link.addEventListener('click', (e) => {
                const href = link.getAttribute('href') || '';
                const target = link.getAttribute('target');
                const noTransition = link.hasAttribute('data-no-transition');
                // Only intercept same-origin, internal navigations without anchors or special targets
                const isInternal = href.startsWith('/') && !href.startsWith('//');
                const isAnchor = href.startsWith('#');
                if (!noTransition && isInternal && !isAnchor && href !== window.location.pathname && !target) {
                    e.preventDefault();
                    this.navigateToPage(href);
                }
            });
        });
    }

    navigateToPage(url) {
        if (this.isTransitioning) return;

        this.isTransitioning = true;
        const overlay = this.createLoadingOverlay();
        document.body.appendChild(overlay);

        setTimeout(() => {
            window.location.href = url;
        }, 500);
    }

    createLoadingOverlay() {
        const overlay = document.createElement('div');
        overlay.className = 'loading-overlay';
        overlay.innerHTML = `
            <div class="loading-content">
                <div class="loading-spinner"></div>
                <p class="loading-text">Loading...</p>
            </div>
        `;
        return overlay;
    }

    // Scroll Animations
    setupScrollAnimations() {
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('revealed');
                }
            });
        }, observerOptions);

        document.querySelectorAll('.scroll-reveal').forEach(el => {
            observer.observe(el);
        });
    }

    // Loading States
    setupLoadingStates() {
        window.addEventListener('load', () => {
            const overlay = document.getElementById('loadingOverlay');
            if (overlay) {
                overlay.style.opacity = '0';
                setTimeout(() => {
                    overlay.style.display = 'none';
                }, 500);
            }
        });
    }

    // Form Animations
    setupFormAnimations() {
        const forms = document.querySelectorAll('form');
        
        forms.forEach(form => {
            const inputs = form.querySelectorAll('.form-control');
            
            inputs.forEach(input => {
                input.addEventListener('focus', () => {
                    input.parentElement.classList.add('focused');
                });
                
                input.addEventListener('blur', () => {
                    if (!input.value) {
                        input.parentElement.classList.remove('focused');
                    }
                });
            });

            form.addEventListener('submit', (e) => {
                const submitBtn = form.querySelector('button[type="submit"]');
                if (submitBtn) {
                    submitBtn.innerHTML = '<span class="loading"></span> Processing...';
                    submitBtn.disabled = true;
                }
            });
        });
    }

    // Navigation Enhancement
    setupNavigation() {
        const navLinks = document.querySelectorAll('.nav-link');
        const currentPath = window.location.pathname;

        navLinks.forEach(link => {
            const href = link.getAttribute('href');
            if (href === currentPath) {
                link.classList.add('active');
            }

            link.addEventListener('click', () => {
                navLinks.forEach(l => l.classList.remove('active'));
                link.classList.add('active');
            });
        });
    }

    // Apply Theme
    applyTheme(theme) {
        document.body.setAttribute('data-theme', theme);
        this.updateThemeButtons(theme);
        
        // Broadcast for pages that render their own content (e.g., rooms)
        window.dispatchEvent(new CustomEvent('themeChanged', { detail: { theme } }));
        this.syncLinksWithTheme(theme);
        
        if (window.location.pathname === '/') {
            this.updateHomeContent(theme);
        }
    }

    static getThemeFromUrl() {
        try {
            const params = new URLSearchParams(window.location.search);
            const t = params.get('theme');
            return t === 'vault' || t === 'solice' ? t : null;
        } catch (e) { return null; }
    }

    static getThemeFromCookie() {
        try {
            const match = document.cookie.match(/(?:^|; )theme=([^;]+)/);
            return match ? decodeURIComponent(match[1]) : null;
        } catch (e) { return null; }
    }

    static setThemeCookie(theme) {
        try {
            const oneYear = 60 * 60 * 24 * 365;
            document.cookie = `theme=${encodeURIComponent(theme)}; Max-Age=${oneYear}; Path=/; SameSite=Lax`;
        } catch (e) {}
    }

    syncLinksWithTheme(theme) {
        const links = document.querySelectorAll('a[href^="/"]');
        links.forEach(link => {
            const href = link.getAttribute('href');
            if (!href || href.startsWith('#') || href.startsWith('//')) return;
            try {
                const url = new URL(href, window.location.origin);
                url.searchParams.set('theme', theme);
                link.setAttribute('href', url.pathname + url.search + url.hash);
            } catch (e) {}
        });
    }
}

// Initialize the application
document.addEventListener('DOMContentLoaded', () => {
    new HotelElyra();
});

// Add global helpers:
window.saveBookingCart = function(bookingCart) {
    try {
        localStorage.setItem('bookingCart', JSON.stringify(bookingCart));
    } catch (e) {}
};
window.loadBookingCart = function() {
    try {
        const d = localStorage.getItem('bookingCart');
        return d ? JSON.parse(d) : [];
    } catch (e) { return []; }
};

// Additional utility functions
window.HotelElyra = {
    // Smooth scroll to element
    scrollTo: (elementId) => {
        const element = document.getElementById(elementId);
        if (element) {
            element.scrollIntoView({ behavior: 'smooth' });
        }
    },

    // Show notification
    showNotification: (message, type = 'info') => {
        const notification = document.createElement('div');
        notification.className = `notification notification-${type}`;
        notification.textContent = message;
        document.body.appendChild(notification);
        
        setTimeout(() => {
            notification.classList.add('show');
        }, 100);
        
        setTimeout(() => {
            notification.classList.remove('show');
            setTimeout(() => {
                notification.remove();
            }, 300);
        }, 3000);
    },

    // Animate counter
    animateCounter: (element, target, duration = 2000) => {
        let start = 0;
        const increment = target / (duration / 16);
        
        const timer = setInterval(() => {
            start += increment;
            element.textContent = Math.floor(start);
            
            if (start >= target) {
                element.textContent = target;
                clearInterval(timer);
            }
        }, 16);
    }
};
