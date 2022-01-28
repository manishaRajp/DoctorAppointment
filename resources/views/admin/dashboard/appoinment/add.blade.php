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
                    <li class="breadcrumb-item active">Appoinment</li>
                </ol>
            </div>
            <h5 class="page-title">Add Appoinment</h5>
        </div>
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Appoinment</h4>
                    <p></p>
                    {{ Form::open(['route' => 'admin.doctor.store', 'id' => 'myform', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                    @csrf
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Doctor') }}
                            {{ Form::select('doctor_id', $doctor, null, ['class' => 'form-control']) }}
                            </br>
                        </div>
                        <div class="col-md">
                             {{ Form::label('Doctor') }}
                            {{ Form::select('doctor_id', $doctor, null, ['class' => 'form-control']) }}
                            </br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Shift') }}
                            {{ Form::text('shift', null, ['rows' => '3', 'class' => 'form-control']) }}
                            @error('shift')
                                <span class="text-danger" id="shiftError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                        <div class="col-md">
                            {{ Form::label('Time') }}
                            {{ Form::time('time', null, ['rows' => '3', 'class' => 'form-control']) }}
                            @error('time')
                                <span class="text-danger" id="timeError">{{ $message }}</span>
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
