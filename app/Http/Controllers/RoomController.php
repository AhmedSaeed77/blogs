<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rooms; // Adjust the namespace as needed

class RoomController extends Controller
{
    public function index()
{
    $records = Rooms::paginate(10); 
    return view('pages.rooms.index', compact('records'));
}

    public function show($id)
{
    $record = Rooms::findOrFail($id); 
    return view('pages.rooms.show', compact('record'));
}

    public function create()
{
    return view('pages.rooms.create');
}

    public function store(Request $request)
{

    $request->validate([
        
    'name_en' => 'required|string|max:255',
    'name_ar' => 'required|string|max:255',
    'number_city' => 'required|string|max:255',
    ]);

    $record =Rooms::create([
          'name_en' => $request->name_en,
  'name_ar' => $request->name_ar,
  'number_city' => $request->number_city,

    ]); 

    return redirect()->route('rooms.index')->with('success', 'Record created successfully.');
}

    public function edit($id)
{
    $record = Rooms::findOrFail($id); 
    return view('pages.rooms.edit', compact('record'));
}

    public function update(Request $request,Rooms $room)
{

    $request->validate([
        
    'name_en' => 'required|string|max:255',
    'name_ar' => 'required|string|max:255',
    'number_city' => 'required|string|max:255',
    ]);

    $room->update([
          'name_en' => $request->name_en,
  'name_ar' => $request->name_ar,
  'number_city' => $request->number_city,

    ]); 
    
    return redirect()->route('rooms.index')->with('success', 'Record updated successfully.');
}

    public function destroy(Rooms $room)
{
    $room->delete();

    return redirect()->route('rooms.index')->with('success', 'Record deleted successfully.');
}

}
