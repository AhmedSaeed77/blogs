<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Rooms; // Adjust the namespace as needed

class RoomController extends Controller
{
    public function find($id)
{
    $record = Rooms::findOrFail($id); 

    return response()->json([
        'status' => 'success',
        'data' => $record
    ], 200);
}
    public function findAll()
{
    $records = Rooms::paginate(10); 
    
    return response()->json([
        'status' => 'success',
        'data' => $records
    ], 200);
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

    return response()->json([
            'status' => 'success',
            'message' => 'Record created successfully'
    ], 201);
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

     return response()->json([
            'status' => 'success',
            'message' => 'Record updated successfully'
    ], 200);
}
    public function delete(Rooms $room)
{
    $room->delete();

     return response()->json([
            'status' => 'success',
            'message' => 'Record deleted successfully'
    ], 200);
}

}
