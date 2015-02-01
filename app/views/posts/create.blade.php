@if (Session::has('flash_message'))
    <div class="alert alert-info">{{ Session::get('flash_message') }}</div>
@endif

{{Form::open(['route'=>'posts.store', 'method'=>'POST'])}}

<div>
    {{Form::label('title', 'give a title of aperitif')}}
    {{Form::text('title')}}
</div>
<div>
    {{Form::label('content', 'give a description of event')}}
    {{Form::textarea('content')}}
</div>

<div>
    {{Form::label('status', 'give a status publish or unpublish')}}
    <ul>
        <li>publish: {{Form::radio('status', 'publish')}}</li>
        <li>unpublish: {{Form::radio('status', 'unpublish')}}</li>
    </ul>
</div>

<div>{{Form::submit('submit')}}</div>

{{Form::close()}}