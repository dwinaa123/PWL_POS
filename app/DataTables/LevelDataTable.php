<?php

namespace App\DataTables;

use App\Models\LevelModel;
use Illuminate\Database\Eloquent\Builder as QueryBuilder;
use Illuminate\Support\Facades\Route; // Tambahkan ini
use Illuminate\Support\Facades\URL; // Tambahkan ini
use Yajra\DataTables\EloquentDataTable;
use Yajra\DataTables\Html\Builder as HtmlBuilder;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Services\DataTable;

class LevelDataTable extends DataTable
{
    /**
     * Build the DataTable class.
     *
     * @param QueryBuilder $query Results from query() method.
     */
    public function dataTable(QueryBuilder $query): EloquentDataTable
    {
        return (new EloquentDataTable($query))
            ->addColumn('action', function ($level) {
                return '<a href="' . route('level.edit', ['id' => $level->level_id]) . '" class="btn btn-warning mr-2">
                        <i class="fas fa-edit" style="color: black; font-size: 12px;"></i>
                    </a>
                    <form method="POST" action="' . route('level.delete', ['id' => $level->level_id]) . '"  onsubmit="return confirm(\'Apakah Kamu Yakin Ingin Menghapus Data Ini?\');">
                        ' . csrf_field() . '
                        ' . method_field('GET') . '
                        <button type="submit" class="btn btn-danger mr-2">
                            <i class="fa fa-trash" style="color: black; font-size: 12px;"></i>
                        </button>
                    </form>
                </div>';
            })
            ->setRowId('id');
    }

    /**
     * Get the query source of dataTable.
     */
    public function query(LevelModel $model): QueryBuilder
    {
        return $model->newQuery()->orderBy('level_id', 'asc');
    }

    /**
     * Optional method if you want to use the html builder.
     */
    public function html(): HtmlBuilder
    {
        return $this->builder()
            ->setTableId('level-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            //->dom('Bfrtip')
            ->orderBy(1)
            ->selectStyleSingle()
            ->buttons([
                Button::make('excel'),
                Button::make('csv'),
                Button::make('pdf'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
            ]);
    }

    /**
     * Get the dataTable columns definition.
     */
    public function getColumns(): array
    {
        return [
            Column::make('level_id'),
            Column::make('level_kode'),
            Column::make('level_nama'),
            Column::make('created_at'),
            Column::make('updated_at'),
            Column::computed('action')
                ->exportable(false)
                ->printable(false)
                ->width(100)
                ->addClass('text-center'),

        ];
    }

    /**
     * Get the filename for export.
     */
    protected function filename(): string
    {
        return 'Level_' . date('YmdHis');
    }
}
