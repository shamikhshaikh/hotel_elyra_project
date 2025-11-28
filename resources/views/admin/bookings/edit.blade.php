@extends('layout')

@section('title', 'Edit Booking')

@section('content')
<div class="admin-container" style="background-color: var(--current-primary); min-height: 100vh; padding-top: 100px;">
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="d-flex justify-content-between align-items-center mb-4">
                    <h1 class="display-6 fw-bold" style="font-family: var(--font-primary); color: var(--current-gold);">Edit Booking #{{ $booking->id }}</h1>
                    <a href="{{ route('admin.bookings.index', ['theme' => $theme]) }}" class="btn btn-outline-light">
                        <i class="bi bi-arrow-left me-2"></i>Back to List
                    </a>
                </div>

                <div class="card border-0 shadow-lg" style="background-color: var(--current-secondary); border-radius: 15px;">
                    <div class="card-body p-5">
                        <form action="{{ route('admin.bookings.update', $booking->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="theme" value="{{ $theme }}">

                            <h5 class="mb-4" style="color: var(--current-text); border-bottom: 1px solid var(--current-accent); padding-bottom: 10px;">Guest Information</h5>
                            
                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label" style="color: var(--current-text-light);">Guest Name</label>
                                    <input type="text" class="form-control" name="guest_name" value="{{ old('guest_name', $booking->guest_name) }}" required
                                        style="background: var(--current-primary); border: 1px solid var(--current-accent); color: var(--current-text);">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" style="color: var(--current-text-light);">Phone Number</label>
                                    <input type="text" class="form-control" name="guest_phone" value="{{ old('guest_phone', $booking->guest_phone) }}" required
                                        style="background: var(--current-primary); border: 1px solid var(--current-accent); color: var(--current-text);">
                                </div>
                            </div>

                            <div class="mb-4">
                                <label class="form-label" style="color: var(--current-text-light);">Email Address</label>
                                <input type="email" class="form-control" name="guest_email" value="{{ old('guest_email', $booking->guest_email) }}" required
                                    style="background: var(--current-primary); border: 1px solid var(--current-accent); color: var(--current-text);">
                            </div>

                            <h5 class="mb-4" style="color: var(--current-text); border-bottom: 1px solid var(--current-accent); padding-bottom: 10px;">Booking Details</h5>

                            <div class="mb-3">
                                <label class="form-label" style="color: var(--current-text-light);">Room</label>
                                <select class="form-select" name="room_id" required
                                    style="background: var(--current-primary); border: 1px solid var(--current-accent); color: var(--current-text);">
                                    <option value="">Select a Room</option>
                                    @foreach($rooms as $room)
                                        <option value="{{ $room->id }}" {{ old('room_id', $booking->room_id) == $room->id ? 'selected' : '' }}>
                                            {{ $room->name }} (${{ $room->price }})
                                        </option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="row mb-3">
                                <div class="col-md-6">
                                    <label class="form-label" style="color: var(--current-text-light);">Check-in Date</label>
                                    <input type="date" class="form-control" name="check_in" value="{{ old('check_in', $booking->check_in) }}" required
                                        style="background: var(--current-primary); border: 1px solid var(--current-accent); color: var(--current-text);">
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label" style="color: var(--current-text-light);">Check-out Date</label>
                                    <input type="date" class="form-control" name="check_out" value="{{ old('check_out', $booking->check_out) }}" required
                                        style="background: var(--current-primary); border: 1px solid var(--current-accent); color: var(--current-text);">
                                </div>
                            </div>

                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label class="form-label" style="color: var(--current-text-light);">Number of Guests</label>
                                    <input type="number" class="form-control" name="guests" value="{{ old('guests', $booking->guests) }}" min="1" required
                                        style="background: var(--current-primary); border: 1px solid var(--current-accent); color: var(--current-text);">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" style="color: var(--current-text-light);">Total Price ($)</label>
                                    <input type="number" step="0.01" class="form-control" name="total_price" value="{{ old('total_price', $booking->total_price) }}" required
                                        style="background: var(--current-primary); border: 1px solid var(--current-accent); color: var(--current-text);">
                                </div>
                                <div class="col-md-4">
                                    <label class="form-label" style="color: var(--current-text-light);">Status</label>
                                    <select class="form-select" name="status" required
                                        style="background: var(--current-primary); border: 1px solid var(--current-accent); color: var(--current-text);">
                                        <option value="confirmed" {{ old('status', $booking->status) == 'confirmed' ? 'selected' : '' }}>Confirmed</option>
                                        <option value="pending" {{ old('status', $booking->status) == 'pending' ? 'selected' : '' }}>Pending</option>
                                        <option value="cancelled" {{ old('status', $booking->status) == 'cancelled' ? 'selected' : '' }}>Cancelled</option>
                                    </select>
                                </div>
                            </div>

                            <div class="d-grid">
                                <button type="submit" class="btn btn-primary btn-lg">Update Booking</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

<style>
    /* Button Styling to match Gold Theme */
    .btn-primary {
        background: var(--current-gold);
        color: var(--current-primary);
        border: none;
        transition: all 0.3s ease;
    }
    
    .btn-primary:hover, .btn-primary:focus, .btn-primary:active {
        background: var(--current-gold) !important;
        color: var(--current-primary) !important;
        transform: translateY(-2px);
        box-shadow: 0 10px 20px var(--current-shadow);
        filter: brightness(1.1);
    }

    .btn-outline-light:hover {
        background: var(--current-gold);
        border-color: var(--current-gold);
        color: var(--current-primary);
    }
    
    /* Force Dark Form Styles for Vault Theme */
    [data-theme="vault"] .form-control,
    [data-theme="vault"] .form-select {
        background-color: #1a1a1c !important;
        border-color: #333 !important;
        color: #e8e9eb !important;
    }

    [data-theme="vault"] .form-control:focus,
    [data-theme="vault"] .form-select:focus {
        background-color: #222 !important;
        border-color: var(--current-gold) !important;
        color: #fff !important;
        box-shadow: 0 0 0 0.25rem rgba(197, 165, 114, 0.25) !important;
    }
</style>
