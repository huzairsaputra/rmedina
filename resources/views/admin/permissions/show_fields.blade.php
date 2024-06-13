<table class="table table-bordered table-striped">
    <tbody>
    <tr>
        <th>
            Id
        </th>
        <td>
            {{ $permission->id }}
        </td>
    </tr>
    <tr>
        <th>
            Name
        </th>
        <td>
            {{ $permission->name }}
        </td>
    </tr>
    <tr>
        <th>
            Guard Name
        </th>
        <td>
            {{ $permission->guard_name }}
        </td>
    </tr>
    <tr>
        <th>
            Created At
        </th>
        <td>
            {{ $permission->created_at }}
        </td>
    </tr>
    <tr>
        <th>
            Updated At
        </th>
        <td>
            {{ $permission->updated_at }}
        </td>
    </tr>
    </tbody>
</table>

{{--<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $permission->id }}</p>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $permission->name }}</p>
</div>

<!-- Guard Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('guard_name', 'Guard Name:') !!}
    <p>{{ $permission->guard_name }}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $permission->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $permission->updated_at }}</p>
</div>

<div class="col-sm-12">
    <a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
        Back
    </a>
</div>--}}

