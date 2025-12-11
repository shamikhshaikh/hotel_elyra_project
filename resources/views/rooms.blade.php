@extends('layout')

@section('title', 'Luxury Rooms & Suites')

@section('content')
<!-- Hero Section -->
<section class="rooms-hero py-5 marbled-effect position-relative overflow-hidden">
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
                <h1 class="rooms-title mb-4">Our Luxury Collection</h1>
                <p class="rooms-subtitle mb-4">Discover our carefully curated selection of rooms and suites, tailored to your selected aesthetic.</p>
                
                <div class="rooms-stats">
                    <div class="stat-item">
                        <span class="stat-number">150+</span>
                        <span class="stat-label">Luxury Rooms</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">25</span>
                        <span class="stat-label">Years Experience</span>
                    </div>
                    <div class="stat-item">
                        <span class="stat-number">5</span>
                        <span class="stat-label">Star Rating</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-6" data-aos="fade-left">
            </div>
        </div>
    </div>
</section>

<!-- Search Section -->
<section class="search-section py-3" style="background: var(--current-primary);">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-6 position-relative">
                <div class="input-group">
                    <span class="input-group-text" style="background: var(--current-secondary); border-color: var(--current-accent); color: var(--current-gold);">
                        <i class="bi bi-search"></i>
                    </span>
                    <input type="text" id="publicRoomSearch" class="form-control" placeholder="Search for a room or suite..." 
                        style="background: var(--current-secondary); border-color: var(--current-accent); color: var(--current-text); height: 50px;">
                </div>
                <div id="publicSearchResults" class="position-absolute w-100 shadow-lg mt-2" 
                    style="display: none; z-index: 1000; background: var(--current-secondary); border: 1px solid var(--current-gold); border-radius: 10px; overflow: hidden; max-height: 300px; overflow-y: auto;">
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Filter Section -->
<section class="filter-section py-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="filter-tabs">
                    <button class="filter-tab active" data-filter="all">
                        <i class="bi bi-grid-3x3-gap me-2"></i>All Rooms
                    </button>
                    <button class="filter-tab" data-filter="suite">
                        <i class="bi bi-gem me-2"></i>Suites
                    </button>
                    <button class="filter-tab" data-filter="penthouse">
                        <i class="bi bi-buildings me-2"></i>Penthouses
                    </button>
                    <button class="filter-tab" data-filter="standard">
                        <i class="bi bi-door-open me-2"></i>Standard
                    </button>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Rooms Grid -->
<section class="rooms-grid py-5">
    <div class="container">
    <div id="roomsContainer" class="row g-4">
        <!-- Room cards will load here dynamically -->
        </div>
        
        <!-- Loading State -->
        <div id="roomsLoading" class="text-center py-5" style="display: none;">
            <div class="loading-spinner"></div>
            <p class="loading-text mt-3">Loading rooms...</p>
        </div>
        
        <!-- No Results State -->
        <div id="noResults" class="text-center py-5" style="display: none;">
            <i class="bi bi-search display-1 text-muted"></i>
            <h3 class="mt-3">No rooms found</h3>
            <p class="text-muted">Try adjusting your filters to see more results.</p>
        </div>
    </div>
</section>

<!-- Features Section -->
<section class="rooms-features py-5">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="100">
                <div class="feature-item text-center">
                    <div class="feature-icon">
                        <i class="bi bi-shield-check"></i>
                    </div>
                    <h5 class="feature-title">Premium Amenities</h5>
                    <p class="feature-desc">Every room includes luxury amenities and 24/7 concierge service.</p>
                </div>
            </div>
            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="200">
                <div class="feature-item text-center">
                    <div class="feature-icon">
                        <i class="bi bi-wifi"></i>
                    </div>
                    <h5 class="feature-title">Elyra Lounge</h5>
                    <p class="feature-desc">Refined social hub where signature cocktails meet sophisticated ambiance.</p>
                </div>
            </div>
            <div class="col-lg-4 mb-4" data-aos="fade-up" data-aos-delay="300">
                <div class="feature-item text-center">
                    <div class="feature-icon">
                        <i class="bi bi-car-front"></i>
                    </div>
                    <h5 class="feature-title">Restful Luxury</h5>
                    <p class="feature-desc">Spa, sauna, pools, and meditation spaces designed for total tranquility.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
/* Rooms Hero Section */
.rooms-hero {
    background: var(--current-gradient);
    position: relative;
    overflow: hidden;
}

.rooms-hero::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><defs><pattern id="roomsPattern" width="20" height="20" patternUnits="userSpaceOnUse"><circle cx="10" cy="10" r="1" fill="rgba(255,255,255,0.1)"/></pattern></defs><rect width="100" height="100" fill="url(%23roomsPattern)"/></svg>');
    opacity: 0.3;
}

.rooms-title {
    font-family: var(--font-primary);
    font-size: clamp(2.5rem, 5vw, 4rem);
    font-weight: 700;
    color: var(--current-text);
    margin-bottom: 1.5rem;
}

.rooms-subtitle {
    font-size: 1.2rem;
    color: var(--current-text-light);
    line-height: 1.6;
    margin-bottom: 2rem;
}

.rooms-stats {
    display: flex;
    gap: 2rem;
    flex-wrap: wrap;
}

.stat-item {
    text-align: center;
}

.stat-number {
    display: block;
    font-family: var(--font-primary);
    font-size: 2rem;
    font-weight: 700;
    color: var(--current-gold);
}

.stat-label {
    font-size: 0.9rem;
    color: var(--current-text-light);
    text-transform: uppercase;
    letter-spacing: 1px;
}


/* Filter Section */
.filter-section {
    background: var(--current-primary);
    border-bottom: 1px solid var(--current-accent);
}

.filter-tabs {
    display: flex;
    gap: 1rem;
    justify-content: center;
    flex-wrap: wrap;
}

.filter-tab {
    padding: 0.75rem 1.5rem;
    border: 2px solid var(--current-accent);
    background: transparent;
    color: var(--current-text);
    border-radius: 25px;
    font-weight: 500;
    cursor: pointer;
    transition: var(--transition-smooth);
    position: relative;
    overflow: hidden;
}

.filter-tab::before {
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

.filter-tab:hover::before {
    left: 0;
}

.filter-tab:hover {
    color: var(--current-primary);
    transform: translateY(-2px);
}

.filter-tab.active {
    background: var(--current-gold);
    color: var(--current-primary);
    border-color: var(--current-gold);
    transform: scale(1.05);
}

/* Rooms Grid */
.rooms-grid {
    background: var(--current-primary);
}

.room-card {
    border: none;
    border-radius: 20px;
    overflow: hidden;
    transition: var(--transition-smooth);
    background: var(--current-secondary);
    box-shadow: 0 10px 40px var(--current-shadow);
    position: relative;
    height: 100%;
    transform-style: preserve-3d;
}

.room-card::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: var(--current-gradient);
    opacity: 0;
    transition: var(--transition-smooth);
    z-index: 1;
}

.room-card:hover::before {
    opacity: 0.05;
}

.room-card:hover {
    transform: translateY(-15px) rotateX(5deg) rotateY(5deg);
    box-shadow: 0 25px 80px var(--current-shadow);
}

.card-img-container {
    position: relative;
    overflow: hidden;
    height: 250px;
}

.card-img-top {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: var(--transition-smooth);
}

.room-card:hover .card-img-top {
    transform: scale(1.1);
}

.card-overlay {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    background: linear-gradient(45deg, rgba(0,0,0,0.3), transparent);
    opacity: 0;
    transition: var(--transition-smooth);
    z-index: 2;
}

.room-card:hover .card-overlay {
    opacity: 1;
}

.price-tag {
    position: absolute;
    top: 1rem;
    right: 1rem;
    background: var(--current-gold);
    color: var(--current-primary);
    padding: 0.5rem 1rem;
    border-radius: 20px;
    font-weight: 600;
    font-size: 0.9rem;
    z-index: 3;
    transform: translateY(-10px);
    opacity: 0;
    transition: var(--transition-smooth);
}

.room-card:hover .price-tag {
    transform: translateY(0);
    opacity: 1;
}

.card-body {
    padding: 2rem;
    position: relative;
    z-index: 2;
    display: flex;
    flex-direction: column;
    height: calc(100% - 250px);
}

.card-title {
    font-family: var(--font-primary);
    font-size: 1.5rem;
    font-weight: 600;
    color: var(--current-text);
    margin-bottom: 1rem;
}

.card-text {
    color: var(--current-text-light);
    line-height: 1.6;
    flex-grow: 1;
    margin-bottom: 1.5rem;
}

.features {
    margin-bottom: 1.5rem;
}

.feature-tag {
    display: inline-block;
    background: var(--current-accent);
    color: var(--current-text);
    padding: 0.25rem 0.75rem;
    border-radius: 15px;
    font-size: 0.8rem;
    margin: 0.25rem;
    font-weight: 500;
}

.btn-primary {
    background: var(--current-gold);
    border: none;
    color: var(--current-primary);
    font-weight: 600;
    text-transform: uppercase;
    letter-spacing: 1px;
    transition: var(--transition-smooth);
}

.btn-primary:hover {
    background: var(--current-gold);
    color: var(--current-primary);
    transform: translateY(-2px);
    box-shadow: 0 10px 30px var(--current-shadow);
}

/* Loading States */
.loading-spinner {
    width: 40px;
    height: 40px;
    border: 4px solid var(--current-accent);
    border-top: 4px solid var(--current-gold);
    border-radius: 50%;
    animation: spin 1s linear infinite;
    margin: 0 auto;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}

.loading-text {
    color: var(--current-text-light);
    font-size: 1.1rem;
}

/* Rooms Features */
.rooms-features {
    background: var(--current-secondary);
}

.feature-item {
    padding: 2rem;
}

.feature-icon {
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

.feature-title {
    font-family: var(--font-primary);
    font-size: 1.25rem;
    color: var(--current-text);
    margin-bottom: 1rem;
}

.feature-desc {
    color: var(--current-text-light);
    line-height: 1.6;
}

/* Responsive Design */
@media (max-width: 768px) {
    .filter-tabs {
        flex-direction: column;
        align-items: center;
    }
    
    .filter-tab {
        width: 100%;
        max-width: 250px;
    }
    
    .rooms-stats {
        justify-content: center;
    }
    
    .room-card:hover {
        transform: translateY(-10px);
    }
}

/* Animation Classes */
.room-card {
    animation: fadeInUp 0.6s ease-out;
}

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

.room-card.hidden {
    display: none;
}

.room-card.show {
    display: block;
    animation: fadeInUp 0.6s ease-out;
}

/* Room Actions */
.room-actions {
    display: flex;
    gap: 0.5rem;
    margin-top: auto;
}

.room-actions .btn {
    flex: 1;
    font-size: 0.9rem;
    padding: 0.5rem 1rem;
}

/* Rooms Notifications */
.rooms-notification {
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

.rooms-notification::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    height: 4px;
    background: var(--current-gold);
}

.rooms-notification.show {
    transform: translateX(0);
    opacity: 1;
}

.rooms-notification .notification-content {
    display: flex;
    align-items: center;
    padding: 1rem;
    gap: 1rem;
}

.rooms-notification .notification-icon {
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

/* Search Results Styling */
.search-result-item {
    padding: 10px 15px;
    border-bottom: 1px solid var(--current-accent);
    cursor: pointer;
    transition: background 0.2s ease;
    display: flex;
    align-items: center;
    text-decoration: none;
    color: var(--current-text);
}

.search-result-item:last-child {
    border-bottom: none;
}

.search-result-item:hover {
    background: var(--current-accent);
    color: var(--current-gold);
}

.search-result-item img {
    width: 50px;
    height: 50px;
    object-fit: cover;
    border-radius: 5px;
    margin-right: 15px;
}

/* Vault Theme Search Fixes */
[data-theme="vault"] #publicRoomSearch::placeholder {
    color: rgba(255, 255, 255, 0.7) !important;
}

[data-theme="vault"] #publicRoomSearch {
    color: #ffffff !important;
}

[data-theme="vault"] #noResults {
    color: #ffffff !important;
}

[data-theme="vault"] #noResults .text-muted {
    color: rgba(255, 255, 255, 0.7) !important;
}

.rooms-notification .notification-text {
    flex: 1;
}

.rooms-notification .notification-message {
    font-size: 0.9rem;
    color: var(--current-text);
    margin: 0;
    line-height: 1.4;
}
</style>

<script>
// Enhanced Rooms Page JS
document.addEventListener('DOMContentLoaded', function() {
    // Ensure theme is applied immediately based on saved choice
    try {
        const saved = localStorage.getItem('theme');
        if (saved) {
            document.body.setAttribute('data-theme', saved);
        }
    } catch (e) {}
    // Room data with enhanced information
const roomsData = {
    solice: [
            { name: 'Solice Grand Suite', img: 'http://127.0.0.1:8000/images/solicesuite1.jpg', desc: 'Airy suite bathed in natural light with serene neutrals.', price: '$420/night', features: ['Ocean View','Private Balcony','Terrace Daybed Lounge'], category: 'suite', size: '85 sqm', guests: '2-4', rating: 4.9 },
            { name: 'Solice Skyline Suite', img: 'http://127.0.0.1:8000/images/solicesuite2.jpg', desc: 'Minimalist luxury with panoramic city views.', price: '$390/night', features: ['City View','Mini Bar','Soundproof Serenity Design'], category: 'suite', size: '78 sqm', guests: '2-3', rating: 4.8 },
            { name: 'Solice Horizon Penthouse', img: 'http://127.0.0.1:8000/images/solicepenthouse1.jpg', desc: 'Top-floor tranquility with expansive terrace.', price: '$680/night', features: ['Terrace','Atrium','Private Infinity Pool'], category: 'penthouse', size: '160 sqm', guests: '2-6', rating: 5.0 },
            { name: 'Solice Garden Penthouse', img: 'http://127.0.0.1:8000/images/solicepenthouse2.jpg', desc: 'Indoor-outdoor living with lush greenery.', price: '$650/night', features: ['Garden View','Private Pool','Private Garden Patio'], category: 'penthouse', size: '150 sqm', guests: '2-6', rating: 4.9 },
            { name: 'Solice Serenity Room', img: 'http://127.0.0.1:8000/images/soliceroom1.jpg', desc: 'Calm, elegant room for a restful stay.', price: '$220/night', features: ['Personal Dining','Daybed','Aromatherapy Diffuser'], category: 'standard', size: '32 sqm', guests: '1-2', rating: 4.7 },
            { name: 'Solice Deluxe Room', img: 'http://127.0.0.1:8000/images/soliceroom2.jpg', desc: 'Light-filled room with soft tones and refined finishes.', price: '$250/night', features: ['City View','Rain Shower','Smart Mirror Display'], category: 'standard', size: '36 sqm', guests: '1-2', rating: 4.8 }
    ],
    vault: [
            { name: 'Vault Royal Suite', img: 'http://127.0.0.1:8000/images/vaultsuite1.jpg', desc: 'Dark marble and gold accents for a dramatic stay.', price: '$520/night', features: ['Skyline View','Private Bar','Jacuzzi'], category: 'suite', size: '92 sqm', guests: '2-4', rating: 4.9 },
            { name: 'Vault Noir Suite', img: 'http://127.0.0.1:8000/images/vaultsuite2.jpg', desc: 'Sophisticated lighting and premium leather finishes.', price: '$490/night', features: ['City View','Mini Bar','Onyx Bath'], category: 'suite', size: '86 sqm', guests: '2-3', rating: 4.8 },
            { name: 'Vault Crown Penthouse', img: 'http://127.0.0.1:8000/images/vaultpenthouse1.jpg', desc: 'Premier penthouse with expansive skyline terrace.', price: '$820/night', features: ['Private Cinema','Jacuzzi','Smart Glass Walls'], category: 'penthouse', size: '180 sqm', guests: '2-6', rating: 5.0 },
            { name: 'Vault Obsidian Penthouse', img: 'http://127.0.0.1:8000/images/vaultpenthouse2.jpg', desc: 'Ultra-sleek penthouse wrapped in dark glass.', price: '$780/night', features: ['Skyline View','Heated Marble Floors','Private Bar'], category: 'penthouse', size: '170 sqm', guests: '2-6', rating: 4.9 },
            { name: 'Vault Executive Room', img: 'http://127.0.0.1:8000/images/vaultroom1.jpg', desc: 'Elegant room with rich textures and smart lighting.', price: '$280/night', features: ['Marble Vanity','Ambient Mood Lighting','Rain Shower'], category: 'standard', size: '34 sqm', guests: '1-2', rating: 4.7 },
            { name: 'Vault Signature Room', img: 'http://127.0.0.1:8000/images/vaultroom2.jpg', desc: 'Refined materials and a moody, luxurious palette.', price: '$300/night', features: ['Crystal Glassware','City View','Automated Ambience'], category: 'standard', size: '36 sqm', guests: '1-2', rating: 4.8 }
        ]
    };

    let currentFilter = 'all';
    let currentTheme = 'solice'; // Default fallback
    
    // Initialize page
    initializePage();
    
    function initializePage() {
        // Get theme from multiple sources to handle localhost 127.0.0.1 issue
        const urlTheme = new URLSearchParams(window.location.search).get('theme');
        const localStorageTheme = localStorage.getItem('theme');
        const bodyTheme = document.body.getAttribute('data-theme');
        
        // Priority: URL param > localStorage > body attribute > default
        currentTheme = urlTheme || localStorageTheme || bodyTheme || 'solice';
        
        // Apply theme immediately
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
        
        // Load rooms
        loadRooms();
        
        // Setup filter tabs
        setupFilterTabs();
        
        // Setup theme change listener
        window.addEventListener('themeChanged', (e) => {
            currentTheme = e.detail.theme;
            document.body.setAttribute('data-theme', currentTheme);
            localStorage.setItem('theme', currentTheme);
            
            // Update URL parameter for consistency across domains
            const url = new URL(window.location);
            url.searchParams.set('theme', currentTheme);
            window.history.replaceState({}, '', url);
            
            loadRooms();
        });
    }
    
    function loadRooms() {
        const container = document.getElementById('roomsContainer');
        const loading = document.getElementById('roomsLoading');
        const noResults = document.getElementById('noResults');
        
        // Show loading
        loading.style.display = 'block';
        container.innerHTML = '';
        noResults.style.display = 'none';
        
        setTimeout(() => {
            // Data is now rendered server-side via Blade, but we can still use JS for client-side filtering if needed
            // For now, we will rely on the server-side rendering for the initial load
            // and simple DOM manipulation for filtering if we want to keep it static-ish, 
            // OR we can just reload the page with a query param.
            // Given the instructions, let's stick to the server-side rendered content.
            
            // However, to keep the existing "dynamic" feel without full page reloads for filters, 
            // we would need an API. But for this assignment, let's render all rooms for the theme
            // and filter them with JS.
            
            const rooms = [
                @foreach($rooms as $room)
                {
                    id: {{ $room->id }},
                    name: "{{ $room->name }}",
                    img: "{{ $room->image_path }}",
                    desc: "{{ $room->description }}",
                    price: "{{ $room->price }}",
                    features: {!! json_encode($room->features) !!},
                    category: "{{ $room->category }}",
                    size: "{{ $room->size }}",
                    guests: "{{ $room->max_guests }}",
                    rating: {{ $room->rating }}
                },
                @endforeach
            ];

            let filteredRooms = rooms;
            
            // Apply filter
            if (currentFilter !== 'all') {
                 filteredRooms = rooms.filter(room => room.category === currentFilter);
            }
            
            if (filteredRooms.length === 0) {
                noResults.style.display = 'block';
                loading.style.display = 'none';
                return;
            }
            
            // Render rooms
            container.innerHTML = filteredRooms.map((room, index) => `
                <div class="col-lg-4 col-md-6 mb-4 room-card-wrapper" data-aos="fade-up" data-aos-delay="${index * 100}">
                    <div class="card room-card h-100">
                        <div class="card-img-container">
                            <a href="/room?name=${encodeURIComponent(room.name)}&theme=${encodeURIComponent(currentTheme)}">
                                <img src="${room.img}" class="card-img-top" alt="${room.name}" loading="lazy" onerror="this.onerror=null;this.src='https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?q=80&w=1200&auto=format&fit=crop';">
                            </a>
                            <div class="card-overlay"></div>
                            <div class="price-tag">${room.price}</div>
                        </div>
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title"><a href="/room?name=${encodeURIComponent(room.name)}&theme=${encodeURIComponent(currentTheme)}" style="text-decoration:none; color:inherit;">${room.name}</a></h5>
                            <p class="card-text flex-grow-1">${room.desc}</p>
                            <div class="room-meta mb-3">
                                <small style="color: var(--current-text-light);">
                                    <i class="bi bi-arrows-fullscreen me-1"></i>${room.size} 
                                    <i class="bi bi-people me-1 ms-2"></i>${room.guests} guests
                                    <i class="bi bi-star-fill me-1 ms-2 text-warning"></i>${room.rating}
                                </small>
                            </div>
                            <div class="features mb-3">
                                ${(room.features || []).map(feature => `<span class="feature-tag">${feature}</span>`).join('')}
                            </div>
                            <div class="room-actions">
                                <a href="/booking?theme=${encodeURIComponent(currentTheme)}" class="btn btn-primary">
                                    <i class="bi bi-calendar-check me-2"></i>Book Now
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            `).join('');
            
            loading.style.display = 'none';
            
            if (typeof AOS !== 'undefined') {
                AOS.refresh();
            }
        }, 500);
    }
    
    function setupFilterTabs() {
        const filterTabs = document.querySelectorAll('.filter-tab');
        
        filterTabs.forEach(tab => {
            tab.addEventListener('click', () => {
                // Update active tab
                filterTabs.forEach(t => t.classList.remove('active'));
                tab.classList.add('active');
                
                // Update filter
                currentFilter = tab.dataset.filter;
                
                // Reload rooms
                loadRooms();
            });
        });
    }

    // Public Ajax Search Logic
    const searchInput = document.getElementById('publicRoomSearch');
    const searchResults = document.getElementById('publicSearchResults');

    if (searchInput) {
        let timeout = null;

        searchInput.addEventListener('keyup', function() {
            clearTimeout(timeout);
            const query = this.value;
            // Use the global currentTheme variable
            
            if (query.length < 1) {
                searchResults.style.display = 'none';
                return;
            }

            // Debounce
            timeout = setTimeout(() => {
                fetch(`{{ route('rooms.search') }}?query=${encodeURIComponent(query)}&theme=${currentTheme}`)
                    .then(response => response.json())
                    .then(data => {
                        searchResults.innerHTML = '';
                        
                        if (data.length > 0) {
                            data.forEach(room => {
                                const item = document.createElement('a');
                                // Link to room detail page
                                item.href = `{{ url('/room') }}?name=${encodeURIComponent(room.name)}&theme=${currentTheme}`;
                                item.className = 'search-result-item';
                                item.innerHTML = `
                                    <img src="${room.image_path}" alt="${room.name}">
                                    <div>
                                        <div class="fw-bold">${room.name}</div>
                                        <div class="small" style="color: var(--current-text-light);">${room.category}</div>
                                    </div>
                                `;
                                searchResults.appendChild(item);
                            });
                            searchResults.style.display = 'block';
                        } else {
                            searchResults.innerHTML = `
                                <div class="p-3 text-center text-muted">
                                    No rooms found matching "${query}"
                                </div>
                            `;
                            searchResults.style.display = 'block';
                        }
                    })
                    .catch(error => {
                        console.error('Error fetching search results:', error);
                    });
            }, 300);
        });

        // Close dropdown when clicking outside
        document.addEventListener('click', function(e) {
            if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
                searchResults.style.display = 'none';
            }
        });
    }
});
</script>

@endsection
