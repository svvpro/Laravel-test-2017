<h2>Blog list</h2>
@if($blogs)
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Title</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($blogs as $blog)
            <tr>
                <td>{{ $blog->title }}</td>
                <td>{{ link_to_action('Admin\BlogController@edit', 'Edit', $blog->id, ['class'=>'btn btn-warning']) }}</td>
                <td>
                    {!! Form::open(['method'=>'DELETE', 'action'=>['Admin\BlogController@destroy', $blog->id]]) !!}
                        {!! Form::submit('Delete', ['class'=>'btn btn-danger']) !!}
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endif