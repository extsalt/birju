@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-md-3 mt-5">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5>Create Post</h5>
                    </div>

                    <div class="card-body">
                        <form action="/posts" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="form-group">
                                <div class="col">
                                    <label for="Email">Content</label>
                                </div>
                                <div class="col">
                                    <input type="text" name="body" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col">
                                    <label for="Email">App ID</label>
                                </div>
                                <div class="col">
                                    <input type="text" name="app_id" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col">
                                    <label for="Email">App Secret</label>
                                </div>
                                <div class="col">
                                    <input type="text" name="app_secret" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col">
                                    <label for="Email">Photo</label>
                                </div>
                                <div class="col">
                                    <input type="file" name="photo" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary btn-block">Register</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection