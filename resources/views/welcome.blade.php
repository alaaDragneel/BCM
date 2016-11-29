@extends('frontend.layouts.welcomeMaster')
@section('content')

<div class="level level-hero hero-home has-hint">
	<div class="hero-overlay visible-lg">
	</div>
	<video class="fullscreen-video" id="bg-video" loop="">
		<source src="http://alvarez.is/bt/appi.webm" type="video/webm">
		<source src="http://alvarez.is/bt/appi.mp4" type="video/mp4">
	</video>
	<div class="container full-height">
		<div class="v-align-parent">
			<div class="v-center">
				<div class="row">
					<div class="col-xs-10 col-sm-6">
						<h1 class="mb-10 heading">Make Your Own <span>Plans For Your Projects.</span></h1>
						<div class="subheading mb-20">
							Ilgudi Provide Many Tools For You <br class="hidden-xs">
							To Can Make Easy Plans For Your Projects.
						</div>
					</div>
				</div>
				<div>
					<a class="btn btn-success btn-lg" href="{{url('/register')}}"><i class="fa fa-user"></i> Join Us</a>
					<a class="btn btn-primary btn-lg" href="{{url('/login')}}"><i class="fa fa-sign-in"></i> LogIn</a>
				</div>
			</div>
		</div>
		<div class="hint-arrow">
		</div>
	</div>
</div>

{{-- levels start --}}
<div class="level">
	<div class="container mb-100 xs-mb-40">
		<div class="row">
			<div class="col-sm-5 col-md-4 col-md-offset-2 col-sm-offset-1">
				<h1 class="mb-10 xs-mb-10 heading color-dark heading-bordered">Our Tools</h1>
			</div>
			<div class="col-sm-5 col-sm-offset-1">
				<h2 class="w-300 color-dark mb-10 xs-mb-10">Develop Your Work With Many helpful Tools.</h2>


				<p class="xs-mw">Ilgudi Is Your Landing Area To Make Projects Or How To Success Your Projects</p>
			</div>
		</div>
	</div>

	<div class="col-md-4">
		<div class="card" style="cursor: pointer;">
			<div class="content">
				<div class="row">
					<div class="col-xs-5">
						<div class="icon-big icon-success text-center">
							<i class="ti-wallet"></i>
						</div>
					</div>


					<div class="col-xs-7">
						<div class="numbers">
							<p>BMC</p>
							<a class="info" href="#main" style="text-decoration: none;">see more</a> <i class="ti-plus" style="font-size: 15px;"></i>
						</div>
					</div>
				</div>


				<div class="footer">
					<hr>


					<div class="stats">
						<i class="ti-calendar"></i> <span style="font-size: 15px;">make an easy bmc and success your company</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>


<div class="level level-img-right">
	<div class="container xs-mb-30" id="main">

		<div class="row mb-60 xs-mb-20">
			<div class="col-sm-6 col-lg-offset-1 col-lg-5">
				<h1 class="mb-20 xs-mb-10 heading color-dark heading-bordered xl-heading-outdent">Details</h1>


				<h2 class="w-300 color-dark mb-10">All what you Need in one page</h2>


				<p class="xs-mw">This is A simple Information About The BMC Canvas Tools</p>
			</div>
		</div>
		<div class="row">
			<div class="col-md-4">
				{{-- info place --}}
				<div class="col-md-12 front-text">
					<div class="col-md-4">
						Key Parteners:
					</div>
					<div class="col-md-8">
						<h3>KP</h3>
						<p>Some Text Goes Here</p>
					</div>
				</div>
				{{-- info place --}}
					<div class="col-md-12 front-text">
						<div class="col-md-4">
							Key Activity:
						</div>
						<div class="col-md-8">
							<h3>KA</h3>
							<pSome Text Goes Here</p>
						</div>
					</div>
				{{-- info place --}}
					<div class="col-md-12 front-text">
						<div class="col-md-4">
							Customer Segments:
						</div>
						<div class="col-md-8">
							<h3 class="mb-15">CS</h3>
							<p class="smaller xs-mw">Some Text Goes Here</p>
						</div>
					</div>
			</div>


			{{-- image place --}}
		  <div class="col-md-8">
				<div class="xs-mw xs-mb-40">
					<img src="{{ asset('src/frontend/welcomeFiles/img/main.png') }}" alt="bmc img" width="50%">
				</div>
		  </div>
		</div>
	</div>
</div>
@endsection
