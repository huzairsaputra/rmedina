<!-- Name Field -->
<div class="form-group col-sm-6 text-center">
    {!! Form::label('name', 'Name:') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required'=>true]) !!}
    @error('name')
    <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<div class="col-sm-12">
    <div class="text-center text-uppercase font-weight-bold col-12">Permissions Table</div>
    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>No.</th>
            <th>Name</th>
            <th>read_</th>
            <th>create_</th>
            <th>update_</th>
            <th>delete_</th>
        </tr>
        </thead>
        <tbody>
        @php($i=1)
        @foreach($permissions->tablepermissionhelper as $key=>$value)
            <tr>
                <td>{{$i++}}.</td>
                <td>{{$key}}</td>
                <td>{{--read--}}
                    <label class="switch switch-label switch-3d switch-success">
                        <input name="{{'permissions['.$value['crud']['read']['name'].']'}}" class="switch-input" type="checkbox">
                        <span class="switch-slider"></span>
                    </label>
                </td>
                <td>{{--create--}}
                    @if($value['isModule'])
                        <label class="switch switch-label switch-3d switch-success">
                            <input name="{{'permissions['.$value['crud']['create']['name'].']'}}" class="switch-input" type="checkbox">
                            <span class="switch-slider"></span>
                        </label>
                    @endif
                </td>
                <td>{{--update--}}
                    @if($value['isModule'])
                        <label class="switch switch-label switch-3d switch-success">
                            <input name="{{'permissions['.$value['crud']['update']['name'].']'}}" class="switch-input" type="checkbox">
                            <span class="switch-slider"></span>
                        </label>
                    @endif
                </td>
                <td>{{--delete--}}
                    @if($value['isModule'])
                        <label class="switch switch-label switch-3d switch-success">
                            <input name="{{'permissions['.$value['crud']['delete']['name'].']'}}" class="switch-input" type="checkbox">
                            <span class="switch-slider"></span>
                        </label>
                    @endif
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{{ route('admin.roles.index') }}" class="btn btn-default">Cancel</a>
</div>
