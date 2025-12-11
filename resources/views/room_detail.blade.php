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
    // Dataset (aligned with rooms page)
    // We are now using server-side data passed to the view
    const room = {
        name: "{{ $room->name }}",
        img: "{{ $room->image_path }}",
        desc: "{{ $room->description }}",
        price: "{{ $room->price }}",
        category: "{{ ucfirst($room->category) }}",
        features: {!! json_encode($room->features) !!}
    };

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
