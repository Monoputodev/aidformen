<!DOCTYPE html>
<html lang="en">

	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>{{config('app.name')}} - {{isset($pageTitle)?$pageTitle:''}}</title>

		<meta name="viewport" content="width=device-width, initial-scale=1">

		<meta name="description"
		  content="NGOO is a clean, modern, and fully responsive HTML Template. it is designed for charity, non-profit, fundraising, donation, volunteer, businesses or any type of person or business who wants to showcase their work, services and professional way.">
		<meta name="keywords"
		  content="campaign, cause, charity, donate, donations, event, foundation, fund, fundraising, kids, ngo, non-profit, organization, volunteer">

		<meta name="author" content="AidForMen">
		<meta name="og:title" content="Welcome To Website of AidForMen." />
		<meta name="og:type" content="website" />
		<meta name="og:url" content="http://aidformen.com/" />
		<meta name="og:image" content="http://www.aidformen.com/logo/logo.png" />
		<meta name="og:site_name" content="aidformen.com" />
		<meta name="og:description" content="description" />
		<link href="{{ asset('backend/plugins/bootstrap/css/bootstrap.css') }}" rel="stylesheet" media='all'>
		<link href="{{ asset('backend/css/style.css') }}" rel="stylesheet" media='all'>
		<link href="{{ asset('backend/css/jquery-confirm.min.css') }}" rel="stylesheet" media='all'>

		@include('Web::layouts.css')
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
		  src="https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v6.0&appId=2873453549401762&autoLogAppEvents=1">
		</script>

		@include('Web::layouts.msg')
		@include('Web::layouts.header')
		@yield('body')
		@include('Web::layouts.footer')
		@include('Web::layouts.js')
		@include('Web::layouts.javascript')
	</body>

</html>