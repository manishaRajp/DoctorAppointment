@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="float-right page-breadcrumb">
                <div class="page_title">
                    <a href="{{ route('admin.appoinment.create') }}" class="btn btn-info float-left">
                        Add Appoinement</a>&nbsp;
                </div>
            </div>
            <h5 class="page-title">Appoinments</h5>
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
    {{-- datatable --}}
    <script src="{{ asset('admin/assets/js/boostrap.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/dataTables.bootstrap4.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/sweetalert.min.js') }}"></script>
    {!! $dataTable->scripts() !!}
    <script>
        $(document).on('click', '.status', function() {
            var id = $(this).data('id');
            console.log(id);
            swal({
                title: "Are you sure?",
                text: "you want to Change Status",
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, Save!',
                cancelButtonText: "No, cancel plx!",
                reverseButtons: true
            }).then((result) => {
                if (result) {
                    $.ajax({
                        url: "{{ route('admin.change_status') }}",
                        type: "get",
                        data: {
                            id: id,
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                swal("Updated!",
                                    "Status Change Successfully.",
                                    "success");
                                window.LaravelDataTables["appoinments-table"].draw();
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
