<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8" />

	<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
	<link rel="icon" type="image/png" sizes="96x96" href="assets/img/favicon.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<title>@yield('title')</title>
	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    	<meta name="viewport" content="width=device-width" />
    <!-- Bootstrap core CSS     -->
    {!! Html::style('src/frontend/usersFiles/css/bootstrap.min.css') !!}
    <!-- Animation library for notifications   -->
    {!! Html::style('src/frontend/usersFiles/css/animate.min.css') !!}
    <!--  Paper Dashboard core CSS    -->
    {!! Html::style('src/frontend/usersFiles/css/paper-dashboard.css') !!}
    <!--  Fonts and icons     -->
    {!! Html::style('src/frontend/global/css/font-awesome.min.css') !!}
		{{-- google fonts --}}
	  <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:300,400" rel="stylesheet">
    {!! Html::style('src/frontend/usersFiles/css/themify-icons.css') !!}
	@yield('styles')
</head>
<body style="background-color: #f4f3ef;">

<div class="wrapper">
    <div class="sidebar" data-background-color="black" data-active-color="info">

    <!--
		Tip 1: you can change the color of the sidebar's background using: data-background-color="white | black"
		Tip 2: you can change the color of the active button using the data-active-color="primary | info | success | warning | danger"
	-->

    	<div class="sidebar-wrapper">
	       <div class="logo">
	           <a href="#" class="simple-text">
	              {{ Auth::user()->name }}
	           </a>
	       </div>

          <ul class="nav">
               <li {{ Request::is('users/dashboard') ? 'class=active' : '' }}>
                    <a href="{{ route('dashboard') }}">
                        <i class="ti-panel"></i>
                        <p>Dashboard</p>
                    </a>
               </li>
							 @if(Auth::check())
								 @if(Auth::user()->userType === 3)
									 <li {{ Request::is('users/teamworks*') ? 'class=active' : '' }}>
										 <a href="{{ route('teamworks') }}">
											 <i class="fa fa-users"></i>
											 <p>teamWorks</p>
										 </a>
									 </li>
								 @endif
							 @endif
            	<li {{ Request::is('users/projects*') ? 'class=active' : '' }}>
                    <a href="{{ route('projects') }}">
                        <i class="fa fa-tasks"></i>
                        <p>View Projects</p>
                    </a>
           		</li>
							<li {{ Request::is('users/canvas*') ? 'class=active' : '' }}>
								<a href="{{ route('create.projects') }}">
									<i class="ti-plus"></i>
									<p>Create Project</p>
								</a>
							</li>
		</ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar bar1"></span>
                        <span class="icon-bar bar2"></span>
                        <span class="icon-bar bar3"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="ti-panel"></i>
							<p>Stats</p>
                            </a>
                        </li>
                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                               	<i class="ti-bell"></i>
                                   <p class="notification">5</p>
							<p>Notifications</p>
							<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 1</a></li>
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
                                <li><a href="#">Notification 4</a></li>
                                <li><a href="#">Another notification</a></li>
                              </ul>
                        </li>

                        <li class="dropdown">
                              <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                   <i class="ti-user"></i>
							<p>{{ Auth::user()->name }}</p>
							<b class="caret"></b>
                              </a>
                              <ul class="dropdown-menu">
                                <li><a href="#">Notification 2</a></li>
                                <li><a href="#">Notification 3</a></li>
						  <li><a href="{{ url('/logout') }}"><i class="fa fa-sign-out"></i>logout</a></li>
                              </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

	   @yield('content')

	   <footer class="footer">
            <div class="container-fluid">
                <nav class="pull-left">
                    <ul>

                        <li>
                            <a href="http://www.creative-tim.com">
                                Creative Tim
                            </a>
                        </li>
                        <li>
                            <a href="http://blog.creative-tim.com">
                               Blog
                            </a>
                        </li>
                        <li>
                            <a href="http://www.creative-tim.com/license">
                                Licenses
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright pull-right">
                    &copy; <script>document.write(new Date().getFullYear())</script>, made with <i class="fa fa-heart heart"></i> by <a href="http://www.creative-tim.com">Creative Tim</a>
                </div>
            </div>
        </footer>
    </div>
</div>
<!--   Core JS Files   -->
{!! Html::script('src/frontend/global/js/jquery.min.js') !!}
{!! Html::script('src/frontend/usersFiles/js/bootstrap.min.js') !!}
<!--  Checkbox, Radio & Switch Plugins -->
{!! Html::script('src/frontend/usersFiles/js/bootstrap-checkbox-radio.js') !!}
<!--  Charts Plugin -->
{!! Html::script('src/frontend/usersFiles/js/chartist.min.js') !!}

<!--  Notifications Plugin    -->
{!! Html::script('src/frontend/usersFiles/js/bootstrap-notify.js') !!}

<!-- Paper Dashboard Core javascript and methods -->
{!! Html::script('src/frontend/usersFiles/js/paper-dashboard.js') !!}
@yield('scripts')
</body>
</html>
