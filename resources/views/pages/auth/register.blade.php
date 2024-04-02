@extends('layout.app')

@section('title', config('app.name'))
@section('content')


    <div class="wrapper">
        <div class="login-page">
            <div class="login-box">
                <div class="card shadow">
                    <div class="card-body">
                        <h1 class="text-center"><strong>{{ config('app.name') }}</strong></h1>
                        <form action="{{ route('auth') }}" method="post">
                        @csrf
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Your Full Name">
                                </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control" id="email" placeholder="Enter Your Email">
                            </div>
                            <div class="form-group">
                                <input type="password" name="password" class="form-control" id="password" placeholder="Enter Password">
                                
                            </div>
                            <div class="form-group">
                                <input type="text" name="username" class="form-control" id="username" placeholder="Enter Username">
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-outline-primary btn-block">Sign up</button>
                            </div>
                        </form>
                        <p class="text-center" >
                            Already have an account?<a href="{{ route('login') }}">Login</a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
