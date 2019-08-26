<?php

namespace App\DataTables;

use App\Models\Clube;
use Yajra\DataTables\Services\DataTable;

class ClubesDataTables extends DataTable
{
    /**
     * Build DataTable class.
     *
     * @param mixed $query Results from query() method.
     * @return \Yajra\DataTables\DataTableAbstract
     */
    public function dataTable($query)
    {
        return datatables($query)
            ->escapeColumns([])
            ->addColumn('action', function ($clube) {
                return view('admin.partials.actions')
                    ->with(['item' => $clube]);
            })
            ->editColumn('id', function ($clube){
                if ($clube->has('media')) {
                    return "<img src='{$clube->escudo_clube}' width='50' height='50' 
                                alt='' class='rounded-circle shadow-sm'>";
                }
                return '';
            })
            ->editColumn('fundacao', function ($clube){
                return $clube->fundacao->format('d/m/Y');
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Clube $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Clube $model)
    {
        return $model
            ->newQuery()
            ->select(
                'id',
                'nome',
                'apelido',
                'estadio',
                'fundacao',
                'created_at',
                'updated_at');
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
            ->colReorderRealtime(true)
            ->minifiedAjax()
            ->addAction(['width' => '80px'])
            ->parameters($this->getBuilderParameters());
    }

    /**
     * Get columns.
     *
     * @return array
     */
    protected function getColumns()
    {
        return [
            'id',
            'nome',
            'apelido',
            'estadio',
            'fundacao',
            'created_at',
            'updated_at'
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'ClubesDataTables_' . date('YmdHis');
    }
}
