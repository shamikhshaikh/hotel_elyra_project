@extends('layout')

@section('title', 'Welcome to Luxury')

@section('content')
<!-- Theme Selection Screen -->
<section id="themeSelection" class="theme-selection-screen position-relative overflow-hidden">
    <!-- Animated Background Layers -->
    <div class="bg-layer layer-1"></div>
    <div class="bg-layer layer-2"></div>
    <div class="bg-layer layer-3"></div>
    
    <!-- Luxury Particles -->
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
    
    <div class="theme-selection-content">
        <div class="container">
            <!-- Hotel Logo Section -->
            <div class="hotel-branding text-center mb-5" data-aos="fade-down" data-aos-duration="2000">
                <div class="logo-container">
                    <i class="bi bi-gem hotel-icon"></i>
                    <div class="logo-glow"></div>
                </div>
                <h1 class="hotel-title">Hotel Elyra</h1>
                <div class="title-underline"></div>
                <p class="hotel-tagline">Choose Your World of Luxury</p>
                <p class="hotel-subtagline">Select a theme to explore our rooms and amenities</p>
            </div>

            <!-- Theme Selection Cards -->
            <div class="theme-cards-container" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="500">
                <div class="row justify-content-center g-5">
                    <div class="col-lg-5 col-md-6">
                        <div class="theme-card solice-card" data-theme="solice">
                            <div class="card-glow solice-glow"></div>
                            <div class="theme-card-image">
                                <img src="http://127.0.0.1:8000/images/solicemain.jpg" alt="Solice Theme">
                                <div class="image-overlay"></div>
                            </div>
                            <div class="theme-card-content">
                                <div class="theme-icon-container">
                                    <i class="bi bi-sun theme-icon"></i>
                                    <div class="icon-ring"></div>
                                </div>
                                <h3 class="theme-title">Solice</h3>
                                <div class="theme-features">
                                    <span class="feature-tag">Natural</span>
                                    <span class="feature-tag">Minimalist</span>
                                    <span class="feature-tag">Zen</span>
                                </div>
                                <div class="card-hover-effect"></div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-5 col-md-6">
                        <div class="theme-card vault-card" data-theme="vault">
                            <div class="card-glow vault-glow"></div>
                            <div class="theme-card-image">
                                <img src="http://127.0.0.1:8000/images/vaultmain.jpg" alt="Vault Theme">
                                <div class="image-overlay"></div>
                            </div>
                            <div class="theme-card-content">
                                <div class="theme-icon-container">
                                    <i class="bi bi-moon-stars theme-icon"></i>
                                    <div class="icon-ring"></div>
                                </div>
                                <h3 class="theme-title">Vault</h3>
                                <div class="theme-features">
                                    <span class="feature-tag">Premium</span>
                                    <span class="feature-tag">Elegant</span>
                                    <span class="feature-tag">Exclusive</span>
                                </div>
                                <div class="card-hover-effect"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Selection Indicator -->
            <div class="selection-indicator text-center mt-5" data-aos="fade-up" data-aos-delay="1000">
            </div>
        </div>
    </div>
</section>

<!-- Main Homepage Content -->
<div id="mainContent" class="main-homepage-content" style="display: none;">
    <!-- Hero Section -->
    <section class="hero position-relative overflow-hidden marbled-effect">
        <div class="hero-content text-center">
            <div class="container">
                <h1 class="hero-title mb-4" id="heroTitle" data-aos="fade-up" data-aos-duration="1500">Solice</h1>
                <p class="hero-subtitle mb-5" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="200">
                    <span id="themeSubtitle">Experience luxury redefined</span>
                </p>
                
                <!-- Theme Change Button -->
                <div class="theme-change-btn mb-5" data-aos="fade-up" data-aos-duration="1500" data-aos-delay="400">
                    <button class="btn btn-outline-primary" id="changeThemeBtn">
                        <i class="bi bi-arrow-left me-2"></i>Change Theme
                    </button>
                </div>
        </div>
    </div>
</section>

    <!-- Theme-Specific Features Section -->
    <section class="features-section py-5">
        <div class="container">
            <div class="text-center mb-5" data-aos="fade-up" data-aos-duration="1000">
                <h2 class="section-title mb-3" id="featuresTitle">Experience Solice</h2>
                <p class="section-subtitle" id="featuresSubtitle">Discover what makes our Solice collection special</p>
            </div>
            
            <div class="row g-4" id="themeFeatures">
                <!-- Features will be loaded dynamically based on theme -->
            </div>
        </div>
</section>

    <section class="cta-section py-5">
        <div class="container">
            <div class="text-center" data-aos="fade-up" data-aos-duration="1500">
                <h2 class="cta-title mb-4">Discover Your Perfect Stay</h2>
                <p class="cta-description mb-5">Explore our exclusive collection of rooms and suites, each designed to provide the ultimate luxury experience tailored to your aesthetic preference.</p>
                <div class="cta-button-container">
                    <a href="{{ url('/rooms') }}" class="btn btn-primary btn-lg">
                        <i class="bi bi-door-open me-2"></i>View Rooms
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>


<style>
/* Theme Selection Screen */
.theme-selection-screen {
    min-height: 100vh;
    display: flex;
    align-items: center;
    background: #0a0a0b;
    position: relative;
    overflow: hidden;
    margin: 0;
    padding: 0;
}

/* Ensure no white gaps on theme selection */
body:not([data-theme]) {
    background: #0a0a0b !important;
    margin: 0 !important;
    padding: 0 !important;
}

body:not([data-theme]) .theme-selection-screen {
    margin-top: 0 !important;
    padding-top: 0 !important;
}

/* Fix white gap above footer on theme selection */
body:not([data-theme]) footer {
    margin-top: 0 !important;
    padding-top: 0 !important;
    background: linear-gradient(135deg, #0a0a0b 0%, #1a1a1c 100%) !important;
}

body:not([data-theme]) .luxury-footer {
    background: linear-gradient(135deg, #0a0a0b 0%, #1a1a1c 100%) !important;
    border-top: 1px solid rgba(197, 165, 114, 0.2) !important;
}

/* Animated Background Layers */
.bg-layer {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    opacity: 0.6;
}

.layer-1 {
    background: linear-gradient(45deg, 
        rgba(197, 165, 114, 0.1) 0%, 
        rgba(245, 241, 235, 0.05) 25%, 
        rgba(14, 14, 16, 0.1) 50%, 
        rgba(42, 45, 51, 0.05) 75%, 
        rgba(197, 165, 114, 0.1) 100%);
    animation: layerFloat1 25s ease-in-out infinite;
}

.layer-2 {
    background: radial-gradient(circle at 30% 20%, rgba(197, 165, 114, 0.15) 0%, transparent 50%),
                radial-gradient(circle at 70% 80%, rgba(14, 14, 16, 0.2) 0%, transparent 50%),
                radial-gradient(circle at 50% 50%, rgba(245, 241, 235, 0.1) 0%, transparent 50%);
    animation: layerFloat2 30s ease-in-out infinite reverse;
}

.layer-3 {
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="luxuryPattern" width="40" height="40" patternUnits="userSpaceOnUse"><circle cx="20" cy="20" r="1" fill="rgba(197,165,114,0.1)"/><circle cx="5" cy="5" r="0.5" fill="rgba(14,14,16,0.1)"/><circle cx="35" cy="35" r="0.8" fill="rgba(245,241,235,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23luxuryPattern)"/></svg>');
    animation: layerFloat3 20s linear infinite;
}

@keyframes layerFloat1 {
    0%, 100% { transform: translate(0, 0) rotate(0deg); opacity: 0.6; }
    33% { transform: translate(-20px, -10px) rotate(1deg); opacity: 0.8; }
    66% { transform: translate(10px, -20px) rotate(-1deg); opacity: 0.7; }
}

@keyframes layerFloat2 {
    0%, 100% { transform: translate(0, 0) scale(1); opacity: 0.6; }
    50% { transform: translate(15px, 15px) scale(1.1); opacity: 0.8; }
}

@keyframes layerFloat3 {
    0% { transform: translate(0, 0); }
    100% { transform: translate(-40px, -40px); }
}

/* Luxury Particles */
.luxury-particles {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 1;
}

.particle {
    position: absolute;
    width: 4px;
    height: 4px;
    background: rgba(197, 165, 114, 0.6);
    border-radius: 50%;
    animation: particleFloat 15s linear infinite;
}

.particle-1 { top: 10%; left: 10%; animation-delay: 0s; }
.particle-2 { top: 20%; right: 15%; animation-delay: 2s; }
.particle-3 { top: 60%; left: 20%; animation-delay: 4s; }
.particle-4 { top: 70%; right: 25%; animation-delay: 6s; }
.particle-5 { top: 40%; left: 5%; animation-delay: 8s; }
.particle-6 { top: 50%; right: 5%; animation-delay: 10s; }
.particle-7 { top: 80%; left: 50%; animation-delay: 12s; }
.particle-8 { top: 30%; right: 50%; animation-delay: 14s; }

@keyframes particleFloat {
    0% { 
        transform: translateY(0px) scale(1);
        opacity: 0;
    }
    10% { 
        opacity: 1;
    }
    90% { 
        opacity: 1;
    }
    100% { 
        transform: translateY(-100vh) scale(0);
        opacity: 0;
    }
}

/* Hotel Branding */
.theme-selection-content {
    position: relative;
    z-index: 10;
    width: 100%;
}

.hotel-branding {
    margin-bottom: 4rem;
}

.logo-container {
    position: relative;
    display: inline-block;
    margin-bottom: 2rem;
}

.hotel-icon {
    font-size: 5rem;
    color: #C5A572;
    animation: logoPulse 3s ease-in-out infinite;
    position: relative;
    z-index: 2;
}

.logo-glow {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 120px;
    height: 120px;
    background: radial-gradient(circle, rgba(197, 165, 114, 0.3) 0%, transparent 70%);
    border-radius: 50%;
    animation: glowPulse 3s ease-in-out infinite;
}

@keyframes logoPulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

@keyframes glowPulse {
    0%, 100% { transform: translate(-50%, -50%) scale(1); opacity: 0.3; }
    50% { transform: translate(-50%, -50%) scale(1.2); opacity: 0.6; }
}

.hotel-title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(3.5rem, 8vw, 6rem);
    font-weight: 700;
    color: #C5A572;
    margin-bottom: 1rem;
    letter-spacing: -0.02em;
    text-shadow: 0 4px 20px rgba(197, 165, 114, 0.3);
}

.title-underline {
    width: 100px;
    height: 3px;
    background: linear-gradient(90deg, #C5A572, transparent);
    margin: 0 auto 2rem;
    border-radius: 2px;
}

.hotel-tagline {
    font-family: 'Cormorant Garamond', serif;
    font-size: clamp(1.6rem, 4vw, 2.2rem);
    color: #E8E9EB;
    font-weight: 500;
    letter-spacing: 0.8px;
    margin-bottom: 0.5rem;
    font-style: italic;
}

.hotel-subtagline {
    font-family: 'Inter', sans-serif;
    font-size: clamp(1.1rem, 2.5vw, 1.3rem);
    color: #A6A9AF;
    font-weight: 400;
    letter-spacing: 0.3px;
    opacity: 0.9;
}

/* Navigation for Theme Selection - Blends with Dark Background */
.luxury-nav {
    background: linear-gradient(135deg, #0a0a0b 0%, #1a1a1c 100%) !important;
    backdrop-filter: blur(20px) !important;
    border-bottom: 1px solid rgba(197, 165, 114, 0.2) !important;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3) !important;
}

/* Theme Selection Navigation - Matches Page Gradient */
body:not([data-theme]) .navbar,
.theme-selection-screen .navbar {
    background: linear-gradient(135deg, #0a0a0b 0%, #1a1a1c 100%) !important;
    backdrop-filter: blur(20px) !important;
    border-bottom: 1px solid rgba(197, 165, 114, 0.2) !important;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3) !important;
}

body:not([data-theme]) .navbar-brand,
.theme-selection-screen .navbar-brand {
    color: #C5A572 !important;
    text-shadow: 0 2px 8px rgba(197, 165, 114, 0.3) !important;
}

body:not([data-theme]) .navbar-nav .nav-link,
.theme-selection-screen .navbar-nav .nav-link {
    color: #E8E9EB !important;
    transition: all 0.3s ease !important;
}

body:not([data-theme]) .navbar-nav .nav-link:hover,
.theme-selection-screen .navbar-nav .nav-link:hover {
    color: #C5A572 !important;
    text-shadow: 0 2px 4px rgba(197, 165, 114, 0.3) !important;
}

/* Force override for theme selection screen */
.theme-selection-screen .navbar {
    background: linear-gradient(135deg, #0a0a0b 0%, #1a1a1c 100%) !important;
    backdrop-filter: blur(20px) !important;
    border-bottom: 1px solid rgba(197, 165, 114, 0.2) !important;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3) !important;
}

/* Maximum specificity override for theme selection */
body:not([data-theme]) .navbar.navbar-expand-lg,
.theme-selection-screen .navbar.navbar-expand-lg {
    background: linear-gradient(135deg, #0a0a0b 0%, #1a1a1c 100%) !important;
    backdrop-filter: blur(20px) !important;
    border-bottom: 1px solid rgba(197, 165, 114, 0.2) !important;
    box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3) !important;
}

.luxury-nav .navbar-brand {
    color: #C5A572 !important;
    text-shadow: 0 2px 8px rgba(197, 165, 114, 0.3) !important;
}

.luxury-nav .navbar-nav .nav-link {
    color: #E8E9EB !important;
    transition: all 0.3s ease !important;
}

.luxury-nav .navbar-nav .nav-link:hover {
    color: #C5A572 !important;
    text-shadow: 0 2px 4px rgba(197, 165, 114, 0.3) !important;
}

/* Footer for Theme Selection */
.luxury-footer {
    background: linear-gradient(135deg, #0a0a0b 0%, #1a1a1c 100%) !important;
    color: #E8E9EB !important;
    border-top: 1px solid rgba(197, 165, 114, 0.2) !important;
    position: relative;
    overflow: hidden;
}

.luxury-footer::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: 
        radial-gradient(circle at 20% 20%, rgba(197, 165, 114, 0.05) 0%, transparent 50%),
        radial-gradient(circle at 80% 80%, rgba(14, 14, 16, 0.1) 0%, transparent 50%);
    pointer-events: none;
}

.luxury-footer h5,
.luxury-footer h6 {
    color: #C5A572 !important;
    text-shadow: 0 2px 8px rgba(197, 165, 114, 0.3) !important;
}

.luxury-footer .bi-gem {
    color: #C5A572 !important;
}

.luxury-footer .social-links a {
    color: #A6A9AF !important;
    transition: color 0.3s ease !important;
}

.luxury-footer .social-links a:hover {
    color: #C5A572 !important;
}

.theme-selection-screen::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(0,0,0,0.05)"/><circle cx="75" cy="75" r="1" fill="rgba(0,0,0,0.05)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    opacity: 0.3;
}

.theme-selection-content {
    position: relative;
    z-index: 2;
    width: 100%;
}

.hotel-logo {
    margin-bottom: 4rem;
}

.hotel-icon {
    font-size: 4rem;
    color: #C5A572 !important;
    margin-bottom: 1rem;
    animation: pulse 2s ease-in-out infinite;
    filter: drop-shadow(0 2px 4px rgba(0,0,0,0.3));
}

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.05); }
}

.hotel-title {
    font-family: 'Playfair Display', serif;
    font-size: clamp(3rem, 8vw, 5rem);
    font-weight: 700;
    color: #C5A572 !important;
    margin-bottom: 1rem;
    letter-spacing: -0.02em;
    text-shadow: 0 3px 6px rgba(0,0,0,0.4);
    filter: drop-shadow(0 2px 4px rgba(0,0,0,0.2));
}

.hotel-tagline {
    font-family: 'Cormorant Garamond', serif;
    font-size: clamp(1.4rem, 3.5vw, 1.8rem);
    color: #4A4A4A;
    font-weight: 500;
    letter-spacing: 0.8px;
    margin-bottom: 0.5rem;
    font-style: italic;
}

.hotel-subtagline {
    font-family: 'Inter', sans-serif;
    font-size: clamp(1rem, 2.5vw, 1.2rem);
    color: #666666;
    font-weight: 400;
    letter-spacing: 0.3px;
    opacity: 0.9;
}

/* Theme Cards  */
.theme-cards-container {
    max-width: 1000px;
    margin: 0 auto;
}

.theme-card {
    cursor: pointer;
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
    border-radius: 25px;
    overflow: hidden;
    position: relative;
    height: 500px;
    border: 2px solid rgba(197, 165, 114, 0.2);
    background: rgba(0, 0, 0, 0.3);
    backdrop-filter: blur(10px);
}

.theme-card:hover {
    transform: translateY(-20px) scale(1.03);
    border-color: rgba(197, 165, 114, 0.6);
    box-shadow: 0 40px 100px rgba(197, 165, 114, 0.2);
}

.card-glow {
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: radial-gradient(circle, rgba(197, 165, 114, 0.1) 0%, transparent 70%);
    opacity: 0;
    transition: opacity 0.8s ease;
    pointer-events: none;
}

.solice-glow {
    background: radial-gradient(circle, rgba(245, 241, 235, 0.1) 0%, transparent 70%);
}

.vault-glow {
    background: radial-gradient(circle, rgba(14, 14, 16, 0.2) 0%, transparent 70%);
}

.theme-card:hover .card-glow {
    opacity: 1;
}

.theme-card-image {
    position: relative;
    height: 100%;
    overflow: hidden;
}

.theme-card-image img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 1s ease;
}

.theme-card:hover .theme-card-image img {
    transform: scale(1.1);
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(135deg, rgba(0,0,0,0.4) 0%, rgba(0,0,0,0.7) 100%);
    transition: all 0.8s ease;
}

.theme-card:hover .image-overlay {
    background: linear-gradient(135deg, rgba(0,0,0,0.2) 0%, rgba(0,0,0,0.5) 100%);
}

.theme-card-content {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    text-align: center;
    color: white;
    padding: 3rem 2rem;
    z-index: 2;
}

.theme-icon-container {
    position: relative;
    margin-bottom: 2rem;
}

.theme-icon {
    font-size: 4rem;
    color: #C5A572;
    animation: iconFloat 4s ease-in-out infinite;
    position: relative;
    z-index: 2;
}

.icon-ring {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
    width: 100px;
    height: 100px;
    border: 2px solid rgba(197, 165, 114, 0.3);
    border-radius: 50%;
    animation: ringRotate 8s linear infinite;
}

@keyframes iconFloat {
    0%, 100% { transform: translateY(0px); }
    50% { transform: translateY(-10px); }
}

@keyframes ringRotate {
    0% { transform: translate(-50%, -50%) rotate(0deg); }
    100% { transform: translate(-50%, -50%) rotate(360deg); }
}

.theme-title {
    font-family: 'Playfair Display', serif;
    font-size: 3rem;
    font-weight: 700;
    margin-bottom: 2rem;
    letter-spacing: -0.01em;
    color: white !important;
    text-shadow: 0 4px 20px rgba(0,0,0,0.8);
}

.theme-features {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    justify-content: center;
    margin-bottom: 2rem;
}

.feature-tag {
    background: rgba(197, 165, 114, 0.2);
    color: white;
    padding: 0.6rem 1.5rem;
    border-radius: 25px;
    font-size: 1rem;
    font-weight: 600;
    backdrop-filter: blur(15px);
    border: 1px solid rgba(197, 165, 114, 0.4);
    text-shadow: 0 2px 4px rgba(0,0,0,0.7);
    box-shadow: 0 4px 15px rgba(0,0,0,0.3);
    transition: all 0.3s ease;
}

.feature-tag:hover {
    background: rgba(197, 165, 114, 0.3);
    transform: translateY(-2px);
}

.card-hover-effect {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, transparent 30%, rgba(197, 165, 114, 0.1) 50%, transparent 70%);
    transform: translateX(-100%);
    transition: transform 0.8s ease;
    pointer-events: none;
}

.theme-card:hover .card-hover-effect {
    transform: translateX(100%);
}

.selection-indicator {
    margin-top: 3rem;
}

.indicator-text {
    font-family: 'Inter', sans-serif;
    font-size: 1.1rem;
    color: #A6A9AF;
    margin-bottom: 1rem;
    font-weight: 300;
    letter-spacing: 0.5px;
}

.indicator-dots {
    display: flex;
    justify-content: center;
    gap: 0.5rem;
}

.dot {
    width: 8px;
    height: 8px;
    border-radius: 50%;
    background: rgba(197, 165, 114, 0.3);
    animation: dotPulse 2s ease-in-out infinite;
}

.dot:nth-child(2) {
    animation-delay: 0.3s;
}

.dot:nth-child(3) {
    animation-delay: 0.6s;
}

@keyframes dotPulse {
    0%, 100% { 
        transform: scale(1);
        background: rgba(197, 165, 114, 0.3);
    }
    50% { 
        transform: scale(1.5);
        background: rgba(197, 165, 114, 0.8);
    }
}

/* Marbled Gold Effect */
.marbled-effect {
    position: relative;
    overflow: hidden;
}

.marbled-effect::before {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: 
        radial-gradient(circle at 30% 20%, rgba(197, 165, 114, 0.1) 0%, transparent 50%),
        radial-gradient(circle at 70% 80%, rgba(197, 165, 114, 0.08) 0%, transparent 50%),
        radial-gradient(circle at 50% 50%, rgba(197, 165, 114, 0.06) 0%, transparent 50%),
        radial-gradient(circle at 20% 70%, rgba(197, 165, 114, 0.05) 0%, transparent 50%),
        radial-gradient(circle at 80% 30%, rgba(197, 165, 114, 0.07) 0%, transparent 50%);
    animation: marbledFloat 20s ease-in-out infinite;
    pointer-events: none;
    z-index: 1;
}

.marbled-effect::after {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="marbledPattern" width="60" height="60" patternUnits="userSpaceOnUse"><circle cx="30" cy="30" r="2" fill="rgba(197,165,114,0.03)"/><circle cx="10" cy="10" r="1" fill="rgba(197,165,114,0.02)"/><circle cx="50" cy="50" r="1.5" fill="rgba(197,165,114,0.04)"/><circle cx="20" cy="40" r="0.8" fill="rgba(197,165,114,0.02)"/><circle cx="40" cy="20" r="1.2" fill="rgba(197,165,114,0.03)"/></pattern></defs><rect width="100" height="100" fill="url(%23marbledPattern)"/></svg>');
    animation: marbledPattern 25s linear infinite;
    pointer-events: none;
    z-index: 1;
}

@keyframes marbledFloat {
    0%, 100% { 
        transform: translate(0, 0) rotate(0deg) scale(1);
        opacity: 0.6;
    }
    25% { 
        transform: translate(-20px, -10px) rotate(1deg) scale(1.05);
        opacity: 0.8;
    }
    50% { 
        transform: translate(10px, -20px) rotate(-1deg) scale(0.95);
        opacity: 0.7;
    }
    75% { 
        transform: translate(-10px, 10px) rotate(0.5deg) scale(1.02);
        opacity: 0.9;
    }
}

@keyframes marbledPattern {
    0% { transform: translate(0, 0); }
    100% { transform: translate(-60px, -60px); }
}

/* Main Homepage Content */
.main-homepage-content {
    transition: all 0.8s cubic-bezier(0.4, 0, 0.2, 1);
}

.hero {
    min-height: 80vh;
    display: flex;
    align-items: center;
    background: var(--current-gradient);
    position: relative;
}

.hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    opacity: 0.3;
}

.hero-content {
    position: relative;
    z-index: 2;
    width: 100%;
}

.hero-title {
    font-family: 'Inter', sans-serif;
    font-size: clamp(3rem, 8vw, 6rem);
    font-weight: 800;
    line-height: 1.1;
    margin-bottom: 1.5rem;
    color: var(--current-text);
    text-shadow: 0 2px 12px rgba(0,0,0,0.1);
    letter-spacing: -0.02em;
}

.title-line-1, .title-line-2 { display: none; }

.hero-subtitle {
    font-family: 'Inter', sans-serif;
    font-size: clamp(1.2rem, 3vw, 1.5rem);
    font-weight: 500;
    opacity: 0.9;
    margin-bottom: 3rem;
    color: var(--current-text-light);
    letter-spacing: 0.3px;
    line-height: 1.4;
}

.theme-change-btn {
    margin-bottom: 2rem;
}

.btn-outline-primary {
    border: 2px solid var(--current-gold);
    color: var(--current-gold);
    background: transparent;
    padding: 0.75rem 2rem;
    border-radius: 50px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: all 0.4s ease;
}

.btn-outline-primary:hover {
    background: var(--current-gold);
    color: var(--current-primary);
    transform: translateY(-2px);
    box-shadow: 0 10px 30px var(--current-shadow);
}

/* Features Section */
.features-section {
    background: var(--current-primary);
    padding: 5rem 0;
}

.section-title {
    font-family: var(--font-primary);
    font-size: clamp(2rem, 5vw, 3rem);
    font-weight: 600;
    color: var(--current-text);
    margin-bottom: 1rem;
    letter-spacing: -0.01em;
}

.section-subtitle {
    font-size: 1.2rem;
    color: var(--current-text-light);
    font-weight: 300;
    letter-spacing: 0.5px;
}

.feature-card {
    background: var(--current-secondary);
    border-radius: 20px;
    padding: 3rem 2rem;
    text-align: center;
    transition: all 0.6s cubic-bezier(0.4, 0, 0.2, 1);
    height: 100%;
    border: 1px solid var(--current-accent);
    box-shadow: 0 10px 40px var(--current-shadow);
}

.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 60px var(--current-shadow);
}

.feature-icon {
    width: 80px;
    height: 80px;
    background: var(--current-gradient);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 2rem;
    font-size: 2rem;
    color: var(--current-primary);
}

.feature-title {
    font-family: var(--font-primary);
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--current-text);
    margin-bottom: 1rem;
    letter-spacing: -0.01em;
}

.feature-description {
    color: var(--current-text-light);
    line-height: 1.6;
    font-size: 1rem;
    font-weight: 300;
}

/* CTA Section */
.cta-section {
    background: var(--current-gradient);
    padding: 5rem 0;
    position: relative;
    overflow: hidden;
}

.cta-section::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="grain" width="100" height="100" patternUnits="userSpaceOnUse"><circle cx="25" cy="25" r="1" fill="rgba(255,255,255,0.1)"/><circle cx="75" cy="75" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23grain)"/></svg>');
    opacity: 0.3;
}

.cta-title {
    font-family: var(--font-primary);
    font-size: clamp(2rem, 5vw, 3.5rem);
    font-weight: 600;
    color: var(--current-text);
    margin-bottom: 1.5rem;
    letter-spacing: -0.01em;
}

.cta-description {
    font-size: 1.2rem;
    color: var(--current-text-light);
    line-height: 1.6;
    margin-bottom: 2rem;
    font-weight: 300;
    letter-spacing: 0.5px;
}

.cta-button-container {
    position: relative;
    z-index: 2;
}

.btn-primary {
    background: var(--current-gold);
    color: var(--current-primary);
    border: none;
    padding: 1rem 3rem;
    border-radius: 50px;
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    font-size: 1.1rem;
    transition: all 0.4s ease;
    box-shadow: 0 10px 30px var(--current-shadow);
}

.btn-primary:hover {
    background: var(--current-gold);
    color: var(--current-primary);
    transform: translateY(-3px);
    box-shadow: 0 15px 40px var(--current-shadow);
}

.btn-primary:active,
.btn-primary:focus,
.btn-primary:focus-visible {
    background: var(--current-gold) !important;
    color: var(--current-primary) !important;
    border-color: var(--current-gold) !important;
    box-shadow: 0 10px 30px var(--current-shadow) !important;
}

/* Responsive Design */
@media (max-width: 768px) {
    .theme-card-image {
        height: 300px;
    }
    
    .theme-title {
        font-size: 2rem;
    }
    
    .hotel-title {
        font-size: 3rem;
    }
    
    .hero-title {
        font-size: 3rem;
    }
    
    .feature-card {
        padding: 2rem 1.5rem;
    }
}

.hero-bg-elements {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    pointer-events: none;
    z-index: 1;
}

.floating-shape {
    position: absolute;
    border-radius: 50%;
    background: rgba(255, 215, 0, 0.1);
    animation: float 6s ease-in-out infinite;
}

.shape-1 {
    width: 100px;
    height: 100px;
    top: 20%;
    left: 10%;
    animation-delay: 0s;
}

.shape-2 {
    width: 150px;
    height: 150px;
    top: 60%;
    right: 15%;
    animation-delay: 2s;
}

.shape-3 {
    width: 80px;
    height: 80px;
    top: 30%;
    right: 30%;
    animation-delay: 4s;
}

.shape-4 {
    width: 120px;
    height: 120px;
    bottom: 20%;
    left: 20%;
    animation-delay: 1s;
}

@keyframes float {
    0%, 100% { transform: translateY(0px) rotate(0deg); }
    50% { transform: translateY(-20px) rotate(180deg); }
}

.hero-content { position: relative; z-index: 2; max-width: 720px; margin: 0 auto; padding: 0 2rem; }

.hero-logo {
    margin-bottom: 2rem;
}

.hero-icon { font-size: 3.2rem; color: var(--current-gold); }

@keyframes pulse {
    0%, 100% { transform: scale(1); }
    50% { transform: scale(1.1); }
}

.hero-title {
    font-family: var(--font-primary);
    font-size: clamp(3rem, 8vw, 6rem);
    font-weight: 700;
    line-height: 1.1;
    margin-bottom: 1.5rem;
}

.title-line-1 {
    display: block;
    font-size: 0.6em;
    font-weight: 400;
    opacity: 0.8;
    margin-bottom: 0.5rem;
}

.title-line-2 {
    display: block;
    background: var(--current-gradient);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
    background-clip: text;
}

.hero-subtitle {
    font-size: clamp(1.2rem, 3vw, 1.5rem);
    font-weight: 300;
    opacity: 0.9;
    margin-bottom: 3rem;
}

.theme-switcher { display: flex; gap: 1rem; flex-wrap: wrap; margin-bottom: 2rem; }

.theme-btn {
    position: relative;
    padding: 1.2rem 3rem;
    border: 2px solid var(--current-gold);
    background: transparent;
    color: var(--current-text);
    font-family: var(--font-secondary);
    font-weight: 600;
    font-size: 1.1rem;
    border-radius: 50px;
    cursor: pointer;
    overflow: hidden;
    transition: var(--transition-smooth);
    text-transform: uppercase;
    letter-spacing: 1px;
    min-width: 200px;
}

.theme-btn::before {
    content: '';
    position: absolute;
    top: 0;
    left: -100%;
    width: 100%;
    height: 100%;
    background: var(--current-gold);
    transition: var(--transition-smooth);
    z-index: -1;
}

.theme-btn:hover::before {
    left: 0;
}

.theme-btn:hover {
    color: var(--current-primary);
    transform: translateY(-5px) scale(1.05);
    box-shadow: 0 15px 40px var(--current-shadow);
}

.theme-btn.active {
    background: var(--current-gold);
    color: var(--current-primary);
    transform: scale(1.1);
    box-shadow: 0 20px 50px var(--current-shadow);
}

.btn-glow {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: var(--current-gold);
    opacity: 0;
    filter: blur(20px);
    transition: var(--transition-smooth);
    z-index: -2;
}

.theme-btn:hover .btn-glow {
    opacity: 0.3;
}


.scroll-arrow {
    font-size: 2rem;
    color: var(--current-gold);
    margin-bottom: 0.5rem;
}

.scroll-text {
    font-size: 0.9rem;
    text-transform: uppercase;
    letter-spacing: 1px;
    opacity: 0.8;
}

@keyframes bounce {
    0%, 20%, 50%, 80%, 100% { transform: translateX(-50%) translateY(0); }
    40% { transform: translateX(-50%) translateY(-10px); }
    60% { transform: translateX(-50%) translateY(-5px); }
}

/* Features Section */
.features-section {
    background: var(--current-primary);
    position: relative;
}

.feature-card {
    padding: 3rem 2rem;
    background: var(--current-secondary);
    border-radius: 20px;
    transition: var(--transition-smooth);
    height: 100%;
    border: 1px solid var(--current-accent);
}

.feature-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 20px 60px var(--current-shadow);
}

.feature-icon {
    width: 80px;
    height: 80px;
    background: var(--current-gradient);
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 0 auto 1.5rem;
    font-size: 2rem;
    color: var(--current-primary);
}

.feature-title {
    font-family: var(--font-primary);
    font-size: 1.5rem;
    margin-bottom: 1rem;
    color: var(--current-text);
}

.feature-description {
    color: var(--current-text-light);
    line-height: 1.6;
}

/* CTA Section */
.cta-section {
    background: var(--current-gradient);
    position: relative;
    overflow: hidden;
}

.cta-title {
    font-family: var(--font-primary);
    font-size: 2.5rem;
    color: var(--current-text);
    margin-bottom: 1.5rem;
}

.cta-description {
    font-size: 1.1rem;
    color: var(--current-text-light);
    line-height: 1.6;
}

.cta-image {
    position: relative;
    height: 400px;
    border-radius: 20px;
    overflow: hidden;
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

/* Stats Section */
.stats-section {
    background: var(--current-secondary);
    position: relative;
}

.stat-item {
    padding: 2rem 1rem;
}

.stat-number {
    font-family: var(--font-primary);
    font-size: 3rem;
    font-weight: 700;
    color: var(--current-gold);
    margin-bottom: 0.5rem;
}

.stat-label {
    font-size: 1.1rem;
    color: var(--current-text-light);
    text-transform: uppercase;
    letter-spacing: 1px;
}

/* Theme Content */
.theme-content {
    transition: var(--transition-smooth);
}

.theme-showcase {
    background: var(--current-primary);
}

.theme-title {
    font-family: var(--font-primary);
    font-size: 2.5rem;
    color: var(--current-text);
    margin-bottom: 1.5rem;
}

.theme-description {
    font-size: 1.1rem;
    color: var(--current-text-light);
    line-height: 1.6;
    margin-bottom: 2rem;
}

.theme-features {
    list-style: none;
    padding: 0;
}

.theme-features li {
    padding: 0.5rem 0;
    color: var(--current-text);
    font-weight: 500;
}

.theme-image {
    height: 400px;
    border-radius: 20px;
    background-size: cover;
    background-position: center;
}

.solice-image {
    background-image: url('https://images.unsplash.com/photo-1615461066841-6116e4a86a86?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');
}

.vault-image {
    background-image: url('https://images.unsplash.com/photo-1600585154350-46e4bdaaf3c9?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80');
}

/* Responsive Design */
@media (max-width: 768px) {
    .theme-switcher {
        flex-direction: column;
        align-items: center;
    }
    
    .theme-btn {
        width: 100%;
        max-width: 300px;
    }
    
    .hero-title {
        font-size: clamp(2.5rem, 8vw, 4rem);
    }
    
    .cta-section .row {
        text-align: center;
    }
    
    .cta-image {
        height: 300px;
        margin-top: 2rem;
    }
}
</style>

<script>
// Enhanced Home Page JS
document.addEventListener('DOMContentLoaded', function() {
    // Always show theme selection screen first
    showThemeSelection();
    
    // Theme card event listeners
    document.querySelectorAll('.theme-card').forEach(card => {
        card.addEventListener('click', () => {
            const theme = card.dataset.theme;
            selectTheme(theme);
        });
    });
    
    // Change theme button
    const changeThemeBtn = document.getElementById('changeThemeBtn');
    if (changeThemeBtn) {
        changeThemeBtn.addEventListener('click', () => {
            showThemeSelection();
        });
    }
    
    // Listen for page navigation to ensure theme selection always shows neutral
    window.addEventListener('pageshow', function(event) {
        if (window.location.pathname === '/') {
            showThemeSelection();
        }
    });
});

function showThemeSelection() {
    const themeSelection = document.getElementById('themeSelection');
    const mainContent = document.getElementById('mainContent');
    const navigation = document.querySelector('nav');
    
    themeSelection.style.display = 'block';
    mainContent.style.display = 'none';
    
    // Hide navigation completely on theme selection
    if (navigation) {
        navigation.style.display = 'none';
    }
    
    // Reset body theme to neutral for theme selection
    document.body.removeAttribute('data-theme');
    
    document.body.style.setProperty('--current-primary', '#0a0a0b', 'important');
    document.body.style.setProperty('--current-secondary', '#1a1a1c', 'important');
    document.body.style.setProperty('--current-accent', '#2a2a2d', 'important');
    document.body.style.setProperty('--current-gold', '#C5A572', 'important');
    document.body.style.setProperty('--current-text', '#E8E9EB', 'important');
    document.body.style.setProperty('--current-text-light', '#A6A9AF', 'important');
    document.body.style.setProperty('--current-shadow', 'rgba(0, 0, 0, 0.3)', 'important');
    document.body.style.setProperty('--current-gradient', 'linear-gradient(135deg, #0a0a0b 0%, #1a1a1c 100%)', 'important');
    
    // Show footer with luxury styling
    const footer = document.querySelector('footer');
    if (footer) {
        footer.style.display = 'block';
        footer.classList.add('luxury-footer');
    }
}

function selectTheme(theme) {
    // Add transition overlay
    const overlay = createTransitionOverlay();
    document.body.appendChild(overlay);
    
    setTimeout(() => {
        // Update body theme
        document.body.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
        
        // Show main content
        showMainContent(theme);
        
        // Remove overlay
        setTimeout(() => {
            overlay.remove();
        }, 200);
    }, 300);
}

function showMainContent(theme) {
    const themeSelection = document.getElementById('themeSelection');
    const mainContent = document.getElementById('mainContent');
    const navigation = document.querySelector('nav');
    
    themeSelection.style.display = 'none';
    mainContent.style.display = 'block';
    
    // Show navigation on main content
    if (navigation) {
        navigation.style.display = 'block';
        navigation.classList.remove('luxury-nav');
    }
    
    // Show footer on main content
    const footer = document.querySelector('footer');
    if (footer) {
        footer.style.display = 'block';
        footer.classList.remove('luxury-footer');
    }
    
    // Apply theme-specific styling
    document.body.setAttribute('data-theme', theme);
    
    // Clear forced luxury styles to allow theme CSS to take effect
    document.body.style.removeProperty('--current-primary');
    document.body.style.removeProperty('--current-secondary');
    document.body.style.removeProperty('--current-accent');
    document.body.style.removeProperty('--current-gold');
    document.body.style.removeProperty('--current-text');
    document.body.style.removeProperty('--current-text-light');
    document.body.style.removeProperty('--current-shadow');
    document.body.style.removeProperty('--current-gradient');
    
    // Clear forced navigation styles
    if (navigation) {
        navigation.style.removeProperty('background');
        navigation.style.removeProperty('border-bottom');
        navigation.style.removeProperty('backdrop-filter');
    }
    
    // Update theme-specific content
    updateThemeContent(theme);
    
    // Update Admin Button Href with current theme
    const adminBtn = document.getElementById('adminHeroBtn');
    if (adminBtn) {
        adminBtn.href = `{{ url('/admin/rooms') }}?theme=${theme}`;
    }
    
    // Explicitly update the Header Admin Link
    const headerAdminLink = document.getElementById('adminNavLink');
    if (headerAdminLink) {
        headerAdminLink.href = `{{ url('/admin/rooms') }}?theme=${theme}`;
    }
    
    // Trigger theme change event for other pages
    window.dispatchEvent(new CustomEvent('themeChanged', { detail: { theme } }));
}

function updateThemeContent(theme) {
    const themeData = {
        solice: {
            heroTitle: 'Solice',
            subtitle: 'Experience A Haven of Light, Calm, and Refined Comfort',
            featuresTitle: 'Welcome to Solice',
            featuresSubtitle: 'Discover what makes our Solice collection special',
            features: [
                {
                    icon: 'bi bi-sun',
                    title: 'Natural Light',
                    description: 'Floor-to-ceiling windows and skylights creating bright, airy spaces filled with natural light.'
                },
                {
                    icon: 'bi bi-leaf',
                    title: 'Organic Materials',
                    description: 'Sustainable, natural materials like bamboo, linen, and reclaimed wood throughout.'
                },
                {
                    icon: 'bi bi-heart-pulse',
                    title: 'Serenity Deck',
                    description: 'Open-air terraces with gentle ambiance lighting and panoramic sky views.'
                }
            ]
        },
        vault: {
            heroTitle: 'Vault',
            subtitle: 'Experience A Realm of Bold Sophistication and Modern Elegance',
            featuresTitle: 'Welcome to Vault',
            featuresSubtitle: 'Discover what makes our Vault collection extraordinary',
            features: [
                {
                    icon: 'bi bi-gem',
                    title: 'Premium Materials',
                    description: 'Luxurious dark marble, gold accents, and premium looks create an atmosphere of exclusivity.'
                },
                {
                    icon: 'bi bi-moon-stars',
                    title: 'Dramatic Ambiance',
                    description: 'Sophisticated lighting design and dark, rich tones create an intimate, luxurious atmosphere.'
                },
                {
                    icon: 'bi bi-star-fill',
                    title: 'Opulent Evenings',
                    description: 'A curated experience of fine dining, live music, and elegant ambiance after dusk.'
                }
            ]
        }
    };
    
    const data = themeData[theme];
    
    // Update hero title
    const heroTitle = document.getElementById('heroTitle');
    if (heroTitle) {
        heroTitle.textContent = data.heroTitle;
    }
    
    // Update subtitle
    const subtitle = document.getElementById('themeSubtitle');
    if (subtitle) {
        subtitle.textContent = data.subtitle;
    }
    
    // Update features title and subtitle
    const featuresTitle = document.getElementById('featuresTitle');
    const featuresSubtitle = document.getElementById('featuresSubtitle');
    if (featuresTitle) featuresTitle.textContent = data.featuresTitle;
    if (featuresSubtitle) featuresSubtitle.textContent = data.featuresSubtitle;
    
    // Update features
    const featuresContainer = document.getElementById('themeFeatures');
    if (featuresContainer) {
        featuresContainer.innerHTML = data.features.map((feature, index) => `
            <div class="col-lg-4" data-aos="fade-up" data-aos-duration="1000" data-aos-delay="${(index + 1) * 100}">
                <div class="feature-card text-center">
                    <div class="feature-icon">
                        <i class="${feature.icon}"></i>
                    </div>
                    <h4 class="feature-title">${feature.title}</h4>
                    <p class="feature-description">${feature.description}</p>
                </div>
            </div>
        `).join('');
        
        // Reinitialize AOS for new elements
        if (typeof AOS !== 'undefined') {
            AOS.refresh();
        }
    }
}

function createTransitionOverlay() {
    const overlay = document.createElement('div');
    overlay.className = 'theme-transition-overlay';
    overlay.style.cssText = `
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.6);
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 9999;
        transition: opacity 0.4s ease;
    `;
    
    overlay.innerHTML = `
        <div class="text-center text-white">
            <div class="spinner-border text-warning mb-3" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    `;
    
    return overlay;
}
</script>
@endsection
