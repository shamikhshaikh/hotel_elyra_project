# Hotel Elyra - Luxury Hotel Management System

## Project Overview
Hotel Elyra is a dual-themed luxury hotel management web application built with Laravel. It features a unique "Solice" (Day) and "Vault" (Night) theme experience for users, allowing them to browse rooms, filter by category, and make bookings. The application includes a robust Admin Panel for managing rooms and bookings.

## Key Features

### 1. Dual-Theme Frontend
- **Solice & Vault Themes:** A dynamic theming system that persists across the application.
- **Real-Time Search:** Ajax-powered search bar on the Rooms page for instant filtering by name or category.
- **Dynamic Filtering:** Filter rooms by Standard, Suite, or Penthouse without page reloads.

### 2. Admin Panel (CRUD)
- **Room Management:** Create, Read, Update, and Delete rooms.
- **Image Uploading:** Drag-and-drop file upload with instant preview.
- **Database Storage:** Secure file handling using Laravel's Storage facade.
- **Booking Management:** View, create, edit, and cancel guest reservations.
- **Authentication:** Secure admin login with logout confirmation.

### 3. API & Backend
- **RESTful APIs:** Endpoints for public room search and booking submissions.
- **Database Relationships:** One-to-Many relationship between Rooms and Bookings.
- **Validation:** Robust server-side validation for all forms and uploads.

## Tech Stack
- **Framework:** Laravel 11
- **Language:** PHP 8.2+
- **Frontend:** Blade Templates, Vanilla JavaScript, Bootstrap 5, Custom CSS Variables
- **Database:** SQLite (Default) / MySQL Compatible

---

## Setup Instructions

### Prerequisites
- PHP >= 8.2
- Composer
- Node.js & NPM

### Installation Steps

1.  **Clone the Repository**
    ```bash
    git clone <repository-url>
    cd hotel_elyra_project
    ```

2.  **Install Dependencies**
    ```bash
    composer install
    npm install
    ```

3.  **Environment Configuration**
    Copy the example env file and configure your database:
    ```bash
    cp .env.example .env
    php artisan key:generate
    ```

4.  **Database Migration & Seeding**
    Run migrations to create tables and seed default data (including the admin user):
    ```bash
    php artisan migrate --seed
    ```

5.  **Link Storage (Crucial for Images)**
    Create the symbolic link to make uploaded images accessible:
    ```bash
    php artisan storage:link
    ```

6.  **Run the Application**
    Start the development server:
    ```bash
    php artisan serve
    ```
    Visit `http://127.0.0.1:8000` in your browser.

---

## Usage Guide

### Public Website
- **Browse Rooms:** Navigate to `/rooms` to view available accommodations.
- **Search:** Use the search bar to find specific rooms instantly.
- **Book:** Click "Book Now" to enter the checkout process.

### Admin Panel
- **Access:** Navigate to `/admin/login`.
- **Default Credentials:**
    - Email: `admin@hotelelyra.com`
    - Password: `password`
- **Manage Rooms:** Use the sidebar to access the Rooms section. You can add new rooms with images, prices, and features.
- **Manage Bookings:** View incoming reservations and update their status.

---

## API Documentation

### 1. Search Rooms
**Endpoint:** `GET /rooms/search`
- **Parameters:** `query` (string), `theme` (string)
- **Response:** JSON array of matching room objects.

### 2. Create Booking
**Endpoint:** `POST /api/book`
- **Payload:** JSON object with guest details and room ID.
- **Response:** Success message and booking reference.