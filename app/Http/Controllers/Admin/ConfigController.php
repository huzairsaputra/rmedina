<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\Admin\ConfigDataTable;
use App\Http\Requests\Admin;
use App\Http\Requests\Admin\CreateConfigRequest;
use App\Http\Requests\Admin\UpdateConfigRequest;
use App\Repositories\ConfigRepository;
//use Flash;
use Illuminate\Support\Facades\Gate;
use App\Http\Controllers\AppBaseController;
use Response;

class ConfigController extends AppBaseController
{
    /** @var  ConfigRepository */
    private $configRepository;

    public function __construct(ConfigRepository $configRepo)
    {
        $this->configRepository = $configRepo;
    }

    /**
     * Display a listing of the Config.
     *
     * @param ConfigDataTable $configDataTable
     * @return Response
     */
    public function index(ConfigDataTable $configDataTable)
    {
        Gate::authorize('configs.read');
        return $configDataTable->render('admin.configs.index');
    }

    /**
     * Show the form for creating a new Config.
     *
     * @return Response
     */
    public function create()
    {
        Gate::authorize('configs.create');
        return view('admin.configs.create');
    }

    /**
     * Store a newly created Config in storage.
     *
     * @param CreateConfigRequest $request
     *
     * @return Response
     */
    public function store(CreateConfigRequest $request)
    {
        Gate::authorize('configs.create');
        $input = $request->all();

        $config = $this->configRepository->create($input);

        return redirect(route('admin.configs.index'))->withSuccess('Config saved successfully.');
    }

    /**
     * Display the specified Config.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        Gate::authorize('configs.read');
        $config = $this->configRepository->findOrFail($id);

        return view('admin.configs.show')->with('config', $config);
    }

    /**
     * Show the form for editing the specified Config.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        Gate::authorize('configs.update');
        $config = $this->configRepository->findOrFail($id);

        return view('admin.configs.edit')->with('config', $config);
    }

    /**
     * Update the specified Config in storage.
     *
     * @param  int              $id
     * @param UpdateConfigRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateConfigRequest $request)
    {
        Gate::authorize('configs.update');
        $config = $this->configRepository->findOrFail($id);

        $config = $this->configRepository->update($request->all(), $id);

        return redirect(route('admin.configs.index'))->withSuccess('Config updated successfully.');
    }

    /**
     * Remove the specified Config from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        Gate::authorize('configs.delete');
        $config = $this->configRepository->findOrFail($id);

        $this->configRepository->delete($id);

        return redirect(route('admin.configs.index'))->withSuccess('Config deleted successfully.');
    }
}
