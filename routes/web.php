<?php

use App\Models\Config;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\PersonalController;
use Illuminate\Support\Facades\View;
use InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController;
use App\Http\Controllers\BaseController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ConfigController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//Log : log-viewer
Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true, 'register'=>false]);

//Generator
if (config('app.env') !== 'production'){
    Route::group(['middleware' => ['auth', 'role:SuperAdmin']], function () {
        Route::get('generator_builder', [GeneratorBuilderController::class, 'builder'])->name('io_generator_builder');
        Route::get('field_template', [GeneratorBuilderController::class, 'fieldTemplate'])->name('io_field_template');
        Route::get('relation_field_template', [GeneratorBuilderController::class, 'relationFieldTemplate'])->name('io_relation_field_template');
        Route::post('generator_builder/generate', [GeneratorBuilderController::class, 'generate'])->name('io_generator_builder_generate');
        Route::post('generator_builder/rollback', [GeneratorBuilderController::class, 'rollback'])->name('io_generator_builder_rollback');
        Route::post(
            'generator_builder/generate-from-file',
            [GeneratorBuilderController::class, 'generateFromFile']
        )->name('io_generator_builder_generate_from_file');
    });
}

//Profile, About
Route::group(['middleware' => ['auth'], 'prefix'=>'admin', 'as'=>'admin.'], function () {
    Route::get('home', [HomeController::class, 'index'])->name('home');
    Route::get('profile/index', [PersonalController::class, 'index'])->name('profile');
    Route::put('profile/update', [PersonalController::class, 'update'])->name('profile.update');
    Route::post('profile/change_password', [PersonalController::class, 'changePassword'])->name('profile.change_password');
    Route::post('profile/update_avatar', [PersonalController::class, 'updateAvatar'])->name('profile.update_avatar');
});

//Route::get('admin/profile/{path}/{filename}', [BaseController::class, 'showPhoto'])->name('admin.profile.avatar');
Route::get('admin/image/{path}/{filename}', [BaseController::class, 'showPhoto'])->name('admin.image');
Route::get('admin/file/{path}/{filename}', [BaseController::class, 'previewFile'])->name('admin.file');

//Route yang punya admin pindah kesini
Route::group(['middleware' => ['auth']], function () {
    Route::group(['prefix' => 'admin'], function () {
        Route::get('permissions/create_complex', [PermissionController::class, 'createComplex'])->name('admin.permissions.create_complex');
        Route::post('permissions/store_complex', [PermissionController::class, 'storeComplex'])->name('admin.permissions.store_complex');
        Route::resource('permissions', PermissionController::class, ["as" => 'admin']);
    });
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('roles', RoleController::class, ["as" => 'admin']);
    });
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('users', UserController::class, ["as" => 'admin']);
    });
    Route::group(['prefix' => 'admin'], function () {
        Route::resource('configs', ConfigController::class, ["as" => 'admin']);
    });
});
