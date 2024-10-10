@extends('base')

@section('library-css')
<link rel = "stylesheet" href = "https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
<link rel = "stylesheet" href = "https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css">
<style>
    #tags{
        background-color: black;
        border-radius: 50px;
        padding: 2px 10px;
        color: white;
    }
</style>
@endsection

@section('content')
    <!-- {{$event}} -->
     
    <div class="container" >
    <h1>{{ isset($event) ? 'Edit Event' : 'Add Event' }}</h1>
    <form  action = "{{ isset($event) ? route('events.update', ['event'=> $event->id]) : route('events.store') }}"
        method = "POST">
        @csrf
        @if (isset($event))
            @method('PUT')
        @endif
        <div class="form-row row">
            <div class="form-group col-md-6">
                <label for="title">Event Name</label>
                @if ($errors->has('title'))
                    <div class="text-danger">{{ $errors->first('title') }}</div>
                @endif
                <input value = "{{isset($event)? $event->title: ''}}" name = "title" type="text" class="form-control" id="title" placeholder="Event's name">
            </div>
            <div class="form-group col-md-6">
                <label for="date">Date</label>
                @if ($errors->has('date'))"
                    <div class="text-danger">{{ $errors->first('date') }}</div>
                @endif
                <input value = "{{isset($event)? $event->date : ''}}" type="date" class="form-control" id="date" name = "date" placeholder="Start date">
            </div>
        </div>
        <div class="form-row row">
            <div class="form-group col-md-6">
                <label for="venue">Location</label>
                @if ($errors->has('venue'))
                    <div class="text-danger">{{ $errors->first('venue') }}</div>
                @endif
                <input value = "{{isset($event)? $event->venue: ''}}" type="text" name = "venue" class="form-control" id="venue" placeholder="Location...">
            </div>
            <div class="form-group col-md-6">
                <label for="start_time">Start Time</label>
                @if ($errors->has('start_time'))
                    <div class="text-danger">{{ $errors->first('start_time') }}</div>
                @endif
                <input value = "{{isset($event)? substr($event->start_time, 0, 5): ''}}" type="time" class="form-control" name = "start_time" id="start_time">
            </div>
        </div>

        <div class="form-row row">
            <div class="form-group col-md-6">
                <label for="organizer">Organizer</label>
                @if ($errors->has('organizer_id'))
                    <div class="text-danger">{{ $errors->first('organizer_id') }}</div>
                @endif
                <select name = "organizer_id" class="form-control">
                    @foreach ($organizers as $organizer)
                        <option {{(isset($event) && ($event->organizer_id == $organizer->id))? 'selected': ''}} value="{{ $organizer->id }}">{{ $organizer->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-md-6">
                <label for="event_category">Category</label><br>
                @if ($errors->has('event_category_id'))
                    <div class="text-danger">{{ $errors->first('event_category_id') }}</div>
                @endif
                <select name = "event_category_id" class="form-control">
                    @foreach ($categories as $category)
                        <option {{(isset($event) && ($event->event_category_id == $category->id))? 'selected': ''}} value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="form-group">
            <label for="booking_url">Booking URL</label>
            @if ($errors->has('booking_url'))
                <div class="text-danger">{{ $errors->first('booking_url') }}</div>
            @endif
            <input value = "{{isset($event)? $event->booking_url : ''}}" type="text" class="form-control" name = "booking_url" id="booking_url" placeholder="link...">
        </div>
        <div class="form-group">
            <label for="tags">Tags</label><br>
            @if ($errors->has('tags'))
                <div class="text-danger">{{ $errors->first('tags') }}</div>
            @endif
            
            <div class="row">
                <input class ='tags' type="text" value="
            @foreach($event->tags as $tag)
                ,{{ $tag }}
            @endforeach
            " data-role="tagsinput" readonly/>
                </div>
           
            
        </div>
        <div class="form-group">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">About</label>
            @if ($errors->has('description'))
                <div class="text-danger">{{ $errors->first('description') }}</div>
            @endif
            <textarea class="editor" id = "description" name="description">{{ isset($event) ? $event->description : '' }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">{{isset($event)? 'Save edit': 'Create'}}</button>
    </form>
    

@endsection


@section('library-js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type='text/javascript' src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
<script src = "https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

@endsection