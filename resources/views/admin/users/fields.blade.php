<!-- Name Field -->
<div class="form-group col-6">
    {!! Form::label('name', 'Name *') !!}
    {!! Form::text('name', null, ['class' => 'form-control', 'required' => true]) !!}
    @error('name')
    <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<!-- Last Name Field -->
<div class="form-group col-6">
    {!! Form::label('last_name', 'Last Name') !!}
    {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
    @error('last_name')
    <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<!-- Email Field -->
<div class="form-group col-6">
    {!! Form::label('email', 'Email *') !!}
    {!! Form::email('email', null, ['class' => 'form-control', 'required' => true]) !!}
    @error('email')
    <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<div class="form-group col-6">
    <label for="roles">Roles *
        <span class="btn btn-info btn-sm select-all">{{ trans('Select All') }}</span>
        <span class="btn btn-info btn-sm deselect-all">{{ trans('Deselect All') }}</span></label>

    <select name="roles[]" id="roles" class="form-control select2" multiple="multiple" required>
        @foreach($roles as $id => $roles)
            <option value="{{ $id }}" {{ (in_array($id, old('roles', [])) || isset($user) && $user->roles()->pluck('name', 'id')->contains($id)) ? 'selected' : '' }}>{{ $roles }}</option>
        @endforeach
    </select>
    @error('roles')
    <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<!-- Password Field -->
<div class="form-group col-6">
    {!! Form::label('password', 'Password') !!}
    {!! Form::password('password', ['class' => 'form-control']) !!}
    @error('password')
    <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<!-- Confirmation Password Field -->
<div class="form-group col-6">
    {!! Form::label('password', 'Password Confirmation') !!}
    {!! Form::password('password_confirmation', ['class' => 'form-control']) !!}
    @error('password_confirmation')
    <div class="text-danger small">{{ $message }}</div>
    @enderror
</div>

<div class="col-sm-6">
    <div class="form-group">
        <label for="Active">{{ __('Active') }}</label><br>
        <label class="switch switch-label switch-pill switch-success">
            <input name="active" class="switch-input" type="checkbox" {{isset($user->active)?($user->active==1?'checked':''):'checked'}}><span class="switch-slider" data-checked="On" data-unchecked="Off"></span>
        </label>
    </div>
</div>

<!-- Submit Field -->
<div class="form-group col-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('admin.users.index') !!}" class="btn btn-default">Cancel</a>
</div>
