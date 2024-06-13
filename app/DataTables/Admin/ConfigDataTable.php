<?php

namespace App\DataTables\Admin;

use App\Models\Config;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;

class ConfigDataTable extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        $dataTable = new EloquentDataTable($query);

        return $dataTable->addColumn('action', 'admin.configs.datatables_actions');
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Config $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Config $model)
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
            ->dom('Bfrtip')
            ->addAction(['width' => '106px', 'printable' => false, 'exportable'=>false, 'class'=>'text-center'])
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
            Column::make('key'),
            Column::make('value')

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'configs_datatable_' . time();
    }
}
