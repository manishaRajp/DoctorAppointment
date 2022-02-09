@extends('admin.dashboard.layouts.master')
@section('content')
    <style>
        .chat-loader {
            position: fixed;
            width: 100%;
            left: 0;
            right: 0;
            top: 0;
            bottom: 0;
            background-color: rgba(255, 255, 255, 0.7);
            z-index: 9999;
            display: none;
        }

        @-webkit-keyframes spin {
            from {
                -webkit-transform: rotate(0deg);
            }

            to {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            from {
                transform: rotate(0deg);
            }

            to {
                transform: rotate(360deg);
            }
        }

        .chat-loader::after {
            content: '';
            display: block;
            position: absolute;
            left: 48%;
            top: 40%;
            width: 40px;
            height: 40px;
            border-style: solid;
            border-color: black;
            border-top-color: transparent;
            border-width: 4px;
            border-radius: 50%;
            -webkit-animation: spin .8s linear infinite;
            animation: spin .8s linear infinite;
        }

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
    <div class="chat-loader">
        <i class="fas fa-spinner fa-spin">Please Waity......</i>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title"></h4>
                    <p></p>
                    {{ Form::open(['route' => 'admin.appoinment.store','method' => 'post','id' => 'appoinment_form','files' => true]) }}
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
                            {{ Form::number('phone_number', null, ['placeholder' => 'Enter Mobile','class' => 'form-control','id' => 'phone_number','onkeydown' => 'javascript: return event.keyCode == 69 ? false : true']) }}
                            @error('phone_number')
                                <span class="text-danger" id="phone_numberError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                    </div>

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

                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Doctor') }}
                            {{ Form::select('doctor_id', $doctor, null, ['class' => 'form-control','placeholder' => 'Select a Doctor...','id' => 'doctor_id']) }}
                            @error('doctor_id')
                                <span class="text-danger" id="doctor_idError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Date') }}
                            {{ Form::date('date', null, ['rows' => '3', 'class' => 'form-control', 'id' => 'date']) }}
                            @error('date')
                                <span class="text-danger" id="dateError">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md">
                            {{ Form::label('Shift', 'Shift') }}
                            {{ Form::select('shift', ['Morning' => 'Morning', 'Evening' => 'Evening'], null, ['class' => 'form-control','placeholder' => 'Select a Shift...','id' => 'shift']) }}
                            @error('shift')
                                <span class="text-danger" id="shiftError">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="col-md">
                            {{ Form::label('Time') }}
                            {{ Form::time('time', null, ['rows' => '3', 'class' => 'form-control', 'id' => 'time']) }}
                            @error('time')
                                <span class="text-danger" id="timeError">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    </br>
                    <div class="form-group">
                        <div>
                            {{ Form::submit('submit', ['name' => 'submit', 'id' => 'submit-aapoinmet', 'class' => 'btn btn-primary']) }}
                            <a href="{{ route('admin.appoinment.index') }}" class="btn btn-danger">
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
        $(".chat-loader").fadeOut('slow');
        $(document).ready(function() {
            $("#appoinment_form").validate({
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
                    gender: {
                        required: true,
                    },
                    doctor_id: {
                        required: true,
                    },
                    date: {
                        required: true,
                    },
                    shift: {
                        required: true,
                    },
                    time: {
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
                    $(document).find('.text-danger').remove();
                    var formdata = new FormData(form);

                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "post",
                        url: "{{ route('admin.appoinment.store') }}",
                        data: formdata,
                        dataType: 'JSON',
                        cache: false,
                        contentType: false,
                        processData: false,
                        beforeSend: function() {
                            $(".chat-loader").fadeIn('slow');
                        },
                        success: function(responseOutput) {
                            if (responseOutput.statusCode == 422) {
                                $(".chat-loader").fadeOut('slow');
                                alert('Doctor is busy');
                            } else {
                                if (responseOutput == '1') {
                                    $(".chat-loader").fadeOut('slow');
                                    alert("On This Shift Doctor IS no Available");
                                } else if (responseOutput == '0') {
                                    $(".chat-loader").fadeOut('slow');
                                    alert("On This Time Doctor IS no Available");
                                } else {
                                    window.location = "/admin/appoinment";
                                }
                            }
                        },
                        error: function(error) {
                             $(".chat-loader").fadeOut('slow');
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
