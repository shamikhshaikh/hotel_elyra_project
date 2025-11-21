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
}
