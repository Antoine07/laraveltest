<h2>View posts</h2>

@if (Session::has('message'))
    <div class="alert alert-info">{{ Session::get('message') }}</div>
@endif

@if(!empty($posts))
    @foreach($posts as $post)

        <h2>Title: {{$post->title}}</h2>
        <div>{{$post->content}}</div>

    @endforeach
    <ul class="tasks">
        <li>voir la boutique</li>
        <li>voir la tour Eifel</li>
        <li>aller se coucher</li>
    </ul>
@else
    <p>désolé par d'article</p>
@endif