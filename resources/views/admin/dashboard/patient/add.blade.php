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
            <h5 class="page-title">Add Patients</h5>
        </div>
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Patients</h4>
                    <p></p>
                     {{ Form::open(['route' => 'admin.patient.store', 'method' => 'post','id' => 'patient_form', 'files' => true]) }}
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Name') }}
                            {{ Form::text('name', null, ['placeholder' => 'Enter Name', 'class' => 'form-control', 'id' => 'name']) }}
                            @error('name')
                                <span class="text-danger" id="nameError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                        <div class="col-md">
                            {{ Form::label('Email') }}
                            {{ Form::text('email', null, ['placeholder' => 'Enter email', 'class' => 'form-control', 'id' => 'email']) }}
                            @error('email')
                                <span class="text-danger" id="emailError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Address') }}
                            {{ Form::text('address', null, ['placeholder' => 'Enter Address','class' => 'form-control','id' => 'address']) }}
                            @error('address')
                                <span class="text-danger" id="addressError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                        <div class="col-md">
                            {{ Form::label('Mobile') }}
                            {{ Form::number('phone_number', null, ['placeholder' => 'Enter Mobile','class' => 'form-control','id' => 'phone_number','onkeydown'=>'javascript: return event.keyCode == 69 ? false : true']) }}
                            @error('phone_number')
                                <span class="text-danger" id="phone_numberError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                    </div>
                    <div>
                        <div class="row">
                            <div class="col-md">
                                {{ Form::label('Description') }}
                                {{ Form::textarea('bio', null, ['placeholder' => 'Enter Description','class' => 'form-control','id' => 'bio']) }}
                                @error('bio')
                                    <span class="text-danger" id="bioError">{{ $message }}</span>
                                @enderror
                                </br>
                            </div>
                            <div class="col-md">
                                {{ Form::label('Password') }}
                                {{ Form::password('password', ['placeholder' => 'Enter password','class' => 'form-control','id' => 'password']) }}
                                @error('password')
                                    <span class="text-danger" id="passwordError">{{ $message }}</span>
                                @enderror
                                </br>
                            </div>

                        </div>
                        </br>
                        <div class="row">
                            <div class="col-md">
                                {{ Form::label('Profile Image') }}
                                {{ Form::file('image', ['class' => 'form-control', 'id' => 'image']) }}
                                @error('image')
                                    <span class="text-danger" id="imageError">{{ $message }}</span>
                                @enderror
                                </br>
                            </div>
                            <div class="col-md">
                                {{ Form::label('Gender', 'Gender') }}
                                {{ Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], null, ['class' => 'form-control','placeholder' => 'Select a Gender...','id' => 'gender']) }}
                                @error('gender')
                                    <span class="text-danger" id="genderError">{{ $message }}</span>
                                @enderror
                                </br>
                            </div>
                        </div>
                        <div class="form-group">
                            <div>
                                {{ Form::submit('submit', ['name' => 'submit', 'id' => 'submit', 'class' => 'btn btn-primary']) }}
                                <a href="{{ route('admin.patient.index') }}" class="btn btn-danger">
                                    Cancel</a>
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
@push('scripts')
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="{{ asset('admin/assets/js/sweetalert.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#patient_form").validate({
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
                    bio: {
                        required: true,
                    },
                    gender: {
                        required: true,
                    },
                },

                highlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-invalid").removeClass("is-valid");
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).addClass("is-valid").removeClass("is-invalid");
                },
                submitHandler: function(form,event) {
                    event.preventDefault();
                    $(document).find('.text-danger').remove();
                    var formdata = new FormData(form);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "post",
                        url: "{{ route('admin.patient.store') }}",
                        data: formdata,
                        dataType: 'JSON',
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            window.location = "/admin/patient";
                        },
                        error: function(error) {
                            $.each(error.responseJSON.errors, function(key, value) {
                                $('#' + key).after('<span class="text-danger">' +
                                    value +
                                    '</span>')
                            });
                        }
                    });
                }
            });
        });
    </script>

@endpush
