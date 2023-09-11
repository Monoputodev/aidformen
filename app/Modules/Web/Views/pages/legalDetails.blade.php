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
		<meta property="og:title" content="{{$data->name}}">
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
									<img src="{{ URL::to('uploads/legal') }}/{{ $data->image_link }}"
									  alt="{{ $data->name }}" class="img-fluid">
								</div>
								<h2 class="blok-title">
									{{ $data->name }}
								</h2>
								{!! $data->description !!}




							</div>

						</div>
						<div class="col-sm-12 col-md-4">
							<object data="{{  URL::to('uploads/legal')  }}/{{ $data->pdf_link }}" type="application/pdf"
							  width="100%" height="500px">
						</div>
						@endif

					</div>

				</div>
			</div>
		</div>
		@include('Web::layouts.footer')
		@include('Web::layouts.js')
		@include('Web::layouts.javascript')
	</body>

</html>