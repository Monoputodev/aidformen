@extends('Web::layouts.master')
@section('body')

<div class="section">
	<div style="padding: 20px 0;">
		<div class="container">
			<div class="row">

				<div class="col-sm-12 col-md-12">
					<h2 class="section-heading">
						<span>Become a sponsor</span>
					</h2>
				</div>
				@if(isset($sponsor))
				<div class="col-sm-6 col-md-6">
					{!! $sponsor->description !!}
				</div>

				<div class="col-sm-6 col-md-6">

					<div class="about-img">

						<div class="hover-img">
							<img src="{{ URL::to('uploads') }}/generalpages/{{ $sponsor->image_link }}" alt=""
							  class="img-fluid">
						</div>

					</div>

				</div>
				@endif

			</div>
		</div>
	</div>
</div>
@endsection