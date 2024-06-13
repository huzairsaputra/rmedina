<table class="table table-bordered table-striped">
    <tbody>
    <tr>
        <th>
            Id
        </th>
        <td>
            {{ $user->id }}
        </td>
    </tr>
    <tr>
        <th>
            Name
        </th>
        <td>
            {{ $user->name }}
        </td>
    </tr>
    <tr>
        <th>
            Last Name
        </th>
        <td>
            {{ $user->last_name }}
        </td>
    </tr>
    <tr>
        <th>
            Email
        </th>
        <td>
            {{ $user->email }}
        </td>
    </tr>
    <tr>
        <th>
            Roles
        </th>
        <td>
            @foreach($user->roles()->pluck('name') as $role)
                <span class="badge badge-info">{{ $role }}</span>
            @endforeach
        </td>
    </tr>
    <tr>
        <th>
            Active
        </th>
        <td>
            {!! $user->active ? "<span class='badge badge-success'>Active</span>": "<span class='badge badge-danger'>Non Active</span>" !!}
        </td>
    </tr>
    <tr>
        <th>
            Created At
        </th>
        <td>
            {{ $user->created_at }}
        </td>
    </tr>
    <tr>
        <th>
            Updated At
        </th>
        <td>
            {{ $user->updated_at }}
        </td>
    </tr>
    </tbody>
</table>
<a style="margin-top:20px;" class="btn btn-default" href="{{ url()->previous() }}">
    Back
</a>
