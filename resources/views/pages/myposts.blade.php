@extends('layout.base')

@section('title', config('app.name'))

@section('si', 3)

@section('name', $user->name)

@section('content')

<div class="content-wrapper">
        <div class="content">
            @foreach( $posts as $post )

                @if( $user->id == $post->user_id )
                    <div class="card card-outline card-info">
                        <p>
                            @php
                                echo $user->username ;
                                echo '<br>';
                                echo $post->created_at ;
                                echo '<br>';
                                echo $post->content ;
                            @endphp
                            <a href="{{ route('comment', ['id' => $post->id]) }}" class="nav-link">
                                <i class="fas fa-comment"></i>
                                Comment
                            </a>
                        </p>
                    </div>
                        
                @endif           
                        
            @endforeach
                        
        </div>
    </div>

@endsection