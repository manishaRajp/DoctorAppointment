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
                    {{ Form::open(['route' => 'admin.patient.store', 'id' => 'patientForm', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                    @csrf
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
                            <div class="col-md">
                                {{ Form::label('Description') }}
                                {{ Form::textarea('bio', null, ['rows' => '3', 'class' => 'form-control']) }}
                                @error('bio')
                                    <span class="text-danger" id="bioError">{{ $message }}</span>
                                @enderror
                                </br>
                            </div>
                            <div class="col-md">
                                {{ Form::label('Password') }}
                                {{ Form::password('password', ['class' => 'form-control']) }}
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
                                {{ Form::file('image', ['class' => 'form-control']) }}
                                @error('image')
                                    <span class="text-danger" id="imageError">{{ $message }}</span>
                                @enderror
                                </br>
                            </div>


                            <div class="col-md">
                                {{ Form::label('Gender', 'Gender') }}
                                {{ Form::select('gender', ['Male' => 'Male', 'Female' => 'Female'], null, ['class' => 'form-control', 'placeholder' => 'Select a Gender...', 'id' => 'gender']) }}
                                @error('gender')
                                    <span class="text-danger" id="genderError">{{ $message }}</span>
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

@push('scripts')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
    <script src="{{ asset('admin/assets/js/sweetalert.min.js') }}"></script>
    <script>
        $("#patientForm").validate({

            rules: {
                name: {
                    required: true,
                    maxlength: 225,
                    letteronly: true
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
                }
            },

            highlight: function(element, errorClass, validClass) {
                $(element).addClass("is-invalid").removeClass("is-valid");
            },
            unhighlight: function(element, errorClass, validClass) {
                $(element).addClass("is-valid").removeClass("is-invalid");
            },

            // submitHandler: function(form) {
            //     $.ajax({
            //         headers: {
            //             'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            //         },
            //         method: "POST",
            //         url: "{{ route('admin.patient.store') }}",
            //         data: new FormData(form),
            //         success: function(result) {
            //             swal({
            //                 title: "Inserted",
            //                 text: "Insert Succesfully!",
            //                 buttons: ['Cancel', 'Submit']
            //             }).then(function(isConfirm) {
            //                 if (isConfirm) {
            //                     $("#patientForm")[0].reset();
            //                     window.location.href = "../patientForm/index";
            //                 } else {
            //                     swal("Cancelled", "", "error");
            //                 }
            //             });
            //         },
            //     });
            // }
        });
    </script>

@endpush
