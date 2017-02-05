@if($articles)
    @foreach($articles as $article)
        <a href="{{ route('articles.show', $article->id) }}"><div class="row">{{ $article->title }}</div></a>
    @endforeach
@endif