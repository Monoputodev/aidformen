@extends('Web::layouts.master') 
@section('body') 

<div class="section">
	<div style="padding: 20px 0;">
		<div class="container">
			<div class="row">

				<div class="col-sm-12 col-md-12">
					<h2 class="section-heading">
						Our Mission <span>And</span> Vision
					</h2>
				</div>
				@if(isset($mission))
				<div class="col-sm-6 col-md-6">
						{!! $mission->description !!}
				</div>

				<div class="col-sm-6 col-md-6">

					<div class="about-img">
						
							<div class="hover-img">
								<img src="{{ URL::to('uploads') }}/generalpages/{{ $mission->image_link }}" alt="" class="img-fluid">
							</div>
						
					</div>

				</div>
				@endif

			</div>
		</div>
	</div>
</div>
@endsection