<?php

namespace App\Http\Controllers;

use App\Models\Organizer;
use Illuminate\Http\Request;

class OrganizerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $organizers = Organizer::orderBy('created_at', 'desc')->get();
        return view ('master.organizer', ['organizers'=> $organizers]);
    
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.crudOrganizer');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'facebook_link' => 'nullable|url',
            'x_link' => 'nullable|url',
            'website_link' => 'nullable|url',
        ]);

        Organizer::create($request->all());
        return redirect()->route('organizers.index')->with('success', 'Organizer created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $organizer = Organizer::find($id);
        return view('master.detailOrganizer', compact('organizer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $organizer = Organizer::findOrFail($id);
        return view('master.crudOrganizer', compact('organizer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'facebook_link' => 'nullable|url',
            'x_link' => 'nullable|url',
            'website_link' => 'nullable|url',
        ]);

        $organizer = Organizer::findOrFail($id);
        $organizer->update($request->all());
        return redirect()->route('organizers.index')->with('success', 'Organizer updated successfully.');
    }

    /**
     * Remove the specified organizer from storage.
     */
    public function destroy(string $id)
    {
        $organizer = Organizer::findOrFail($id);
        $organizer->delete();
        return redirect()->route('organizers.index')->with('success', 'Organizer deleted successfully.');
    }
}
