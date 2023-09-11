<div class="clearfix"></div>

<!-- WE NEED YOUR HELP -->
<div class="section services">
	<div style="padding: 20px 0;">
		<div class="container ">
			<div class="row">
				<div class="col-sm-12 col-md-12">
					<h2 class="section-heading center">
						Our <span>Recent</span> Activity
					</h2>
					
				</div>
				<div class="clearfix"></div>
				<!-- Item 1 -->
					@if(count($activity)>0)
				@foreach($activity as $data)
				
				<div class="col-sm-4 col-md-4">
					<div class="box-fundraising">
						<div class="media">
							<img src="{{ URL::to('uploads/generalpages') }}/{{ $data->image_link }}" alt="{{ $data->title }}" style="height: 200px;">
						</div>
						<div class="body-content">
							<p class="title"><a target="__blank" href="{{ route('activity.details',[$data->id,$data->title]) }}" title="{{ $data->title }}">{{ $data->title }}</a></p>
							<div class="text">{!! str_limit($data->description,128) !!}</div>
							
						</div>
					</div>
				</div>
				@endforeach
				@endif
				
				<div class="col-sm-12 col-md-12">
					<div class="spacer-50"></div>
					<div class="text-center">
						<a target="__blank" href="{{ route('web.recent.activity') }}" class="btn btn-primary">SEE ALL ACITIVIY</a>
					</div>

				</div>

			</div>
		</div>
	</div>
</div>