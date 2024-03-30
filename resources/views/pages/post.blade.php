@extends('layout.base')

@section('title', config('app.name'))

@section('si', 1)

@section('name', $user->name)

@section('content')
    <form action="{{ route('post-upload') }}" method="post">

        @csrf
        <div class="content-wrapper">
            <div class="content">
            <div class="card card-outline card-info">
                <div class="card-header">
                    <h3 class="card-title">
                        Create a new post
                    </h3>
                </div>
                <div class="mb-3">
                  <textarea name="content" class="form-control" id="exampleFormControlTextarea1" placeholder="Write a post" rows="3"></textarea>
                </div>
                <button type="submit" class="btn btn-primary col start">
                    <i class="fas fa-upload"></i>
                    <span>Post</span>
                </button>
            </div>
            </div>
        </div>
    </form>
@endsection
