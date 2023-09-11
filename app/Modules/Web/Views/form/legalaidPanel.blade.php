@extends('Web::layouts.master') 
@section('body') 
<?php
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;
?>
<div id="contact" class="section">
	<div class="container">
		<div class="col-sm-8 col-md-8 offset-md-2">
			<h2 class="section-heading">
				<span>Legal Aid Panel Member Form</span>
			</h2>
			<div class="section-subheading">If you want to join with us, Please kindly fillup this from and submit data as per our policy.</div>
			<div class="margin-bottom-50"></div>

			<div class="content">

				{!! Form::open(['route' => 'web.legal.aid.panel.store',  'files'=> true, 'id'=>'', 'class' => 'form-contact']) !!}

				<div class="row">
					<div class="col-sm-12 col-md-12">
						<div class="form-group">
							<input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required="">
							{!! $errors->first('name') !!}
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="form-group">
							<input type="email" class="form-control" id="email" name="email" placeholder="Enter Email" required="">
							{!! $errors->first('email') !!}
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="form-group">
							<input type="number" class="form-control" id="phone" placeholder="Enter Phone Number" name="phone" required="">
							<div class="help-block with-errors"></div>
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="form-group">
							<input type="text" class="form-control" id="education" placeholder="Enter Education Qualification" name="education" required="">
							{!! $errors->first('education') !!}
						</div>
					</div>
					<div class="col-sm-6 col-md-6">
						<div class="form-group">
							<input type="text" class="form-control" id="institute" placeholder="Enter institute name" name="institute" required="">
							{!! $errors->first('institute') !!}
						</div>
					</div>

					<div class="col-sm-12 col-md-12">
						<div class="form-group">
							<div class="form-line">
								{!! Form::label('image_link', 'Please Enter Your Image', array('class' => 'col-form-label')) !!}
							</br>
							<span class="error">Supported format :: jpeg,png,jpg & file size max :: 1MB</span>

							<div style="position:relative;">
								<a class='btn btn-info btn-sm font-10' href='javascript:;'>
									Choose File...
									<input name="image_link" type="file" style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;' name="file_source" size="40"  onchange='$("#upload-file-info-image").html($(this).val());'>
								</a>
								&nbsp;
								<span class='label label-info' id="upload-file-info-image"></span>
							</div>
						</div>

					</div>
				</div>
				<input type="hidden" name="status" value="active">
				<div class="col-sm-6 col-md-6">
					<div class="form-group">
						<textarea id="present_address" class="form-control" rows="3" placeholder="Enter Your Present Address" name="present_address"></textarea>
						{!! $errors->first('present_address') !!}
					</div>
				</div>

				<div class="col-sm-6 col-md-6">
					<div class="form-group">
						<textarea id="description" class="form-control" name="description" rows="3" placeholder="Why are you interest to join with us ?"></textarea>
						{!! $errors->first('description') !!}
					</div>
				</div>
			</div>
			<div class="form-group">
				<button type="submit" class="btn btn-primary pull-right">SUBMIT</button>
			</div>
			{!! Form::close() !!}


			<div class="margin-bottom-50"></div>
			<p><em>Note:Name, Email & Phone Number Are Must Be Required.</em></p>
		</div>
	</div>
</div>
</div>
@endsection