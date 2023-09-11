@extends('Web::layouts.master') 
@section('body') 

<div class="section">
	<div style="padding: 20px 0;">
		<div class="container">
			<div class="row">

				<div class="col-sm-12 col-md-12">
					<h2 class="section-heading">
						Welcome <span>To</span> AID For MEN
					</h2>
				</div>
				@if(isset($aboutUs))
				<div class="col-sm-6 col-md-6">
						{!! $aboutUs->description !!}
				</div>

				<div class="col-sm-6 col-md-6">

					<div class="about-img">
						
							<div class="hover-img">
								<img src="{{ URL::to('uploads') }}/generalpages/{{ $aboutUs->image_link }}" alt="" class="img-fluid">
							</div>
						
					</div>

				</div>
				@endif

			</div>
		</div>
	</div>
</div>
@endsection