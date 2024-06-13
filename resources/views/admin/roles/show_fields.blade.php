{{--<!-- Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('id', 'Id:') !!}
    <p>{{ $role->id }}</p>
</div>

<!-- Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('name', 'Name:') !!}
    <p>{{ $role->name }}</p>
</div>

<!-- Guard Name Field -->
<div class="form-group col-sm-6">
    {!! Form::label('guard_name', 'Guard Name:') !!}
    <p>{{ $role->guard_name }}</p>
</div>

<!-- Created At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('created_at', 'Created At:') !!}
    <p>{{ $role->created_at }}</p>
</div>

<!-- Updated At Field -->
<div class="form-group col-sm-6">
    {!! Form::label('updated_at', 'Updated At:') !!}
    <p>{{ $role->updated_at }}</p>
</div>--}}

<div class="col-sm-6 text-center">
    <table class="table table-striped">
        <thead>
        <tr>
            <th> Id</th>
            <th>Role Name</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td>{{$role->id}}</td>
            <td>{{$role->name}}</td>
        </tr>
        </tbody>
    </table>
</div>

<div class="col-sm-12">
    <table class="table table-bordered table-striped">
        <div class="text-center text-uppercase font-weight-bold">Permissions Table</div>
        <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>.read</th>
            <th>.create</th>
            <th>.update</th>
            <th>.delete</th>
        </tr>
        </thead>
        <tbody>
        @php($i=1)
        @foreach($role->permissions->tablepermissionhelper as $key=>$value)
            <tr>
                <td>{{$i++}}.</td>
                <td>{{$key}}</td>
                <td>
                    <a href='#' class='btn {{$value['crud']['read']['active'] ? 'btn-success' : 'btn-danger'}}
                        btn-circle btn-sm not-clickable'>
                        <i class='fa {{$value['crud']['read']['active'] ? 'fa-check' : 'fa-times'}}'></i>
                    </a>
                </td>
                <td>
                    @if($value['isModule'])
                        <a href='#' class='btn {{$value['crud']['create']['active'] ? 'btn-success' : 'btn-danger'}}
                            btn-circle btn-sm not-clickable'>
                            <i class='fa {{$value['crud']['create']['active'] ? 'fa-check' : 'fa-times'}}'></i>
                        </a>
                    @endif
                </td>
                <td>
                    @if($value['isModule'])
                        <a href='#' class='btn {{$value['crud']['update']['active'] ? 'btn-success' : 'btn-danger'}}
                            btn-circle btn-sm not-clickable'>
                            <i class='fa {{$value['crud']['update']['active'] ? 'fa-check' : 'fa-times'}}'></i>
                        </a>
                    @endif
                </td>
                <td>
                    @if($value['isModule'])
                        <a href='#' class='btn {{$value['crud']['delete']['active'] ? 'btn-success' : 'btn-danger'}}
                            btn-circle btn-sm not-clickable'>
                            <i class='fa {{$value['crud']['delete']['active'] ? 'fa-check' : 'fa-times'}}'></i>
                        </a>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<div class="form-group col-sm-12">
    <a href="{{ route('admin.roles.index') }}" class="btn btn-default">Back</a>
</div>

