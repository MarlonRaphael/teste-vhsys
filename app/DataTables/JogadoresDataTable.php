<?php

namespace App\DataTables;

use App\Models\Jogador;
use App\User;
use Yajra\DataTables\Services\DataTable;

class JogadoresDataTable extends DataTable
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
            ->addColumn('action', function ($jogador) {
                return view('admin.partials.actions')
                    ->with(['item' => $jogador]);
            })
            ->editColumn('id', function ($jogador){
                if ($jogador->has('media')) {
                    return "<img src='{$jogador->avatar}' width='50' height='50' 
                                alt='' class='rounded-circle shadow-sm'>";
                }
                return '';
            })
            ->editColumn('clube_id', function ($jogador){
                return $jogador->clube->nome;
            })
            ->editColumn('dt_nascimento', function ($jogador){
                return $jogador->dt_nascimento->format('d/m/Y');
            });
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Jogador $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Jogador $model)
    {
        return $model
            ->newQuery()
            ->select(
                'id',
                'nome',
                'apelido',
                'dt_nascimento',
                'posicao',
                'camisa',
                'nacionalidade',
                'clube_id',
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
            'dt_nascimento',
            'posicao',
            'camisa',
            'nacionalidade',
            'clube_id',
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
        return 'Jogadores_' . date('YmdHis');
    }
}
