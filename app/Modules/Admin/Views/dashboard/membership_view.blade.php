@extends('Admin::layouts.master')
@section('body')
<?php
use Illuminate\Support\Facades\Input;
?>
<div class="block-header block-header-2">
    <h2 class="pull-left">
        Membership View
    </h2>
    <a style="margin-left: 10px;" href="javascript:history.back()"
      class="btn btn-warning waves-effect pull-right">Back</a>
</div>

<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    MEMBERSHIP DATA
                </h2>
            </div>
            <div class="body">
                <form action="#" id="printableArea">
                    <div class="row">
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="bd_name">Name (Bangla)</label>

                                <input type="text" class="form-control" id="bd_name" placeholder="Enter Name"
                                  name="bd_name" value="{{$data->bd_name}}" required="">
                                {!! $errors->first('bd_name') !!}
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="name">Name (English)</label>

                                <input type="text" class="form-control" value="{{$data->name}}" id="name"
                                  placeholder="Enter Name" name="name" required="">
                                {!! $errors->first('name') !!}
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="fathers_name">Father's Name</label>

                                <input type="text" class="form-control" value="{{$data->fathers_name}}"
                                  id="fathers_name" placeholder="Enter Father's Name" name="fathers_name" required="">
                                {!! $errors->first('fathers_name') !!}
                            </div>
                        </div>
                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="mothers_name">Mother's Name</label>

                                <input type="text" class="form-control" id="mothers_name"
                                  value="{{$data->mothers_name}}" placeholder="Enter Mother's Name" name="mothers_name"
                                  required="">
                                {!! $errors->first('mothers_name') !!}
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="date_of_birth">Dath Of Birth</label>

                                <input type="text" class="form-control" id="date_of_birth"
                                  value="{{$data->date_of_birth}}" placeholder="YYYY-MM-DD" name="date_of_birth"
                                  required="">
                                {!! $errors->first('date_of_birth') !!}
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <label for="blood_group">Blood Group</label>
                                <input type="blood_group" class="form-control" name="" value="{{$data->blood_group}}"
                                  placeholder="">


                                {!! $errors->first('blood_group') !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <h3 style="color: black">Parmanent Address:</h3>
                        </div>

                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <label for="house_no">House No:</label>

                                <input type="text" class="form-control" value="{{$data->house_no}}" id="house_no"
                                  placeholder="Enter house no" name="house_no" required="">
                                {!! $errors->first('house_no') !!}
                            </div>
                        </div>

                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <label for="area_name">Area/Village Name:</label>

                                <input type="text" class="form-control" id="area_name" value="{{$data->area_name}}"
                                  placeholder="enter area or village name" name="area_name" required="">
                                {!! $errors->first('area_name') !!}
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <label for="post_code">Post code:</label>

                                <input type="text" class="form-control" id="post_code" value="{{$data->post_code}}"
                                  placeholder="Enter post code" name="post_code" required="">
                                {!! $errors->first('post_code') !!}
                            </div>
                        </div>

                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <label for="thana_name">Thana Name:</label>

                                <input type="text" class="form-control" id="thana_name" value="{{$data->thana_name}}"
                                  placeholder="Enter thana name" name="thana_name" required="">
                                {!! $errors->first('thana_name') !!}
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <label for="district_name">District Name:</label>

                                <input type="text" class="form-control" id="district_name"
                                  value="{{$data->district_name}}" placeholder="Enter district" name="district_name"
                                  required="">
                                {!! $errors->first('district_name') !!}
                            </div>
                        </div>

                        <div class="col-md-12">
                            <h3 style="color: black">Present Address:</h3>
                        </div>

                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <label for="p_house_no">House No:</label>

                                <input type="text" class="form-control" id="p_house_no" value="{{$data->p_house_no}}"
                                  placeholder="Enter house no" name="p_house_no" required="">
                                {!! $errors->first('p_house_no') !!}
                            </div>
                        </div>

                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <label for="p_area_name">Area/Village Name:</label>

                                <input type="text" class="form-control" id="p_area_name" value="{{$data->p_area_name}}"
                                  placeholder="enter area or village name" name="p_area_name" required="">
                                {!! $errors->first('p_area_name') !!}
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <label for="p_post_code">Post code:</label>

                                <input type="text" class="form-control" id="p_post_code" value="{{$data->p_post_code}}"
                                  placeholder="Enter post code" name="p_post_code" required="">
                                {!! $errors->first('p_post_code') !!}
                            </div>
                        </div>

                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <label for="p_thana_name">Thana Name:</label>

                                <input type="text" class="form-control" id="p_thana_name"
                                  value="{{$data->p_thana_name}}" placeholder="Enter thana name" name="p_thana_name"
                                  required="">
                                {!! $errors->first('p_thana_name') !!}
                            </div>
                        </div>
                        <div class="col-sm-4 col-md-4">
                            <div class="form-group">
                                <label for="p_district_name">District Name:</label>

                                <input type="text" class="form-control" id="p_district_name"
                                  value="{{$data->p_district_name}}" placeholder="Enter district" name="p_district_name"
                                  required="">
                                {!! $errors->first('p_district_name') !!}
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="nid" class="form-control" id="nid" name="nid" value="{{$data->nid}}"
                                  placeholder="Enter NID No" required="">
                                {!! $errors->first('nid') !!}
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="designation" class="form-control" id="designation"
                                  value="{{$data->designation}}" name="designation"
                                  placeholder="Enter profession & designation" required="">
                                {!! $errors->first('designation') !!}
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="email" class="form-control" id="email" name="email"
                                  value="{{$data->email}}" placeholder="Enter Email" required="">
                                {!! $errors->first('email') !!}
                            </div>
                        </div>


                        <div class="col-sm-6 col-md-6">
                            <div class="form-group">
                                <input type="number" class="form-control" id="phone" placeholder="Enter Phone Number"
                                  value="{{$data->phone}}" name="phone" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </div>


                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <div class="form-line">
                                    {!! Form::label('image_link', 'Image', array('class' => 'col-form-label')) !!}
                                    </br>

                                    @if(isset($data->image_link) > 0 && !empty($data->image_link))
                                    <img width="200" height="200"
                                      src="{{URL::to('')}}/uploads/membership/{{$data->image_link}}">
                                    @endif
                                </div>

                            </div>
                        </div>
                        <input type="hidden" name="status" value="active">


                        <div class="col-sm-12 col-md-12">
                            <div class="form-group">
                                <label for="description">Why you want to join:</label>
                                <textarea id="description" class="form-control" name="description" rows="3"
                                  placeholder="Why are you interest to join with us ?">{{$data->description}}</textarea>
                                {!! $errors->first('description') !!}
                            </div>
                        </div>
                    </div>
                    <button type="button" onclick="printPageArea('printableArea')">
                        Print Form with Header
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    newWin.document.write('<html><head><title>' + elementToPrint.caption + '</title>');
newWin.document.write('<link href="Your-Path/bootstrap.min.css" rel="stylesheet" />');
newWin.document.write('<link href="Your-Path/bootstrap-theme.min.css" rel="stylesheet" />');
newWin.document.write('</head><body class=\'visible-print\'>');
    function printPageArea(areaID){
    var printContent = document.getElementById(areaID).innerHTML;
    var originalContent = document.body.innerHTML;
    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
}
</script>
@endsection