@extends('base')

@section('library-css')
<link rel = "stylesheet" href = "https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">

<link rel = "stylesheet" href = "https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css">
<style>
    /* .label-info{
        background-color: black;
        border-radius: 50px;
        padding: 2px 10px;
    } */

    /* .bootstrap-tagsinput{
        border: 0px;
    } */

    .tags{
        background-color: black;
        border-radius: 50px;
        padding: 2px 10px;
        color: white;
    }
</style>
@endsection
<?php
use Carbon\Carbon;
$date = Carbon::parse($event->date)->format('D, M d Y');
$time = Carbon::parse($event->start_time)->format('h:i A');
$formattedDateTime = $date . ' - ' . $time;
?>
@section('content')
    {{$event}}
     
    <div class="container" >
        <h3>Expo</h3>
        <h1>{{$event->title}}</h1>
        <div class="row">
            <div class="col-4">
                <h4>Organizer</h4>
                <p>{{$event->organizer->name}}</p>
            </div>
            <div class="col-4">
                <h4>Booking URL</h4>
                <p>{{isset($event->booking_url) ? $event->booking_url : "-"}}</p>
            </div>
        </div>
        <div class="row">
            <div class="col-4">
                <h4>Date and Time</h4>
                <p>{{$formattedDateTime}}</p>
            </div>
            <div class="col-4">
                <h4>Location</h4>
                <p>{{$event->venue}}</p>
            </div>
        </div>
        <div class="row">
            <h4>About this event</h4>
            <p>{{$event->description}}</p>
        </div>
        <!-- <div class="row">
            <input class ='tags' type="text" value="
    @foreach($event->tags as $tag)
        ,{{ $tag }}
    @endforeach
    " data-role="tagsinput" readonly/>
        </div>
     -->
     @foreach($event->tags as $tag)
        <button class="tags">
            {{ $tag }}
        </button>
    @endforeach
    </div>
    

@endsection


@section('library-js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type='text/javascript' src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
<script src = "https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
<script>
    $(document).ready(function() {
        $('input[data-role="tagsinput"]').tagsinput();
        $('input[data-role="tagsinput"]').prop('disabled', true);
    });

</script>
@endsection