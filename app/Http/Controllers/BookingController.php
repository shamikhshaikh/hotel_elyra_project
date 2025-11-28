<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index(Request $request)
    {
        // Fetch all rooms
        $rooms = Room::all();
        
        // Group rooms by theme for easier JS consumption if needed, 
        // or just pass them all and let JS filter. 
        // The current JS expects: { solice: [...], vault: [...] }
        
        $roomsData = [
            'solice' => [],
            'vault' => []
        ];
        
        foreach ($rooms as $room) {
            // Format features array if it's not already (it should be casted in model)
            $features = is_array($room->features) ? $room->features : [];
            
            $roomData = [
                'name' => $room->name,
                'price' => str_replace('/night', '', $room->price), // Extract raw price if needed, or keep as is
                'priceDisplay' => $room->price,
                'category' => ucfirst($room->category),
                'desc' => $room->description,
                'features' => $features,
                'img' => $room->image_path
            ];
            
            if ($room->theme === 'solice') {
                $roomsData['solice'][] = $roomData;
            } elseif ($room->theme === 'vault') {
                $roomsData['vault'][] = $roomData;
            }
        }
        
        return view('booking', compact('roomsData'));
    }
    public function store(Request $request)
    {
        $validated = $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'cart' => 'required|array',
            'cart.*.roomName' => 'required|string',
            'cart.*.checkin' => 'required|date',
            'cart.*.checkout' => 'required|date|after:cart.*.checkin',
            'cart.*.guests' => 'required|integer|min:1',
            'cart.*.subtotal' => 'required|numeric',
        ]);

        $bookings = [];

        foreach ($validated['cart'] as $item) {
            // Find the room by name (since frontend sends name)
            // Ideally frontend should send ID, but we can look it up
            $room = Room::where('name', $item['roomName'])->first();
            
            if ($room) {
                $booking = \App\Models\Booking::create([
                    'room_id' => $room->id,
                    'guest_name' => $validated['first_name'] . ' ' . $validated['last_name'],
                    'guest_email' => $validated['email'],
                    'guest_phone' => $validated['phone'],
                    'check_in' => $item['checkin'],
                    'check_out' => $item['checkout'],
                    'guests' => $item['guests'],
                    'total_price' => $item['subtotal'], // Using subtotal as total for now, or we can recalculate with tax
                    'status' => 'confirmed',
                ]);
                $bookings[] = $booking;
            }
        }

        return response()->json([
            'success' => true,
            'message' => 'Bookings created successfully',
            'count' => count($bookings)
        ]);
    }
}
