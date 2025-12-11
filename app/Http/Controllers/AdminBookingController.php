<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Room;
use Illuminate\Http\Request;

class AdminBookingController extends Controller
{
    public function index(Request $request)
    {
        $theme = $request->query('theme', 'solice');
        
        // Filter bookings where the associated room belongs to the selected theme
        $bookings = Booking::whereHas('room', function($query) use ($theme) {
            $query->where('theme', $theme);
        })->with('room')->latest()->paginate(10);
        
        return view('admin.bookings.index', compact('bookings', 'theme'));
    }

    public function create(Request $request)
    {
        $theme = $request->query('theme', 'solice');
        
        // Only show rooms belonging to the selected theme
        $rooms = Room::where('theme', $theme)->get();
        
        return view('admin.bookings.create', compact('rooms', 'theme'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'guest_name' => 'required|string|max:255',
            'guest_email' => 'required|email|max:255',
            'guest_phone' => 'required|string|max:20',
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        Booking::create($validated);

        return redirect()->route('admin.bookings.index', ['theme' => $request->input('theme', 'solice')])
            ->with('success', 'Booking created successfully.');
    }

    public function edit(Request $request, Booking $booking)
    {
        $theme = $request->query('theme', 'solice');
        
        // Only show rooms belonging to the selected theme
        $rooms = Room::where('theme', $theme)->get();
        
        return view('admin.bookings.edit', compact('booking', 'rooms', 'theme'));
    }

    public function update(Request $request, Booking $booking)
    {
        $validated = $request->validate([
            'guest_name' => 'required|string|max:255',
            'guest_email' => 'required|email|max:255',
            'guest_phone' => 'required|string|max:20',
            'room_id' => 'required|exists:rooms,id',
            'check_in' => 'required|date',
            'check_out' => 'required|date|after:check_in',
            'guests' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
            'status' => 'required|in:pending,confirmed,cancelled',
        ]);

        $booking->update($validated);

        return redirect()->route('admin.bookings.index', ['theme' => $request->input('theme', 'solice')])
            ->with('success', 'Booking updated successfully.');
    }

    public function destroy(Request $request, Booking $booking)
    {
        $booking->delete();

        return redirect()->route('admin.bookings.index', ['theme' => $request->input('theme', 'solice')])
            ->with('success', 'Booking deleted successfully.');
    }
}
