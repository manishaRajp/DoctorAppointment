<?php

namespace App\DataTables;

use App\Models\Appoinment;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class AppoinmentsDataTable extends DataTable
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
            ->editColumn('status', function ($data) {
                if ($data->status == 0) {
                    return '<a data-id="' . $data->id . '"  class="btn-sm btn btn-info status">Pending</a>';
                } elseif ($data->status == 1) {
                    return '<a data-id="' . $data->id . '"   class="btn-sm btn btn-success status">Confirm</a>';
                } else {
                    return '<a data-id="' . $data->id . '"  class="btn-sm  btn btn-warning  status">Reject</a>';
                }
            })

            ->editColumn('doctor_id', function ($data) {
                return $data->doctor->name;
            })
            ->editColumn('user_id', function ($data) {
                return $data->user->name;
            })
            ->editColumn('date', function ($data) {
                return $data->date;
            })
            ->filterColumn('doctor_id', function ($data, $keyword) {
                $sql = "doctors.name like ?";
                $data->whereRaw($sql, ["%{$keyword}%"]);
            })
            ->rawColumns(['status','doctor_id', 'user_id', 'date'])
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Appoinment $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Appoinment $model)
    {
        $model = $model
            ->join('doctors', 'doctors.id', '=', 'appoinments.doctor_id')
            ->select('appoinments.*','doctors.name')
            ->newQuery();
        return $model->with(['doctor', 'user'])->newQuery();
    }

    /**
     * Optional method if you want to use html builder.
     *
     * @return \Yajra\DataTables\Html\Builder
     */
    public function html()
    {
        return $this->builder()
            ->setTableId('appoinments-table')
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
            Column::make('doctor_id')->title('Doctor'),
            Column::make('user_id')->name('user.name')->title('Patient'),
            // Column::make('date'),
            Column::make('shift'),
            Column::make('time'),
            Column::make('status'),


        ];
    }


    protected function filename()
    {
        return 'Appoinments_' . date('YmdHis');
    }
}
