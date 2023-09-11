<div class="footer" data-background="{{ URL::to('frontend') }}/images/bg-map-dot.jpg">
	<div class="content-wrap">
		<div class="container">

			<div class="row">
				<div class="col-sm-2 col-md-2">
					<div class="footer-item">
						<img src="{{ URL::to('logo') }}/logo.png" alt="logo bottom" class="logo-bottom"
						  style="max-height: 100px;">
						<div class="spacer-30"></div>
						<p class="classforwhite">
							We are committed to be recognized for excellence, integrity and innovative management.</p>
						<a href="{{ route('web.about.us') }}"><i class="fa fa-angle-right"></i> Read More</a>
					</div>
				</div>

				<div class="col-sm-3 col-md-2">
					<div class="footer-item">
						<div class="footer-title">
							WHO WE ARE
						</div>

						<div class="row">
							<div class="col-sm-12">
								<ul class="list">
									<li><a href="{{ route('web.about.us') }}" title="About us"><i
											  class="fa fa-angle-right"></i> About us</a></li>
									<li><a href="{{ route('web.for.legal.aid') }}" title="For Legal Aid"><i
											  class="fa fa-angle-right"></i> For Legal Aid</a></li>
									<li><a href="{{ route('web.recent.activity') }}" title="Recent Activity"><i
											  class="fa fa-angle-right"></i> Activity</a></li>
									<li><a href="{{ route('web.photo.gallery') }}" title="Gallery"><i
											  class="fa fa-angle-right"></i> Gallery</a></li>
									<li><a href="{{ route('web.team') }}" title="Our Team"><i
											  class="fa fa-angle-right"></i> Our Team</a></li>
									<li><a href="{{route('web.blog')}}" title="Blog"><i class="fa fa-angle-right"></i>
											Blog</a></li>
									<li><a href="{{route('web.sponsor')}}" title="Blog"><i
											  class="fa fa-angle-right"></i>
											Become a sponsor</a></li>
									<li><a href="{{ route('web.contact') }}" title="Contact Us"><i
											  class="fa fa-angle-right"></i> Contact Us</a></li>

								</ul>
							</div>

						</div>
					</div>
				</div>

				<div class="col-sm-3 col-md-3">
					<div class="footer-item">
						<div class="footer-title">
							WHERE WE WORK
						</div>
						<ul class="list-info">
							<li>
								<div class="info-icon">
									<span class="fa fa-map-marker"></span>
								</div>
								<div class="info-text classforwhite">House #06, Road # 3/F, Sector #09,Uttara Model
									Town, Dhaka-1230</div>
							</li>
							<li>
								<div class="info-icon">
									<span class="fa fa-phone"></span>
								</div>
								<div class="info-text"><a href="tel:01944449681" class="classforwhite"> +88
										01944-449681-9</a></div>
							</li>
							<li>
								<div class="info-icon">
									<span class="fa fa-envelope"></span>
								</div>
								<div class="info-text"><a href="mailto:info@aidformen.com"
									  class="classforwhite">info@aidformen.com</a></div>
							</li>
							<li>
								<div class="info-icon">
									<span class="fa fa-clock-o"></span>
								</div>
								<div class="info-text classforwhite">Always Open</div>
							</li>
						</ul>

					</div>
				</div>
				<div class="col-sm-3 col-md-3 padding-topx3 email-update">
					<div class="footer-item">
						<div class="footer-title">
							LEGAL STATUS
						</div>
						@php
						$legals = App\Modules\Admin\Models\Legal::orderBy('id', 'DESC')->get();

						@endphp
						@if($legals)
						@foreach ($legals as $k=> $data)
						<div class="col-xs-12">
							<a href="{{ route('legal.details',$data->slug) }}" target="_blank">

								<div class="col-lg-3 col-md-3 col-xs-3" style="padding: 10px 0;">
									<div>
										<img src="{{URL::to('/public')}}/uploads/legal/{{$data->image_link}}"
										  style="height: 40px" class="m-1">
									</div>
								</div>
								<div class="col-lg-9 col-md-9 col-xs-9" style="padding: 10px 0;">
									<h4 style="margin: 0;" class="h4 text-white">{{ $data->name }}</h4>
								</div>
							</a>
						</div>
						@endforeach
						@endif


					</div>
				</div>

				<div class="col-sm-2 col-md-2">
					<div class="footer-item">
						<div class="footer-title">
							FOLLOW US
						</div>
						<div class="fb-page" data-href="https://www.facebook.com/aidformen/" data-tabs="" data-width=""
						  data-height="" data-small-header="false" data-adapt-container-width="false"
						  data-hide-cover="false" data-show-facepile="true">
							<blockquote cite="https://www.facebook.com/aidformen/" class="fb-xfbml-parse-ignore"><a
								  href="https://www.facebook.com/aidformen/">AID for MEN</a></blockquote>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>

	<div class="fcopy">
		<div class="container">
			<div class="row">
				<div class="col-sm-6 col-md-6">
					<p class="ftex classforwhite">Copyright 2020 &copy; <span class="color-primary">AID FOR MEN </span>
					</p>
				</div>
				<div class="col-sm-6 col-md-6 style-right">
					Developed by <a href="http://www.monoputo.com/" title="monoputo" target="__blank"><span
						  class="color-primary">Monoputo.</span></a></p>
				</div>
			</div>
		</div>
	</div>

</div>