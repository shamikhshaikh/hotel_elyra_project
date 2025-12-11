<!DOCTYPE html>
{{-- Get theme from cookie for server-side rendering --}}
@php($bootTheme = request()->cookie('theme'))
<html lang="en" {!! $bootTheme ? 'data-theme="'.e($bootTheme).'"' : '' !!}>
<head>
    {{-- Basic meta tags for SEO and responsive design --}}
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    {{-- Dynamic page title using Blade's yield directive --}}
    <title>Hotel Elyra - @yield('title')</title>

    {{-- Theme initialization script - runs before page load to prevent flash --}}
    <script>
    (function(){
        try {
            // Check URL parameter first
            var urlTheme = new URLSearchParams(window.location.search).get('theme');
            var savedTheme = localStorage.getItem('theme');
            
            // Determine theme: URL > Saved > Default
            var theme = urlTheme || savedTheme;
            
            if (theme) {
                // If URL has theme, save it to localStorage for future persistence
                if (urlTheme) {
                    localStorage.setItem('theme', urlTheme);
                }
                
                // Apply theme to document element immediately
                document.documentElement.setAttribute('data-theme', theme);
                document.addEventListener('DOMContentLoaded', function(){
                    document.body && document.body.setAttribute('data-theme', theme);
                });
            }
        } catch (e) {}
    })();
    </script>

    {{-- Google Fonts - Luxury typography for the hotel brand --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800&family=Inter:wght@300;400;500;600;700&family=Cormorant+Garamond:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    {{-- Bootstrap CSS - Responsive framework for layout and components --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    {{-- Bootstrap Icons - Icon library for UI elements --}}
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.css">

    {{-- Custom CSS - Hotel Elyra's main stylesheet with theme system --}}
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    
    {{-- AOS Animation Library - Scroll animations for UX --}}
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
</head>
<body>
    {{-- Additional theme initialization for body element --}}
    <script>(function(){try{var t=localStorage.getItem('theme');if(t){document.body.setAttribute('data-theme',t);}}catch(e){}})();</script>

    {{-- Include the navigation header partial --}}
    @include('partials.header')

    {{-- Main content area - each page's content will be inserted here --}}
    <main class="page-content">
        @yield('content')
    </main>

    {{-- Include the footer partial --}}
    @include('partials.footer')

    {{-- Loading overlay - shown during page transitions --}}
    <div id="loadingOverlay" class="loading-overlay">
        <div class="loading-content">
            <div class="loading-spinner"></div>
            <p class="loading-text">Loading...</p>
        </div>
    </div>

    {{-- JavaScript libraries and custom scripts --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    
    {{-- Navigation Theme Update Script - Keeps navigation links in sync with current theme --}}
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Function to update all navigation links with the current theme parameter
        function updateNavLinks() {
            const currentTheme = localStorage.getItem('theme') || 'solice';
            
            // Get navigation link elements
            const roomsLink = document.getElementById('roomsNavLink');
            const bookingLink = document.getElementById('bookingNavLink');
            const contactLink = document.getElementById('contactNavLink');
            
            // Update each link to include the current theme parameter
            if (roomsLink) roomsLink.href = `/rooms?theme=${currentTheme}`;
            if (bookingLink) bookingLink.href = `/booking?theme=${currentTheme}`;
            if (contactLink) contactLink.href = `/contact?theme=${currentTheme}`;
        }
        
        // Update links when page loads
        updateNavLinks();
        
        // Listen for theme changes and update links accordingly
        window.addEventListener('themeChanged', updateNavLinks);
    });
    </script>
</body>
</html>
