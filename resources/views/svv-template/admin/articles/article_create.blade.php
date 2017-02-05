
<form action="{{ route('articles.store')}}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" name="title" value="{!! old('title') !!}" class="form-control">
    </div>
    <div class="form-group">
        <label for="title">Selection</label>

        {!! Form::open()!!}
        {!! Form::select('tags[]', $tags , null , ['class' => 'form-control', 'multiple'=>'true']) !!}
        {!! Form::close() !!}

    </div>
    <div class="form-group">
        <label for="title">Text</label>
        <textarea type="text" name="text" class="form-control"> </textarea>
    </div>
    <div class="form-group">
        <input type="submit" value="Создать статью" class="btn bg-primary">
    </div>
</form>