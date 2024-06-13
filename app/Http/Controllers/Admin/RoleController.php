<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\RoleDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateRoleRequest;
use App\Http\Requests\Admin\UpdateRoleRequest;
use App\Repositories\RoleRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Response;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends AppBaseController
{
    /** @var  RoleRepository */
    private $roleRepository;

    public function __construct(RoleRepository $roleRepo)
    {
        $this->roleRepository = $roleRepo;
    }

    /**
     * Display a listing of the Role.
     *
     * @param RoleDataTable $roleDataTable
     * @return Response
     */
    public function index(RoleDataTable $roleDataTable)
    {
        Gate::authorize('roles.read');
        return $roleDataTable->render('admin.roles.index');
    }

    /**
     * Show the form for creating a new Role.
     *
     * @return Response
     */
    public function create()
    {
        Gate::authorize('roles.create');
        $permissions = Permission::get();
        $permissions->tablepermissionhelper=\App\Models\Permission::groupingPermissions($permissions);
        return view('admin.roles.create', compact('permissions'));
    }

    /**
     * Store a newly created Role in storage.
     *
     * @param CreateRoleRequest $request
     *
     * @return Response
     */
    public function store(CreateRoleRequest $request)
    {
        Gate::authorize('roles.create');
        $input = $request->all();
        $role = Role::create($request->except('permissions'));
        $permissions = $request->input('permissions') ? array_keys($request->input('permissions')) : [];
        $role->givePermissionTo($permissions);

        return redirect(route('admin.roles.index'))->withSuccess('Role saved successfully.');
    }

    /**
     * Display the specified Role.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show(Role $role)
    {
        Gate::authorize('roles.read');
        $role->load('permissions');
        $role->permissions->tablepermissionhelper=\App\Models\Permission::groupingPermissions($role->permissions);

        if (empty($role)) {
            return redirect(route('admin.roles.index'))->withErrors('Role not found');
        }

        return view('admin.roles.show')->with('role', $role);
    }

    /**
     * Show the form for editing the specified Role.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit(Role $role)
    {
        Gate::authorize('roles.update');
        $permissions = Permission::get();
        $permissions->tablepermissionhelper=\App\Models\Permission::groupingPermissions($permissions);

        $role->load('permissions');
        $permission_active = $role->permissions->pluck('name')->toArray();
        if (empty($role)) {
            return redirect(route('admin.roles.index'))->withErrors('Role not found');
        }

        return view('admin.roles.edit', compact('role', 'permissions', 'permission_active'));
    }

    /**
     * Update the specified Role in storage.
     *
     * @param  int              $id
     * @param UpdateRoleRequest $request
     *
     * @return Response
     */
    public function update(Request $request, Role $role){
        Gate::authorize('roles.update');
        if (empty($role)) {
            return redirect(route('admin.roles.index'))->withErrors('Role not found');
        }
        $role->update($request->except('permission'));
        $permissions = $request->input('permissions') ? array_keys($request->input('permissions')) : [];
        $role->syncPermissions($permissions);
        return redirect(route('admin.roles.index'))->withSuccess('Role updated successfully.');
    }

    /**
     * Remove the specified Role from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy(Role $role)
    {
        Gate::authorize('roles.delete');
        if (empty($role)) {
            return redirect(route('admin.roles.index'))->withErrors('Role not found');
        }
        $role->delete();
        return redirect(route('admin.roles.index'))->withSuccess('Role deleted successfully.');
    }
}
