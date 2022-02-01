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
            <h5 class="page-title">Edit Doctor</h5>
        </div>
    </div>
    <!-- end row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">Doctor</h4>
                    {{ Form::model($doctorEdit, ['route' => ['admin.doctor.store'], 'method' => 'post', 'enctype' => 'multipart/form-data', 'novalidate' => true]) }}
                    @csrf
                    {{ Form::hidden('id', null, ['class' => 'form-control']) }}
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
                        {{-- <div class="col-md">
                            {{ Form::label('Password') }}
                            {{ Form::password('password', ['placeholder' => 'Enter Password', 'class' => 'form-control']) }}
                            @error('password')
                                <span class="text-danger" id="passwordError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div> --}}
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
    <script>
        $(document).ready(function() {
            $('#').click(function(e) {
                e.preventDefault();
                alert(2312);
                var name = $('#name').val();
                var email = $('#email').val();
                var address = $('#address').val();
                var address = $('#address').val();
                var shift = $('#shift').val();
                var time = $('#time').val();
                if (doctor_id != "" && user_id != "" && date != "" && shift != "") {
                    $.ajax({
                        headers: {
                            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                        },
                        url: "/admin/appoinment",
                        type: "POST",
                        data: {
                            doctor_id: doctor_id,
                            user_id: user_id,
                            date: date,
                            shift: shift,
                            time: time,
                        },
                        cache: false,
                        success: function(responseOutput) {
                            console.log(responseOutput);
                            var responseOutput = JSON.parse(responseOutput);
                            if (responseOutput.statusCode == 200) {
                                window.location = "/admin/appoinment";
                            } else if (responseOutput.statusCode == 201) {
                                alert("Error occured !");
                            }
                        }
                    });
                } else {
                    alert('Please fill all the field !');
                }


            });
        });
    </script>


@endpush
