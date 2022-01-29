@extends('admin.dashboard.layouts.master')
@section('content')
    <style>
        .texterror {
            color: red;
        }

    </style>
    {{-- @dd($dept) --}}
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
                    {{ Form::open(['id' => 'updateForm', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                    @csrf
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Name') }}
                            {{ Form::text('name', $doctorEdit->name, ['class' => 'form-control']) }}
                            @error('name')
                                <span class="text-danger" id="nameError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                        <div class="col-md">
                            {{ Form::label('Email') }}
                            {{ Form::text('name', $doctorEdit->email, ['class' => 'form-control']) }}
                            @error('email')
                                <span class="text-danger" id="emailError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Mobile') }}
                            {{ Form::number('phone_number', $doctorEdit->phone_number, ['placeholder' => 'Enter Mobile', 'class' => 'form-control']) }}
                            @error('phone_number')
                                <span class="text-danger" id="phone_numberError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                        <div class="col-md">
                            {{ Form::label('Address') }}
                            {{ Form::text('address', $doctorEdit->address, ['placeholder' => 'Enter Address', 'class' => 'form-control']) }}
                            @error('address')
                                <span class="text-danger" id="addressError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                    </div>
                    <div class="row">

                    </div>
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Gender') }}
                            <div class="form-check form-check-inline">
                                {{ Form::radio('gender', 'male', ['class' => 'form-check-input']) }} <label
                                    class="form-check-label ml-2" for="inlineRadio1">Male</label> </div>
                            <div class="form-check form-check-inline">
                                {{ Form::radio('gender', 'female', ['class' => 'form-check-input']) }} <label
                                    class="form-check-label ml-2" for="inlineRadio2">Female</label> </div>
                        </div>
                        <div class="col-md">
                            {{ Form::label('Shift') }}
                            <div class="form-check form-check-inline">
                                {{ Form::radio('shift', 'evening', ['class' => 'form-check-input']) }} <label
                                    class="form-check-label ml-2" for="inlineRadio1">Morning</label> </div>
                            <div class="form-check form-check-inline">
                                {{ Form::radio('shift', 'morning', ['class' => 'form-check-input']) }} <label
                                    class="form-check-label ml-2" for="inlineRadio2">Evening</label> </div>
                        </div>
                    </div>
                    </br>
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Start Time') }}
                            {{ Form::time('start_time', $doctorEdit->start_time, ['rows' => '3', 'class' => 'form-control']) }}
                            @error('start_time')
                                <span class="text-danger" id="start_timeError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                        <div class="col-md">
                            {{ Form::label('End Time') }}
                            {{ Form::time('end_time', $doctorEdit->end_time, ['rows' => '3', 'class' => 'form-control']) }}
                            @error('end_time')
                                <span class="text-danger" id="end_timeError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Description') }}
                            {{ Form::textarea('description', $doctorEdit->description, ['rows' => '3', 'class' => 'form-control']) }}
                            @error('description')
                                <span class="text-danger" id="descriptionError">{{ $message }}</span>
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
        </div>
    </div>
    </div>
    </div>
@endsection
@push('scripts')
    <script>
        $(document).ready(function() {
            $('#submit-aapoinmet').click(function(e) {
                e.preventDefault();
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
