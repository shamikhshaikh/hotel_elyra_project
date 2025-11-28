<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class RoomController extends Controller
{
    public function index(Request $request)
    {
        // Get theme from request or default to 'solice'
        $theme = $request->query('theme', 'solice');
        
        // Fetch rooms for the selected theme
        $rooms = Room::where('theme', $theme)->get();
        
        // If no rooms found for theme (e.g. first run), return empty collection
        // The view handles empty state
        
        return view('rooms', compact('rooms', 'theme'));
    }

    public function show(Request $request)
    {
        $name = $request->query('name');
        $theme = $request->query('theme', 'solice');
        
        // Find room by name and theme
        $room = Room::where('name', $name)->first();
        
        // Fallback if not found (optional: redirect or show 404)
        if (!$room) {
            // Try to find any room in the theme to show something, or 404
            $room = Room::where('theme', $theme)->first();
        }
        
        if (!$room) {
            abort(404, 'Room not found');
        }

        return view('room_detail', compact('room', 'theme'));
    }
}
