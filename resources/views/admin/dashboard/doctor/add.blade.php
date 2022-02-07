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
                    {{ Form::open(['route' => 'admin.doctor.store','id' => 'doctorForm','method' => 'post','enctype' => 'multipart/form-data']) }}
                    @csrf
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Name') }}
                            {{ Form::text('name', null, ['placeholder' => 'Enter Name', 'class' => 'form-control', 'id' => 'name']) }}
                        </div>
                        <div class="col-md">
                            {{ Form::label('Email') }}
                            {{ Form::email('email', null, ['placeholder' => 'Enter Email', 'class' => 'form-control', 'id' => 'email']) }}
                            @error('email')
                                <span class="text-danger" id="emailError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Password') }}
                            {{ Form::password('password', ['placeholder' => 'Enter Password','class' => 'form-control','id' => 'password']) }}
                            @error('password')
                                <span class="text-danger" id="passwordError">{{ $message }}</span>
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
                            {{ Form::label('Department') }}
                            {{ Form::select('department', $dept, null, ['class' => 'form-control','placeholder' => 'Select a Department ...','id' => 'department']) }}
                            @error('department')
                                <span class="text-danger" id="departmentError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Gender', 'Gender') }}
                            {{ Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], null, ['class' => 'form-control','placeholder' => 'Select a Gender...','id' => 'gender']) }}
                            @error('gender')
                                <span class="text-danger" id="genderError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                        <div class="col-md">
                            {{ Form::label('Shift', 'Shift') }}
                            {{ Form::select('shift', ['Morning' => 'Morning', 'Evening' => 'Evening'], null, ['class' => 'form-control','placeholder' => 'Select a Shift...','id' => 'shift']) }}
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
                            {{ Form::time('start_time', null, ['rows' => '3', 'class' => 'form-control', 'id' => 'start_time']) }}
                            @error('start_time')
                                <span class="text-danger" id="start_timeError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                        <div class="col-md">
                            {{ Form::label('End Time') }}
                            {{ Form::time('end_time', null, ['rows' => '3', 'class' => 'form-control', 'id' => 'end_time']) }}
                            @error('end_time')
                                <span class="text-danger" id="end_timeError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Description') }}
                            {{ Form::textarea('description', null, ['rows' => '3', 'class' => 'form-control', 'id' => 'description']) }}
                            @error('description')
                                <span class="text-danger" id="descriptionError">{{ $message }}</span>
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
                    </div>
                    </br>
                    <div class="form-group">
                        <div>
                            {{ Form::submit('submit', ['name' => 'submit-doctor', 'id' => 'submit-doctor', 'class' => 'btn btn-primary']) }}
                            <a href="{{ route('admin.doctor.index') }}" class="btn btn-danger">
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
            $("#doctorForm").validate({
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
                submitHandler: function(form, event) {
                    event.preventDefault();
                    $(document).find('.text-danger').remove();
                    var formdata = new FormData(form);
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        type: "post",
                        url: "{{ route('admin.doctor.store') }}",
                        data: formdata,
                        dataType: 'JSON',
                        cache: false,
                        contentType: false,
                        processData: false,
                        success: function(response) {
                            window.location = "/admin/doctor";
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
        $(document).on('click', '#delete_doctor', function() {
            alert(54654);
            var id = $(this).data('id');
            swal({
                title: "Do u want to delete Records !",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: "{{ route('admin.delete_data') }}",
                        type: "get",
                        data: {
                            id: id,
                        },
                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                swal("Deleted !", "Your Records are deleted.",
                                    "success");
                                window.LaravelDataTables["meal-table"].draw();
                            }
                        }
                    });
                } else {
                    swal("Cancelled", "Your Status is safe :)", "error");
                }
            });
        });
    </script>

@endpush
