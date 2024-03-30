@extends('layout.base')

@section('title', config('app.name'))

@section('si', 2)

@section('name', $user->name)

@section('content')


<div class="content-wrapper">
    <div class="content">
        @foreach( $posts as $post )
            <div class="card card-outline card-info">
                <p> 
                    @php 

                    $user = \App\Models\User::find($post->user_id);

                    if( $user ){
                    
                    echo $user->username ;
                    }

                    else{
                    echo 'deleted user';
                    }

                    @endphp
                    <br>
                        {{$post->created_at}}
                    <br>
                        {{$post->content}}
                    <br>
                </p>
            </div>
        @endforeach
                    
    </div>
</div>

@endsection