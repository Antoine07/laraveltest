@extends('layouts.master')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <div class="row">
        <div class="col-lg-6">
            <h2>Bienvue sur la page des apéros</h2>
            @if(!empty($posts))
                @foreach($posts as $post)
                    <h2>Title: {{$post->title}}</h2>
                    <div>{{$post->content}}</div>
                @endforeach
            @else
                <p>désolé par d'apéros</p>
            @endif
        </div>
    </div>
@stop