<!DOCTYPE html>
<html lang="en">

	<head>

		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>{{isset($pageTitle)?$pageTitle:''}}</title>

		<meta name="viewport" content="width=device-width, initial-scale=1">



		<meta name="author" content="Monoputo">
		<meta property="og:url" content="https://aidformen.com<?php  print $_SERVER['REQUEST_URI']; ?>" />
		<meta property="og:type" content="Article">
		<meta property="og:title" content="{{$data->title}}">
		<meta property="og:description" content="{{$data->short_description}}">
		<meta property="og:image" content="{{ URL::to('uploads/blog') }}/orginal_image/{{ $data->image_link }}" />
		<meta property="fb:app_id" content="{357076385511688}" />



		@include('Web::layouts.css')
		<script type="text/javascript">
			$("img").addClass("img-responsive");
		</script>
		<div id="fb-root"></div>
		<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v8.0"
		  nonce="fV5EqVJc"></script>
	</head>

	<body>
		<!-- LOAD PAGE -->
		<div class="animationload">
			<div class="loader"></div>
		</div>

		<!-- BACK TO TOP SECTION -->
		<a href="#0" class="cd-top cd-is-visible cd-fade-out">Top</a>

		<div id="fb-root"></div>
		<script async defer crossorigin="anonymous"
		  src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0&appId=2873453549401762&autoLogAppEvents=1">
		</script>

		@include('Web::layouts.msg')
		@include('Web::layouts.header')

		<div class="section">
			<div class="content-wrap">
				<div class="container">
					<div class="row">
						@if(count($data)>0)
						<div class="col-sm-12 col-md-8">
							<div class="single-news">
								<div class="image">
									<img src="{{ URL::to('uploads/blog') }}/orginal_image/{{ $data->image_link }}"
									  alt="{{ $data->title }}" class="img-fluid">
								</div>
								<h2 class="blok-title">
									{{ $data->title }}
								</h2>
								<p>By: <span style="color: #ff7000">{{$data->author}}</span> || Date: <span
									  style="color: blue"> {{date('d M y', strtotime($data->date))}}</span></p>
								<div class="social-icons-div social-icons-bottom">

									<!-- Go to www.addthis.com/dashboard to customize your tools -->
									<script type="text/javascript"
									  src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5f93f226848ce5ac">
									</script>


									<div class="addthis_inline_share_toolbox"
									  data-url="https://aidformen.com<?php  print $_SERVER['REQUEST_URI']; ?>"
									  data-title="{{$data->title}}" data-description="{{$data->description}}"
									  data-media="{{ URL::to('uploads/blog') }}/orginal_image/{{ $data->image_link }}">
									</div>
								</div>
								{!! $data->description !!}

							</div>

						</div>
						@endif
						<div class="fb-comments" data-href="{{Request::url()}}" data-numposts="5" data-width=""></div>

						<div class="col-sm-12 col-md-4">
							<h2 class="section-heading">
								Related <span>Blog</span>
							</h2>

							<div class="sidebox">
								@if(count($blogmore)>0)
								@foreach($blogmore as $values)
								<div class="recent_blog_list">
									<a href="{{ route('blog.details',[$values->id,$values->title]) }}">
										<img src="{{ URL::to('uploads/blog') }}/200x200/{{ $values->image_link }}"
										  alt="">
										<p>{{ $values->title }}</p>
									</a>
									<p>{{date('d M y', strtotime($values->date))}}</p>
								</div>
								@endforeach
								@endif
							</div>
						</div>
						<div class="col-md-12">
							@if(count($blogmore)>0)
							{{ $blogmore->links() }}
							@endif
						</div>
					</div>

				</div>
			</div>
		</div>
		@include('Web::layouts.footer')
		@include('Web::layouts.js')
		@include('Web::layouts.javascript')
	</body>

</html>