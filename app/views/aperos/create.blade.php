@extends('layouts.master')

@section('content')
    @if (Session::has('message'))
        <div class="alert alert-info">{{ Session::get('message') }}</div>
    @endif
    <h2 class="adminapero">Welcome to admin apero, hello</h2>
    <div class="row">
        <div class="col-lg-6">
            {{Form::open(['url'=>'aperos', 'method'=>'POST', 'file' => true])}}

            <div class="form-group">
                {{Form::label('title', 'give a title of aperitif')}}
                {{Form::text('title')}}
                {{ isset($errors) ? '<p>'.$errors->first('title').'</p>' : '' }}

            </div>
            <div class="form-group">
                {{Form::label('email', 'give a email')}}
                {{Form::email('email')}}
                {{ isset($errors) ? '<p>'.$errors->first('email').'</p>' : '' }}
            </div>

            <div class="form-group">
                {{Form::label('date', 'give a date')}}
                {{Form::text('date')}}
                {{ isset($errors) ? '<p>'.$errors->first('date').'</p>' : '' }}
            </div>
            <div class="form-group">
                {{Form::label('content', 'give a description of event')}}
                {{Form::textarea('content')}}
            </div>

            @if(!empty($options))
                <div class="form-group">
                    {{Form::label('tags', 'tags')}}

                    {{Form::select('tag_id', $options)}}
                </div>
            @endif

            <div class="form-group">
                {{Form::label('status', 'give a status publish or unpublish')}}
                <ul>
                    <li>publish: {{Form::radio('status', 'publish')}}</li>
                    <li>unpublish: {{Form::radio('status', 'unpublish')}}</li>
                </ul>
            </div>

            <div class="form-group">{{Form::submit('submit')}}</div>

        </div>
        <div class="col-lg-6">
            @if(empty($post->link_thumbnail))
                <div class="form-group">
                    {{Form::label('thumbnail', 'thumbnail')}}
                    {{Form::file('thumbnail', ['class'=>'btn'])}}
                    {{ ($errors->has('thumbnail')) ? '<p>'.$errors->first('thumbnail').'</p>' : '' }}
                </div>
            @else
                <div class="form-group">
                    <h2>{{trans('blog.deleteimage')}}</h2>
                    <img src="{{url('./assets/images/'.$post->link_thumbnail)}}" width="90">
                    {{Form::hidden('deletethumbnail', $post->link_thumbnail )}}
                    {{Form::file('thumbnail', ['class'=>'btn'])}}
                    {{ ($errors->has('thumbnail')) ? '<p>'.$errors->first('thumbnail').'</p>' : '' }}
                </div>
            @endif
        </div>
    </div>
    {{Form::close()}}

@stop