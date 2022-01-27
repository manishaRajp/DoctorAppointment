@extends('admin.dashboard.layouts.master')
@section('content')

<!-- Start right Content here -->
<div class="content-page">
    <!-- Start content -->
    <div class="content">
        <div class="row">
            <div class="col-sm-12">
                <div class="float-right page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Drixo</a></li>
                        <li class="breadcrumb-item"><a href="#">Admin</a></li>
                        <li class="breadcrumb-item active">Form Validation</li>
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
                        {{ Form::open(['route'=>'admin.doctor.store','id'=>'myform','method'=>'post','enctype'=>'multipart/form-data'])  }}
                        @csrf
                        {{ Form::label('Name') }}
                        {{ Form::text('name',null,['placeholder'=>'Enter Name','class'=>'form-control'])   }}
                        <span class="text-danger" id="nameError"></span></br>
                        {{ Form::label('Email')    }}
                        {{ Form::email('email',null,['placeholder'=>'Enter Email','class'=>'form-control'])   }}
                        <span class="text-danger" id="emailError"></span></br>
                        {{ Form::label('Password')    }}
                        {{ Form::text('password',null,['placeholder'=>'Enter password','class'=>'form-control'])   }}
                        <span class="text-danger" id="passwordError"></span></br>
                        {{ Form::label('Mobile')    }}
                        {{ Form::number('phone_number',null,['placeholder'=>'Enter Mobile','class'=>'form-control'])   }}
                        <span class="text-danger" id="phone_numberError"></span></br>
                        {{ Form::label('Profile Image')    }}
                        {{ Form::file('image',['class'=>'form-control'])   }}
                        <span class="text-danger" id="imageError"></span></br>
                        {{ Form::label('Address')    }}
                        {{ Form::textarea('address',null,['rows'=>'3','class'=>'form-control'])   }}
                        <span class="text-danger" id="addressError"></span></br>
                        {{ Form::label('Department','Department')}}
                        {{ Form::text('department',null,['rows'=>'3','class'=>'form-control'])   }}
                        <span class="text-danger" id="departmentError"></span></br>
                        {{ Form::label('education','education')}}
                        {{ Form::text('education',null,['rows'=>'3','class'=>'form-control'])   }}
                        <span class="text-danger" id="educationError"></span></br>
                        {{ Form::label('description','description')}}
                        {{ Form::text('description',null,['rows'=>'3','class'=>'form-control'])   }}
                        <span class="text-danger" id="descriptionError"></span></br>
                        {{ Form::label('description','description')}}
                        {{ Form::radio('description',null,['rows'=>'3','class'=>'form-control'])   }}
                        <span class="text-danger" id="descriptionError"></span></br>
                        </br>
                        <div class="form-group">
                            <div>
                                {{ Form::submit('submit',array('name'=>'submit','id'=>'submit','class'=>'btn btn-primary')) }}
                                <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                                    Cancel
                                </button>
                            </div>
                        </div>
                        {{ Form::close()   }}
                    </div>
                </div>
            </div> <!-- end col -->
        </div> <!-- end row -->
    </div><!-- container fluid -->
</div> <!-- Page content Wrapper -->




@endsection