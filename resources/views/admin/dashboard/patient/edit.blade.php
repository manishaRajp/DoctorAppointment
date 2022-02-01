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
                    <li class="breadcrumb-item active">Patients</li>
                </ol>
            </div>
            <h5 class="page-title">Edit Patients</h5>
        </div>
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Patients</h4>
                    <p></p>
                    {{ Form::model($patient, ['route' => ['admin.patient.store'], 'method' => 'post', 'enctype' => 'multipart/form-data', 'novalidate' => true]) }}
                    @csrf
                      {{ Form::hidden('id', null, ['rows' => '3', 'class' => 'form-control']) }}
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Name') }}
                            {{ Form::text('name', null, ['rows' => '3', 'class' => 'form-control']) }}
                            @error('name')
                                <span class="text-danger" id="nameError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                        <div class="col-md">
                            {{ Form::label('Email') }}
                            {{ Form::text('email', null, ['rows' => '3', 'class' => 'form-control']) }}
                            @error('email')
                                <span class="text-danger" id="emailError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Address') }}
                            {{ Form::text('address', null, ['rows' => '3', 'class' => 'form-control']) }}
                            @error('address')
                                <span class="text-danger" id="addressError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                        <div class="col-md">
                            {{ Form::label('Mobile') }}
                            {{ Form::number('phone_number', null, ['rows' => '3', 'class' => 'form-control']) }}
                            @error('phone_number')
                                <span class="text-danger" id="phone_numberError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                    </div>
                    <div>
                        <div class="row">

                        </div>
                        </br>
                        <div class="row">
                            <div class="col-md">
                                {{ Form::label('Gender', 'Gender') }}
                                {{ Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], null, ['class' => 'form-control', 'id' => 'gender']) }}
                                @error('gender')
                                    <span class="text-danger" id="genderError">{{ $message }}</span>
                                @enderror
                                </br>
                            </div>
                            <div class="col-md">
                                {{ Form::label('Profile Image') }}
                                {{ Form::file('image', ['class' => 'form-control']) }}
                                @error('image')
                                    <span class="text-danger" id="imageError">{{ $message }}</span>
                                @enderror
                                </br>
                            </div>


                            <div class="col-md">
                                {{ Form::label('Description') }}
                                {{ Form::textarea('bio', null, ['rows' => '3', 'class' => 'form-control']) }}
                                @error('bio')
                                    <span class="text-danger" id="bioError">{{ $message }}</span>
                                @enderror
                                </br>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                {{ Form::submit('submit', ['name' => 'submit', 'id' => 'submit', 'class' => 'btn btn-primary']) }}
                              <a href="{{ route('admin.patient.index')}}"><button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                Cancel
                            </a></button>
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
