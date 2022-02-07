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
    {!! $dataTable->scripts() !!}
@endpush

