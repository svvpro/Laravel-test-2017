
<div class="row">
    <h2>Articles block</h2>
    @if($articles)
        @foreach($articles as $article)
            <div class="row">
                <h4>{{ $article->title }}</h4>
            </div>
        @endforeach
    @endif
</div>