{{-- Main Navigation Header --}}
<nav class="navbar navbar-expand-lg shadow-elegant">
    <div class="container">
        {{-- Hotel Logo/Brand - Links back to home page --}}
        <a class="navbar-brand fw-bold" href="{{ url('/') }}" data-aos="fade-right" data-aos-duration="1000" style="color: var(--current-gold) !important; text-shadow: 0 2px 4px rgba(0,0,0,0.3);">
            <i class="bi bi-gem me-2" style="color: var(--current-gold) !important;"></i>Hotel Elyra
        </a>
        
        {{-- Mobile Menu Toggle Button --}}
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        
        {{-- Navigation Menu - Collapsible for mobile devices --}}
        <div class="collapse navbar-collapse" id="navbarNav" data-aos="fade-left" data-aos-duration="1000" data-aos-delay="200">
            <ul class="navbar-nav ms-auto">
                {{-- Get current page path for conditional navigation --}}
                @php($path = request()->path())
                
                {{-- Home Link - Always show if not on home page AND not in admin panel AND not on login page --}}
                @if($path !== '/' && !str_starts_with($path, 'admin') && $path !== 'login')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/') }}" data-page="home">
                            <i class="bi bi-house me-1"></i>Home
                        </a>
                    </li>
                @endif

                {{-- Rooms, Booking, Contact - Hide if in Admin Panel or Login Page --}}
                @if(!str_starts_with($path, 'admin') && $path !== 'login')
                    
                    {{-- Rooms Link --}}
                    @if(!str_starts_with($path, 'rooms'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/rooms') }}" data-page="rooms" id="roomsNavLink">
                                <i class="bi bi-door-open me-1"></i>Rooms
                            </a>
                        </li>
                    @endif

                    {{-- Booking Link --}}
                    @if(!str_starts_with($path, 'booking'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/booking') }}" data-page="booking" id="bookingNavLink">
                                <i class="bi bi-calendar-check me-1"></i>Booking
                            </a>
                        </li>
                    @endif

                    {{-- Contact Link --}}
                    @if(!str_starts_with($path, 'contact'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ url('/contact') }}" data-page="contact" id="contactNavLink">
                                <i class="bi bi-envelope me-1"></i>Contact
                            </a>
                        </li>
                    @endif

                @endif

                {{-- Admin Link - Only show on Home Page --}}
                @if($path === '/')
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('/admin/rooms') }}" id="adminNavLink">
                            <i class="bi bi-gear me-1"></i>Admin
                        </a>
                    </li>
                @endif
            </ul>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    const adminLink = document.getElementById('adminNavLink');
                    if (adminLink) {
                        const currentTheme = localStorage.getItem('theme') || 'solice';
                        adminLink.href = `/admin/rooms?theme=${currentTheme}`;
                        
                        // Force save theme on click and update href to ensure persistence
                        adminLink.addEventListener('click', function() {
                            const t = localStorage.getItem('theme') || 'solice';
                            this.href = `/admin/rooms?theme=${t}`; // Force update href before nav
                            localStorage.setItem('theme', t);
                        });
                        
                        window.addEventListener('themeChanged', function(e) {
                            adminLink.href = `/admin/rooms?theme=${e.detail.theme}`;
                        });
                    }
                });
            </script>
        </div>
    </div>
</nav>

