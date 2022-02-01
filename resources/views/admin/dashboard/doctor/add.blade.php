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
                    {{ Form::open(['route' => 'admin.doctor.store', 'id' => 'patientform', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                    @csrf
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Name') }}
                            {{ Form::text('name', null, ['placeholder' => 'Enter Name', 'class' => 'form-control']) }}
                            @error('name')
                                <span class="text-danger" id="nameError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                        <div class="col-md">
                            {{ Form::label('Email') }}
                            {{ Form::email('email', null, ['placeholder' => 'Enter Email', 'class' => 'form-control']) }}
                            @error('email')
                                <span class="text-danger" id="emailError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Password') }}
                            {{ Form::password('password', ['placeholder' => 'Enter Password', 'class' => 'form-control']) }}
                            @error('password')
                                <span class="text-danger" id="passwordError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                        <div class="col-md">
                            {{ Form::label('Mobile') }}
                            {{ Form::number('phone_number', null, ['placeholder' => 'Enter Mobile', 'class' => 'form-control']) }}
                            @error('phone_number')
                                <span class="text-danger" id="phone_numberError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Address') }}
                            {{ Form::text('address', null, ['placeholder' => 'Enter Address', 'class' => 'form-control']) }}
                            @error('address')
                                <span class="text-danger" id="addressError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                        <div class="col-md">
                            {{ Form::label('Department') }}
                            {{ Form::select('department', $dept, null, ['class' => 'form-control', 'placeholder' => 'Select a Department ...', 'id' => 'department']) }}
                            @error('department')
                                <span class="text-danger" id="departmentError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Gender', 'Gender') }}
                            {{ Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], null, ['class' => 'form-control', 'placeholder' => 'Select a Gender...', 'id' => 'gender']) }}
                            @error('gender')
                                <span class="text-danger" id="genderError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                        <div class="col-md">
                            {{ Form::label('Shift', 'Shift') }}
                            {{ Form::select('shift', ['Morning' => 'Morning', 'Evening' => 'Evening'], null, ['class' => 'form-control', 'placeholder' => 'Select a Shift...', 'id' => 'shift']) }}
                            @error('shift')
                                <span class="text-danger" id="shiftError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                    </div>
                    </br>
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Start Time') }}
                            {{ Form::time('start_time', null, ['rows' => '3', 'class' => 'form-control']) }}
                            @error('start_time')
                                <span class="text-danger" id="start_timeError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                        <div class="col-md">
                            {{ Form::label('End Time') }}
                            {{ Form::time('end_time', null, ['rows' => '3', 'class' => 'form-control']) }}
                            @error('end_time')
                                <span class="text-danger" id="end_timeError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Description') }}
                            {{ Form::textarea('description', null, ['rows' => '3', 'class' => 'form-control']) }}
                            @error('description')
                                <span class="text-danger" id="descriptionError">{{ $message }}</span>
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
                    </div>
                    </br>
                    <div class="form-group">
                        <div>
                            {{ Form::submit('submit', ['name' => 'submit', 'id' => 'submit', 'class' => 'btn btn-primary']) }}
                           <a href="{{ route('admin.doctor.index')}}"><button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                Cancel
                            </a></button>
                        </div>
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
    </div>
    </div>
@endsection

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="{{ asset('admin/assets/js/sweetalert.min.js') }}"></script>
    <script>
        $("#patientform").validate({

            rules: {
                name: {
                    required: true,
                    maxlength: 225,
                },
                email: {
                    required: true,
                    email: true,
                    maxlength: 50
                },
                password: {
                    required: true,


                },
                phone_number: {
                    required: true,
                    number: true,
                    minlength: 10,
                    maxlength: 11
                },
                address: {
                    required: true,
                },
                image: {
                    required: true,
                },
                description: {
                    required: true,
                },
                gender: {
                    required: true,
                },
                department: {
                    required: true,
                },
                shift: {
                    required: true,
                },
                start_time: {
                    required: true,
                },
                end_time: {
                    required: true,
                },
            },

            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            },
        });
    </script>

@endpush
