<?php

namespace App\DataTables\Admin;

use App\Helpers\ActionHelper;
use App\Models\Role;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;

class RoleDataTable extends DataTable
{
    private $actionHelper;

    public function __construct(ActionHelper $actionHelper){
        $this->actionHelper = $actionHelper;
    }
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable
            ->addColumn('permission', function ($roles) {
                $return = '';
                $i = 1;
                foreach ($roles->permissions as $permission){
                    $splittedCrud = explode('.', $permission->name);
                    $warnaClass = $this->actionHelper->getColorClass(end($splittedCrud));
                    $return.="<span class='badge badge-$warnaClass'>$permission->name</span> ";
                    if (++$i > 15) break;
                }
                return $return;
            })
            ->addColumn('action', 'admin.roles.datatables_actions')
            ->rawColumns(['action', 'permission'])
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Role $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Role $model)
    {
        return $model->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->addAction(['width' => '106px', 'printable' => false, 'exportable'=>false, 'class'=>'text-center'])
            ->parameters([
                'dom'       => 'Bfrtip',
                'stateSave' => true,
                'order'     => [[0, 'desc']],
                'buttons'   => [
                    ['extend' => 'pdf', 'className' => 'btn btn-default no-corner',],
                    ['extend' => 'excel', 'className' => 'btn btn-default no-corner',],
                    ['extend' => 'print', 'className' => 'btn btn-default no-corner',],
                    ['extend' => 'reload', 'className' => 'btn btn-default no-corner',],
                    ['extend' => 'reset', 'className' => 'btn btn-default no-corner',],
                ],
            ])
            ;
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'name',
            'permission'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'roles_datatable_' . time();
    }
}
