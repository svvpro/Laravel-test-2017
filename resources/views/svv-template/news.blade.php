@if($news)
    <h2>News block</h2>
    @foreach($news as $news_item)
        <div class="row">
            <h2>{{ $news_item->title }}</h2>
            <p>{{ $news_item->desc }}</p>
        </div>
    @endforeach
@endif