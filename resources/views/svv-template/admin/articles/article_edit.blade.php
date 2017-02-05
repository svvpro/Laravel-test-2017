<h2>Edit form</h2>
{{--{{ route('articles.update', $article->id) }}--}}
<form action="{{ route('articles.update', $article) }}" method="post">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" value="{{ $article->title }}" name="title" class="form-control">
    </div>
    <div class="form-group">
        <label for="title">Text</label>
        <textarea type="text" name="text"  class="form-control"> {{ $article->text }}</textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Создать статью" class="btn bg-primary">
    </div>
</form>