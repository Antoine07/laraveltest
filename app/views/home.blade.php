@if(!empty($posts))
    @foreach($posts as $post)

        <h2>{{$post->title}}</h2>

    @endforeach
@else
    <p>désolé pas d'article</p>
@endif