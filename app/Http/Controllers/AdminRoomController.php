<?php

namespace App\Http\Controllers;

use App\Models\Room;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

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
            'image' => 'required|image|max:2048', // Max 2MB
            'category' => 'required|string',
            'size' => 'required|string',
            'max_guests' => 'required|integer',
            'rating' => 'required|numeric|min:0|max:5',
            'theme' => 'required|string|in:solice,vault',
            'features' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('rooms', 'public');
            // Ensure forward slashes for URL compatibility on Windows
            $path = str_replace('\\', '/', $path);
            $validated['image_path'] = '/storage/' . $path;
        }

        if (!empty($validated['features'])) {
            $validated['features'] = array_map('trim', explode(',', $validated['features']));
        } else {
            $validated['features'] = [];
        }

        // Remove 'image' from validated array as it's not a column
        unset($validated['image']);

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
            'image' => 'nullable|image|max:2048', // Optional on update
            'category' => 'required|string',
            'size' => 'required|string',
            'max_guests' => 'required|integer',
            'rating' => 'required|numeric|min:0|max:5',
            'theme' => 'required|string|in:solice,vault',
            'features' => 'nullable|string',
        ]);

        if ($request->hasFile('image')) {
            // Delete old image if it exists and is a local file
            if ($room->image_path && strpos($room->image_path, '/storage/') === 0) {
                $oldPath = str_replace('/storage/', '', $room->image_path);
                Storage::disk('public')->delete($oldPath);
            }

            $path = $request->file('image')->store('rooms', 'public');
            // Ensure forward slashes for URL compatibility on Windows
            $path = str_replace('\\', '/', $path);
            $validated['image_path'] = '/storage/' . $path;
        }

        if (!empty($validated['features'])) {
            $validated['features'] = array_map('trim', explode(',', $validated['features']));
        } else {
            $validated['features'] = [];
        }

        // Remove 'image' from validated array
        unset($validated['image']);

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
