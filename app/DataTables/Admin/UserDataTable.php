<?php

namespace App\DataTables\Admin;

use App\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class UserDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables()
            ->eloquent($query)
            ->editColumn('name', function ($query){
                return $query->name.' '.$query->last_name;
            })
            ->editColumn('active', function ($query){
                return $query->active?
                    "<a href='#' class='btn btn-success btn-circle btn-sm not-clickable'><i class='fas fa-check'></i></a>"
                    :
                    "<a href='#'  class='btn btn-danger btn-circle btn-sm not-clickable'><i class='fas fa-times'></i></a>";
            })
            ->addColumn('roles',  function ($query) {
                return $query->roles->map(function ($role) {
                    return "<span class='badge badge-info'>$role->name</span>";
                })->implode(' ');
            })
            ->addColumn('action', 'admin.users.datatables_actions')
            ->rawColumns(['action', 'roles', 'active'])
            ;
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\User $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
    {
        return $model->newQuery()->with('roles');
        /*return $model->newQuery()->with('category');*/
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
                    ->dom('Bfrtip')
                    ->orderBy(1)
                    ->buttons(
                        Button::make('pdf')->className('btn btn-default no-corner'),
                        Button::make('excel')->className('btn btn-default no-corner'),
                        Button::make('print')->className('btn btn-default no-corner'),
                        Button::make('reload')->className('btn btn-default no-corner'),
                        Button::make('reset')->className('btn btn-default no-corner')
                    );
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            Column::make('name'),
            Column::make('email'),
            Column::make('active'),
            Column::make('roles'),
            /*Column::make('category')->title('Category')->data('category.name')->data('category.name'),*/
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(106)
                ->addClass('text-center'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'User_' . date('YmdHis');
    }
}
