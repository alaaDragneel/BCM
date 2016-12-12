
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
  <link rel="stylesheet" href="{{asset('src/frontend/dist/css/skins/skin-blue.css')}}">
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
<body class="hold-transition skin-blue sidebar-mini">
  <?php //$cPanelInfo = Auth::user()->cPanelInfo; ?>
  {{-- @if ($cPanelInfo === 0)
     <div class="main-info">
          <div class="row">
               <div class="col-md-4">
                    <div class="col-md-12 profile-imgHid" id="profile-img" data-name="profile-img"></div>
                    <div class="col-md-12 dashboardHid" id="dashboard" data-name="dashboard"></div>
                    <div class="col-md-12 projectsHid" id="projects" data-name="projects"></div>
                    <div class="col-md-12 projectsInfoHid" id="projectsInfo" data-name="projectsInfo"></div>
                    <div class="col-md-12 teamworkHid" id="teamwork" data-name="teamwork"></div>
                    <div class="col-md-12 teamworkInfoHid" id="teamworkInfo" data-name="teamworkInfo"></div>
                    <div class="col-md-12 rateMemberHid" id="rateMember" data-name="rateMember"></div>
                    <div class="col-md-12 rateMemberInfoHid" id="rateMemberInfo" data-name="rateMemberInfo"></div>
                    <div class="col-md-12 quickHid" id="quick" data-name="quick"></div>
                    <div class="col-md-12 quickInfoHid" id="quickInfo" data-name="quickInfo"></div>
                    <div class="col-md-12 back-div" id="back-div" data-name="back"></div>
               </div>
               <div class="col-md-8">
                 <div class="col-md-12 home" id="home" data-name="home">
                   <h1 class="conHeading">Welcome TO Ilgudi</h1>
                   <h2 class="conHeading2">Welcome To Our Website for bussniss</h2>
                   <p class="conParph">This Will Be the gide that will help you for Know What You Need To Know</p>
                   <p class="conBtn">Just Click Next TO contaniue Or Finish If You Are Not Enteristed</p>
                   <button type='button' class='btn btn-lg btn-default ' id="startInfo" style="position: absolute;left: 67%;">Start</button>
                 </div>
                 <div class="col-md-12 profile-imgConHid" id="profile-imgCon" data-name="profile-imgCon">
                   <h1 class="conHeading">Welcome TO profile</h1>
                 </div>
                 <div class="col-md-12 dashboardConHid" id="dashboardCon" data-name="dashboardCon">
                   <h1 class="conHeading">Welcome TO dashboard</h1>
                 </div>
                 <div class="col-md-12 projectsConHid" id="projectsCon" data-name="projectsCon">
                   <h1 class="conHeading">Welcome TO projects</h1>
                 </div>
                 <div class="col-md-12 projectsInfoConHid" id="projectsInfoCon" data-name="projectsInfoCon">
                   <h1 class="conHeading">Welcome TO projectsInfo</h1>
                 </div>
                 <div class="col-md-12 teamworkConHid" id="teamworkCon" data-name="teamworkCon">
                   <h1 class="conHeading">Welcome TO teamwork</h1>
                 </div>
                 <div class="col-md-12 teamworkInfoConHid" id="teamworkInfoCon" data-name="teamworkInfoCon">
                   <h1 class="conHeading">Welcome TO teamworkInfo</h1>
                 </div>
                 <div class="col-md-12 rateMemberConHid" id="rateMemberCon" data-name="rateMemberCon">
                   <h1 class="conHeading">Welcome TO rateMember</h1>
                 </div>
                 <div class="col-md-12 rateMemberInfoConHid" id="rateMemberInfoCon" data-name="rateMemberInfoCon">
                   <h1 class="conHeading">Welcome TO rateMemberInfo</h1>
                 </div>
                 <div class="col-md-12 quickConHid" id="quickCon" data-name="quickCon">
                   <h1 class="conHeading">Welcome TO quick</h1>
                 </div>
                 <div class="col-md-12 quickInfoConHid" id="quickInfoCon" data-name="quickInfoCon">
                   <h1 class="conHeading">Welcome TO quickInfo</h1>
                 </div>
                 <div class="col-md-12 back-Condiv" id="back-Condiv" data-name="backCon"></div>
               </div>
               <div class="col-md-12" id="btns">
                 <button type='button' class='btn btn-lg btn-primary ' id="nextInfo">Next</button>
                 <button type='button' class='btn btn-lg btn-danger ' id="finishInfo"> Finish</button>

               </div>
          </div>
        </div>
  @endif --}}
  {{-- <div class="projects-info">
       <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-8">
              <div class="col-md-12">
                <div id="homeProject">
                  <h1>Welcome to the Create Projects Page</h1>
                  <button type='button' class='btn btn-lg btn-default ' id="startInfoProject" style="position: absolute;left: 67%;top: 5%;">Start</button>
                </div>
                <div id="bmcCon">
                  <h1>Welcome to the BMC</h1>
                </div>
              </div>
              <div class="col-md-12 bmc"></div>
            </div>
            <div class="col-md-12" id="btnsProject">
              <button type='button' class='btn btn-lg btn-primary ' id="nextInfoProject">Next</button>
              <button type='button' class='btn btn-lg btn-danger ' id="finishInfoProject"> Finish</button>
            </div>
       </div>
     </div> --}}
     <!-- inner menu: contains the actual data -->
  <div class="wrapper">
      <a href="#" class="alert alert-info" id="infoBox">
        <h4 id="boxAlertTitle"></h4>
        <hr>
        <p id="boxAlertDesc"></p>
      </a>
    <header class="main-header">
      <!-- Logo -->
      <a href="{{ route('dashboard') }}" class="logo">
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
                <?php $countNotify = Auth::user()->Notifications()->where('read', '0')->count();?>
                @if ($countNotify > 0)
                  <span class="label label-warning" id="countLable">{{ $countNotify }}</span>
                  @else
                    <span class="label label-warning" id="countLable">0</span>
                @endif
              </a>
              <ul class="dropdown-menu">
                @if ($countNotify > 0)
                  <li class="header" id="countHeader">You have {{ $countNotify }} unreaded notifications </li>
                  @else
                  <li class="header" id="countHeader">You have no unreaded notifications </li>
                @endif
                <li>
                  <ul class="menu">
                  @foreach (Auth::user()->Notifications()->orderBy('created_at', 'DESC')->get() as $notify)
                    <!-- start message -->
                    <li class="Noty {{ $notify->read === 0 ? 'unReadNoty' : 'readNoty' }}">
                      <a href="#" class="notyPlace">
                        <div class="pull-left">
                          <img src="{{asset('src/frontend/dist/img/user2-160x160.jpg')}}" class="img-circle Notyimg" alt="User Image">
                        </div>
                        <h4 class="notyInfo {{ $notify->read === 0 ? 'notyUnReadInfo' : 'notyReadInfo' }}" data-id="{{ $notify->id }}" data-url="{{ $notify->url }}">
                          <span class="notiyFrom">{{ $notify->added_by }}</span>
                          <small class="notyDate"><i class="fa fa-clock-o"></i> {{ $notify->created_at->format('h:i A') }}</small>
                        </h4>
                        <p class="notyAction {{ $notify->read === 0 ? 'unReadNotyAction' : 'notyReadAction' }}">
                          <i class="fa fa-{{ $notify->type }} text-aqua"></i> {{ $notify->action }}
                        </p>
                      </a>
                    </li>
                    <!-- end message -->
                  @endforeach
                  </ul>
                </li>
                <li class="footer"><a href="{{ route('all.noty') }}">View all</a></li>
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
            <li class="dropdown user user-menu">
              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <img src="{{asset(Auth::user()->image)}}" class="user-image" alt="User Image">
                <span class="hidden-xs">{{ Auth::user()->name !== '' ? Auth::user()->name : Auth::user()->firstName .' '. Auth::user()->lastName}}</span>
              </a>
              <ul class="dropdown-menu">
                <!-- User image -->
                <li class="user-header">
                  <img src="{{asset(Auth::user()->image)}}" class="img-circle" alt="User Image">

                  <p>
                    {{ Auth::user()->name !== '' ? Auth::user()->name : Auth::user()->firstName .' '. Auth::user()->lastName}} - {{ Auth::user()->job }}
                    <small>Member since {{ Auth::user()->created_at->format('Y.m.d') }}</small>
                  </p>
                </li>
              </li>
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">
                  <a href="{{ route('profile') }}" class="btn btn-default btn-flat">Profile</a>
                </div>
                <div class="pull-right">
                  <a href="{{url('/logout')}}" class="btn btn-default btn-flat">Sign out</a>
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
          <img src="{{asset(Auth::user()->image)}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{ Auth::user()->name }}</p>
          <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
        </div>
      </div>
      <ul class="sidebar-menu">
        <li class="header text-uppercase">MAIN NAVIGATION</li>
        <li>
          <a href="{{ route('dashboard') }}">
            <i class="fa fa-dashboard"></i> <span>Dashboard</span>
          </a>
        </li>
      </ul>
      <ul class="sidebar-menu">
        <li class="header text-uppercase">Projects NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-paperclip"></i> <span>Projects</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="{{ route('create.projects') }}"><i class="fa fa-plus"></i> Create Project Canvas</a></li>
            <li><a href="{{ route('projects') }}"><i class="fa fa-eye"></i> View Project/s Canvas</a></li>
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
            <li><a href="{{ route('teamworks') }}"><i class="fa fa-users"></i> View Team Work</a></li>
            <li><a href="#"><i class="fa fa-arrow-down"></i> members Attendance</a></li>
            <li><a href="#"><i class="fa fa-clock-o"></i> members Active/Lazy</a></li>
          </ul>
        </li>
      </ul>
      <ul class="sidebar-menu">
        <li class="header text-uppercase">Rate NAVIGATION</li>
        <li class="treeview">
          <a href="#">
            <i class="fa fa-star-half-o"></i> <span>Rate Members</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#"><i class="fa fa-star"></i> rate members behaviore</a></li>
            <li><a href="#"><i class="fa fa-star-half-o"></i> rate members productivity</a></li>
            <li><a href="#"><i class="fa fa-star-o"></i> rate members Co.Work</a></li>
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
            <li><a href="{{ route('dashboard') }}"><i class="fa fa-circle-o"></i> Dashboard</a></li>
            <li><a href="{{ route('projects') }}"><i class="fa fa-paperclip"></i> Projects</a></li>
            <li><a href="{{ route('teamworks') }} "><i class="fa fa-users"></i> Team Work</a></li>
            <li><a href="#"><i class="fa fa-star-half-o"></i> Rate Members</a></li>
            <li><a href="{{ route('logs') }} "><i class="fa fa-arrow-circle-down"></i> Logs</a></li>
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
var AuthName = '{{ Auth::user()->name }}';
var AuthId = '{{ Auth::user()->id }}';
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
  @if (Auth::user()->TeamWorks()->count() === 0)
    <script src="{{asset('src/frontend/dist/js/AddNotyMember.js')}}" id="AddNotyMember"></script>
  @endif
  @if (Auth::user()->BMC()->count() === 0)
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


@yield('scripts')
</body>
</html>
