@extends('Web::layouts.master')
@section('body')
<!-- Load Facebook SDK for JavaScript -->
<div id="fb-root"></div>
<script>
	window.fbAsyncInit = function() {
          FB.init({
            xfbml            : true,
            version          : 'v8.0'
          });
        };

        (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk/xfbml.customerchat.js';
        fjs.parentNode.insertBefore(js, fjs);
      }(document, 'script', 'facebook-jssdk'));
</script>

<!-- Your Chat Plugin code -->
<div class="fb-customerchat" attribution=setup_tool page_id="2222225688095717" theme_color="#20cef5">
</div>
<style>
	.center {
		text-align: center;
	}
</style>
<script data-ad-client="ca-pub-9598275799907090" async
  src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>

<div class="h-corona">
	<div class="image">
		<img src="{{ URL::to('logo') }}/latest.png">
	</div>
	<div class="text">
		<marquee>
			@if(count($news)>0)
			@foreach($news as $data)
			<span class="dot"></span><a target="__blank" href="{{ route('news.details',[$data->id,$data->title]) }}"
			  title="{{ $data->title }}">{{ $data->title }}</a><span class="gap">&nbsp;</span>
			@endforeach
			@endif
		</marquee>
	</div>
	<div class="dettol-ads">
		<img src="" class="desktop_show">
		<img src="" class="mobile_show">
	</div>
</div>
@include('Web::home.slider')
@include('Web::home.aboutSection')


<div class="section services">
	<div class="content-wrap-20">
		<div class="container">

			<div class="col-sm-12 col-md-12">
				<h2 class="section-heading center">
					<span>News</span>
				</h2>
			</div>


			<div class="row">
				<div class="MultiCarousel" data-items="1,2,3,4" data-slide="1" id="MultiCarousel" data-interval="1000">
					<div class="MultiCarousel-inner">
						@if(count($news)>0)
						@foreach($news as $data)
						<div class="item">
							<div class="pad15">
								<div class="box-fundraising">
									<div class="media">
										<a target="__blank" href="{{ route('news.details',[$data->id,$data->slug]) }}"
										  title="{{ $data->title }}"><img
											  src="{{ URL::to('uploads/generalpages') }}/{{ $data->image_link }}"
											  alt="{{ $data->title }}" style="height: 200px;"></a>
									</div>
									<div class="body-content">
										<p style="font-size: 14px;font-weight: 600"><a target="__blank"
											  href="{{ route('news.details',[$data->id,$data->slug]) }}"
											  title="{{ $data->title }}">{{ $data->title }}</a></p>


									</div>
								</div>
							</div>
						</div>
						@endforeach
						@endif

					</div>
					<button class="btn btn-primary leftLst"><i class="fa fa-angle-left"></i></button>
					<button class="btn btn-primary rightLst"><i class="fa fa-angle-right"></i></button>
				</div>
			</div>


		</div>
	</div>
</div>

<!-- WE HELP MANY PEOPLE -->
<div class="section" data-background="{{ URL::to('frontend') }}/images/bg-map-dot.jpg">
	<div class="content-wrap-20">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<div class="cta-info color-white">
						<h1 class="section-heading light no-after">
							<span>We Help Many</span> People
						</h1>
						<h3 class="color-primary">Want to Become a Volunteer</h3>

						<div class="spacer-10"></div>
						<p></p>

						<a href="{{ route('web.about.us') }}" class="btn btn-light margin-btn">LEARN MORE</a> <a
						  href="{{ route('web.legal.aid.membership') }}" class="btn btn-primary margin-btn">JOIN US
							NOW</a>
					</div>

				</div>

			</div>
		</div>
	</div>
</div>

<!-- OUR VOLUUNTER SAYS -->
<div class="section">
	<div class="content-wrap">
		<div class="container">
			<div class="row">

				<div class="col-sm-12 col-md-12">
					<h2 class="section-heading center">
						Our <span>Volunteers</span> Says
					</h2>
					<p class="subheading text-center">Our Volunteers are our strength</p>
				</div>
				@if(count($testimonial)>0)
				@foreach($testimonial->take(6) as $data)
				<div class="col-sm-6 col-md-6">
					<div class="testimonial-1">
						<div class="media">
							<img src="{{ URL::to('uploads/testimonial') }}/{{ $data->image_link }}" alt=""
							  class="img-fluid">
						</div>
						<div class="body">
							<p>{!! $data->description !!}</p>
							<div class="title">{{ $data->title }}</div>
							<div class="company">{{ $data->short_description }}</div>
						</div>
					</div>
				</div>
				@endforeach
				@endif
<div class="col-sm-12 col-md-12">
					<div class="spacer-50"></div>
					<div class="text-center">
						<a target="__blank" href="{{ route('web.testimonial.listing') }}" class="btn btn-primary">SEE ALL
							Volunteers</a>
					</div>

				</div>
			</div>
		</div>
	</div>
</div>

<!-- OUR GALLERY -->
<div class="section" data-background="{{ URL::to('frontend') }}/images/bg-gallery.png">
	<div class="content-wrap-20">
		<div class="container">
			<div class="row">

				<div class="col-sm-12 col-md-12">
					<h2 class="section-heading center">
						Our <span>Gallery</span>
					</h2>
					<p class="subheading text-center">Our Recent Activity Gallery</p>
				</div>

				<div class="row popup-gallery gutter-5">

					@if(count($photo)>0)
					@foreach($photo as $values)
					<div class="col-xs-12 col-md-4">
						<div class="box-gallery">
							<a href="{{ URL::to('uploads/mediaGallery') }}/{{ $values->image_link }}"
							  title="{!! $values->description !!}" style="color:white">
								<img src="{{ URL::to('uploads/mediaGallery') }}/{{ $values->image_link }}"
								  alt="{!! $values->description !!}" style="color:white" class="img-fluid">
								<div class="project-info">
									<div class="project-icon">
										<span class="fa fa-eye"></span>
									</div>
								</div>
							</a>
						</div>
					</div>
					@endforeach
					@endif
				</div>
				<div class="col-sm-12 col-md-12">
					<div class="spacer-50"></div>
					<div class="text-center">
						<a target="__blank" href="{{ route('web.photo.gallery') }}" class="btn btn-primary">SEE ALL
							GALLERY</a>
					</div>

				</div>

			</div>
		</div>
	</div>
</div>

<div class="section" data-background="{{ URL::to('frontend') }}/images/bg-gallery.png">
	<div class="content-wrap-20">
		<div class="container">
			<div class="row">

				<div class="col-sm-12 col-md-12">
					<h2 class="section-heading center">
						<span>Video</span>
					</h2>

				</div>

				<div class="row popup-gallery gutter-5">
					<div class="powr-youtube-gallery" id="5c9d4150_1603687579" style="width:1200px; margin:0 auto;">
					</div>
					<script src="https://www.powr.io/powr.js?platform=blogster"></script>
				</div>
				<div class="col-sm-12 col-md-12">
					<div class="spacer-50"></div>
					<div class="text-center">
						<a target="__blank" href="https://www.youtube.com/channel/UCT-h0SZCzed5jHC-Daw1RCQ"
						  class="btn btn-primary">SEE ALL VIDEO</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<div class="section" data-background="{{ URL::to('frontend') }}/images/bg-gallery.png">
	<div class="content-wrap-20">
		<div class="container">
			<div class="row">

				<div class="col-sm-12 col-md-12">
					<h2 class="section-heading center">
						Our Executive Committee</span>
					</h2>
					{{-- <p class="subheading text-center">Our Recent Activity Gallery</p> --}}
				</div>
				<div class="col-sm-12 col-md-12">
					<div class="row popup-gallery gutter-5">

						@if(count($teams)>0)
						@foreach($teams->where('type',1) as $values)
						<div class="col-xs-12 col-md-4">
							<div class="box-gallery card">
								<a href="{{ URL::to('public/uploads/team') }}/{{ $values->image_link }}"
								  title="{{ $values->name }}">
									<img src="{{ URL::to('public/uploads/team') }}/{{ $values->image_link }}"
									  alt="{{ $values->name }}">
									<div class="project-info">
										<div class="project-icon">
											<span class="fa fa-eye"></span>
										</div>
									</div>
								</a>
								<div class="card-footer">
									<div class="title text-center">
										<strong>{{ $values->name }}</strong> <br>
										<span>{{ $values->designation}}</span>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						@endif
					</div>
				</div>

				<div class="col-sm-12 col-md-12">
					<div class="spacer-50"></div>
					<div class="text-center">
						<a target="__blank" href="{{ route('web.team.listing') }}" class="btn btn-primary">SEE ALL OUR
							TEAM MEMBERS</a>
					</div>

				</div>

			</div>
		</div>
	</div>
</div>
<div class="section" data-background="{{ URL::to('frontend') }}/images/bg-gallery.png">
	<div class="content-wrap-20">
		<div class="container">
			<div class="row">

				<div class="col-sm-12 col-md-12">
					<h2 class="section-heading center">
						Our Other Committee Members</span>
					</h2>
					{{-- <p class="subheading text-center">Our Recent Activity Gallery</p> --}}
				</div>
				<div class="col-sm-12 col-md-12">
					<div class="row popup-gallery gutter-5">

						@if(count($teams)>0)
						@foreach($teams->where('type',2) as $values)
						<div class="col-xs-12 col-md-4">
							<div class="box-gallery card">
								<a href="{{ URL::to('public/uploads/team') }}/{{ $values->image_link }}"
								  title="{{ $values->name }}">
									<img src="{{ URL::to('public/uploads/team') }}/{{ $values->image_link }}"
									  alt="{{ $values->name }}">
									<div class="project-info">
										<div class="project-icon">
											<span class="fa fa-eye"></span>
										</div>
									</div>
								</a>
								<div class="card-footer">
									<div class="title text-center">
										<strong>{{ $values->name }}</strong> <br>
										<span>{{ $values->designation}}</span>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						@endif
					</div>
				</div>

				<div class="col-sm-12 col-md-12">
					<div class="spacer-50"></div>
					<div class="text-center">
						<a target="__blank" href="{{ route('web.team.listing') }}" class="btn btn-primary">SEE ALL OUR
							TEAM MEMBERS</a>
					</div>

				</div>

			</div>
		</div>
	</div>
</div>
<div class="section services">
	<div class="content-wrap-20">
		<div class="container">

			<div class="col-sm-12 col-md-12">
				<h2 class="section-heading center">
					Blog <span>Post</span>

				</h2>
				<p class="subheading text-center">We Publish New Blog Posts Regularly, Check Out & learn more</p>
			</div>


			<div class="row">
				<div class="MultiCarousel" data-items="1,2,3,4" data-slide="1" id="MultiCarousel" data-interval="1000">
					<div class="MultiCarousel-inner">
						@if(count($blog)>0)
						@foreach($blog as $values)
						<div class="item">
							<div class="pad15">
								<div class="box-fundraising">
									<div class="media">
										<a href="{{ route('blog.details',[$values->id,$values->title]) }}" title=""><img
											  src="{{ URL::to('uploads/blog') }}/200x200/{{ $values->image_link }}"
											  alt="{{ $data->title }}" style="height: 200px;"></a>
									</div>
									<div class="body-content">
										<p style="font-size: 14px;font-weight: 600"><a
											  href="{{ route('blog.details',[$values->id,$values->title]) }}"
											  title="">{{ $values->title }}</a></p>
									</div>
								</div>
							</div>
						</div>
						@endforeach
						@endif

					</div>

				</div>
				<button class="btn btn-primary leftLst"><i class="fa fa-angle-left"></i></button>
				<button class="btn btn-primary rightLst"><i class="fa fa-angle-right"></i></button>
			</div>
		</div>


	</div>
</div>
</div>
@include('Web::home.partner')
@endsection