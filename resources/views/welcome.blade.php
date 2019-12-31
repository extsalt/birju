@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-md-3 mt-5">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5>Login</h5>
                    </div>

                    <div class="card-body">
                        <form action="/login" method="post">
                            @csrf

                            <div class="form-group">
                                <div class="col">
                                    <label for="Email">Email</label>
                                </div>
                                <div class="col">
                                    <input type="text" name="email" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col">
                                    <label for="Email">Password</label>
                                </div>

                                <div class="col">
                                    <input type="text" name="password" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary btn-block">Login</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col">
                <pre>
                URL    http://localhost:8000/posts
                </pre>

                <div>
                    Parameters
                    <pre>body, photo, app_id, app_secret</pre>
                </div>

                <div>
                    email: ganeshk.work@gmail.com
                    password: 123456
                </div>
            </div>
        </div>
    </div>

@endsection