@if(isset($blog))
    <h2>Edit article</h2>
    {!! Form::model($blog, ['method'=>'PUT', 'action'=>['Admin\BlogController@update', $blog->id],'class'=>'form-horizontal well', 'files'=>'true']) !!}
@else
    <h2>Create article</h2>
    {!! Form::open(['action'=>'Admin\BlogController@store','class'=>'form-horizontal well', 'files'=>'true']) !!}
@endif
<div class="form-group">
    {!! Form::label('title', 'Title', ['class'=>'control-label col-sm-1']) !!}
    <div class="col-sm-11">
        {!! Form::text('title', null, ['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('text', 'Text', ['class'=>'control-label col-sm-1']) !!}
    <div class="col-sm-11">
        {!! Form::textarea('text', null, ['class'=>'form-control']) !!}
    </div>
</div>
<div class="form-group">
    {!! Form::label('tags', 'Tags', ['class'=>'control-label col-sm-1']) !!}
    <div class="col-sm-11">
        @if(isset($blog))
            {!! Form::select('tags[]', $tags, $blog->tag_list, ['class'=>'form-control', 'multiple'=>'true']) !!}
        @else
            {!! Form::select('tags[]', $tags, null, ['class'=>'form-control', 'multiple'=>'true']) !!}
        @endif
    </div>
</div>
<div class="form-group">
    <div class="col-sm-11 col-sm-offset-1">
        {!! Form::file('image') !!}
    </div>
</div>
<div class="form-group">
    <div class="col-sm-11 col-sm-offset-1">
        {!! Form::submit('Сохранить', ['class'=>'btn btn-primary btn-block']) !!}
    </div>
</div>
{!! Form::close() !!}