<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Paths
    |--------------------------------------------------------------------------
    |
    */

    'path' => [
        'controller'        => app_path('Http/Controllers/Admin/'),//Admin, User, Super Admin

        'request'           => app_path('Http/Requests/Admin/'),

        'views'             => resource_path('views/'),//Admin, User, Super Admin

        'datatables'        => app_path('DataTables/Admin/'),

        'migration'         => database_path('migrations/'),

        'model'             => app_path('Models/'),

        'repository'        => app_path('Repositories/'),

        'routes'            => base_path('routes/web.php'),

        'api_routes'        => base_path('routes/api.php'),

        'api_request'       => app_path('Http/Requests/API/'),

        'api_controller'    => app_path('Http/Controllers/API/'),

        'repository_test'   => base_path('tests/Repositories/'),

        'api_test'          => base_path('tests/APIs/'),

        'tests'             => base_path('tests/'),

        'schema_files'      => resource_path('model_schemas/'),

        'templates_dir'     => resource_path('infyom/infyom-generator-templates/'),

        'seeder'            => database_path('seeds/'),

        'database_seeder'   => database_path('seeds/DatabaseSeeder.php'),

        'modelJs'           => resource_path('assets/js/models/'),

        'factory'           => database_path('factories/'),

        'view_provider'     => app_path('Providers/ViewServiceProvider.php'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Namespaces
    |--------------------------------------------------------------------------
    |
    */

    'namespace' => [
        'controller'        => 'App\Http\Controllers\Admin',//Admin, User, Super Admin

        'request'           => 'App\Http\Requests\Admin',

        'datatables'        => 'App\DataTables\Admin',

        'model'             => 'App\Models',

        'repository'        => 'App\Repositories',

        'api_controller'    => 'App\Http\Controllers\API',

        'api_request'       => 'App\Http\Requests\API',

        'repository_test'   => 'Tests\Repositories',

        'api_test'          => 'Tests\APIs',

        'tests'             => 'Tests',
    ],

    /*
    |--------------------------------------------------------------------------
    | Templates
    |--------------------------------------------------------------------------
    |
    */

    'templates'         => 'adminlte-templates',

    /*
    |--------------------------------------------------------------------------
    | Model extend class
    |--------------------------------------------------------------------------
    |
    */

    'model_extend_class' => 'Illuminate\Database\Eloquent\Model',

    /*
    |--------------------------------------------------------------------------
    | API routes prefix & version
    |--------------------------------------------------------------------------
    |
    */

    'api_prefix'  => 'api',

    'api_version' => 'v1',

    /*
    |--------------------------------------------------------------------------
    | Options
    |--------------------------------------------------------------------------
    |
    */

    'options' => [

        'softDelete' => true,

        'save_schema_file' => true,

        'localized' => false,

        'tables_searchable_default' => false,

        'repository_pattern' => true,

        'excluded_fields' => ['id'], // Array of columns that doesn't required while creating module
    ],

    /*
    |--------------------------------------------------------------------------
    | Prefixes
    |--------------------------------------------------------------------------
    |
    */

    'prefixes' => [

        'route' => 'admin',  // using admin will create route('admin.?.index') type routes. UNTUK API JANGAN LUPA DI HAPUS

        'path' => '',

        'view' => 'admin',  // using backend will create return view('backend.?.index') type the backend views directory

        'public' => '',
    ],

    /*
    |--------------------------------------------------------------------------
    | Add-Ons
    |--------------------------------------------------------------------------
    |
    */

    'add_on' => [

        'swagger'       => false,

        'tests'         => true,

        'datatables'    => false,

        'menu'          => [

            'enabled'       => true,

            'menu_file'     => 'layouts/menu.blade.php',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Timestamp Fields
    |--------------------------------------------------------------------------
    |
    */

    'timestamps' => [

        'enabled'       => true,

        'created_at'    => 'created_at',

        'updated_at'    => 'updated_at',

        'deleted_at'    => 'deleted_at',
    ],

    /*
    |--------------------------------------------------------------------------
    | Save model files to `App/Models` when use `--prefix`. see #208
    |--------------------------------------------------------------------------
    |
    */
    'ignore_model_prefix' => false,

    /*
    |--------------------------------------------------------------------------
    | Specify custom doctrine mappings as per your need
    |--------------------------------------------------------------------------
    |
    */
    'from_table' => [
        'doctrine_mappings' => [],
    ],

];
