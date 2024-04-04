@extends('layout.base')

@section('title', config('app.name'))

@section('si', 3)

@section('name', $user->name)

@section('content')

<div class="content-wrapper">
        <div class="content">
            @foreach( $posts as $post )
                <div class="card card-outline card-info">
                    <p> 
                        <?php
                            if( $user->id == $post->user_id ) {
                                echo $user->username ;
                                echo '<br>';
                                echo $post->created_at ;
                                echo '<br>';
                                echo $post->content ;
                            }
                        ?>
                    </p>
                </div>
            @endforeach
                        
        </div>
    </div>

@endsection