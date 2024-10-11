@extends('base')

@section('library-css')
<link rel = "stylesheet" href = "https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
<style>

    .button {
        background-color: white;
        border-radius: 10px;
        padding: 2px 10px;
        color: black;
        outline: 1px black solid;
        width: 120px;
        text-decoration: none;
    }
    .button:hover{
        cursor: pointer;   
        color: black;
    }
</style>
@endsection

@section(section: 'content')
    <!-- {{$categories}} -->
     
    <div class="container" >
    <div class="row" style="align-items:center">
        <h1 class="col-2">Category</h1>
        <div class="col-2">
            <a class="button" href="{{ route('categories.create') }}">+ Create</a>
        </div>
    </div>
    <div class="row mx-auto" style="width: fit-content;">
    <table id="myTable" class="table">
        <thead>
            <tr>
                <th>No</th>
                <th>Category Name</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
            <tr>
                <td>{{$category->id}}</td>
                <td>{{$category->name}}</td>
                <td>
                    <x-edit-button url="{{route('categories.edit', $category->id)}}" />
                    <x-delete-button url="{{route('categories.destroy', $category->id)}}" />
                </td>
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