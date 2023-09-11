@extends('Web::layouts.master') 
@section('body') 
<?php
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;
?>
<div id="contact" class="section">
	<div class="container">
		<div class="row">
			<div class="col-md-12">
				<h2 class="section-heading">
					<span>Help Form</span>
				</h2>


			<div class="col-md-12">
				<ul class="nav nav-pills mb-3" id="pills-tab" role="tablist" style="margin-left:0px;margin-top: 10px;">
					<li class="nav-item">
						<a class="nav-link active btn-info btn-mini" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Help Form</a>
					</li>
					
				</ul>


				<div class="tab-content" id="pills-tabContent">
					<div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
						<p><a href="{{URL::to('logo/GenerelMembershipForm.pdf')}}" class="btn btn-success btn-sm" download=""><i class="fa fa-download"></i> Download</a></p>

						<iframe
						src="{{URL::to('logo/GenerelMembershipForm.pdf')}}?embedded=true&url=http://infolab.stanford.edu/pub/papers/google.pdf#toolbar=0&scrollbar=0"
						frameBorder="0"
						scrolling="auto"
						height="700px"
						width="100%"
						></iframe>
					</div>
					
				</div>
			</div>
			
		</div>
	</div>
</div>

@endsection