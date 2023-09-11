@extends('Web::layouts.master')
@section('body')

<div id="our-volunteers" class="section">
	<div class="content-wrap">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<h2 class="section-heading center">
						Our <span>Volunteers</span> Says
					</h2>

				</div>
			</div>
			<div class="row">
				@if(count($testimonial)>0)
				@foreach($testimonial as $data)
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