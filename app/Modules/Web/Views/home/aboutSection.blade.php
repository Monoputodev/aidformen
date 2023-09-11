<div class="section services">
	<div class="content-wrap">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<div class="row  overlap">
						<div class="col-sm-4 col-md-4 col-xs-6">
							<!-- BOX 1 -->
							<div class="rs-feature-box-1"
							  data-background="{{ URL::to('frontend') }}/images/cause-img-1.jpg"
							  onclick="location.href='{{route('web.donation.listing')}}'">

								<div class="body">
									<a href="{{route('web.donation.listing')}}" class="uk18">For Donation</a>
									<h3>Donate Now</h3>
								</div>
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<!-- BOX 2 -->
							<div class="rs-feature-box-1 bgdark"
							  data-background="{{ URL::to('frontend') }}/images/bg-map-dot.jpg"
							  onclick="location.href='https://aidformen.com/legal/aid/membership';">
								<div class="body">
									<a href="https://aidformen.com/legal/aid/membership" class="uk18">For MemberShip</a>
									<h3><a href="https://aidformen.com/legal/aid/membership">Get Involved Now</a></h3>

								</div>
								</a>
							</div>
						</div>
						<div class="col-sm-4 col-md-4">
							<!-- BOX 3 -->
							<div class="rs-feature-box-1"
							  data-background="{{ URL::to('frontend') }}/images/cause-img-2.jpg">
								<div class="body">
									<a href="contact.html" class="uk18">Become a Volunteer</a>
									<h3>Join Us Now</h3>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<!-- WELCOME TO NGOO-->
<div class="section">
	<div style="padding: 20px 0;">
		<div class="container">
			<div class="row">

				<div class="col-sm-12 col-md-12">
					<h2 class="section-heading">
						Welcome <span>To</span> AID For MEN
					</h2>
				</div>
				@if(isset($aboutUs))
				<div class="col-sm-6 col-md-6">


					{!! str_limit($aboutUs->description ,500)!!}



					<div class="spacer-30"></div>
					<a href="{{ route('web.about.us') }}" target="__blank" class="btn btn-primary">READ MORE</a>
					<div class="spacer-30"></div>

				</div>

				<div class="col-sm-6 col-md-6">

					<div class="about-img">

						<div class="hover-img">
							<a target="__blank" href="{{ route('web.about.us') }}"><img
								  src="{{ URL::to('uploads') }}/generalpages/{{ $aboutUs->image_link }}" alt=""
								  class="img-fluid"></a>
						</div>

					</div>

				</div>
				@endif

			</div>
		</div>
	</div>
</div>