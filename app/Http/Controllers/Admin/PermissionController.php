<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\PermissionDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreatePermissionRequest;
use App\Http\Requests\Admin\UpdatePermissionRequest;
use App\Models\Permission;
use App\Models\Role;
use App\Repositories\PermissionRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Gate;
use Response;

class PermissionController extends AppBaseController
{
    /** @var  PermissionRepository */
    private $permissionRepository;

    public function __construct(PermissionRepository $permissionRepo)
    {
        $this->permissionRepository = $permissionRepo;
    }

    /**
     * Display a listing of the Permission.
     *
     * @param PermissionDataTable $permissionDataTable
     * @return Response
     */
    public function index(PermissionDataTable $permissionDataTable)
    {
        Gate::authorize('permissions.read');
        return $permissionDataTable->render('admin.permissions.index');
    }

    /**
     * Show the form for creating a new Permission.
     *
     * @return Response
     */
    public function create()
    {
        Gate::authorize('permissions.create');
        return view('admin.permissions.create');
    }

    /**
     * Store a newly created Permission in storage.
     *
     * @param CreatePermissionRequest $request
     *
     * @return Response
     */
    public function store(CreatePermissionRequest $request)
    {
        Gate::authorize('permissions.create');
        $role = Role::findByName(Role::SUPER_ADMIN);
        $permissions = Permission::create($request->all());
        $role->givePermissionTo($permissions);

        return redirect(route('admin.permissions.index'))->withSuccess('Permission saved successfully.');
    }

    /**
     * Display the specified Permission.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        Gate::authorize('permissions.read');
        $permission = $this->permissionRepository->findOrFail($id);
        return view('admin.permissions.show')->with('permission', $permission);
    }

    /**
     * Show the form for editing the specified Permission.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        Gate::authorize('permissions.update');
        $permission = $this->permissionRepository->findOrFail($id);

        return view('admin.permissions.edit')->with('permission', $permission);
    }

    /**
     * Update the specified Permission in storage.
     *
     * @param  int              $id
     * @param UpdatePermissionRequest $request
     *
     * @return Response
     */
    public function update(Permission $permission, UpdatePermissionRequest $request)
    {
        Gate::authorize('permissions.update');
        $permission->update($request->all());
        return redirect(route('admin.permissions.index'))->withSuccess('Permission updated successfully.');
    }

    /**
     * Remove the specified Permission from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy(Permission $permission)
    {
        Gate::authorize('permissions.delete');
        $permission->delete();
        return redirect(route('admin.permissions.index'))->withSuccess('Permission deleted successfully.');
    }

    public function createComplex(){
        Gate::authorize('permissions.create');
        return view('admin.permissions.create_complex');
    }

    public function storeComplex(CreatePermissionRequest $request){
        Gate::authorize('permissions.create');
        $isResource = empty($request->check_resource) ? '' : '--resource';

        //Pengecekan sudah ada atau belum
        if (Permission::where('name', $request->name)
            ->orWhere('name', $request->name.'.create')->orWhere('name', $request->name.'.read')
            ->orWhere('name', $request->name.'.update')->orWhere('name', $request->name.'.delete')
            ->exists())
            return redirect()->back()->withErrors(['name'=>'Permission already exists']);
        //Pengecekan ada yang di centang atau enggak
        if (empty($request->check_crud) && empty($request->check_controller) && empty($request->check_view) && empty($request->check_model))
            return redirect()->route('admin.permissions.index')->withErrors('No permission added');
        //Tambah CRUD
        if (!empty($request->check_crud)){
            $role = Role::findByName(Role::SUPER_ADMIN);
            foreach ($request->get('crud') as $crudItem) {
                $permissions = Permission::create(['name' => $crudItem]);
                $role->givePermissionTo($permissions);
            }
            app()->make(\Spatie\Permission\PermissionRegistrar::class)->forgetCachedPermissions();
        }

        if (!empty($request->check_controller))
            Artisan::call("make:controller $request->name_controller $isResource");
        if (!empty($request->check_view))
            Artisan::call("make:view $request->name_view $isResource");
        if (!empty($request->check_model))
            Artisan::call("make:model $request->name_model");

        return redirect()->route('admin.permissions.index')->withSuccess('Permission added');
    }
}
