@extends('base')

@section('library-css')
<link rel = "stylesheet" href = "https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
<style>

</style>
@endsection

@section('content')
    <!-- {{$events}} -->
     
    <div class="container" >
    <h1>Events in Surabaya</h1>
    <div class="row mx-auto" style="width: fit-content;">
    @foreach ($events as $event)
        <div class="card col-4 p-3" >
            <a href="{{ route('events.show', $event->id) }}" style="text-decoration: none; color:black">
            <img src="{{ asset('photos/default.jpeg') }}" class="card-img-top" alt="{{ $event->title }}">
            <div class="card-body">
                <h5 class="card-title">{{ $event->title }}</h5>
                <p class="card-text">{{ $event->description }}</p>
            </div>
            </a>
        </div>
    @endforeach
    </div>
    </div>
@endsection


@section('library-js')

<script type='text/javascript' src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
    <!-- <script>
        $(document).ready(function() {
            $('#myTable').DataTable({
                'order':[]
        });

        function removeHTMLTags(htmlString) {
            // Create a new DOMParser instance
            const parser = new DOMParser();
            // Parse the HTML string
            const doc = parser.parseFromString(htmlString, 'text/html');
            // Extract text content
            const textContent = doc.body.textContent || "";
            // Trim whitespace
            return textContent.trim();
        }
        $(".description").each(function(){
            $(this).html(removeHTMLTags($(this).html()));
        });

        
        });
    </script> -->
@endsection