<?php

namespace App\DataTables;

use App\Models\Images;
use Form;
use Yajra\Datatables\Services\DataTable;

class ImagesDataTable extends DataTable
{

    /**
     * @return \Illuminate\Http\JsonResponse
     */
    public function ajax()
    {
        return $this->datatables
            ->eloquent($this->query())
            ->addColumn('action', 'models.images.datatables_actions')
            ->make(true);
    }

    /**
     * Get the query object to be processed by datatables.
     *
     * @return \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
     */
    public function query()
    {
        $images = Images::query();

        return $this->applyScopes($images);
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\Datatables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->columns($this->getColumns())
            ->addAction(['width' => '10%'])
            ->ajax('')
            ->parameters([
                'dom' => 'Bfrtip',
                'scrollX' => false,
                'buttons' => [
                    'print',
                    'reset',
                    'reload',
                    [
                         'extend'  => 'collection',
                         'text'    => '<i class="fa fa-download"></i> Export',
                         'buttons' => [
                             'csv',
                             'excel',
                             'pdf',
                         ],
                    ],
                    'colvis'
                ]
            ]);
    }

    /**
     * Get columns.
     *
     * @return array
     */
    private function getColumns()
    {
        return [
            'title' => ['name' => 'title', 'data' => 'title'],
            'description' => ['name' => 'description', 'data' => 'description'],
            'filepath' => ['name' => 'filepath', 'data' => 'filepath'],
            'container_type' => ['name' => 'container_type', 'data' => 'container_type'],
            'container_id' => ['name' => 'container_id', 'data' => 'container_id'],
            'form' => ['name' => 'form', 'data' => 'form'],
            'control_id' => ['name' => 'control_id', 'data' => 'control_id']
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'images';
    }
}
