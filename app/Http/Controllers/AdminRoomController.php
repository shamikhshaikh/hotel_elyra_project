<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;

class AdminRoomController extends Controller
{
    public function index(Request $request)
    {
        // Filter by theme if present in request, otherwise show all or default
        $theme = $request->query('theme');
        
        if ($theme) {
            $rooms = Room::where('theme', $theme)->get();
        } else {
            $rooms = Room::all();
        }
        
        return view('admin', [
            'mode' => 'list',
            'rooms' => $rooms
        ]);
    }

    public function create()
    {
        return view('admin', [
            'mode' => 'create'
        ]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|string',
            'image_path' => 'required|string',
            'category' => 'required|string',
            'size' => 'required|string',
            'max_guests' => 'required|integer',
            'rating' => 'required|numeric|min:0|max:5',
            'theme' => 'required|string|in:solice,vault',
            'features' => 'nullable|string',
        ]);

        if (!empty($validated['features'])) {
            $validated['features'] = array_map('trim', explode(',', $validated['features']));
        } else {
            $validated['features'] = [];
        }

        Room::create($validated);

        return redirect('/admin/rooms?theme=' . $validated['theme'])->with('success', 'Room created successfully.');
    }

    public function edit($id)
    {
        $room = Room::findOrFail($id);
        return view('admin', [
            'mode' => 'edit',
            'room' => $room
        ]);
    }

    public function update(Request $request, $id)
    {
        $room = Room::findOrFail($id);
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|string',
            'image_path' => 'required|string',
            'category' => 'required|string',
            'size' => 'required|string',
            'max_guests' => 'required|integer',
            'rating' => 'required|numeric|min:0|max:5',
            'theme' => 'required|string|in:solice,vault',
            'features' => 'nullable|string',
        ]);

        if (!empty($validated['features'])) {
            $validated['features'] = array_map('trim', explode(',', $validated['features']));
        } else {
            $validated['features'] = [];
        }

        $room->update($validated);

        return redirect('/admin/rooms?theme=' . $validated['theme'])->with('success', 'Room updated successfully.');
    }

    public function destroy($id)
    {
        $room = Room::findOrFail($id);
        $theme = $room->theme;
        $room->delete();

        return redirect('/admin/rooms?theme=' . $theme)->with('success', 'Room deleted successfully.');
    }
}
