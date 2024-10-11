@extends('base')

@section('library-css')
<link rel = "stylesheet" href = "https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">
<link rel = "stylesheet" href = "https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.css">
<style>
    .tags .bootstrap-tagsinput .tag {
        background-color: black;
        border-radius: 50px;
        padding: 2px 10px;
        color: white;
    }

</style>
@endsection

@section('content')

     
    <div class="container" >
    @if (isset($category))
    {{$category}}
@endif
    <h1>{{ isset($category) ? 'Edit Categories' : 'Add Categories' }}</h1>
    <form  action = "{{ isset($category) ? route('categories.update', ['category'=> $category->id]) : route('categories.store') }}"
        method = "POST">
        @csrf
        @if (isset($category))
            @method('PUT')
        @endif
        <div class="form-row row">
            <div class="form-group col-md-6">
                <label for="name">Categories Name</label>
                @if ($errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif
                <input value = "{{isset($category)? $category->name: ''}}" name = "name" type="text" class="form-control" id="name" placeholder="Categories's name">
            </div>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">{{isset($category)? 'Save edit': 'Create'}}</button>
        <a href="{{route('categories.index')}}" class="btn btn-primary">Cancel</a>
        <br>
        <br>
        <br>
    </form>
    

@endsection


@section('library-js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type='text/javascript' src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>
<script src = "https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>
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
        $("#description").each(function(){
            $(this).html(removeHTMLTags($(this).html()));
        });
        

        
        });
</script>
@endsection

@section('footer')
    @vite('resources/js/tinymce.js')
@endsection