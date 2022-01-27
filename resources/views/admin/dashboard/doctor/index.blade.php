@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="col-md-12 table-responsive">
        {!! $dataTable->table(['class' => 'table table-bordered dt-responsive nowrap']) !!}
    </div>
@endsection
