@extends('layout')

@section('title', 'Admin Panel')

@section('content')
<section class="py-5 marbled-effect position-relative" style="min-height: 80vh;">
    <div class="container">
        
        {{-- Header Section --}}
        <div class="d-flex justify-content-between align-items-center mb-5" data-aos="fade-down">
            <div>
                <h1 class="display-4 fw-bold" style="color: var(--current-gold); font-family: var(--font-primary);">
                    @if($mode === 'create') Add New Room
                    @elseif($mode === 'edit') Edit Room
                    @else Manage Rooms
                    @endif
                </h1>
                <p class="lead" style="color: var(--current-text-light);">
                    @if($mode === 'create' || $mode === 'edit') Fill in the details below.
                    @else Add, edit, or remove rooms from the collection.
                    @endif
                </p>
            </div>
            
            <div class="d-flex gap-3">
                @if($mode === 'list')
                    <a href="{{ url('/admin/rooms/create') }}?theme={{ request('theme', 'solice') }}" class="btn btn-primary btn-lg">
                        <i class="bi bi-plus-lg me-2"></i>Add New Room
                    </a>
                    <a href="{{ route('admin.dashboard') }}?theme={{ request('theme', 'solice') }}" class="btn btn-outline-light">
                        <i class="bi bi-grid me-2"></i>Back to Panel
                    </a>
                @else
                    <a href="{{ url('/admin/rooms') }}?theme={{ $room->theme ?? request('theme', 'solice') }}" class="btn btn-outline-light">
                        <i class="bi bi-arrow-left me-2"></i>Back to List
                    </a>
                @endif
                

            </div>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show mb-4" role="alert" style="background: rgba(25, 135, 84, 0.2); border: 1px solid #198754; color: #198754;">
                <i class="bi bi-check-circle me-2"></i>{{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        {{-- Content Area --}}
        <div class="card border-0 shadow-lg admin-card" style="border-radius: 20px; overflow: hidden;">
            
            @if($mode === 'list')
                {{-- LIST VIEW --}}
                <div class="table-responsive">
                    <table class="table table-hover mb-0" style="color: var(--current-text);">
                        <thead style="background: var(--current-primary); border-bottom: 2px solid var(--current-gold);">
                            <tr>
                                <th class="py-3 ps-4">Image</th>
                                <th class="py-3">Name</th>
                                <th class="py-3">Category</th>
                                <th class="py-3">Price</th>
                                <th class="py-3">Theme</th>
                                <th class="py-3 text-end pe-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($rooms as $roomItem)
                                <tr style="border-bottom: 1px solid var(--current-accent);">
                                    <td class="ps-4 py-3">
                                        <img src="{{ $roomItem->image_path }}" alt="{{ $roomItem->name }}" style="width: 60px; height: 60px; object-fit: cover; border-radius: 10px;">
                                    </td>
                                    <td class="py-3 align-middle fw-bold">{{ $roomItem->name }}</td>
                                    <td class="py-3 align-middle"><span class="badge" style="background: var(--current-accent); color: var(--current-text);">{{ ucfirst($roomItem->category) }}</span></td>
                                    <td class="py-3 align-middle" style="color: var(--current-gold);">{{ $roomItem->price }}</td>
                                    <td class="py-3 align-middle">{{ ucfirst($roomItem->theme) }}</td>
                                    <td class="py-3 align-middle text-end pe-4" style="position: relative; z-index: 10;">
                                        <a href="{{ url('/admin/rooms/' . $roomItem->id . '/edit') }}" class="btn btn-sm me-2" title="Edit" style="cursor: pointer; color: var(--current-text); border: 1px solid var(--current-accent);">
                                            <i class="bi bi-pencil"></i>
                                        </a>
                                        <form action="{{ url('/admin/rooms/' . $roomItem->id) }}" method="POST" class="d-inline delete-form">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-sm btn-outline-danger delete-btn" title="Delete" style="cursor: pointer;">
                                                <i class="bi bi-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5">
                                        <div class="text-muted">
                                            <i class="bi bi-inbox display-4 d-block mb-3"></i>
                                            No rooms found. Start by adding one!
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>

            @else
                {{-- CREATE / EDIT FORM --}}
                <div class="card-body p-5">
                    <form action="{{ $mode === 'edit' ? url('/admin/rooms/' . $room->id) : url('/admin/rooms') }}" method="POST">
                        @csrf
                        @if($mode === 'edit')
                            @method('PUT')
                        @endif
                        
                        <div class="row g-4">
                            <div class="col-md-12">
                                <label class="form-label" style="color: var(--current-text-light);">Room Name</label>
                                <input type="text" name="name" value="{{ old('name', $room->name ?? '') }}" class="form-control" style="background: var(--current-primary); border: 1px solid var(--current-accent); color: var(--current-text);" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" style="color: var(--current-text-light);">Theme</label>
                                <select name="theme" class="form-select" style="background: var(--current-primary); border: 1px solid var(--current-accent); color: var(--current-text);" required>
                                    <option value="solice" {{ (old('theme', $room->theme ?? request('theme')) == 'solice') ? 'selected' : '' }}>Solice</option>
                                    <option value="vault" {{ (old('theme', $room->theme ?? request('theme')) == 'vault') ? 'selected' : '' }}>Vault</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" style="color: var(--current-text-light);">Category</label>
                                <select name="category" class="form-select" style="background: var(--current-primary); border: 1px solid var(--current-accent); color: var(--current-text);" required>
                                    <option value="standard" {{ (old('category', $room->category ?? '') == 'standard') ? 'selected' : '' }}>Standard Room</option>
                                    <option value="suite" {{ (old('category', $room->category ?? '') == 'suite') ? 'selected' : '' }}>Suite</option>
                                    <option value="penthouse" {{ (old('category', $room->category ?? '') == 'penthouse') ? 'selected' : '' }}>Penthouse</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" style="color: var(--current-text-light);">Price (e.g. $420/night)</label>
                                <input type="text" name="price" value="{{ old('price', $room->price ?? '') }}" class="form-control" style="background: var(--current-primary); border: 1px solid var(--current-accent); color: var(--current-text);" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" style="color: var(--current-text-light);">Rating (0-5)</label>
                                <input type="number" step="0.1" min="0" max="5" name="rating" value="{{ old('rating', $room->rating ?? '5.0') }}" class="form-control" style="background: var(--current-primary); border: 1px solid var(--current-accent); color: var(--current-text);" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" style="color: var(--current-text-light);">Size (e.g. 85 sqm)</label>
                                <input type="text" name="size" value="{{ old('size', $room->size ?? '') }}" class="form-control" style="background: var(--current-primary); border: 1px solid var(--current-accent); color: var(--current-text);" required>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" style="color: var(--current-text-light);">Max Guests</label>
                                <input type="number" name="max_guests" value="{{ old('max_guests', $room->max_guests ?? '') }}" class="form-control" style="background: var(--current-primary); border: 1px solid var(--current-accent); color: var(--current-text);" required>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label" style="color: var(--current-text-light);">Image URL</label>
                                <input type="text" name="image_path" value="{{ old('image_path', $room->image_path ?? '') }}" class="form-control" style="background: var(--current-primary); border: 1px solid var(--current-accent); color: var(--current-text);" placeholder="http://..." required>
                            </div>

                            <div class="col-md-12">
                                <label class="form-label" style="color: var(--current-text-light);">Features (Comma separated)</label>
                                <input type="text" name="features" value="{{ old('features', isset($room->features) ? implode(', ', $room->features) : '') }}" class="form-control" style="background: var(--current-primary); border: 1px solid var(--current-accent); color: var(--current-text);" placeholder="Ocean View, Private Balcony, Jacuzzi">
                            </div>

                            <div class="col-md-12">
                                <label class="form-label" style="color: var(--current-text-light);">Description</label>
                                <textarea name="description" rows="4" class="form-control" style="background: var(--current-primary); border: 1px solid var(--current-accent); color: var(--current-text);" required>{{ old('description', $room->description ?? '') }}</textarea>
                            </div>

                            <div class="col-12 mt-4">
                                <button type="submit" class="btn btn-primary w-100 py-3 fw-bold text-uppercase">
                                    {{ $mode === 'edit' ? 'Update Room' : 'Create Room' }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            @endif
            
        </div>
    </div>
</section>
</section>

<style>
    /* Hide Global Navigation in Admin Panel */
    .navbar {
        display: none !important;
    }

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
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Theme Synchronization Logic
        const urlTheme = new URLSearchParams(window.location.search).get('theme');
        const localStorageTheme = localStorage.getItem('theme');
        
        // Priority: URL param > localStorage > default 'solice'
        const currentTheme = urlTheme || localStorageTheme || 'solice';
        
        // Apply theme
        document.documentElement.setAttribute('data-theme', currentTheme);
        document.body.setAttribute('data-theme', currentTheme);
        
        // Persist if changed via URL
        if (urlTheme && urlTheme !== localStorageTheme) {
            localStorage.setItem('theme', urlTheme);
        }
        
        // Update all theme-dependent links in the page
        const themeLinks = document.querySelectorAll('a[href*="theme="]');
        themeLinks.forEach(link => {
            const url = new URL(link.href);
            url.searchParams.set('theme', currentTheme);
            link.href = url.toString();
        });
    });
</script>


{{-- Custom Delete Confirmation Modal --}}
<div id="deleteModal" class="custom-modal" style="display: none;">
    <div class="modal-overlay"></div>
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title">Confirm Deletion</h5>
            <button type="button" class="close-modal-btn"><i class="bi bi-x-lg"></i></button>
        </div>
        <div class="modal-body">
            <p>Are you sure you want to delete this room? This action cannot be undone.</p>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-outline-secondary cancel-btn">Cancel</button>
            <button type="button" class="btn btn-danger confirm-delete-btn">Delete Room</button>
        </div>
    </div>
    </div>
</div>



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

    [data-theme="vault"] .form-label {
        color: #a6a9af !important;
    }
    
    /* Force Dark Card Background for Vault Theme */
    [data-theme="vault"] .card {
        background-color: #121212 !important;
        border: 1px solid #333;
    }
    
    [data-theme="vault"] .table {
        color: #e8e9eb !important;
    }
    
    [data-theme="vault"] .table tbody tr {
        border-bottom-color: #333 !important;
    }
    
    [data-theme="vault"] .table tbody tr:hover {
        background-color: rgba(255, 255, 255, 0.05) !important;
    }

    /* Admin Card Styling */
    .admin-card {
        background: var(--current-secondary);
    }

    /* Navbar Visibility in Admin */
    .navbar {
        display: block !important;
        background-color: var(--current-secondary) !important;
        border-bottom: 1px solid var(--current-accent);
    }

    /* Custom Modal Styling */
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
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        // Theme Synchronization Logic
        const urlTheme = new URLSearchParams(window.location.search).get('theme');
        const localStorageTheme = localStorage.getItem('theme');
        
        // Priority: URL param > localStorage > default 'solice'
        const currentTheme = urlTheme || localStorageTheme || 'solice';
        
        // Apply theme
        document.documentElement.setAttribute('data-theme', currentTheme);
        document.body.setAttribute('data-theme', currentTheme);
        
        // Persist if changed via URL
        if (urlTheme && urlTheme !== localStorageTheme) {
            localStorage.setItem('theme', urlTheme);
        }
        
        // Update all theme-dependent links in the page
        const themeLinks = document.querySelectorAll('a[href*="theme="]');
        themeLinks.forEach(link => {
            const url = new URL(link.href);
            url.searchParams.set('theme', currentTheme);
            link.href = url.toString();
        });

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
                // Small timeout to allow display:flex to apply before adding active class for transition
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
            }, 300); // Match transition duration
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
@endsection
