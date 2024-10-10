@extends('base')

@section('library-css')
<link rel = "stylesheet" href = "https://cdn.datatables.net/2.1.8/css/dataTables.dataTables.css">

@endsection

@section('content')
    <!-- {{$category}} -->
     
    <div class="container" >
        <h1>{{$category->name}}</h1>
        <h1>edit, trash</h1>
        <div class="row">
            <div class="col-1">
                <div class="row">
                    <div class="facebook">
                        <p class="links"><b>Facebook </b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="x">
                        <p class="links"><b>X </b></p>
                    </div>
                </div>
                <div class="row">
                    <div class="website">
                        <p class="links"><b>Website </b></p>
                    </div>
                </div>
            </div>
            <div class="col-2">
                <div class="row">
                    <div class="facebook">
                        <p class="links">{{$category->facebook_link}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="x">
                        <p class="links">{{$category->x_link}}</p>
                    </div>
                </div>
                <div class="row">
                    <div class="website">
                        <p class="links">{{$category->website_link}}</p>
                    </div>
                </div>
            </div>

        </div>
        <div class="about">
            <h3>About</h3>
            <p>{{$category->description}}</p>
        </div>

    </div>
    

@endsection


@section('library-js')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script type='text/javascript' src="https://cdn.datatables.net/2.1.8/js/dataTables.min.js"></script>

@endsection