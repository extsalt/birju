@extends('layout')

@section('content')

    <div class="container">
        <div class="row">

            @foreach(\App\Photo::all() as $photo)
                <div class="col-md-6">
                    <img src="{{preg_replace('/images/', 'images/optimise', $photo->url)}}"
                         class="img-thumbnail">
                </div>
            @endforeach

        </div>
    </div>

@endsection
