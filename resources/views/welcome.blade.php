@extends('frontend.layouts.welcomeMaster')
@section('content')
<div class="level level-hero hero-home has-hint">


	<div class="hero-overlay visible-lg"></div>

	<video loop id=bg-video class=fullscreen-video>
		<source src="http://alvarez.is/bt/appi.webm" type="video/webm">
		<source src="http://alvarez.is/bt/appi.mp4" type="video/mp4">
	</video>

	<div class="container full-height">
		<div class=v-align-parent>
			<div class=v-center>
				<div class="row">
					<div class="col-xs-10 col-sm-6">
						<h1 class="mb-10 heading">Your App. <span>Reinvented.</span></h1>
						<div class="subheading mb-20">Lorem Ipsum is simply dummy text of the <br class=hidden-xs>printing and typesetting industry. </div>
					</div>
				</div>
				<div>
					@if (Auth::check())
						@if (Auth::user()->userType === 1)
							<a class="btn btn-prepend" href="{{ route('admin.dashboard') }}">
								<i class="prepended icon-append-iphone"></i>Dashboard
							</a>
						@endif
						@if (Auth::user()->userType === 2 || Auth::user()->userType === 3)
							<a class="btn btn-prepend" href="{{ route('user.dashboard') }}">
								<i class="prepended icon-append-iphone"></i>Dashboard
							</a>
						@endif
						<a class="btn btn-prepend" href="{{url('/logout')}}">
							<i class="prepended icon-append-iphone"></i>logOut
						</a>
					@else
						<a class="btn btn-prepend btn-launch-video" href="{{url('/register')}}">
							<i class="prepended icon-append-play"></i>Join Us
						</a>
						<a class="btn btn-prepend" href="{{url('/login')}}">
							<i class="prepended icon-append-iphone"></i>LogIn
						</a>
					@endif
				</div>
			</div>
		</div>

		<div class=hint-arrow></div>
	</div>
</div>
<div class=level>

	<div class="container mb-100 xs-mb-40">
		<div class=row>
			<div class="col-sm-5 col-md-4 col-md-offset-2 col-sm-offset-1">
				<h1 class="mb-10 xs-mb-10 heading color-dark heading-bordered">Your App<br class=hidden-xs> Now</h1>
			</div>
			<div class="col-sm-5 col-sm-offset-1">
				<h2 class="w-300 color-dark mb-10 xs-mb-10">make many works with many toole\s.</h2>
				<p class="xs-mw">Lorem Ipsum is simply dummy text of the printing and typesetting industry.
			</div>
		</div>
	</div>
	{{-- {!! Html::image('src/frontend/welcomeFiles/img/v2/iphone6.min.png') !!} --}}
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
													<a href="#main" style="text-decoration: none;" class="info">see more </a><i class="ti-plus" style="font-size: 15px;"></i>
											</div>
									</div>
							</div>
							<div class="footer">
									<hr />
									<div class="stats">
											<i class="ti-calendar"></i>
											<span style="font-size: 15px;">make an easy bmc and success your company</span>
									</div>
							</div>
					</div>
			</div>
	</div>
	<div class="col-md-4">
			<div class="card" style="cursor: pointer;">
					<div class="content">
							<div class="row">
									<div class="col-xs-5">
											<div class="icon-big icon-danger text-center">
													<i class="ti-pulse"></i>
											</div>
									</div>
									<div class="col-xs-7">
											<div class="numbers">
													<p>kpIs</p>
													see more <i class="ti-plus" style="font-size: 15px;"></i>
											</div>
									</div>
							</div>
							<div class="footer">
									<hr />
									<div class="stats">
										<i class="ti-calendar"></i>
											<span style="font-size: 15px;">make an easy kpis to your lenCanvas</span>
									</div>
							</div>
					</div>
			</div>
	</div>
	<div class="col-md-4">
			<div class="card" style="cursor: pointer;">
					<div class="content">
							<div class="row">
									<div class="col-xs-5">
											<div class="icon-big icon-info text-center">
													<i class="ti-twitter-alt"></i>
											</div>
									</div>
									<div class="col-xs-7">
											<div class="numbers">
													<p>len</p>
													see more <i class="ti-plus" style="font-size: 15px;"></i>
											</div>
									</div>
							</div>
							<div class="footer">
									<hr />
									<div class="stats">
											<i class="ti-calendar"></i>
											 <span style="font-size: 15px;">make len canvas to find the way to your problems</span>
									</div>
							</div>
					</div>
			</div>
	</div>

</div>
<div class="level level-img-right">

	<div class="container xs-mb-30" id="main">
		{!! Html::image('src/frontend/welcomeFiles/img/main.png') !!}
		<div class="row mb-60 xs-mb-20">
			<div class="col-sm-6 col-lg-offset-1 col-lg-5">
				<h1 class="mb-20 xs-mb-10 heading color-dark heading-bordered xl-heading-outdent">Details</h1>
				<h2 class="w-300 color-dark mb-10">All what you want in one page</h2>
				<p class=xs-mw>Now with Appi you have it on your fingertips.
			</div>
		</div>

	<div class="visible-xs xs-mw xs-mb-40">
		{!! Html::image('src/frontend/welcomeFiles/img/v2/iphone6.min.png') !!}
	</div>

		<div class="row mb-60 xs-mb-20">
			<div class="col-sm-1 col-lg-offset-1">
				<i class="icon icon-globe"></i>
			</div>
			<div class="col-sm-4 col-md-3">
				<h3 class="mb-15">Worldwide</h3>
				<p class="smaller xs-mw">more easy to create a bmc and contact around the world with your team.
			</div>
		</div>

		<div class="row mb-60 xs-mb-20">
			<div class="col-sm-1 col-lg-offset-1">
				<i class="icon icon-eye"></i>
			</div>
			<div class="col-sm-4 col-md-3">
				<h3 class="mb-15">Privacy</h3>
				<p class="smaller xs-mw">more privacy to you and your work.
			</div>
		</div>
		<div class="row">
			<div class="col-sm-1 col-lg-offset-1">
				<i class="icon icon-bubble"></i>
			</div>
			<div class="col-sm-4 col-md-3">
				<h3 class="mb-15">Social Integration</h3>
				<p class="smaller xs-mw">communicate and make brain storming and see the deffrient says.
			</div>
		</div>
	</div>

</div>
{{--

<div class="level level-outro text-center">
	<div class=container>

		<form class=contact method=get action="/" accept-charset="UTF-8">

			<div class="h2 mb-20">Available on the <br class=visible-xs-block> App Store</div>
			<p class="mb-35">Enter your phone number and we’ll send a link to your iPhone

			<div class="btn-append dropdown-prepend">

				<div class=dropdown>
					<button class="btn btn-default dropdown-toggle" type="button" id="f1" data-toggle="dropdown" aria-expanded="true">
					<span id=option-value-f1>US (+1)</span>
						<span class="caret"></span>
					</button>
					<ul class="dropdown-menu" data-displaytarget="#option-value-f1" data-inputtarget=".f1-target" role="menu" aria-labelledby="f1">
						<li role="presentation" data-placeholder="US ( +1)" data-value="1" class=disabled>US ( +1)</li>
					</ul>
				</div>

				<!-- actual select here -->
				<select name="country-code" class="sr-only f1-target countryCode">
					<option selected value="1">US (+1)</option>
				</select>

				<input type=tel class="text phoneNumber" name="tel" placeholder="Phone number" required>

				<input type=submit class="submit appended" value=submit>

			</div>

		</form>
	</div>


</div> --}}
@endsection
