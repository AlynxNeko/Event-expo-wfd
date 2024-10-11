<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Event;
use App\Models\Organizer;
use Illuminate\Http\Request;
use App\Models\EventCategory;
use Illuminate\Support\Facades\Session as FacadesSession;

class EventMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::orderBy('date', 'desc')->get();
        return view ('master.event', ['events'=> $events]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $organizers = Organizer::where('active', 1)->orderBy('created_at', 'desc')->get();
        $categories = EventCategory::where('active', 1)->orderBy('created_at', 'desc')->get();
        return view('master.crudEvent', ['organizers'=> $organizers, 'categories'=>$categories]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $event = $request->validate([
            'title' => 'required|max:255',
            'venue' => 'required|max:255',
            'date' => 'required|date_format:Y-m-d',
            'start_time' => 'required|date_format:H:i',
            'description'=>'required',
            'booking_url'=>'url|nullable',
            'tags'=>'required',
            'organizer_id' =>'required|exists:organizers,id',
            'event_category_id' =>'required|exists:event_categories,id',
        ]);

        if (!$event) {
            FacadesSession::flash('message', 'Artikel gagal di tambahkan !');
            FacadesSession::flash('alert-class', 'failed');
            return redirect()->route('eventsMaster.index');
        }
        // Convert the tags into an array (if it's a string of comma-separated tags)
        $tagsArray = explode(',', $request->tags);

        Event::create([
            'title' => $request->title,
            'venue' => $request->venue,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'description' => $request->description,
            'booking_url' => $request->booking_url ?? null,
            'tags' => $tagsArray, // Store tags as array
            'organizer_id' => $request->organizer_id,
            'event_category_id' => $request->event_category_id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);

        FacadesSession::flash('message', 'Event berhasil di tambahkan !');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('eventsMaster.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $event = Event::find($id);
        $organizers = Organizer::where('active', 1)->orderBy('created_at', 'desc')->get();
        $categories = EventCategory::where('active', 1)->orderBy('created_at', 'desc')->get();
        return view('master.crudEvent', ['organizers'=> $organizers, 'event'=>$event, 'categories'=>$categories]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $event = Event::find($id);
        $organizers = Organizer::where('active', 1)->orderBy('created_at', 'desc')->get();
        $categories = EventCategory::where('active', 1)->orderBy('created_at', 'desc')->get();
        return view('master.crudEvent', ['organizers'=> $organizers, 'event'=>$event, 'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $event = $request->validate([
            'title' => 'required|max:255',
            'venue' => 'required|max:255',
            'date' => 'required|date_format:Y-m-d',
            'start_time' => 'required|date_format:H:i',
            'description'=>'required',
            'booking_url'=>'url|nullable',
            'tags'=>'required',
            'organizer_id' =>'required|exists:organizers,id',
            'event_category_id' =>'required|exists:event_categories,id',
        ]);

        if (!$event) {
            FacadesSession::flash('message', 'Artikel gagal di tambahkan !');
            FacadesSession::flash('alert-class', 'failed');
            return redirect()->route('eventsMaster.index');
        }
        
        $tagsArray = explode(',', $request->tags);

        Event::query()->where('id', $id)->update([
            'title' => $request->title,
            'venue' => $request->venue,
            'date' => $request->date,
            'start_time' => $request->start_time,
            'description' => $request->description,
            'booking_url' => $request->booking_url? $request->booking_url : null,
            'tags' => $tagsArray,
            'organizer_id' => $request->organizer_id,
            'event_category_id' => $request->event_category_id,
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);

        FacadesSession::flash('message', 'Event berhasil diupdate !');
        FacadesSession::flash('alert-class', 'success');
        return redirect()->route('eventsMaster.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
