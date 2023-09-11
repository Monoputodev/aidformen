<div class="header header-1">
	<!-- TOPBAR -->
	<div class="topbar">
		<div class="container">
			<div class="row">
				<div class="col-sm-7 col-md-6">
					<p><em>Welcome To Official Website Of Aid For Men</em></p>
				</div>
				<div class="col-sm-5 col-md-6">
					<div class="sosmed-icon pull-right">
						<a target="__blank" href="https://www.facebook.com/aidformen/"><i
							  class="fa fa-facebook"></i></a>
						<a target="__blank" href="#"><i class="fa fa-twitter"></i></a>
						<a target="__blank" href="#"><i class="fa fa-instagram"></i></a>
						<a target="__blank" href="#"><i class="fa fa-pinterest"></i></a>
					</div>
				</div>
			</div>
		</div>
	</div>

	<!-- MIDDLE BAR -->
	<div class="middlebar">
		<div class="container">


			<div class="contact-info">
				<!-- INFO 1 -->
				<div class="box-icon-1">
					<div class="icon">
						<div class="fa fa-envelope-o"></div>
					</div>
					<div class="body-content">
						<div class="heading">Mail :</div>
						<a href="mailto:info@aidformen.com">info@aidformen.com</a>
					</div>
				</div>
				<!-- INFO 2 -->
				<div class="box-icon-1">
					<div class="icon">
						<div class="fa fa-phone"></div>
					</div>
					<div class="body-content">
						<div class="heading">Call Us :</div>
						<a href="tel:01944449681">+88 01944-449681</a>
					</div>
				</div>
				<!-- INFO 3 -->
				<div class="box-act">
					<a href="{{ route('web.legal.aid.membership') }}" class="btn btn-lg btn-primary">JOIN NOW</a>
				</div>

			</div>
		</div>
	</div>

	<!-- NAVBAR SECTION -->
	<div class="navbar-main">
		<div class="container">
			<nav class=" navbar-expand-lg">
				<a class="navbar-brand" href="{{ URL::to('/') }}">
					<img src="{{ URL::to('logo') }}/logo.png" alt="" style="max-height: 70px;" />
				</a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown"
				  aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNavDropdown">
					<ul class="navbar-nav">
						<li class="nav-item dropdown">
							<a class="nav-link" href="{{ URL::to('/') }}">HOME</a>

						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
							  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								ABOUT US
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" target="__blank"
								  href="{{ route('web.about.us') }}">Introduction</a>

							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
							  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								LEGAL AID
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" target="__blank" href="{{ route('web.for.legal.aid') }}">For
									Legal Aid</a>
								<a class="dropdown-item" target="__blank"
								  href="{{ route('web.legal.aid.panel') }}">Legal Aid Panel</a>

								<a class="dropdown-item" target="__blank" href="{{ route('web.help.form') }}">Help
									Form</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
							  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								RECENT ACTIVITY
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">

								<a class="dropdown-item" href="{{route('web.blog')}}">Blog</a>
								<a class="dropdown-item" target="__blank" href="{{ route('web.notice') }}">Notice</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link" href="{{ route('web.megazine') }}">MAGAZINE</a>
						</li>

						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
							  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								MEDIA
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" target="__blank" href="{{ route('web.our.news') }}">News</a>
								<a class="dropdown-item" target="__blank" href="{{ route('web.photo.gallery') }}">Photo
									Gallery</a>

								<a class="dropdown-item" target="__blank" href="{{ route('web.video.gallery') }}">Video
									Gallery</a>
							</div>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
							  data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
								CONTACT US
							</a>
							<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
								<a class="dropdown-item" target="__blank"
								  href="{{ route('web.legal.aid.membership') }}">For Membership</a>
								<a class="dropdown-item" href="{{route('web.donation.listing')}}">For Donation</a>
								<a class="dropdown-item" href="{{route('web.location.listing')}}">Our Locations</a>
								<a class="dropdown-item" href="{{ route('web.contact') }}">Contact Us</a>
							</div>
						</li>
					</ul>
				</div>
			</nav> <!-- -->

		</div>
	</div>

</div>