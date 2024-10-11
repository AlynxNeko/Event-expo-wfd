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
    <h1>{{ isset($organizer) ? 'Edit Organizer' : 'Add Organizer' }}</h1>
    <form  action = "{{ isset($organizer) ? route('organizers.update', ['organizer'=> $organizer->id]) : route('organizers.store') }}"
        method = "POST">
        @csrf
        @if (isset($organizer))
            @method('PUT')
        @endif
        <div class="form-row row">
            <div class="form-group col-md-6">
                <label for="title">Organizer Name</label>
                @if ($errors->has('name'))
                    <div class="text-danger">{{ $errors->first('name') }}</div>
                @endif
                <input value = "{{isset($organizer)? $organizer->name: ''}}" name = "name" type="text" class="form-control" id="name" placeholder="Organizer's's name">
            </div>
        </div>
        <div class="form-row row">
            <div class="form-group col-md-6">
                <label for="facebook_link">Facebook</label>
                @if ($errors->has('facebook_link'))
                    <div class="text-danger">{{ $errors->first('facebook_link') }}</div>
                @endif
                <input value = "{{isset($organizer)? $organizer->facebook_link : ''}}" type="text" class="form-control" name = "facebook_link" id="facebook_link" placeholder="link...">
            </div>
            <div class="form-group col-md-6">
                <label for="x_link">X</label>
                @if ($errors->has('x_link'))
                    <div class="text-danger">{{ $errors->first('x_link') }}</div>
                @endif
                <input value = "{{isset($organizer)? $organizer->x_link : ''}}" type="text" class="form-control" name = "x_link" id="x_link" placeholder="link...">
            </div>
        </div>
        <div class="form-row row">
            <div class="form-group col-md-6">
                <label for="website_link">Website</label>
                @if ($errors->has('website_link'))
                    <div class="text-danger">{{ $errors->first('website_link') }}</div>
                @endif
                <input value = "{{isset($organizer)? $organizer->website_link : ''}}" type="text" class="form-control" name = "website_link" id="website_link" placeholder="link...">
            </div>
        </div>
        <div class="form-group">
            <label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">About</label>
            @if ($errors->has('description'))
                <div class="text-danger">{{ $errors->first('description') }}</div>
            @endif
            <textarea class="editor" id = "description" name="description">{{ isset($organizer) ? $organizer->description : '' }}</textarea>
        </div>
        <br>
        <button type="submit" class="btn btn-primary">{{isset($organizer)? 'Save edit': 'Create'}}</button>
        <a href="{{route('organizers.index')}}" class="btn btn-primary">Cancel</a>
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