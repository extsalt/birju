@extends('layout')

@section('content')
    @include('component.navbar')

    <div class="container">
        <div class="row">
            <div class="offset-md-2 col-md-4 mt-2">
                <form method="post" action="/apps" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group">
                        <label for="exampleInputEmail1">App Name</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name">

                        @error('name')
                        <p class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </p>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="photo">Choose file</label>

                        <input type="file" class="@error('photo') is-invalid @enderror"
                               name="photo" id="photo">

                        @error('photo')
                        <p class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </p>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create App</button>
                </form>
            </div>
        </div>

        <div class="row">
            @foreach(\App\App::query()->latest()->get() as $app)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{ $app->photo }}" width="80" height="80"> <span>{{ $app->name }}</span>

                            @if($app->active === 'yes')
                                <span class="badge badge-success">Active</span>
                            @else
                                <span class="badge badge-warning">Blocked</span>
                            @endif

                            <div>
                                <small class="">
                                    <strong>App Secret</strong>
                                    {{ $app->app_secret }}
                                </small>
                                <br>

                                <small class="">
                                    <strong>App ID</strong> :
                                    {{ $app->app_id }}
                                </small>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
@endsection