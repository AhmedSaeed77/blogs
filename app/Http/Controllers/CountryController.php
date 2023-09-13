<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Countries; // Adjust the namespace as needed

class CountryController extends Controller
{
    public function index()
{
    $records = Countries::paginate(10); 
    return view('pages.countries.index', compact('records'));
}

    public function show($id)
{
    $record = Countries::findOrFail($id); 
    return view('pages.countries.show', compact('record'));
}

    public function create()
{
    return view('pages.countries.create');
}

    public function store(Request $request)
{

    $request->validate([

    'name_en' => 'required|string|max:255',
    'name_ar' => 'required|string|max:255',
    'number_city' => 'required|string|max:255',
    ]);

    $record =Countries::create([
          'name_en' => $request->name_en,
  'name_ar' => $request->name_ar,
  'number_city' => $request->number_city,

    ]); 

    return redirect()->route('countries.index')->with('success', 'Record created successfully.');
}

    public function edit($id)
{
    $record = Countries::findOrFail($id); 
    return view('pages.countries.edit', compact('record'));
}

    public function update(Request $request,Countries $country)
{

    $request->validate([
        
    'name_en' => 'required|string|max:255',
    'name_ar' => 'required|string|max:255',
    'number_city' => 'required|string|max:255',
    ]);

    $country->update([
          'name_en' => $request->name_en,
  'name_ar' => $request->name_ar,
  'number_city' => $request->number_city,

    ]); 
    
    return redirect()->route('countries.index')->with('success', 'Record updated successfully.');
}

    public function destroy(Countries $country)
{
    $country->delete();

    return redirect()->route('countries.index')->with('success', 'Record deleted successfully.');
}

}
