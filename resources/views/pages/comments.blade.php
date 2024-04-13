@extends('layout.base')

@section('title', config('app.name'))

@section('name', $user->name)

@section('content')

@section('content')


    <div class="content-wrapper">
        <div class="content">

            <div class="card card-outline card-info">
                <p> 

                    @php 

                        $user = \App\Models\User::find($user->user_id);

                        if( $user ){

                        echo $user->username ;
                        }

                        else{
                        echo 'deleted user';
                        }

                    @endphp
                    <br>
                    {{$id->created_at}}
                    <br>
                    {{$id->content}}
                </p>
            </div>
            

            <form action="{{ route('comment',['id'=> $id->id]) }}">
                @csrf
                    <div class="card card-outline card-info">
                        <div class="mb-3">
                        <textarea name="comment" class="form-control" id="exampleFormControlTextarea1" placeholder="Write a comment" rows="3"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary col start">
                            <i class="fas fa-upload"></i>
                            <span>Post</span>
                        </button>
                    </div>
            </form>

            @foreach($comments as $comment)

                <div class="card card-outline card-info">
                    <p> 

                        {{$comment->comment}}

                    </p>
                </div>

            @endforeach
                        
        </div>
    </div>

@endsection
