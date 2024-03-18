@extends('layout.app')

@section('title', config('app.name'))
@section('content')


<div class="wrapper">
    <div class="login-page">
        <div class="login-box">
            <div class="card shadow">
                <div class="card-body">
                    <h1 class="text-center"><strong>{{ config('app.name') }}</strong></h1> 
                    <form action="{{ route('log-in') }}" method="post">
                    @csrf
                        <div class="form-group">
                            <label for="email">Enter your email</label>
                            <input type="email" name="email" class="form-control" id="email" placeholder="Enter email" required>
                        </div>
                        <div class="form-group">
                            <label for="amount">Enter your password</label>
                            <input type="password" name="password" class="form-control" id="password" placeholder="Enter password" required>
                        </div>
                        <p class="text-center">
                            <a href="#">Forget Password?</a>
                        </p>
                        <div class="form-group">
                            <button type="submit" class="btn btn-outline-primary btn-block">Login</button>
                        </div>
                    </form>
                    <p class="text-center" >
                        Don't have an account?<a href="{{ route('register') }}">Sign up</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
    
@endsection