@extends('layouts.master')

@section('content')
    <div class="row">
        <div class="col-lg-4">
            <div id="login" class="login">
                {{ ($errors->has('message')? $errors->first('message') : '') }}
                {{ Form::open(['route'=>'authentification']) }}
                <div class="form-group">{{ Form::label("username", "username") }}
                    {{ $errors->has('username') ? '<p>'.$errors->first('username').'</p>' : '' }}
                    <br>
                    {{ Form::text("username", Input::old("username"), ["placeholder" => "email"])}}</div>

                <div class="form-group">{{ Form::label("password", "Mot de passe") }}
                    <br>
                    {{ Form::password("password",["placeholder" =>"***********"])}}</div>
                <div class="form-group">
                    {{ Form::label("remember", "Se souvenir de moi") }}
                    {{ Form::checkbox("remember") }}</div>
                <div class="form-group">{{ Form::submit("login") }}</div>
                {{ Form::close()}}
            </div>
        </div>
    </div>
@stop