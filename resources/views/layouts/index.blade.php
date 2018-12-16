
<!DOCTYPE html>
<html>


<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>DAEA</title>

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
                        DAEA
                    </div>
                </li>

            @section('sidebar')
                   
            @auth   

                @if(!auth()->user()->is_member)  

                    <li>
                        <a href="{{ url('/registration/create')}}"><i class="fa fa-hourglass fa-fw"></i><span class="nav-label">Renew Membership</span></a>
                    </li>

                @endif

                <li>
                    <a href="#"><i class="fa fa-table fa-fw"></i> <span class="nav-label">Events</span><span class="fa arrow"></span></a>
                    <ul class="nav nav-second-level collapse">
                        <li>
                            <a href="{{ url('/occasion/create')}}">Create Event</a>
                        </li>
                        <li>
                            <a href="{{ url('/occasion')}}">View Events</a>
                        </li>
                        
                    </ul>
                    <!-- /.nav-second-level -->
                </li>

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
