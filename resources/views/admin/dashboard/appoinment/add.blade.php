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
                    {{ Form::open(['route' => 'admin.appoinment.store','method' => 'post','id' => 'appoinment_form','files' => true]) }}
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Doctor') }}
                            {{ Form::select('doctor_id', $doctor, null, ['class' => 'form-control','placeholder' => 'Select a Doctor...','id' => 'doctor_id']) }}
                            @error('doctor_id')
                                <span class="text-danger" id="doctor_idError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                        <div class="col-md">
                            {{ Form::label('Patient') }}
                            {{ Form::select('user_id', $patient, null, ['class' => 'form-control','placeholder' => 'Select a Patient...','id' => 'user_id']) }}
                            @error('user_id')
                                <span class="text-danger" id="user_idError">{{ $message }}</span>
                            @enderror
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
        $(document).ready(function() {
            $("#appoinment_form").validate({
                rules: {
                    doctor_id: {
                        required: true,
                    },
                    user_id: {
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
                        success: function(responseOutput) {
                            if (responseOutput == '1') {
                                alert("On This Shift Doctor IS no Available");
                            }
                            if (responseOutput == '0') {
                                alert("On This Time Doctor IS no Available");
                            }
                            if (responseOutput.statusCode == 200) {
                                window.location = "/admin/appoinment";
                            }
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





            // $('#submit-aapoinmet').click(function(e) {
            //     e.preventDefault();
            //     $(document).find('.text-danger').remove();
            //     var doctor_id = $('#doctor_id').val();
            //     var user_id = $('#user_id').val();
            //     var date = $('#date').val();
            //     var shift = $('#shift').val();
            //     var time = $('#time').val();
            //     $.ajax({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         url: "/admin/appoinment",
            //         type: "POST",
            //         data: {
            //             doctor_id: doctor_id,
            //             user_id: user_id,
            //             date: date,
            //             shift: shift,
            //             time: time,
            //         },
            //         cache: false,
            //         success: function(responseOutput) {
            //             console.log(responseOutput);
            //             return false;
            //             if (responseOutput == 1) {
            //                 alert("On This Shift Doctor IS no Available");
            //             }
            //             if (responseOutput == 0) {
            //                 alert("On This Time Doctor IS no Available");
            //             }
            //             var responseOutput = JSON.parse(responseOutput);
            //             if (responseOutput.statusCode == 200) {
            //                 window.location = "/admin/appoinment";
            //             } else if (responseOutput.statusCode == 201) {
            //                 alert("Error occured !");
            //             }
            //         },
            //         error: function(error) {
            //             $.each(error.responseJSON.errors, function(key, value) {
            //                 $('#' + key).after('<span class="text-danger">' + value +
            //                     '</span>')
            //             });
            //         }
            //     });
            // });
        });
    </script>

@endpush
