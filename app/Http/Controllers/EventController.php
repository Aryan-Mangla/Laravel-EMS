<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\EventImage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EventController extends Controller
{
    public function index()
{
    $events = Event::where('user_id', auth()->id())->get(); 
    return view('events.index', compact('events'));
}

// All events
public function publicIndex()
{
    $events = Event::where('active', 1)->paginate(10); // Adjust pagination as needed
    return view('events.public_index', compact('events'));
}



    public function create()
    {
        return view('events.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'meta_title' => 'nullable|string|max:255',
            'meta_description' => 'nullable|string|max:160',
            'slug' => 'nullable|unique:events',
            'canonical' => 'nullable|url',
            'promo' => 'required|integer',
            'active' => 'required|boolean',
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
             'images' => 'required|array|max:5',
        ]);

        $slug = $request->slug ?? Str::slug($request->title);

        $event = Event::create([
            'user_id' => auth()->id(),
            'title' => $request->title,
            'description' => $request->description,
            'slug' => $slug,
            'canonical' => $request->canonical,
            'meta_title' => $request->meta_title ?: $request->title,
            'meta_description' => $request->meta_description ?: Str::limit($request->description, 160),
            'promo' => $request->promo,
            'active' => $request->active,
        ]);

        
foreach ($request->file('images') as $image) {
    
    $originalName = pathinfo($image->getClientOriginalName(), PATHINFO_FILENAME);
    $extension = $image->getClientOriginalExtension();
    $imageName = $originalName . '.' . $extension;
    $counter = 1;

    // Check if the file already exists in the public directory
    while (file_exists(public_path('images/events/' . $imageName))) {
        $imageName = $originalName . '(' . $counter . ').' . $extension;
        $counter++;
    }
    $image->move(public_path('images/events'), $imageName);
    $event->images()->create([
        'image_path' => $imageName,
    ]);
}


        return redirect()->route('events.index')->with('success', 'Event created successfully!');
    }

    public function show(Event $event)
    {
        return view('events.show', compact('event'));
    }
}
