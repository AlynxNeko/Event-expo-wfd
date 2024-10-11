<?php

namespace App\Http\Controllers;

use App\Models\EventCategory;
use Illuminate\Http\Request;

class EventCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = EventCategory::orderBy('id', 'asc')->get();
        return view ('master.category', ['categories'=> $categories]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.crudCategory');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        EventCategory::create($request->all());
        return redirect()->route('categories.index')->with('success', 'Event category created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $category = EventCategory::find($id);
        return view('master.crudCategory', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = EventCategory::findOrFail($id);
        return view('master.crudCategory', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $eventCategory = EventCategory::findOrFail($id);
        $eventCategory->update($request->all());
        return redirect()->route('categories.index')->with('success', 'Event category updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $eventCategory = EventCategory::findOrFail($id);
        $eventCategory->delete();
        return redirect()->route('categories.index')->with('success', 'Event category deleted successfully.');
    }
}



// <?php

// namespace App\Http\Controllers;

// use App\Models\EventCategory;
// use Illuminate\Http\Request;

// class EventCategoryController extends Controller
// {
//     /**
//      * Display a listing of the event categories.
//      */
//     public function index()
//     {
//         $categories = EventCategory::orderBy('name')->get();
//         return view('eventCategory.index', ['categories' => $categories]);
//     }

//     /**
//      * Show the form for creating a new event category.
//      */
//     public function create()
//     {
//         return view('eventCategory.create');
//     }

//     /**
//      * Store a newly created event category in storage.
//      */
//     public function store(Request $request)
//     {
//         $request->validate([
//             'name' => 'required|string|max:255',
//         ]);

//         EventCategory::create($request->all());
//         return redirect()->route('categories.index')->with('success', 'Event category created successfully.');
//     }

//     /**
//      * Display the specified event category.
//      */
//     public function show(string $id)
//     {
//         $eventCategory = EventCategory::findOrFail($id);
//         return view('eventCategory.detail', compact('eventCategory'));
//     }

//     /**
//      * Show the form for editing the specified event category.
//      */
//     public function edit(string $id)
//     {
//         $eventCategory = EventCategory::findOrFail($id);
//         return view('eventCategory.edit', compact('eventCategory'));
//     }

//     /**
//      * Update the specified event category in storage.
//      */
//     public function update(Request $request, string $id)
//     {
//         $request->validate([
//             'name' => 'required|string|max:255',
//         ]);

//         $eventCategory = EventCategory::findOrFail($id);
//         $eventCategory->update($request->all());
//         return redirect()->route('categories.index')->with('success', 'Event category updated successfully.');
//     }

//     /**
//      * Remove the specified event category from storage.
//      */
//     public function destroy(string $id)
//     {
//         $eventCategory = EventCategory::findOrFail($id);
//         $eventCategory->delete();
//         return redirect()->route('categories.index')->with('success', 'Event category deleted successfully.');
//     }
// }
