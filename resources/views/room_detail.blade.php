@extends('layout')

@section('title', 'Room Details')

@section('content')
<section class="container py-5 marbled-effect position-relative overflow-hidden">
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

    <style>
    #roomFeatures {
        display: flex;
        flex-wrap: wrap;
        gap: 0.5rem;
    }
    #roomFeatures .feature-tag {
        display: inline-block;
        background: var(--current-accent);
        color: var(--current-text);
        padding: 0.4rem 0.9rem;
        border-radius: 14px;
        font-size: 0.9rem;
        font-weight: 500;
    }
    
    /* Ensure Book Now button stays gold */
    #bookNowLink.btn-primary,
    #bookNowLink.btn-primary:hover,
    #bookNowLink.btn-primary:focus,
    #bookNowLink.btn-primary:active,
    #bookNowLink.btn-primary:visited {
        background: var(--current-gold) !important;
        color: var(--current-primary) !important;
        border-color: var(--current-gold) !important;
        box-shadow: 0 6px 20px var(--current-shadow) !important;
    }
    
    #bookNowLink.btn-primary:hover {
        transform: translateY(-1px);
        box-shadow: 0 10px 30px var(--current-shadow) !important;
    }
    
    #bookNowLink.btn-primary:active {
        transform: translateY(0);
    }
    </style>

    <div class="row g-4 align-items-start">
        <div class="col-lg-7" data-aos="fade-right">
            <div class="rounded-3 overflow-hidden shadow-elegant border-gradient">
                <img id="roomImage" src="" alt="Room Image" style="width:100%; height:520px; object-fit:cover;">
            </div>
        </div>
        <div class="col-lg-5" data-aos="fade-left">
            <h1 id="roomTitle" class="mb-2" style="font-family: var(--font-primary);"></h1>
            <div class="d-flex align-items-center gap-3 mb-3">
                <span id="roomPrice" class="badge" style="background: var(--current-gold); color: var(--current-primary); font-weight:600;"></span>
                <span id="roomCategory" class="badge" style="background: var(--current-accent); color: var(--current-text);"></span>
            </div>
            <p id="roomDesc" class="mb-4" style="color: var(--current-text-light);"></p>
            <div class="mb-4">
                <h6 class="mb-2" style="font-family: var(--font-primary);">Features</h6>
                <div id="roomFeatures"></div>
            </div>
            <a id="bookNowLink" href="/booking" class="btn btn-primary">
                <i class="bi bi-calendar-check me-2"></i>Book Now
            </a>
        </div>
    </div>
</section>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Theme init for this page
    const urlTheme = new URLSearchParams(window.location.search).get('theme');
    const localTheme = localStorage.getItem('theme');
    const currentTheme = urlTheme || localTheme || document.body.getAttribute('data-theme') || 'solice';
    try { localStorage.setItem('theme', currentTheme); } catch(e){}
    document.body.setAttribute('data-theme', currentTheme);

    // Dataset (aligned with rooms page)
    const roomsData = {
        solice: [
            { name: 'Solice Grand Suite', img: '/images/solicesuite1.jpg', desc: 'Airy suite bathed in natural light with serene neutrals.', price: '$420/night', category: 'Suite', features: ['Ocean View','Private Balcony','Terrace Daybed Lounge'] },
            { name: 'Solice Skyline Suite', img: '/images/solicesuite2.jpg', desc: 'Minimalist luxury with panoramic city views.', price: '$390/night', category: 'Suite', features: ['City View','Mini Bar','Soundproof Serenity Design'] },
            { name: 'Solice Horizon Penthouse', img: '/images/solicepenthouse1.jpg', desc: 'Top-floor tranquility with expansive terrace.', price: '$680/night', category: 'Penthouse', features: ['Terrace','Atrium','Private Infinity Pool'] },
            { name: 'Solice Garden Penthouse', img: '/images/solicepenthouse2.jpg', desc: 'Indoor-outdoor living with lush greenery.', price: '$650/night', category: 'Penthouse', features: ['Garden View','Private Pool','Private Garden Patio'] },
            { name: 'Solice Serenity Room', img: '/images/soliceroom1.jpg', desc: 'Calm, elegant room for a restful stay.', price: '$220/night', category: 'Room', features: ['Personal Dining','Daybed','Aromatherapy Diffuser'] },
            { name: 'Solice Deluxe Room', img: '/images/soliceroom2.jpg', desc: 'Light-filled room with soft tones and refined finishes.', price: '$250/night', category: 'Room', features: ['City View','Rain Shower','Smart Mirror Display'] }
        ],
        vault: [
            { name: 'Vault Royal Suite', img: '/images/vaultsuite1.jpg', desc: 'Dark marble and gold accents for a dramatic stay.', price: '$520/night', category: 'Suite', features: ['Skyline View','Private Bar','Jacuzzi'] },
            { name: 'Vault Noir Suite', img: '/images/vaultsuite2.jpg', desc: 'Sophisticated lighting and premium leather finishes.', price: '$490/night', category: 'Suite', features: ['City View','Mini Bar','Onyx Bath'] },
            { name: 'Vault Crown Penthouse', img: '/images/vaultpenthouse1.jpg', desc: 'Premier penthouse with expansive skyline terrace.', price: '$820/night', category: 'Penthouse', features: ['Private Cinema','Jacuzzi','Smart Glass Walls'] },
            { name: 'Vault Obsidian Penthouse', img: '/images/vaultpenthouse2.jpg', desc: 'Ultra-sleek penthouse wrapped in dark glass.', price: '$780/night', category: 'Penthouse', features: ['Skyline View','Heated Marble Floors','Private Bar'] },
            { name: 'Vault Executive Room', img: '/images/vaultroom1.jpg', desc: 'Elegant room with rich textures and smart lighting.', price: '$280/night', category: 'Room', features: ['Marble Vanity','Ambient Mood Lighting','Rain Shower'] },
            { name: 'Vault Signature Room', img: '/images/vaultroom2.jpg', desc: 'Refined materials and a moody, luxurious palette.', price: '$300/night', category: 'Room', features: ['Crystal Glassware','City View','Automated Ambience'] }
        ]
    };

    const params = new URLSearchParams(window.location.search);
    const name = params.get('name');
    const theme = currentTheme === 'vault' ? 'vault' : 'solice';
    const pool = roomsData[theme].concat(roomsData[theme === 'vault' ? 'solice' : 'vault']);

    let room = pool.find(r => r.name === name);
    if (!room) {
        // fallback: first room
        room = roomsData[theme][0];
    }

    const img = document.getElementById('roomImage');
    const title = document.getElementById('roomTitle');
    const price = document.getElementById('roomPrice');
    const cat = document.getElementById('roomCategory');
    const desc = document.getElementById('roomDesc');
    const feat = document.getElementById('roomFeatures');
    const book = document.getElementById('bookNowLink');

    if (img) img.src = room.img;
    if (title) title.textContent = room.name;
    if (price) price.textContent = room.price;
    if (cat) cat.textContent = room.category;
    if (desc) desc.textContent = room.desc;
    if (feat) feat.innerHTML = room.features.map(f => `<span class="feature-tag">${f}</span>`).join(' ');
    if (book) book.href = `/booking?theme=${encodeURIComponent(currentTheme)}`;
});
</script>
@endsection
