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
                    <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Back</a></li>
                </ol>
            </div>
            <h5 class="page-title"></h5>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title"></h4>
                    <p></p>
                    {{ Form::open(['route' => 'admin.department.store', 'id' => 'doctorForm', 'method' => 'post', 'enctype' => 'multipart/form-data']) }}
                    @csrf
                    <div class="row">
                        <div class="col-md-3">
                            {{ Form::label('Department') }}
                            @foreach ($department as $data)
                                {{ Form::text('department', $data, ['class' => 'form-control','readonly']) }}
                            @endforeach
                            </br>
                        </div>
                        </br>
                    </div>
                </div>
                </br>
                {{-- <div class="form-group">
                    <div>
                        {{ Form::submit('submit', ['name' => 'submit', 'id' => 'submit', 'class' => 'btn btn-primary']) }}
                        <button type="reset" class="btn btn-secondary waves-effect m-l-5">
                            Cancel
                        </button>
                    </div>
                </div> --}}
                {{ Form::close() }}
            </div>
        </div>
    </div>
    </div>
    </div>
    </div>
@endsection
