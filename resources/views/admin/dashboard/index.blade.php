@extends('admin.dashboard.layouts.master')
@section('content')
    {{-- @dd($appoinment) --}}
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
                                <i class="mdi  float-right mb-0">{{ $appoinemt->count() }}</i>
                            </div>
                            <h6 class="text-uppercase mb-0">Appoinment</h6>
                        </div>
                    </div>
                </div>
                {{-- <div>Appoinment Doctor Wise</div> --}}
                <!DOCTYPE html>
                <html>

                <head>
                    <style>
                        body {
                            counter-reset: Serial;
                            /* Set the Serial counter to 0 */
                        }


                        tr td:first-child:before {
                            counter-increment: Serial;
                            /* Increment the Serial counter */
                            content: " "counter(Serial);
                            /* Display the counter */
                        }

                        table {
                            font-family: arial, sans-serif;
                            border-collapse: collapse;
                            width: 100%;
                        }

                        td,
                        th {
                            border: 1px solid #dddddd;
                            text-align: left;
                            padding: 8px;
                        }

                        tr:nth-child(even) {
                            background-color: #dddddd;
                        }

                    </style>
                </head>

                <body>
                    <h2>Todays Appoinment Doctor Wise</h2>
                    <table>
                        <tr>
                            <th>Sr.No</th>
                            <th>Doctor</th>
                            <th>Total Appoinment</th>
                        </tr>

                        @foreach ($appoinmentTodays as $value)
                            <tr>
                                <td></td>
                                <td>{{ $value->name }}</td>
                                <td>{{ $value->id }}</td>
                            </tr>
                        @endforeach
                    </table>

                </body>

                </html>



            </div>
            <!-- end row -->

        </div><!-- container fluid -->

    </div> <!-- Page content Wrapper -->



@endsection
