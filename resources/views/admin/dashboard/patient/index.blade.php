@extends('admin.dashboard.layouts.master')
@section('content')
 <div class="row">
        <div class="col-sm-12">
            <div class="float-right page-breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Drixo</a></li>
                    <li class="breadcrumb-item"><a href="#">Admin</a></li>
                    <li class="breadcrumb-item active">Form Validation</li>
                </ol>
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
    {{-- datatable --}}
        <script src="{{ asset('admin/assets/js/boostrap.js') }}"></script>
        <script src="{{ asset('admin/assets/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('admin/assets/js/dataTables.bootstrap4.min.js') }}"></script>
    {!! $dataTable->scripts() !!}
@endpush

