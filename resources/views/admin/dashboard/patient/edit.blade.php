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
                    {{ Form::model($patient, ['id' => 'edit_patient', 'enctype' => 'multipart/form-data', 'novalidate' => true]) }}
                    @csrf
                    {{ Form::hidden('id', null, ['rows' => '3', 'class' => 'form-control']) }}
                    <div class="row">
                    </div>
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Name') }}
                            {{ Form::text('name', null, ['rows' => '3', 'class' => 'form-control', 'id' => 'name']) }}
                            @error('name')
                                <span class="text-danger" id="nameError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                        <div class="col-md">
                            {{ Form::label('Email') }}
                            {{ Form::text('email', null, ['rows' => '3', 'class' => 'form-control', 'id' => 'email']) }}
                            @error('email')
                                <span class="text-danger" id="emailError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Address') }}
                            {{ Form::text('address', null, ['rows' => '3', 'class' => 'form-control', 'id' => 'address']) }}
                            @error('address')
                                <span class="text-danger" id="addressError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                        <div class="col-md">
                            {{ Form::label('Mobile') }}
                            {{ Form::number('phone_number', null, ['rows' => '3', 'class' => 'form-control', 'id' => 'phone_number']) }}
                            @error('phone_number')
                                <span class="text-danger" id="phone_numberError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Gender', 'Gender') }}
                            {{ Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], null, ['class' => 'form-control','id' => 'gender']) }}
                            @error('gender')
                                <span class="text-danger" id="genderError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                        <div class="col-md">
                            {{ Form::label('Profile Image') }}
                            {{ Form::file('image', ['class' => 'form-control', 'id' => 'image']) }}
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
                            <a href="{{ route('admin.patient.index') }}" class="btn btn-danger">
                                Cancel</a>
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
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="{{ asset('admin/assets/js/sweetalert.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $("#edit_patient").validate({
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
                submitHandler: function(form, event) {
                    event.preventDefault();
                    console.log('form');
                    console.log(form);
                    $(document).find('.text-danger').remove();
                    var formdata = new FormData(form);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "post",
                        data: formdata,
                        url: "{{ route('admin.patient_data') }}",
                        dataType: 'JSON',
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            window.location = "/admin/patient";
                        },
                        error: function(error) {
                            $.each(error.responseJSON.errors, function(key, value) {
                                console.log(key);
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
