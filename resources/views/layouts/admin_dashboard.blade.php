<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta name="csrf-token" content="EDzjkS4GBXADwTQJ5fdABDXpDEm8tjd8gaJhN0Tp">
    <title>@yield('title')</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
        href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">
    <!-- CSS Files -->
    <link href="{{URL::asset('assets/css/material-dashboard.css')}}" rel="stylesheet" />
    <link href="{{URL::asset('assets/css/custom.css')}}" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{URL::asset('assets/demo/demo.css') }}" rel="stylesheet" />
</head>

<body class="">
    <form id="logout-form" action="#" method="POST" style="display: none;">
        <input type="hidden" name="_token" value="EDzjkS4GBXADwTQJ5fdABDXpDEm8tjd8gaJhN0Tp"> </form>
    <div class="wrapper ">
        <div class="sidebar" data-color="orange" data-background-color="green">
            <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
            <div class="logo">
                <a href="#" class="simple-text logo-normal">
                    <h3>My<span class="text-primary">EDUCATION</span></h3>
                </a>
            </div>
            <div class="sidebar-wrapper">
                <ul class="nav">
                    <li class="{{(Request::is('admin/dashboard'))?'active':''}}">
                        <a class="nav-link" href="/admin/dashboard">
                            <i class="material-icons">dashboard</i>
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li
                        class="{{(Request::is('admin/departments') || Request::is('admin/departments/*'))?'active':''}}">
                        <a class="nav-link" href="/admin/departments">
                            <i class="material-icons">bookmarks</i>
                            <p>Manage Departments</p>
                        </a>
                    </li>
                    <li class="{{(Request::is('admin/students') || Request::is('admin/students/*'))?'active':''}}">
                        <a class="nav-link" href="/admin/students">
                            <i class="material-icons">person</i>
                            <p>Manage Students</p>
                        </a>
                    </li>
                    <li class="{{(Request::is('admin/faculty') || Request::is('admin/faculty/*'))?'active':''}}">
                        <a class="nav-link" href="/admin/faculty">
                            <i class="material-icons">person</i>
                            <p>Manage Faculty</p>
                        </a>
                    </li>
                    <li class="{{(Request::is('admin/complaints') || Request::is('admin/departments/*'))?'active':''}}">
                        <a class="nav-link" href="/admin/complaints">
                            <i class="material-icons">report_problem</i>
                            <p>Complaints</p>
                        </a>
                    </li>
                    <li class="{{(Request::is('admin/classrooms') || Request::is('admin/classrooms/*'))?'active':''}}">
                        <a class="nav-link" href="/admin/classrooms">
                            <i class="material-icons">airplay</i>
                            <p>Manage Classrooms</p>
                        </a>
                    </li>
                    <li class="{{(Request::is('admin/leaves') || Request::is('admin/leaves/*'))?'active':''}}">
                        <a class="nav-link" data-toggle="collapse" href="#leaves" aria-expanded="true">
                            <i class="material-icons">pending</i>
                            <p>Manage Leaves</p>
                        </a>
                        <div class="collapse" id="leaves">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="material-icons">keyboard_arrow_right</i>
                                        <span class="sidebar-normal">Available Leaves</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="/admin/leaves/applications">
                                        <i class="material-icons">keyboard_arrow_right</i>
                                        <span class="sidebar-normal">Leave Applications</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link" data-toggle="collapse" href="#reports" aria-expanded="true">
                            <i class="material-icons">analytics</i>
                            <p>Reports</p>
                        </a>
                        <div class="collapse" id="reports">
                            <ul class="nav">
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="material-icons">keyboard_arrow_right</i>
                                        <span class="sidebar-normal">Attendance Reports</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="material-icons">keyboard_arrow_right</i>
                                        <span class="sidebar-normal">Academic Reports</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="material-icons">keyboard_arrow_right</i>
                                        <span class="sidebar-normal">Performance Reports</span>
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">
                                        <i class="material-icons">keyboard_arrow_right</i>
                                        <span class="sidebar-normal">Leave Reports</span>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="{{(Request::is('admin/subjects') || Request::is('admin/subjects/*'))?'active':''}}">
                        <a class="nav-link" href="/admin/subjects">
                            <i class="material-icons">library_books</i>
                            <p>Manage Subjects</p>
                        </a>
                    </li>
                    <li class="{{(Request::is('admin/notifications'))?'active':''}}">
                        <a class="nav-link" href="#">
                            <i class="material-icons">notifications</i>
                            <p>Notifications</p>
                        </a>
                    </li>
                    <li class="{{(Request::is('admin/schedule') || Request::is('admin/schedule/*'))?'active':''}}">
                        <a class="nav-link" href="/admin/schedule">
                            <i class="material-icons">calendar_today</i>
                            <p>Academic Schedule</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="/logout">
                            <i class="material-icons">exit_to_app</i>
                            <p>Logout</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg navbar-transparent navbar-absolute fixed-top ">
                <div class="container-fluid">
                    <div class="navbar-wrapper">
                        <a class="navbar-brand" href="#">@yield('title')</a>
                    </div>
                    <button class="navbar-toggler" type="button" data-toggle="collapse" aria-controls="navigation-index"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                        <span class="navbar-toggler-icon icon-bar"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end">
                        <ul class="navbar-nav">
                            <li class="nav-item dropdown">
                                <a class="nav-link" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown"
                                    aria-haspopup="true" aria-expanded="false">
                                    <i class="material-icons">notifications</i>
                                    <span class="notification">5</span>
                                    <p class="d-lg-none d-md-block">
                                        Some Actions
                                    </p>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
                                    <a class="dropdown-item" href="#">Mike John responded to your email</a>
                                    <a class="dropdown-item" href="#">You have 5 new tasks</a>
                                    <a class="dropdown-item" href="#">You&#039;re now friend with Andrew</a>
                                    <a class="dropdown-item" href="#">Another Notification</a>
                                    <a class="dropdown-item" href="#">Another One</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    <i class="material-icons">person</i> <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownProfile">
                                    <a class="dropdown-item" href="#">Profile</a>
                                    <a class="dropdown-item" href="#">Settings</a>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>

            <div class="content">
                @yield('content')
            </div>
            <footer class="footer">
                <div class="container-fluid">
                    <nav class="float-left">
                        <ul>
                            <li>
                                <a href="#">
                                    MyEducation
                                </a>
                            </li>
                            <li>
                                <a href="#">
                                    About Us
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <div class="copyright float-right">
                        &copy;
                        Copyright (c)
                        <script>
                            document.write(new Date().getFullYear())
                        </script>
                        <a href="#" target="_blank">MyEducation</a>
                    </div>
                </div>
            </footer>
        </div>
    </div>

    <!--   Core JS Files   -->
    <script src="{{URL::asset('assets/js/core/jquery.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/core/popper.min.js')}}"></script>
    <script src="{{URL::asset('assets/js/core/bootstrap-material-design.min.js')}}">
    </script>
    <script src="{{URL::asset('assets/js/plugins/perfect-scrollbar.jquery.min.js')}}">
    </script>
    @yield('scripts')
    <!-- Plugin for the momentJs  -->
    <script src="{{URL::asset('assets/js/plugins/moment.min.js')}}"></script>
    <!--  Plugin for Sweet Alert -->
    <script src="{{URL::asset('assets/js/plugins/sweetalert2.js')}}"></script>
    <!-- Forms Validations Plugin -->
    <script src="{{URL::asset('assets/js/plugins/jquery.validate.min.js')}}">
    </script>
    <!-- Plugin for the Wizard, full documentation here: https://github.com/VinceG/twitter-bootstrap-wizard -->
    <script src="{{URL::asset('assets/js/plugins/jquery.bootstrap-wizard.js')}}">
    </script>
    <!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
    <script src="{{URL::asset('assets/js/plugins/bootstrap-selectpicker.js')}}">
    </script>
    <!--  Plugin for the DateTimePicker, full documentation here: https://eonasdan.github.io/bootstrap-datetimepicker/ -->
    <script src="{{URL::asset('assets/js/plugins/bootstrap-datetimepicker.min.js')}}">
    </script>
    <!--  DataTables.net Plugin, full documentation here: https://datatables.net/  -->
    <script src="{{URL::asset('assets/js/plugins/jquery.dataTables.min.js')}}">
    </script>
    <!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
    <script src="{{URL::asset('assets/js/plugins/bootstrap-tagsinput.js')}}">
    </script>
    <!-- Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
    <script src="{{URL::asset('assets/js/plugins/jasny-bootstrap.min.js')}}">
    </script>
    <!--  Full Calendar Plugin, full documentation here: https://github.com/fullcalendar/fullcalendar    -->
    <script src="{{URL::asset('assets/js/plugins/fullcalendar.min.js')}}"></script>
    <!-- Vector Map plugin, full documentation here: http://jvectormap.com/documentation/ -->
    <script src="{{URL::asset('assets/js/plugins/jquery-jvectormap.js')}}"></script>
    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="{{URL::asset('assets/js/plugins/nouislider.min.js')}}"></script>
    <!-- Include a polyfill for ES6 Promises (optional) for IE11, UC Browser and Android browser support SweetAlert -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/core-js/2.4.1/core.js"></script>
    <!-- Library for adding dinamically elements -->
    <script src="{{URL::asset('assets/js/plugins/arrive.min.js')}}"></script>
    <!-- Chartist JS -->
    <script src="{{URL::asset('assets/js/plugins/chartist.min.js')}}"></script>
    <!--  Notifications Plugin    -->
    <script src="{{URL::asset('assets/js/plugins/bootstrap-notify.js')}}"></script>
    <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
    <script src="{{URL::asset('assets/js/material-dashboard.js')}}" type="text/javascript"></script>
</body>

</html>