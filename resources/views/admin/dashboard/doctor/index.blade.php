@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="float-right page-breadcrumb">
                <div class="page_title">
                    <a href="{{ route('admin.doctor.create') }}" class="btn btn-info float-left">
                        Add Doctor</a>&nbsp;
                </div>
            </div>
            <h5 class="page-title">Doctor List</h5>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <div class="col-md-12 table-responsive">
                        {!! $dataTable->table(['class' => 'table table-bordered dt-responsive nowrap']) !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('admin/assets/js/boostrap.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/sweetalert.min.js') }}"></script>
    {!! $dataTable->scripts() !!}
    <script>
    $(document).on('click', '#delete_doctor', function() {
            var id = $(this).data('id');
            swal({
                title: "Do u want to delete Records !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "{{ route('admin.delete_data') }}",
                        type: "get",
                        data: {
                            id: id,
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                swal("Deleted !", "Your Records are deleted.",
                                    "success");
                                window.LaravelDataTables["doctor-table"].draw();
                            }
                        }
                    });
                } else {
                    swal("Cancelled", "Your Status is safe :)", "error");
                }
            });
        });
        </script>
@endpush
