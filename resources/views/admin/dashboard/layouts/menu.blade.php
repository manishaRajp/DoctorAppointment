<!-- ========== Left Sidebar Start ========== -->
<div class="left side-menu">
    <button type="button" class="button-menu-mobile button-menu-mobile-topbar open-left waves-effect">
        <i class="ion-close"></i>
    </button>

    <div class="left-side-logo d-block d-lg-none">
        <div class="text-center">

            <a href="index.html" class="logo"><img src="assets/images/logo-dark.png" height="20"
                    alt="logo"></a>
        </div>
    </div>

    <div class="sidebar-inner slimscrollleft">

        <div id="sidebar-menu">
            <ul>
                <li class="menu-title">Main</li>

                <li>
                    <a href="{{ route('admin.dashboard') }}" class="waves-effect">
                        <i class="dripicons-meter"></i>
                        <span> Dashboard <span class="badge badge-success badge-pill float-right"></span></span>
                    </a>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-account-plus"></i><span>
                            Doctot
                            List </span> <span class="menu-arrow float-right"><i
                                class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('admin.doctor.index') }}">View</a></li>
                        <li><a href="{{ route('admin.doctor.create') }}">Create</a></li>
                    </ul>
                </li>
                  <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="fa fa-bed"></i><span>
                            Patient </span> <span class="menu-arrow float-right"><i
                                class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('admin.patient.index') }}">View</a></li>
                        <li><a href="{{ route('admin.patient.create') }}">Create</a></li>
                    </ul>
                </li>
                <li class="has_sub">
                    <a href="javascript:void(0);" class="waves-effect"><i class="mdi mdi-alarm-plus"></i><span>
                            Appoinment </span> <span class="menu-arrow float-right"><i
                                class="mdi mdi-chevron-right"></i></span></a>
                    <ul class="list-unstyled">
                        <li><a href="{{ route('admin.appoinment.index') }}">View</a></li>
                        <li><a href="{{ route('admin.appoinment.create') }}">Create</a></li>    
                    </ul>

                </li>

                          <li><a class="waves-effect" href="{{ route('admin.department.create') }}"><i class="mdi mdi-bookmark">Department</i></a></li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div> <!-- end sidebarinner -->
</div>
<!-- Left Sidebar End -->
