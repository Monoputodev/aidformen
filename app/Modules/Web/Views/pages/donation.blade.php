@extends('Web::layouts.master')
@section('body')

<div id="our-donation" class="section">
	<div class="content-wrap">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<h2 class="section-heading center">
						Our <span>Bank details</span>
					</h2>

				</div>
			</div>
			<div class="row">
				@if(count($donation)>0)
				@foreach($donation->where('type',1) as $data)
				<div class="col-sm-3 col-md-3">
					<div class="rs-donation-1">

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

			<div class="row">
				<div class="col-sm-12 col-md-12">
					<h2 class="section-heading center">
						Our <span>Mobile Banking details</span>
					</h2>

				</div>
			</div>
			<div class="row">
				@if(count($donation)>0)
				@foreach($donation->where('type',2) as $data)
				<div class="col-sm-3 col-md-3">
					<div class="rs-donation-1">

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