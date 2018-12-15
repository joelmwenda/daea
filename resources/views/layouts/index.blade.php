
<!DOCTYPE html>
<html>


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AIU</title>

    <!-- Custom Fonts -->
    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('font-awesome/css/font-awesome.min.css') }}" rel="stylesheet" type="text/css">

    @yield('css_scripts')
    
    <link href="{{ asset('css/plugins/toastr/toastr.min.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/animate.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet" type="text/css">



</head>

<body>

    <div id="wrapper">

    <nav class="navbar-default navbar-static-side" role="navigation">
        <div class="sidebar-collapse">
            <ul class="nav metismenu" id="side-menu">

                <li class="nav-header">
                    <div class="dropdown profile-element"> <span>
                            <img alt="image" class="img-circle" src="{{ auth()->user()->photo ?? url('img/unknown.jpeg') }}" height="48" width="48" />
                             </span>
                        <a data-toggle="dropdown" class="dropdown-toggle" href="#">
                            <span class="clear"> <span class="block m-t-xs"> <strong class="font-bold"> {{  auth()->user()->full_name }} </strong>
                             </span> <span class="text-muted text-xs block">{{ session('user_type') }} <b class="caret"></b></span> </span> </a>
                        <ul class="dropdown-menu animated fadeInRight m-t-xs">
                            <li><a href="profile.html">Profile</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="mailbox.html">Mailbox</a></li>
                            <li class="divider"></li>
                            <li><a href="login.html">Logout</a></li>
                        </ul>
                    </div>
                    <div class="logo-element">
                        AIU
                    </div>
                </li>

            @section('sidebar')
                   
            @auth     

                @if(auth()->user()->user_type_id < 4)
                
                    <li>
                        <a href="#"><i class="fa fa-users fa-fw"></i> <span class="nav-label">Users</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="{{ url('/user/create')}}">Create User</a>
                            </li>
                            <li>
                                <a href="{{ url('/student/create')}}">Create Student</a>
                            </li>
                            <li>
                                <a href="{{ url('/user')}}">View Users</a>
                            </li>
                            <li>
                                <a href="{{ url('/student/search')}}">Search for Student</a>
                            </li>
                            <li>
                                <a href="{{ url('/lecturer/failed_students')}}">View Failed Students</a>
                            </li>
                            
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-glide-g fa-fw"></i> <span class="nav-label">Grades</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="{{ url('/grade/create')}}">Create Grade</a>
                            </li>
                            <li>
                                <a href="{{ url('/grade')}}">View Grades</a>
                            </li>
                            
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-hourglass fa-fw"></i> <span class="nav-label">Semesters</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="{{ url('/semester/create')}}">Create Semester</a>
                            </li>
                            <li>
                                <a href="{{ url('/semester')}}">View Semesters</a>
                            </li>
                            
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-institution fa-fw"></i> <span class="nav-label">Departments</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="{{ url('/department/create')}}">Create Department</a>
                            </li>
                            <li>
                                <a href="{{ url('/department')}}">View Departments</a>
                            </li>
                            
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>


                    <li>
                        <a href="#"><i class="fa fa-mortar-board fa-fw"></i><span class="nav-label">Degrees</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">

                            <li style="display: none;">
                                <a href="{{ url('/degree_type/create')}}">Create Degree Type</a>
                            </li>
                            <li style="display: none;">
                                <a href="{{ url('/degree_type')}}">View Degree Types</a>
                            </li>

                            <li>
                                <a href="{{ url('/degree/create')}}">Create Degree</a>
                            </li>
                            <li>
                                <a href="{{ url('/degree')}}">View Degrees</a>
                            </li>

                            <li>
                                <a href="{{ url('/curriculum/create')}}">Create Curriculum</a>
                            </li>
                            <li>
                                <a href="{{ url('/curriculum')}}">View Curriculi</a>
                            </li>

                            <li>
                                <a href="{{ url('/specialisation/create')}}">Create Specialisation</a>
                            </li>
                            <li>
                                <a href="{{ url('/specialisation')}}">View Specialisations</a>
                            </li>

                            <li>
                                <a href="{{ url('/degree_course/create')}}">Add Courses to Curriculum</a>
                            </li>
                            <li>
                                <a href="{{ url('/degree_course')}}">View Curriculi Courses</a>
                            </li>
                            
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>



                    <li>
                        <a href="#"><i class="fa fa-blind fa-fw"></i> <span class="nav-label">Intakes</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="{{ url('/intake/create')}}">Create Intake</a>
                            </li>
                            <li>
                                <a href="{{ url('/intake')}}">View Intakes</a>
                            </li>

                            <li>
                                <a href="{{ url('/intake/intake_course')}}">Register Intake for Courses</a>
                            </li>

                            <li>
                                <a href="{{ url('/intake/intake_fee')}}">Charge Fee to Intake</a>
                            </li>
                            
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-clone fa-fw"></i> <span class="nav-label">Courses</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">

                            <li>
                                <a href="{{ url('/course_type/create')}}">Create Course Type</a>
                            </li>
                            <li>
                                <a href="{{ url('/course_type')}}">View Course Types</a>
                            </li>

                            <li>
                                <a href="{{ url('/course/create')}}">Create Course</a>
                            </li>
                            <li>
                                <a href="{{ url('/course')}}">View Courses</a>
                            </li>

                            <li>
                                <a href="{{ url('/course_year/create')}}">Make Course Active</a>
                            </li>
                            <li>
                                <a href="{{ url('/course_year')}}">View Activated Courses</a>
                            </li>

                            
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-money fa-fw"></i> <span class="nav-label">Fees</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">

                            <li>
                                <a href="{{ url('/fee/create')}}">Create Fee</a>
                            </li>
                            <li>
                                <a href="{{ url('/fee')}}">View Fees</a>
                            </li> 
                            <li>
                                <a href="{{ url('/fee/balances')}}">View Balances</a>
                            </li>  
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-money fa-fw"></i> <span class="nav-label">Student Fee</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">

                            <li>
                                <a href="{{ url('/student_fee/create')}}">Charge Fee To Student</a>
                            </li>

                            <li>
                                <a href="{{ url('/student_fee/payment')}}">Register Payment To Student</a>
                            </li>

                            <li>
                                <a href="{{ url('/student_fee')}}">View Fees and Payments</a>
                            </li> 
                            <li>
                                <a href="{{ url('/student_fee/discount')}}">Apply Discount to Student</a>
                            </li>  

                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                    <li>
                        <a href="#"><i class="fa fa-pie-chart fa-fw"></i> <span class="nav-label">Dashboard</span><span class="fa arrow"></span></a>
                        <ul class="nav nav-second-level collapse">
                            <li>
                                <a href="{{ url('/dashboard')}}">Dashboard</a>
                            </li>                            
                        </ul>
                        <!-- /.nav-second-level -->
                    </li>

                @elseif(auth()->user()->user_type_id == 6)                

                    <li>
                        <a href="{{ url('/lecturer')}}"><i class="fa fa-table fa-fw"></i><span class="nav-label">Current Courses</span><span class="fa arrow"></span></a>
                    </li>

                @elseif(auth()->user()->user_type_id == 9)

                    <li style="display: none;">
                        <a href="{{ url('/student_intake/set_intake')}}"></i> Set Intake</a>
                    </li>

                    <li>
                        <a href="{{ url('/course_student/create')}}"></i> Self Registration</a>
                    </li>

                    <li>
                        <a href="{{ url('/student_intake/select_specialisation')}}"></i> Select Specialisaion</a>
                    </li>

                    <li>
                        <a href="{{ url('/student')}}"></i> View Current Progress</a>
                    </li>

                    <li>
                        <a href="{{ url('/student/progress')}}"></i> View Complete Progress</a>
                    </li>

                @endif

                @endauth

                @show
            </ul>
        </div>
    </nav>

    <div id="page-wrapper" class="gray-bg">
        <div class="row border-bottom">
            <nav class="navbar navbar-static-top  " role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <a class="navbar-minimalize minimalize-styl-2 btn btn-primary " href="#"><i class="fa fa-bars"></i> </a>
                
            </div>
                <ul class="nav navbar-top-links navbar-right">

                    <li>
                        <a href="{{ url('/logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();"
                        >
                            <i class="fa fa-sign-out"></i> Log out

                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            {{ csrf_field() }}
                        </form>
                    </li>
                </ul>

            </nav>
        </div>

        @yield('content')


       
        <div class="footer">
            <div>
                <strong>Copyright</strong> Africa International University &copy; {{ date("Y") }}
            </div>
        </div>     
            

    </div>
</div>

    




    <!-- jQuery  -->
    <script src="{{ asset('js/jquery-3.1.1.min.js') }}"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>

    <!-- Highcharts JavaScript -->
    <!-- <script type="text/javascript" src="{{asset('bower_components/highcharts/highcharts.js')}}"></script>
    <script type="text/javascript" src="{{asset('bower_components/highcharts/highcharts-more.js')}}"></script>
    <script type="text/javascript" src="{{asset('bower_components/highcharts/modules/map.js')}}"></script>

    <script type="text/javascript" src="{{asset('bower_components/highcharts/kenya.js')}}"></script> -->
    

    <!-- Metis Menu Plugin JavaScript -->
    <script src="{{ asset('js/plugins/metisMenu/jquery.metisMenu.js') }}"></script>

    <!-- Toastr -->
    <script src="{{ asset('js/plugins/toastr/toastr.min.js') }}"></script>
    

    <!-- Slimscroll -->
    <script src="{{ asset('js/plugins/slimscroll/jquery.slimscroll.min.js') }}"></script>

    <!-- Inspinia -->
    <script src="{{ asset('js/inspinia.js') }}"></script>
    <script src="{{ asset('js/plugins/pace/pace.min.js') }}"></script>

    <script type="text/javascript">
        
        $(document).ready(function(){
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        function set_warning(message)
        {
            setTimeout(function(){
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 6000,
                    preventDuplicates: true
                };
                toastr.warning(message);
            });
        }

        @php
            $toast_message = session()->pull('toast_message');
            $toast_error = session()->pull('toast_error');
        @endphp
        
        @if($toast_message)
            setTimeout(function(){
                toastr.options = {
                    closeButton: false,
                    progressBar: false,
                    showMethod: 'slideDown',
                    timeOut: 6000
                };
                @if($toast_error)
                    toastr.warning("{!! $toast_message !!}", "Warning!");
                @else
                    toastr.success("{!! $toast_message !!}");
                @endif
            });
        @endif

    </script>

    @yield('scripts')

</body>


</html>
