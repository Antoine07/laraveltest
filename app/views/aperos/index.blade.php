<h2>View posts</h2>

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@if(!empty($posts))
    @foreach($posts as $post)

        <h2>Title: {{$post->title}}</h2>
        <div>{{$post->content}}</div>

    @endforeach

@else
    <p>désolé par d'apéros</p>
@endif