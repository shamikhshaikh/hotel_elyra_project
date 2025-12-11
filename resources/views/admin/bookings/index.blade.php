@extends('layout')

@section('title', 'Manage Bookings')

@section('content')
<div class="admin-container" style="background-color: var(--current-primary); min-height: 100vh; padding-top: 100px;">
    <div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="display-5 fw-bold" style="font-family: var(--font-primary); color: var(--current-gold);">Manage Bookings</h1>
            <div class="d-flex gap-3">
                <a href="{{ route('admin.bookings.create', ['theme' => $theme]) }}" class="btn btn-primary btn-lg">
                    <i class="bi bi-plus-lg me-2"></i>Add New Booking
                </a>
                <a href="{{ route('admin.dashboard') }}?theme={{ $theme }}" class="btn btn-outline-light">
                    <i class="bi bi-grid me-2"></i>Back to Panel
                </a>
            </div>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="card border-0 shadow-lg" style="background-color: var(--current-secondary); border-radius: 15px; overflow: hidden;">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover mb-0" style="color: var(--current-text);">
                        <thead style="background-color: var(--current-accent); color: var(--current-gold);">
                            <tr>
                                <th class="py-3 px-4">ID</th>
                                <th class="py-3 px-4">Guest</th>
                                <th class="py-3 px-4">Room</th>
                                <th class="py-3 px-4">Dates</th>
                                <th class="py-3 px-4">Total</th>
                                <th class="py-3 px-4">Status</th>
                                <th class="py-3 px-4 text-end">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bookings as $booking)
                                <tr style="border-bottom: 1px solid var(--current-accent);">
                                    <td class="py-3 px-4">#{{ $booking->id }}</td>
                                    <td class="py-3 px-4">
                                        <div class="fw-bold">{{ $booking->guest_name }}</div>
                                        <div class="small" style="color: var(--current-text-light);">{{ $booking->guest_email }}</div>
                                    </td>
                                    <td class="py-3 px-4">{{ $booking->room->name }}</td>
                                    <td class="py-3 px-4">
                                        <div>In: {{ \Carbon\Carbon::parse($booking->check_in)->format('M d, Y') }}</div>
                                        <div>Out: {{ \Carbon\Carbon::parse($booking->check_out)->format('M d, Y') }}</div>
                                    </td>
                                    <td class="py-3 px-4 fw-bold" style="color: var(--current-gold);">${{ number_format($booking->total_price, 2) }}</td>
                                    <td class="py-3 px-4">
                                        <span class="badge rounded-pill" 
                                            style="background-color: {{ $booking->status === 'confirmed' ? '#198754' : ($booking->status === 'pending' ? '#ffc107' : '#dc3545') }}; color: #fff;">
                                            {{ ucfirst($booking->status) }}
                                        </span>
                                    </td>
                                    <td class="py-3 px-4 text-end">
                                        <a href="{{ route('admin.bookings.edit', ['booking' => $booking->id, 'theme' => $theme]) }}" class="btn btn-sm me-2" title="Edit" style="color: var(--current-text); border: 1px solid var(--current-accent);">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ route('admin.bookings.destroy', ['booking' => $booking->id, 'theme' => $theme]) }}" method="POST" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-outline-danger delete-btn" title="Delete">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5" style="color: var(--current-text-light);">
                                        <i class="bi bi-calendar-x display-4 d-block mb-3"></i>
                                        No bookings found.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="p-4">
                {{ $bookings->appends(['theme' => $theme])->links() }}
            </div>
        </div>
    </div>
</div>
@endsection

{{-- Custom Delete Confirmation Modal --}}
<div id="deleteModal" class="custom-modal" style="display: none;">
    <div class="modal-overlay"></div>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Confirm Deletion</h5>
            <button type="button" class="close-modal-btn"><i class="bi bi-x-lg"></i></button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete this booking? This action cannot be undone.</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary cancel-btn">Cancel</button>
            <button type="button" class="btn btn-danger confirm-delete-btn">Delete Booking</button>
        </div>
    </div>
</div>

<style>
    /* Custom Modal Styling (Reused from Admin Panel) */
    .custom-modal {
        position: fixed;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        z-index: 9999;
        display: flex;
        align-items: center;
        justify-content: center;
        opacity: 0;
        visibility: hidden;
        transition: all 0.3s ease;
    }

    .custom-modal.active {
        opacity: 1;
        visibility: visible;
    }

    .modal-overlay {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background: rgba(0, 0, 0, 0.7);
        backdrop-filter: blur(5px);
    }

    .modal-content {
        position: relative;
        background: var(--current-secondary);
        border: 1px solid var(--current-gold);
        border-radius: 15px;
        padding: 2rem;
        width: 90%;
        max-width: 400px;
        box-shadow: 0 20px 50px rgba(0, 0, 0, 0.5);
        transform: translateY(20px);
        transition: transform 0.3s ease;
        color: var(--current-text);
    }

    .custom-modal.active .modal-content {
        transform: translateY(0);
    }

    .modal-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 1.5rem;
        border-bottom: 1px solid var(--current-accent);
        padding-bottom: 1rem;
    }

    .modal-title {
        font-family: var(--font-primary);
        color: var(--current-gold);
        font-size: 1.5rem;
        margin: 0;
    }

    .close-modal-btn {
        background: none;
        border: none;
        color: var(--current-text-light);
        font-size: 1.2rem;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .close-modal-btn:hover {
        color: var(--current-gold);
    }

    .modal-body p {
        color: var(--current-text);
        margin-bottom: 2rem;
        line-height: 1.6;
    }

    .modal-footer {
        display: flex;
        justify-content: flex-end;
        gap: 1rem;
    }

    .btn-outline-secondary {
        color: var(--current-text);
        border-color: var(--current-accent);
    }

    .btn-outline-secondary:hover {
        background: var(--current-accent);
        color: var(--current-text);
        border-color: var(--current-accent);
    }

    .btn-danger {
        background: #dc3545;
        border: none;
        color: white;
    }

    .btn-danger:hover {
        background: #bb2d3b;
        box-shadow: 0 5px 15px rgba(220, 53, 69, 0.3);
    }

    /* Force Dark Modal Styles for Vault Theme */
    [data-theme="vault"] .modal-content {
        background-color: #121212 !important;
        border: 1px solid #333;
        color: #e8e9eb !important;
    }

    [data-theme="vault"] .modal-header {
        border-bottom-color: #333 !important;
    }

    [data-theme="vault"] .modal-title {
        color: var(--current-gold) !important;
    }

    [data-theme="vault"] .modal-body p {
        color: #a6a9af !important;
    }

    [data-theme="vault"] .btn-outline-secondary {
        color: #e8e9eb !important;
        border-color: #333 !important;
    }

    [data-theme="vault"] .btn-outline-secondary:hover {
        background-color: #333 !important;
        border-color: #333 !important;
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Custom Delete Modal Logic
        const deleteModal = document.getElementById('deleteModal');
        const closeBtns = document.querySelectorAll('.close-modal-btn, .cancel-btn, .modal-overlay');
        const confirmBtn = document.querySelector('.confirm-delete-btn');
        let formToDelete = null;

        // Open Modal
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function(e) {
                e.preventDefault();
                formToDelete = this.closest('form');
                deleteModal.style.display = 'flex';
                setTimeout(() => {
                    deleteModal.classList.add('active');
                }, 10);
            });
        });

        // Close Modal Function
        function closeModal() {
            deleteModal.classList.remove('active');
            setTimeout(() => {
                deleteModal.style.display = 'none';
                formToDelete = null;
            }, 300);
        }

        // Attach Close Events
        closeBtns.forEach(btn => {
            btn.addEventListener('click', closeModal);
        });

        // Confirm Delete
        confirmBtn.addEventListener('click', function() {
            if (formToDelete) {
                formToDelete.submit();
            }
        });
    });
</script>
