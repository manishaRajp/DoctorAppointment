<?php

namespace App\DataTables;

use App\Models\Doctor;
use Yajra\DataTables\Html\Button;
use Yajra\DataTables\Html\Column;
use Yajra\DataTables\Html\Editor\Editor;
use Yajra\DataTables\Html\Editor\Fields;
use Yajra\DataTables\Services\DataTable;

class DoctorDataTable extends DataTable
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
                return '<img src="' . asset('storage/DoctorImage/' . $data->image) . '" class="img-thumbnail"
                   width="50%"></img>';
            })
            ->addColumn('action', function ($data) {
                return
                    '
                    <br><a href="' . route("admin.doctor.edit", $data->id) . '"class="btn btn-outline-info"><i class="fa fa-pencil"></i></a>
                      <form action="' . route("admin.doctor.destroy", $data->id) . '" method="POST">
                    ' . csrf_field() . '
                    ' . method_field("DELETE") . '
                        <button type="submit" class="btn btn-danger"
                        onclick="return confirm(\'Are You Sure Want to Delete?\')"
                        ><i class="fa fa-trash"></i>
                  </form>
                    ';
            })
            ->editColumn('department', function ($data) {
                return $data->department_id->department;
            })
            ->rawColumns(['image','action','department'])
            ->addIndexColumn();
    }

    /**
     * Get query source of dataTable.
     *
     * @param \App\Models\Doctor $model
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function query(Doctor $model)
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
            ->setTableId('doctor-table')
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
            Column::make('name')->orderable(false)->title('Name'),
            Column::make('email')->orderable(false)->title('Email'),
            Column::make('phone_number')->orderable(false)->title('Contact'),
            Column::make('address')->orderable(false)->title('Address'),
            Column::make('department')->orderable(false)->title('Department'),
            Column::make('gender')->orderable(false)->title('Gender'),
            Column::make('shift')->orderable(false)->title('Shift'),
            Column::make('start_time')->orderable(false)->title('Start At'),
            Column::make('end_time')->orderable(false)->title('End AT'),
            Column::make('image')->orderable(false)->title('Image'),
            Column::computed('action')->title('Action'),

        ];
    }

    /**
     * Get filename for export.
     *
     * @return string
     */
    protected function filename()
    {
        return 'Doctor_' . date('YmdHis');
    }
}
