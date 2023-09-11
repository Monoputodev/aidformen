@extends('Web::layouts.master') 
@section('body') 

<div class="section" data-background="{{ URL::to('frontend') }}/images/bg-gallery.png">
	<div class="content-wrap-20">
		<div class="container">
			<div class="row">

				<div class="col-sm-12 col-md-12">
					<h2 class="section-heading center">
						Our <span>Photo Gallery</span>
					</h2>
					<p class="subheading text-center">Our Recent Activity Gallery</p>

				</div>
                   

				<div class="row popup-gallery gutter-5" >

					@if(count($data)>0)
					@foreach($data  as $values)
					<div class="col-xs-12 col-md-4">
						<div class="box-gallery" >
						    
							<a href="{{ URL::to('uploads/mediaGallery') }}/{{ $values->image_link }}" title="{{ $values->description }}" >
								<img src="{{ URL::to('uploads/mediaGallery') }}/{{ $values->image_link }}" alt="{{ $values->description }}" class="img-fluid">
							
								<div class="project-info">
		
									<div class="project-icon" >
										<span class="fa fa-eye"></span>
									</div>
								</div>
							</a>
						</div>
					</div>
					@endforeach
					@endif
				</div>
				<div class="col-sm-12 col-md-12">
					<div class="spacer-50"></div>
					<div class="text-center">
						{{ $data->links() }}

					</div>

				</div>

			</div>
		</div>
	</div>
</div>
@endsection