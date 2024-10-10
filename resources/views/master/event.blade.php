@extends('base')

@section('library-css')
<link rel = "stylesheet" href = "https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
<style>
.tags{
        background-color: black;
        border-radius: 50px;
        padding: 2px 10px;
        color: white;
        margin: 2px 2px;
    }
</style>
@endsection

@section(section: 'content')
    <!-- {{$events}} -->
     
    <div class="container" >
    <div class="row" style="align-items:center">
        <h1 class="col-2">Events</h1>
        <div class="col-2">
            <button>+ Create</button>
        </div>
    </div>
    <div class="row mx-auto" style="width: fit-content;">
    <table id="myTable" class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Event Name</th>
                <th>Date</th>
                <th>Location</th>
                <th>Organizer</th>
                <th>About</th>
                <th>Tags</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($events as $event)
            <tr>
                <td>{{$event->id}}</td>
                <td><a href="{{ route('eventsMaster.show', $event->id) }}" style="color: black; text-decoration: none;">{{$event->title}}</a></td>
                <td>{{$event->date}}</td>
                <td>{{$event->venue}}</td>
                <td>{{$event->organizer->name}}</td>
                <td>{{$event->description}}</td>
                <td>
                @foreach($event->tags as $tag)
                    <button class="tags">
                        {{ $tag }}
                    </button>
                @endforeach
                </td>
                <td>edit, trash</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>
@endsection

@section('library-js')

<script type='text/javascript' src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
<script>
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
    </script>
@endsection