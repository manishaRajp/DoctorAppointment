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
                    {{ Form::open(['route' => 'admin.doctor.store', 'id' => 'appoinment-form', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                    @csrf
                    <div class="row">
                        <div class="col-md">
                            {{ Form::label('Doctor') }}
                            {{ Form::select('doctor_id', $doctor, null, ['class' => 'form-control', 'id' => 'doctor_id']) }}
                              @error('shift')
                                <span class="text-danger" id="shiftError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                        <div class="col-md">
                            {{ Form::label('Patent') }}
                            {{ Form::select('user_id', $patient, null, ['class' => 'form-control', 'id' => 'user_id']) }}
                              @error('shift')
                                <span class="text-danger" id="shiftError">{{ $message }}</span>
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
                            </br>
                        </div>

                        <div class="col-md">
                            {{ Form::label('Shift', 'Shift') }}
                            {{ Form::select('shift', ['1' => 'Morning', '2' => 'Evening'], 'S', ['class' => 'form-control', 'id' => 'shift']) }}
                            @error('shift')
                                <span class="text-danger" id="shiftError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>
                        <div class="col-md">
                            {{ Form::label('Time') }}
                            {{ Form::time('time', null, ['rows' => '3', 'class' => 'form-control', 'id' => 'time']) }}
                            @error('time')
                                <span class="text-danger" id="timeError">{{ $message }}</span>
                            @enderror
                            </br>
                        </div>

                    </div>
                    </br>
                    <div class="form-group">
                        <div>
                            {{ Form::submit('submit', ['name' => 'submit', 'id' => 'submit-aapoinmet', 'class' => 'btn btn-primary']) }}
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
                var doctor_id = $('#doctor_id').val();
                var user_id = $('#user_id').val();
                var date = $('#date').val();
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
                            if(responseOutput == 1)
                            {
                               alert("On This Shift Doctor IS no Available");
                            }
                            if(responseOutput == 0)
                            {
                                alert("On This Time Doctor IS no Available");
                            }
                            var responseOutput = JSON.parse(responseOutput);
                            if (responseOutput.statusCode == 200) {
                                window.location = "/admin/appoinment";
                            } else if (responseOutput.statusCode == 201) {
                                alert("Error occured !");
                            }
                        }
                    });
                } else {
                    alert('All Filed Are Requeird');
                }


            });

        });
    </script>

@endpush
