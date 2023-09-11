@extends('Web::layouts.master')
@section('body')

<div id="our-location" class="section">
	<div class="content-wrap">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<h2 class="section-heading center">
						Our <span> Locations</span>
					</h2>

				</div>
			</div>
			<div class="row">
				@if(count($location)>0)
				@foreach($location as $data)
				<div class="col-sm-3 col-md-3">
					<div class="rs-location-1">

						<div class="body">
							<div class="title" style="
    font-size: 16px;
    font-weight: 800;
    color: #11698c;
">{{ $data->name }}</div>
							<div class="position">{!! $data->description !!}</div>

						</div>
					</div>
				</div>
				@endforeach
				@endif
			</div>


		</div>
	</div>
</div>
@endsection