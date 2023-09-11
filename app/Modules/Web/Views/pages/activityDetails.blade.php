@extends('Web::layouts.master') 
@section('body') 

<div class="section">
		<div class="content-wrap">
			<div class="container">
				<div class="row">
					@if(count($activity)>0)
					<div class="col-sm-12 col-md-12">
						<div class="single-news">
							<div class="image">
								<img src="{{ URL::to('uploads/generalpages') }}/{{ $activity->image_link }}" alt="{{ $activity->title }}" class="img-fluid"> 
							</div>
							<h2 class="blok-title">
								{{ $activity->title }}
							</h2>
							{!! $activity->description !!}
							
						 </div>

					</div>
					@endif


					<div class="col-sm-12 col-md-12">
						<h2 class="section-heading">
							Our Recent <span>Activity</span>
						</h2>
					</div>
					@if(count($activitymore)>0)
					@foreach($activitymore as $data)
					
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