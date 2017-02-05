<h2>Permission manager</h2>
{!! Form::open( ['action'=>'Admin\PermissionController@store','class'=>'form-horizontal']) !!}
<table class="table table-striped">
    <thead>
    <tr>
        <th>Привилегии</th>
        @foreach($roles as $role)
            <th>{{ $role->name }}</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($perms as $perm)
        <tr>
            <td>
                {!! $perm->name !!}
            </td>
            @foreach($roles as $role)
                <td>
                    @if($role->hasPermission($perm->name))
                        {{--{!! Form::checkbox('name', null, true) !!}--}}
                        <input type="checkbox" checked name="{{ $role->id }}[]" value="{{ $perm->id }}">
                    @else
                        {{--{!! Form::checkbox('name', null) !!}--}}
                        <input type="checkbox" name="{{ $role->id }}[]" value="{{ $perm->id }}">
                    @endif
                </td>
            @endforeach
        </tr>
    @endforeach
    </tbody>
</table>
<div class="form-group">
    {!! Form::submit('Сохранить измененния', ['class' => 'btn btn-primary btn-block']) !!}
</div>
{!! Form::close() !!}