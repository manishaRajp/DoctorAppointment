@extends('admin.dashboard.layouts.master')
@section('content')
<style>
    .texterror {
        color: red;
    }
</style>
<div class="row">
    <div class="col-sm-12">
        <div class="float-right page-breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="#">Drixo</a></li>
                <li class="breadcrumb-item"><a href="#">Admin</a></li>
                <li class="breadcrumb-item active">Doctor</li>
            </ol>
        </div>
        <h5 class="page-title">Add Doctor</h5>
    </div>
</div>
<!-- end row -->
<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <div class="card-body">
                <h4 class="mt-0 header-title">Doctor</h4>
                <p></p>
                {{ Form::open(['route' => 'admin.doctor.store', 'id' => 'doctorForm', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                @csrf
                <div class="row">
                    <div class="col-md">
                        {{ Form::label('Doctor') }}
                        @foreach($department as $data)
                        {{ Form::select('doctor_id', $data, null, ['class' => 'form-control']) }}
                        @endforeach
                        </br>
                    </div>
                    @error
                    <span class="text-danger" id="nameError">{{ $message }}</span>
                    @enderror
                    </br>
                </div>
            </div>
            </br>
            <div class="form-group">
                <div>
                    {{ Form::submit('submit', ['name' => 'submit', 'id' => 'submit', 'class' => 'btn btn-primary']) }}
                    <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                        Cancel
                    </button>
                </div>
            </div>
            {{ Form::close() }}
        </div>
    </div>
</div> <!-- end col -->
</div> <!-- end row -->
</div><!-- container fluid -->
</div> <!-- Page content Wrapper -->
@endsection