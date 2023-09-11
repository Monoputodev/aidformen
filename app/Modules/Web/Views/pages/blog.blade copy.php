@extends('Web::layouts.master') 
@section('body') 

<div class="section">
	<div style="padding: 20px 0;">
		<div class="container">
			<div class="row">

				<div class="col-sm-12 col-md-12">
					<h2 class="section-heading">
						<span>Blog</span>
					</h2>
				</div>
				@if(count($data)>0)
				@foreach($data as $values)
				
				<div class="col-sm-6 col-md-4">
						<!-- BOX 1 -->
						<div class="box-news-1">
							<div class="media gbr">
							<a href="{{ route('blog.details',[$values->id,$values->title]) }}" title="">	<img src="{{ URL::to('uploads/blog') }}/200x200/{{ $values->image_link }}" alt="" class="img-fluid"  style="height: 200px;"></a>
							</div>
							<div class="body">
								<div class="title"><a href="{{ route('blog.details',[$values->id,$values->title]) }}" title="">{{ $values->title }}</a></div>
							</div>
						</div>
					</div>
					@endforeach

				{{ $data->links() }}
				@endif
			</div>
		</div>
	</div>
</div>
@endsection