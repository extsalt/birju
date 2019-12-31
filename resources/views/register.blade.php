@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5 offset-md-3 mt-5">
                <div class="card">
                    <div class="card-header bg-primary text-white">
                        <h5>Register</h5>
                    </div>

                    <div class="card-body">
                        <form action="/register" method="post">
                            @csrf

                            <div class="form-group">
                                <div class="col">
                                    <label for="Email">Name</label>
                                </div>
                                <div class="col">
                                    <input type="text" name="name" class="form-control">
                                </div>
                            </div>

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