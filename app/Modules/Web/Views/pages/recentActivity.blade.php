@extends('Web::layouts.master') 
@section('body') 

<div class="section">
	<div style="padding: 20px 0;">
		<div class="container">
			<div class="row">

				<div class="col-sm-12 col-md-12">
					<h2 class="section-heading">
						Our Recent <span>Activity</span>
					</h2>
				</div>
				@if(count($activity)>0)
				@foreach($activity as $data)
				
				<div class="col-sm-6 col-md-4">
						<!-- BOX 1 -->
						<div class="box-news-1">
							<div class="media gbr">
								<img src="{{ URL::to('uploads/generalpages') }}/{{ $data->image_link }}" alt="" class="img-fluid"  style="height: 200px;">
							</div>
							<div class="body">
								<div class="title"><a href="{{ route('activity.details',[$data->id,$data->title]) }}" title="">{{ $data->title }}</a></div>
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