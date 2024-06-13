<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\UserDataTable;
use App\Http\Requests\CreateUserRequest;
use App\Http\Requests\UpdateUserRequest;
use App\Repositories\UserRepository;
use App\Http\Controllers\AppBaseController;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Response;
use Hash;
use App\Models\Role;

class UserController extends AppBaseController
{
    /** @var $userRepository UserRepository */
    private $userRepository;

    public function __construct(UserRepository $userRepo)
    {
        $this->userRepository = $userRepo;
    }

    /**
     * Display a listing of the User.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(UserDataTable $userDataTable){
        Gate::authorize('users.read');
        return $userDataTable->render('admin.users.index');
    }

    /**
     * Show the form for creating a new User.
     *
     * @return Response
     */
    public function create()
    {
        Gate::authorize('users.create');
        $roles = Role::pluck('name', 'name')->forget(Role::SUPER_ADMIN);
        return view('admin.users.create', compact('roles'));
    }

    /**
     * Store a newly created User in storage.
     *
     * @param CreateUserRequest $request
     *
     * @return Response
     */
    public function store(CreateUserRequest $request)
    {
        Gate::authorize('users.create');
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $input['active'] = $request->active ? User::ACTIVE : User::NON_ACTIVE;
        $user = $this->userRepository->create($input);
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->syncRoles($roles);

        return redirect(route('admin.users.index'))->withSuccess('User saved successfully.');
    }

    /**
     * Display the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        Gate::authorize('users.read');
        $user = $this->userRepository->findOrFail($id);

        return view('admin.users.show')->with('user', $user);
    }

    /**
     * Show the form for editing the specified User.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        Gate::authorize('users.update');
        $user = $this->userRepository->findOrFail($id);
        $roles = Role::pluck('name', 'name')->forget(Role::SUPER_ADMIN);


        return view('admin.users.edit', compact('roles'))->with('user', $user);
    }

    /**
     * Update the specified User in storage.
     *
     * @param int $id
     * @param UpdateUserRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateUserRequest $request)
    {
        Gate::authorize('users.update');
        $user = $this->userRepository->findOrFail($id);

        $input =  $request->all();
        $input['active'] = $request->active ? User::ACTIVE : User::NON_ACTIVE;
        if (!empty($input['password']))
            $input['password'] = Hash::make($input['password']);
        else
            unset($input['password']);
        $user = $this->userRepository->update($input, $id);
        $roles = $request->input('roles') ? $request->input('roles') : [];
        $user->syncRoles($roles);

        return redirect(route('admin.users.index'))->withSuccess('User updated successfully.');
    }

    /**
     * Remove the specified User from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        Gate::authorize('users.delete');
        $user = $this->userRepository->findOrFail($id);

        $this->userRepository->delete($id);

        return redirect(route('admin.users.index'))->withSuccess('User deleted successfully.');
    }
}
