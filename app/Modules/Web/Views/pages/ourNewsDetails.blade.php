<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8" />
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>{{isset($pageTitle)?$pageTitle:''}}</title>

	<meta name="viewport" content="width=device-width, initial-scale=1"> 

	<meta name="description" content="{!!$activity->description!!}">
	
	<meta name="keywords" content="campaign, cause, charity, donate, donations, event, foundation, fund, fundraising, kids, ngo, non-profit, organization, volunteer">
	<meta name="author" content="Monoputo">
	<meta property="og:url" content="https://aidformen.com<?php  print $_SERVER['REQUEST_URI']; ?>" />
	<meta property="og:type"         content="Article">
	<meta property="og:title"         content="{{$activity->title}}">
	<meta property="og:description"   content="{!!$activity->description!!}">
	<meta property="og:image"         content="{{ URL::to('uploads/generalpages') }}/{{$activity->image_link }}"/>
	@include('Web::layouts.css')
	<script type="text/javascript">
		$("img").addClass("img-responsive");
	</script>
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0&appId=2873453549401762&autoLogAppEvents=1"></script>
</head>
<body>
	<!-- LOAD PAGE -->
	<div class="animationload">
		<div class="loader"></div>
	</div>
	
	<!-- BACK TO TOP SECTION -->
	<a href="#0" class="cd-top cd-is-visible cd-fade-out">Top</a>

	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v7.0&appId=2873453549401762&autoLogAppEvents=1"></script>
	
	@include('Web::layouts.msg')
	@include('Web::layouts.header')

	<div class="section">
		<div class="content-wrap">
			<div class="container">
				<div class="row">
					@if(count($activity)>0)
					<div class="col-sm-12 col-md-8">
						<div class="single-news">
							<div class="image">
								<img src="{{ URL::to('uploads/generalpages') }}/{{ $activity->image_link }}" alt="{{ $activity->title }}" class="img-fluid"> 
							</div>
							<h2 class="blok-title">
								{{ $activity->title }}
							</h2>
							<p>By: <span style="color: #ff7000">{{$activity->meta_title}}</span> || Date: <span style="color: blue"> {{date('d M y', strtotime($activity->date))}}</span></p>

							<div class="social-icons-div social-icons-bottom">

								<!-- Go to www.addthis.com/dashboard to customize your tools -->
								<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5e3be89140baa6c8"></script>

								<div class="addthis_inline_share_toolbox" data-url="https://aidformen.com<?php  print $_SERVER['REQUEST_URI']; ?>" data-title="{!!$activity->title!!}" data-description="{!!$activity->description!!}" data-media="{{ URL::to('uploads/generalpages') }}/{{$activity->image_link }}"></div>
							</div>

							{!! $activity->description !!}

						</div>

					</div>
					@endif

<div class="fb-comments" data-href="{{Request::url()}}" data-numposts="5" data-width=""></div>

					<div class="col-sm-12 col-md-4">
						<h2 class="section-heading">
							Related <span>News</span>
						</h2>

						<div class="sidebox">
							@if(count($activitymore)>0)
							@foreach($activitymore as $data)
							<div class="recent_blog_list">
								<a href="{{ route('news.details',[$data->id,$data->slug]) }}">
									<img src="{{ URL::to('uploads/generalpages') }}/{{ $data->image_link }}" alt=""><p>{{ $data->title }}</p>
								</a>
								<p>{{date('d M y', strtotime($data->date))}}</p>
							</div>
							@endforeach
							@endif
						</div>
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