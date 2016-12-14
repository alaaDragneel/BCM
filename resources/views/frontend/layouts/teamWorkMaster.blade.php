<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
     <title>Admin | @yield('title', 'dashboard')</title>
     <!-- Tell the browser to be responsive to screen width -->
     <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
     <!-- Bootstrap 3.3.6 -->
     <link rel="stylesheet" href="{{asset('src/frontend/bootstrap/css/bootstrap.min.css')}}">
     <!-- Font Awesome -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
     <!-- Ionicons -->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
     <!-- jvectormap -->
     <link rel="stylesheet" href="{{asset('src/frontend/plugins/jvectormap/jquery-jvectormap-1.2.2.css')}}">
     <link href="{{asset('src/frontend/dist/css/jasny-bootstrap.css')}}" rel="stylesheet">
     {!! Html::style('src/frontend/usersFiles/css/themify-icons.css') !!}

     <!-- Theme style -->
     <link rel="stylesheet" href="{{asset('src/frontend/dist/css/AdminLTE.css')}}">
     <!-- AdminLTE Skins. Choose a skin from the css/skins
     folder instead of downloading all of them to reduce the load. -->
     <link rel="stylesheet" href="{{asset('src/frontend/dist/css/skins/skin-purple.css')}}">
     {{-- google fonts --}}
     <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400" rel="stylesheet">
     <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
     <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
     <!--[if lt IE 9]>
     <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
     <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
     <![endif]-->
     @yield('styles')
</head>
<body class="hold-transition skin-purple sidebar-mini">
     <!-- inner menu: contains the actual data -->
     <div class="wrapper">
          <a href="#" class="alert alert-info" id="infoBox">
               <h4 id="boxAlertTitle"></h4>
               <hr>
               <p id="boxAlertDesc"></p>
          </a>
          <header class="main-header">
               <!-- Logo -->
               <a href="{{ route('team.dashboard') }}" class="logo">
                    <!-- mini logo for sidebar mini 50x50 pixels -->
                    <span class="logo-mini"><b>c</b>P</span>
                    <!-- logo for regular state and mobile devices -->
                    <span class="logo-lg"><b>c</b>Panel</span>
               </a>
               <!-- Header Navbar: style can be found in header.less -->
               <nav class="navbar navbar-static-top">
                    <!-- Sidebar toggle button-->
                    <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                         <span class="sr-only">Toggle navigation</span>
                    </a>
                    <!-- Navbar Right Menu -->
                    <div class="navbar-custom-menu">
                         <ul class="nav navbar-nav">
                              <!-- Messages: style can be found in dropdown.less-->
                              <li class="dropdown messages-menu">
                                   <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-envelope-o"></i>
                                        <span class="label label-success">4</span>
                                   </a>
                                   <ul class="dropdown-menu">
                                        <li class="header">You have 4 messages</li>
                                        <li>
                                             <!-- inner menu: contains the actual data -->
                                             <ul class="menu">
                                                  <!-- start message -->
                                                  <li>
                                                       <a href="#">
                                                            <div class="pull-left">
                                                                 <img src="{{asset('src/frontend/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image">
                                                            </div>
                                                            <h4>
                                                                 Support Team
                                                                 <small><i class="fa fa-clock-o"></i> 5 mins</small>
                                                            </h4>
                                                            <p>Why not buy a new awesome theme?</p>
                                                       </a>
                                                  </li>
                                                  <!-- end message -->
                                                  <li>
                                                       <a href="#">
                                                            <div class="pull-left">
                                                                 <img src="{{asset('src/frontend/dist/img/user3-128x128.jpg')}}" class="img-circle" alt="User Image">
                                                            </div>
                                                            <h4>
                                                                 AdminLTE Design Team
                                                                 <small><i class="fa fa-clock-o"></i> 2 hours</small>
                                                            </h4>
                                                            <p>Why not buy a new awesome theme?</p>
                                                       </a>
                                                  </li>
                                                  <li>
                                                       <a href="#">
                                                            <div class="pull-left">
                                                                 <img src="{{asset('src/frontend/dist/img/user4-128x128.jpg')}}" class="img-circle" alt="User Image">
                                                            </div>
                                                            <h4>
                                                                 Developers
                                                                 <small><i class="fa fa-clock-o"></i> Today</small>
                                                            </h4>
                                                            <p>Why not buy a new awesome theme?</p>
                                                       </a>
                                                  </li>
                                                  <li>
                                                       <a href="#">
                                                            <div class="pull-left">
                                                                 <img src="{{asset('src/frontend/dist/img/user3-128x128.jpg')}}" class="img-circle" alt="User Image">
                                                            </div>
                                                            <h4>
                                                                 Sales Department
                                                                 <small><i class="fa fa-clock-o"></i> Yesterday</small>
                                                            </h4>
                                                            <p>Why not buy a new awesome theme?</p>
                                                       </a>
                                                  </li>
                                                  <li>
                                                       <a href="#">
                                                            <div class="pull-left">
                                                                 <img src="{{asset('src/frontend/dist/img/user4-128x128.jpg')}}" class="img-circle" alt="User Image">
                                                            </div>
                                                            <h4>
                                                                 Reviewers
                                                                 <small><i class="fa fa-clock-o"></i> 2 days</small>
                                                            </h4>
                                                            <p>Why not buy a new awesome theme?</p>
                                                       </a>
                                                  </li>
                                             </ul>
                                        </li>
                                        <li class="footer"><a href="#">See All Messages</a></li>
                                   </ul>
                              </li>
                              <!-- Notifications: style can be found in dropdown.less -->
                              <li class="dropdown notifications-menu">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                  <i class="fa fa-bell-o"></i> {{-- get the notification --}}
                                    <span class="label label-warning" id="countLable">6</span>
                                </a>
                                <ul class="dropdown-menu">
                                    <li class="header" id="countHeader">You have 3 unreaded notifications </li>
                                  <li>
                                    <ul class="menu">
                                      <!-- start message -->
                                      <li class="Noty">
                                        <a href="#" class="notyPlace">
                                          <div class="pull-left">
                                            <img src="{{asset('src/frontend/dist/img/user2-160x160.jpg')}}" class="img-circle Notyimg" alt="User Image">
                                          </div>
                                          <h4 class="notyInfo" data-id="" data-url="">
                                            <span class="notiyFrom">gudi</span>
                                            <small class="notyDate"><i class="fa fa-clock-o"></i> 3:20 PM</small>
                                          </h4>
                                          <p class="notyAction ">
                                            <i class="fa fa-users text-aqua"></i> welcome
                                          </p>
                                        </a>
                                      </li>
                                      <!-- end message -->
                                    </ul>
                                  </li>
                                  <li class="footer"><a href="#">View all</a></li>
                                </ul>
                              </li>
                    <!-- Tasks: style can be found in dropdown.less -->
                    <li class="dropdown tasks-menu">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <i class="fa fa-flag-o"></i>
                              <span class="label label-danger">9</span>
                         </a>
                         <ul class="dropdown-menu">
                              <li class="header">You have 9 tasks</li>
                              <li>
                                   <!-- inner menu: contains the actual data -->
                                   <ul class="menu">
                                        <li><!-- Task item -->
                                             <a href="#">
                                                  <h3>
                                                       Design some buttons
                                                       <small class="pull-right">20%</small>
                                                  </h3>
                                                  <div class="progress xs">
                                                       <div class="progress-bar progress-bar-aqua" style="width: 20%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">20% Complete</span>
                                                       </div>
                                                  </div>
                                             </a>
                                        </li>
                                        <!-- end task item -->
                                        <li><!-- Task item -->
                                             <a href="#">
                                                  <h3>
                                                       Create a nice theme
                                                       <small class="pull-right">40%</small>
                                                  </h3>
                                                  <div class="progress xs">
                                                       <div class="progress-bar progress-bar-green" style="width: 40%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">40% Complete</span>
                                                       </div>
                                                  </div>
                                             </a>
                                        </li>
                                        <!-- end task item -->
                                        <li><!-- Task item -->
                                             <a href="#">
                                                  <h3>
                                                       Some task I need to do
                                                       <small class="pull-right">60%</small>
                                                  </h3>
                                                  <div class="progress xs">
                                                       <div class="progress-bar progress-bar-red" style="width: 60%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">60% Complete</span>
                                                       </div>
                                                  </div>
                                             </a>
                                        </li>
                                        <!-- end task item -->
                                        <li><!-- Task item -->
                                             <a href="#">
                                                  <h3>
                                                       Make beautiful transitions
                                                       <small class="pull-right">80%</small>
                                                  </h3>
                                                  <div class="progress xs">
                                                       <div class="progress-bar progress-bar-yellow" style="width: 80%" role="progressbar" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                                                            <span class="sr-only">80% Complete</span>
                                                       </div>
                                                  </div>
                                             </a>
                                        </li>
                                        <!-- end task item -->
                                   </ul>
                              </li>
                              <li class="footer">
                                   <a href="#">View all tasks</a>
                              </li>
                         </ul>
                    </li>
                    <!-- User Account: style can be found in dropdown.less -->
                    <?php $uName = strstr(Auth::guard('teamWork')->user()->email, '@', true);?>
                    <li class="dropdown user user-menu">
                         <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                              <img src="{{asset(Auth::guard('teamWork')->user()->image)}}" class="user-image" alt="User Image">
                              <span class="hidden-xs">{{ $uName }}</span>
                         </a>
                         <ul class="dropdown-menu">
                              <!-- User image -->
                              <li class="user-header">
                                   <img src="{{asset(Auth::guard('teamWork')->user()->image)}}" class="img-circle" alt="User Image">

                                   <p>
                                        {{ $uName }} - {{ Auth::guard('teamWork')->user()->job }}
                                        <small>Member since {{ Auth::guard('teamWork')->user()->created_at->format('Y.m.d') }}</small>
                                   </p>
                              </li>
                         </li>
                         <!-- Menu Footer-->
                         <li class="user-footer">
                              <div class="pull-left">
                                   <a href="{{ route('team.profile') }}" class="btn btn-default btn-flat">Profile</a>
                              </div>
                              <div class="pull-right">
                                   <a href="{{url('teamwork/logout')}}" class="btn btn-default btn-flat">Sign out</a>
                              </div>
                         </li>
                    </ul>
               </li>
          </ul>
     </div>

</nav>
</header>
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
     <!-- sidebar: style can be found in sidebar.less -->
     <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
               <div class="pull-left image">
                    <img src="{{asset(Auth::guard('teamWork')->user()->image)}}" class="img-circle" alt="User Image">
               </div>
               <div class="pull-left info">
                    <p>{{ $uName }}</p>
                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
               </div>
          </div>
          <ul class="sidebar-menu">
               <li class="header text-uppercase">MAIN NAVIGATION</li>
               <li>
                    <a href="{{ route('team.dashboard') }}">
                         <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
               </li>
          </ul>
          <ul class="sidebar-menu">
               <li class="header text-uppercase">Tasks NAVIGATION</li>
               <li class="treeview">
                    <a href="#">
                         <i class="fa fa-paperclip"></i> <span>Tasks</span>
                         <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                         </span>
                    </a>
                    <ul class="treeview-menu">
                         <li><a href="#"><i class="fa fa-plus"></i> Make T.O.S.</a></li>
                         <li><a href="#"><i class="fa fa-eye"></i> View Task/s Canvas</a></li>
                    </ul>
               </li>
          </ul>
          <ul class="sidebar-menu">
               <li class="header text-uppercase">Team Work NAVIGATION</li>

               <li class="treeview">
                    <a href="#">
                         <i class="fa fa-users"></i> <span>Team Work</span>
                         <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                         </span>
                    </a>
                    <ul class="treeview-menu">
                         <li><a href="#"><i class="fa fa-users"></i> View Team Work</a></li>
                         <li><a href="#"><i class="fa fa-arrow-down"></i> My Attendance</a></li>
                         <li><a href="#"><i class="fa fa-clock-o"></i> My Active/Lazy</a></li>
                    </ul>
               </li>
          </ul>
          <ul class="sidebar-menu">
               <li class="header text-uppercase">Rate NAVIGATION</li>
               <li class="treeview">
                    <a href="#">
                         <i class="fa fa-star-half-o"></i> <span>My Rate</span>
                         <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                         </span>
                    </a>
                    <ul class="treeview-menu">
                         <li><a href="#"><i class="fa fa-star"></i> My behaviore</a></li>
                         <li><a href="#"><i class="fa fa-star-half-o"></i> My productivity</a></li>
                         <li><a href="#"><i class="fa fa-star-o"></i> My Co.Work</a></li>
                    </ul>
               </li>
          </ul>
          <ul class="sidebar-menu">
               <li class="header text-uppercase">Quick NAVIGATION</li>
               <li class="treeview">
                    <a href="#">
                         <i class="fa fa-dashboard"></i> <span>Quick Links</span>
                         <span class="pull-right-container">
                              <i class="fa fa-angle-left pull-right"></i>
                         </span>
                    </a>
                    <ul class="treeview-menu">
                         <li><a href="{{route('team.dashboard')}}"><i class="fa fa-circle-o"></i> Dashboard</a></li>
                         <li><a href="#"><i class="fa fa-paperclip"></i> Tasks</a></li>
                         <li><a href="#"><i class="fa fa-users"></i> Team Work</a></li>
                         <li><a href="#"><i class="fa fa-star-half-o"></i> my Rate</a></li>
                         <li><a href="#"><i class="fa fa-arrow-circle-down"></i> Logs</a></li>
                    </ul>
               </li>
          </ul>
     </section>
     <!-- /.sidebar -->
</aside>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
     @include('frontend.includes.boxs')

     @yield('content')
</div>
<!-- /.content-wrapper -->
<footer class="main-footer">
     <div class="pull-right hidden-xs">
          <b>Version</b> 2.3.7
     </div>
     <strong>Copyright &copy; 2014-2016 <a href="http://almsaeedstudio.com">Almsaeed Studio</a>.</strong> All rights
     reserved.
</footer>

<!-- Add the sidebar's background. This div must be placed
immediately after the control sidebar -->
<div class="control-sidebar-bg"></div>

</div>
<!-- ./wrapper -->
<div class="modal fade" tabindex="-1" role="dialog" id="notifyModal">
     <div class="modal-dialog" role="document">
          <div class="modal-content">
               <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="notifyTitle"></h4>
               </div>
               <div class="modal-body">
                    <small id="notyDate" class="pull-right"></small>
                    <div class="clearfix"></div>
                    <p id="notifyAction"></p>
               </div>
               <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
               </div>
          </div><!-- /.modal-content -->
     </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<script>
     var notyInsertUrl = '{{ route('noty.insert') }}';
     var notyUpdateUrl = '{{ route('noty.update') }}';
     var token = '{{ csrf_token() }}';
     var notificationNoty = '{{ asset('src/frontend/notification/demonstrative') }}';
     var urlLinkTeamWork = '{{route('teamworks')}}';
     var urlLinkBMC = '{{route('create.projects')}}';
     var urlLinkBMCProject = '{{route('projects')}}';
     var AuthName = '{{ Auth::guard('teamWork')->user()->name }}';
     var AuthId = '{{ Auth::guard('teamWork')->user()->id }}';
</script>
<!-- jQuery 2.2.3 -->
<script src="{{asset('src/frontend/plugins/jQuery/jquery-2.2.3.min.js')}}"></script>
<!-- Bootstrap 3.3.6 -->
<script src="{{asset('src/frontend/bootstrap/js/bootstrap.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('src/frontend/plugins/fastclick/fastclick.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('src/frontend/dist/js/jquery.playSound.js')}}"></script>
<script src="{{asset('src/frontend/dist/js/app.js')}}"></script>
<script src="{{asset('src/frontend/dist/js/noty.js')}}"></script>
@if (Auth::check())
     @if (Auth::guard('teamWork')->user()->TeamWorks()->count() === 0)
          <script src="{{asset('src/frontend/dist/js/AddNotyMember.js')}}" id="AddNotyMember"></script>
     @endif
     @if (Auth::guard('teamWork')->user()->BMC()->count() === 0)
          <script src="{{asset('src/frontend/dist/js/AddNotyBMC.js')}}" id="AddNotyBMC"></script>
     @endif
@endif
<script src="{{asset('src/frontend/dist/js/mainInfo.js')}}"></script>
<!-- Sparkline -->
<script src="{{asset('src/frontend/plugins/sparkline/jquery.sparkline.min.js')}}"></script>
<!-- jvectormap -->
<script src="{{asset('src/frontend/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js')}}"></script>
<script src="{{asset('src/frontend/plugins/jvectormap/jquery-jvectormap-world-mill-en.js')}}"></script>
<!-- SlimScroll 1.3.0 -->
<script src="{{asset('src/frontend/plugins/slimScroll/jquery.slimscroll.min.js')}}"></script>
<!-- ChartJS 1.0.1 -->
<script src="{{asset('src/frontend/plugins/chartjs/Chart.min.js')}}"></script>
<script src="{{asset('src/frontend/dist/js/jasny-bootstrap.js')}}"></script>
{{-- <script type="text/javascript">
var urlInfoCpanel = '{{ route('info.update') }}';
var token = '{{ csrf_token() }}';
</script> --}}

@include('frontend.includes.teamWorksModels')
{!! Html::script('src/frontend/usersFiles/js/teamwork.js') !!}
<script>
     var url = '{{ route('create.member') }}';
     var deleteUrl = '{{route('delete.member')}}';
     var token = '{{ Session::token() }}';
</script>
@yield('scripts')
</body>
</html>
