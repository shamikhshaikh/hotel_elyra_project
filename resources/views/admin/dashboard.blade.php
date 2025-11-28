@extends('layout')

@section('title', 'Admin Dashboard')

@section('content')
<section class="d-flex align-items-center justify-content-center min-vh-100 position-relative marbled-effect">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 text-center">
                <h1 class="display-4 fw-bold mb-2" style="color: var(--current-gold); font-family: var(--font-primary);">Admin Dashboard</h1>
                <p class="lead mb-5" style="color: var(--current-text-light);">Select an area to manage</p>

                <div class="row g-4 justify-content-center">
                    <div class="col-md-5">
                        <a href="{{ route('admin.rooms.index') }}?theme={{ $theme }}" class="card h-100 text-decoration-none border-0 shadow-lg admin-card-hover" style="background: var(--current-secondary); border-radius: 20px; transition: transform 0.3s ease;">
                            <div class="card-body p-5 d-flex flex-column align-items-center justify-content-center">
                                <div class="icon-circle mb-4" style="width: 80px; height: 80px; background: var(--current-primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 1px solid var(--current-gold);">
                                    <i class="bi bi-door-open display-6" style="color: var(--current-gold);"></i>
                                </div>
                                <h3 class="fw-bold mb-2" style="color: var(--current-text); font-family: var(--font-primary);">Manage Rooms</h3>
                                <p class="small mb-0" style="color: var(--current-text-light);">Add, edit, or remove rooms</p>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-5">
                        <a href="{{ route('admin.bookings.index') }}?theme={{ $theme }}" class="card h-100 text-decoration-none border-0 shadow-lg admin-card-hover" style="background: var(--current-secondary); border-radius: 20px; transition: transform 0.3s ease;">
                            <div class="card-body p-5 d-flex flex-column align-items-center justify-content-center">
                                <div class="icon-circle mb-4" style="width: 80px; height: 80px; background: var(--current-primary); border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 1px solid var(--current-gold);">
                                    <i class="bi bi-calendar-check display-6" style="color: var(--current-gold);"></i>
                                </div>
                                <h3 class="fw-bold mb-2" style="color: var(--current-text); font-family: var(--font-primary);">Manage Bookings</h3>
                                <p class="small mb-0" style="color: var(--current-text-light);">View and manage reservations</p>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="mt-5">
                    <form action="{{ route('logout') }}" method="POST" class="d-inline">
                        @csrf
                        <button type="submit" class="btn btn-outline-danger px-4 py-2 rounded-pill">
                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .admin-card-hover:hover {
        transform: translateY(-10px);
        box-shadow: 0 20px 40px var(--current-shadow) !important;
    }
</style>
@endsection
