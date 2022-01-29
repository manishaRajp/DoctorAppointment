@extends('admin.dashboard.layouts.master')
@section('content')
    <div class="page-content-wrapper ">
        <div class="container-fluid">
            <div class="row">
                <div class="col-sm-12">
                    <div class="float-right page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Drixo</a></li>
                            <li class="breadcrumb-item active">Dashboard</li>
                        </ol>
                    </div>
                    <h5 class="page-title">Dashboard</h5>
                </div>
            </div>
            <!-- end row -->

            <div class="row">
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat m-b-30">
                        <div class="p-3 bg-primary text-white">
                            <div class="mini-stat-icon">
                                <i class="mdi  float-right mb-0">{{ $dept->count() }}</i>
                            </div>
                            <h6 class="text-uppercase mb-0">Department</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat m-b-30">
                        <div class="p-3 bg-primary text-white">
                            <div class="mini-stat-icon">
                                <i class="mdi  float-right mb-0">{{ $doctor->count() }}</i>
                            </div>
                            <h6 class="text-uppercase mb-0">Doctor</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat m-b-30">
                        <div class="p-3 bg-primary text-white">
                            <div class="mini-stat-icon">
                                <i class="mdi  float-right mb-0">{{ $patient->count() }}</i>
                            </div>
                            <h6 class="text-uppercase mb-0">Patient</h6>
                        </div>
                    </div>
                </div>
                <div class="col-xl-3 col-md-6">
                    <div class="card mini-stat m-b-30">
                        <div class="p-3 bg-primary text-white">
                            <div class="mini-stat-icon">
                                <i class="mdi  float-right mb-0">{{ $appoinment->count() }}</i>
                            </div>
                            <h6 class="text-uppercase mb-0">Appoinment</h6>
                        </div>
                    </div>
                </div>
               
            </div>
            <!-- end row -->

        </div><!-- container fluid -->

    </div> <!-- Page content Wrapper -->



@endsection
