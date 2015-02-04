@extends('layouts.master')

@section('content')
    @if(isset($posts))
        @foreach($posts as $post)
            <div class="clearfix">
                <h2><a href="">{{$post->title}}</a></h2>
                <br><samll>{{$post->date_created}}</samll>
                @if(isset($post->link_thumbnail))
                    <div class="thumbnail ">
                        <a href=""><img class="img-responsive" src="" alt=""></a>
                    </div>
                @endif
                <p></p>
                @if($post->user)
                    <p>auteur: <a href="{{url('user/'.$post->user->id)}}">{{$post->user->username}}</a></p>
                @endif
            </div>
        @endforeach
    @endif
@stop