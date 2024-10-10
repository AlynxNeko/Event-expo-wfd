@extends('base')

@section('library-css')
<link rel = "stylesheet" href = "https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
<style>

</style>
@endsection

@section(section: 'content')
    <!-- {{$organizers}} -->
     
    <div class="container" >
    <div class="row" style="align-items:center">
        <h1 class="col-2">Organizer</h1>
        <div class="col-2">
            <button>+ Create</button>
        </div>
    </div>
    <div class="row mx-auto" style="width: fit-content;">
    <table id="myTable" class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Organizer Name</th>
                <th>About</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($organizers as $organizer)
            <tr>
                <td>{{$organizer->id}}</td>
                <td><a href="{{ route('organizers.show', $organizer->id) }}" style="color: black; text-decoration: none;">{{$organizer->name}}</a></td>
                <td>{{$organizer->description}}</td>
                <td>edit, trash</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    </div>
    </div>
@endsection

<!-- <a href="{{ route('events.show', $organizer->id) }}" style="text-decoration: none; color:black"> -->

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