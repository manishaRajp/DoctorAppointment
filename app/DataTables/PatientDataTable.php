<?php

namespace App\DataTables;

use App\Models\Patient;
use App\Models\User;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class PatientDataTable extends DataTable
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
            ->editColumn('image', function ($data) {
                return '<img src="' . asset('storage/PatientImage/' . $data->image) . '" class="img-thumbnail"
                   width="50%"></img>';
            })
            ->addColumn('action', function ($data) {
                return
                    '<br><a href="' . route("admin.patient.edit", $data->id) . '"class="btn btn-outline-info"><i class="fa fa-pencil"></i></a>
                     <button type="button" id="delete_patient" data-id= "' . $data->id . '"class="btn btn-outline-danger"><i class="fa fa-trash"></i></button>
                    ';
            })
            ->rawColumns(['image','action'])
             ->addIndexColumn();

    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Patient $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(User $model)
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
            ->setTableId('patient-table')
            ->columns($this->getColumns())
            ->minifiedAjax()
            ->dom('Blfrtip')
            ->orderBy(1)
            ->buttons(
                Button::make('create'),
                Button::make('export'),
                Button::make('print'),
                Button::make('reset'),
                Button::make('reload')
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
            Column::make('id')->data('DT_RowIndex')->orderable(false)->title('Sr.no'),
            Column::make('name'),
            Column::make('email'),
            Column::make('address'),
            Column::make('phone_number'),
            Column::make('gender'),
            Column::make('image'),
            Column::make('action'),
        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Patient_' . date('YmdHis');
    }
}
