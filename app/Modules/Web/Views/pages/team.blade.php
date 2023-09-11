@extends('Web::layouts.master')
@section('body')

<div id="our-team" class="section">
	<div class="content-wrap">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<h2 class="section-heading center">
						Our <span>Executive Committee</span>
					</h2>

				</div>
			</div>
			<div class="row">
				@if(count($team)>0)
				@foreach($team->where('type',1) as $data)
				<div class="col-sm-3 col-md-3">
					<div class="rs-team-1">
						<div class="media"><img src="{{ URL::to('uploads/team') }}/{{ $data->image_link }}" alt="">
						</div>
						<div class="body">
							<div class="title">{{ $data->name }}</div>
							<div class="position">{{ $data->designation }}</div>
							<ul class="social-icon">
								<li><a target="__blank" href="{{ $data->facebook_link }}"><span
										  class="fa fa-facebook"></span></a></li>
								<li><a target="__blank" href="{{ $data->twitter_link }}"><span
										  class="fa fa-twitter"></span></a></li>
								<li><a target="__blank" href="{{ $data->linkndin_link }}"><span
										  class="fa fa-linkedin-square"></span></a></li>
							</ul>
						</div>
					</div>
				</div>
				@endforeach
				@endif
			</div>

			<div class="row">
				<div class="col-sm-12 col-md-12">
					<h2 class="section-heading center">
						Our <span>Others Committee</span>
					</h2>

				</div>
			</div>
			<div class="row">
				@if(count($team)>0)
				@foreach($team->where('type',2) as $data)
				<div class="col-sm-3 col-md-3">
					<div class="rs-team-1">
						<div class="media"><img src="{{ URL::to('uploads/team') }}/{{ $data->image_link }}" alt="">
						</div>
						<div class="body">
							<div class="title">{{ $data->name }}</div>
							<div class="position">{{ $data->designation }}</div>
							<ul class="social-icon">
								<li><a target="__blank" href="{{ $data->facebook_link }}"><span
										  class="fa fa-facebook"></span></a></li>
								<li><a target="__blank" href="{{ $data->twitter_link }}"><span
										  class="fa fa-twitter"></span></a></li>
								<li><a target="__blank" href="{{ $data->linkndin_link }}"><span
										  class="fa fa-linkedin-square"></span></a></li>
							</ul>
						</div>
					</div>
				</div>
				@endforeach
				@endif
			</div>
			<div class="row">

				<div class="cta-info">
					<h1 class="section-heading center">
						Join <span>Our</span> Team?
					</h1>

					<div class="spacer-50"></div>
					<a href="{{ route('web.legal.aid.membership') }}" class="btn btn-primary margin-btn">FOR
						MEMBERSHIP</a> <a href="#" class="btn btn-secondary margin-btn">FOR DONATION</a>
				</div>

			</div>

		</div>
	</div>
</div>
@endsection