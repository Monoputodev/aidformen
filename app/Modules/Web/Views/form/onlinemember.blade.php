
<div class="section-subheading">If you want to join with us, Please kindly fillup this from and submit data as per our policy.</div>
<div class="margin-bottom-50"></div>
<style type="text/css" media="screen">
	label {
		color: black;
		font-weight: 500;
	}
	.section-subheading{
		color: red;
		font-weight: 500;
	}
	
</style>
<div class="content">

	{!! Form::open(['route' => 'web.legal.aid.membership.store',  'files'=> true, 'id'=>'', 'class' => 'form-contact']) !!}

	<div class="row">
		<div class="col-sm-6 col-md-6">
			<div class="form-group">
				<label for="bd_name">Name (Bangla)</label>
				
				<input type="text" class="form-control" id="bd_name" placeholder="Enter Name" name="bd_name" required="">
				{!! $errors->first('bd_name') !!}
			</div>
		</div>
		<div class="col-sm-6 col-md-6">
			<div class="form-group">
				<label for="name">Name (English)</label>
				
				<input type="text" class="form-control" id="name" placeholder="Enter Name" name="name" required="">
				{!! $errors->first('name') !!}
			</div>
		</div>
		<div class="col-sm-6 col-md-6">
			<div class="form-group">
				<label for="fathers_name">Father's Name</label>
				
				<input type="text" class="form-control" id="fathers_name" placeholder="Enter Father's Name" name="fathers_name" required="">
				{!! $errors->first('fathers_name') !!}
			</div>
		</div>
		<div class="col-sm-6 col-md-6">
			<div class="form-group">
				<label for="mothers_name">Mother's Name</label>
				
				<input type="text" class="form-control" id="mothers_name" placeholder="Enter Mother's Name" name="mothers_name" required="">
				{!! $errors->first('mothers_name') !!}
			</div>
		</div>

		<div class="col-sm-6 col-md-6">
			<div class="form-group">
				<label for="date_of_birth">Dath Of Birth</label>
				
				<input type="date" class="form-control" id="date_of_birth" placeholder="YYYY-MM-DD" name="date_of_birth" required="">
				{!! $errors->first('date_of_birth') !!}
			</div>
		</div>

		<div class="col-sm-6 col-md-6">
			<div class="form-group">
				<label for="blood_group">Blood Group</label>

			
				<select class="form-control" name="blood_group" id="blood_group" required>
						<option value="">Select Blood Group</option>
						<option value="A+">A+</option>
						<option value="A-">A-</option>
						<option value="B+">B+</option>
						<option value="B-">B-</option>
						<option value="O+">O+</option>
						<option value="O-">O-</option>
						<option value="AB+">AB+</option>
						<option value="AB-">AB-</option>
					</select>
				{!! $errors->first('blood_group') !!}
			</div>
		</div>

		<div class="col-md-12"><h3 style="color: black">Parmanent Address:</h3></div>
		
		<div class="col-sm-4 col-md-4">
			<div class="form-group">
				<label for="house_no">House No:</label>

				<input type="text" class="form-control" id="house_no" placeholder="Enter house no" name="house_no" required="">
				{!! $errors->first('house_no') !!}
			</div>
		</div>

		<div class="col-sm-4 col-md-4">
			<div class="form-group">
				<label for="area_name">Area/Village Name:</label>

				<input type="text" class="form-control" id="area_name" placeholder="enter area or village name" name="area_name" required="">
				{!! $errors->first('area_name') !!}
			</div>
		</div>
		<div class="col-sm-4 col-md-4">
			<div class="form-group">
				<label for="post_code">Post code:</label>

				<input type="text" class="form-control" id="post_code" placeholder="Enter post code" name="post_code" required="">
				{!! $errors->first('post_code') !!}
			</div>
		</div>

		<div class="col-sm-4 col-md-4">
			<div class="form-group">
				<label for="thana_name">Thana Name:</label>

				<input type="text" class="form-control" id="thana_name" placeholder="Enter thana name" name="thana_name" required="">
				{!! $errors->first('thana_name') !!}
			</div>
		</div>
		<div class="col-sm-4 col-md-4">
			<div class="form-group">
				<label for="district_name">District Name:</label>

				<input type="text" class="form-control" id="district_name" placeholder="Enter district" name="district_name" required="">
				{!! $errors->first('district_name') !!}
			</div>
		</div>

		<div class="col-md-12"><h3 style="color: black">Present Address:</h3></div>

		<div class="col-sm-4 col-md-4">
			<div class="form-group">
				<label for="p_house_no">House No:</label>

				<input type="text" class="form-control" id="p_house_no" placeholder="Enter house no" name="p_house_no" required="">
				{!! $errors->first('p_house_no') !!}
			</div>
		</div>

		<div class="col-sm-4 col-md-4">
			<div class="form-group">
				<label for="p_area_name">Area/Village Name:</label>

				<input type="text" class="form-control" id="p_area_name" placeholder="enter area or village name" name="p_area_name" required="">
				{!! $errors->first('p_area_name') !!}
			</div>
		</div>
		<div class="col-sm-4 col-md-4">
			<div class="form-group">
				<label for="p_post_code">Post code:</label>

				<input type="text" class="form-control" id="p_post_code" placeholder="Enter post code" name="p_post_code" required="">
				{!! $errors->first('p_post_code') !!}
			</div>
		</div>

		<div class="col-sm-4 col-md-4">
			<div class="form-group">
				<label for="p_thana_name">Thana Name:</label>

				<input type="text" class="form-control" id="p_thana_name" placeholder="Enter thana name" name="p_thana_name" required="">
				{!! $errors->first('p_thana_name') !!}
			</div>
		</div>
		<div class="col-sm-4 col-md-4">
			<div class="form-group">
				<label for="p_district_name">District Name:</label>

				<input type="text" class="form-control" id="p_district_name" placeholder="Enter district" name="p_district_name" required="">
				{!! $errors->first('p_district_name') !!}
			</div>
		</div>

		<div class="col-sm-6 col-md-6">
			<div class="form-group">
				<input type="nid" class="form-control" id="nid" name="nid" placeholder="Enter NID No" required="">
				{!! $errors->first('nid') !!}
			</div>
		</div>

		<div class="col-sm-6 col-md-6">
			<div class="form-group">
				<input type="designation" class="form-control" id="designation" name="designation" placeholder="Enter profession & designation" required="">
				{!! $errors->first('designation') !!}
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


	<div class="col-sm-12 col-md-12">
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