<!DOCTYPE html>
<html>

<head>
    <title>Membership View</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" media="all">
    <style>
        /* Add custom styling for print layout */
        @media print {
            body {
                font-size: 12px;
            }

            /* Reduce font size for print */
            .page-content {
                padding: 20px;
                margin: 0;
            }

            /* Adjust spacing for print */
            .form-control {
                font-size: 12px;
            }
        }

        /* Additional styles for your content */
        .page-content {
            padding: 40px;
        }

        input.form-control,
        textarea.form-control {
            border: none;
            box-shadow: none;
        }
    </style>
</head>

<body>
    <div class="container page-content">
        <div class="page-header">
            <a style="margin-left: 10px;" href="javascript:history.back()" class="btn btn-warning pull-right">Back</a>
            <button onclick="window.print()" class="btn btn-primary pull-right" style="margin-right: 10px;">Print</button>
            <table class="table table-bordered">
                <tbody>
                    <tr>
                        <td colspan="2">
                            <h2>{{$data->name}}</h2>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            {!! Form::label('image_link', 'Image', array('class' => 'col-form-label')) !!}
                            <br>
                            @if(isset($data->image_link) > 0 && !empty($data->image_link))
                            <img width="200" height="200" src="{{URL::to('')}}/uploads/membership/{{$data->image_link}}">
                            @endif
                        </td>
                        <td>
                            <div class="col-sm-6 col-md-6">
                                <label for="bd_name">Name (Bangla)</label>
                                <input type="text" class="form-control" id="bd_name" placeholder="Enter Name"
                                    name="bd_name" value="{{$data->bd_name}}" required="">
                                {!! $errors->first('bd_name') !!}
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <label for="name">Name (English)</label>
                                <input type="text" class="form-control" value="{{$data->name}}" id="name"
                                    placeholder="Enter Name" name="name" required="">
                                {!! $errors->first('name') !!}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="col-sm-6 col-md-6">
                                <label for="fathers_name">Father's Name</label>
                                <input type="text" class="form-control" value="{{$data->fathers_name}}"
                                    id="fathers_name" placeholder="Enter Father's Name" name="fathers_name"
                                    required="">
                                {!! $errors->first('fathers_name') !!}
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <label for="mothers_name">Mother's Name</label>
                                <input type="text" class="form-control" id="mothers_name"
                                    value="{{$data->mothers_name}}" placeholder="Enter Mother's Name"
                                    name="mothers_name" required="">
                                {!! $errors->first('mothers_name') !!}
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-6 col-md-6">
                                <label for="date_of_birth">Date Of Birth</label>
                                <input type="text" class="form-control" id="date_of_birth"
                                    value="{{$data->date_of_birth}}" placeholder="YYYY-MM-DD" name="date_of_birth"
                                    required="">
                                {!! $errors->first('date_of_birth') !!}
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <label for="blood_group">Blood Group</label>
                                <input type="blood_group" class="form-control" name=""
                                    value="{{$data->blood_group}}" placeholder="">
                                {!! $errors->first('blood_group') !!}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <h3 style="color: black">Permanent Address:</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="col-sm-4 col-md-4">
                                <label for="house_no">House No:</label>
                                <input type="text" class="form-control" value="{{$data->house_no}}"
                                    id="house_no" placeholder="Enter house no" name="house_no" required="">
                                {!! $errors->first('house_no') !!}
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <label for="area_name">Area/Village Name:</label>
                                <input type="text" class="form-control" id="area_name"
                                    value="{{$data->area_name}}" placeholder="enter area or village name"
                                    name="area_name" required="">
                                {!! $errors->first('area_name') !!}
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <label for="post_code">Post code:</label>
                                <input type="text" class="form-control" id="post_code"
                                    value="{{$data->post_code}}" placeholder="Enter post code" name="post_code"
                                    required="">
                                {!! $errors->first('post_code') !!}
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-4 col-md-4">
                                <label for="thana_name">Thana Name:</label>
                                <input type="text" class="form-control" id="thana_name"
                                    value="{{$data->thana_name}}" placeholder="Enter thana name" name="thana_name"
                                    required="">
                                {!! $errors->first('thana_name') !!}
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <label for="district_name">District Name:</label>
                                <input type="text" class="form-control" id="district_name"
                                    value="{{$data->district_name}}" placeholder="Enter district" name="district_name"
                                    required="">
                                {!! $errors->first('district_name') !!}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <h3 style="color: black">Present Address:</h3>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="col-sm-4 col-md-4">
                                <label for="p_house_no">House No:</label>
                                <input type="text" class="form-control" id="p_house_no"
                                    value="{{$data->p_house_no}}" placeholder="Enter house no" name="p_house_no"
                                    required="">
                                {!! $errors->first('p_house_no') !!}
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <label for="p_area_name">Area/Village Name:</label>
                                <input type="text" class="form-control" id="p_area_name"
                                    value="{{$data->p_area_name}}" placeholder="enter area or village name"
                                    name="p_area_name" required="">
                                {!! $errors->first('p_area_name') !!}
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <label for="p_post_code">Post code:</label>
                                <input type="text" class="form-control" id="p_post_code"
                                    value="{{$data->p_post_code}}" placeholder="Enter post code" name="p_post_code"
                                    required="">
                                {!! $errors->first('p_post_code') !!}
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-4 col-md-4">
                                <label for="p_thana_name">Thana Name:</label>
                                <input type="text" class="form-control" id="p_thana_name"
                                    value="{{$data->p_thana_name}}" placeholder="Enter thana name" name="p_thana_name"
                                    required="">
                                {!! $errors->first('p_thana_name') !!}
                            </div>
                            <div class="col-sm-4 col-md-4">
                                <label for="p_district_name">District Name:</label>
                                <input type="text" class="form-control" id="p_district_name"
                                    value="{{$data->p_district_name}}" placeholder="Enter district"
                                    name="p_district_name" required="">
                                {!! $errors->first('p_district_name') !!}
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="col-sm-6 col-md-6">
                                <label for="nid">NID</label>
                                <input type="nid" class="form-control" id="nid" name="nid" value="{{$data->nid}}"
                                    placeholder="Enter NID No" required="">
                                {!! $errors->first('nid') !!}
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <label for="designation">Designation</label>
                                <input type="designation" class="form-control" id="designation"
                                    value="{{$data->designation}}" name="designation"
                                    placeholder="Enter profession & designation" required="">
                                {!! $errors->first('designation') !!}
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-6 col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" name="email"
                                    value="{{$data->email}}" placeholder="Enter Email" required="">
                                {!! $errors->first('email') !!}
                            </div>
                            <div class="col-sm-6 col-md-6">
                                <label for="phone">Phone</label>
                                <input type="number" class="form-control" id="phone" placeholder="Enter Phone Number"
                                    value="{{$data->phone}}" name="phone" required="">
                                <div class="help-block with-errors"></div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <input type="hidden" name="status" value="active">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <div class="col-sm-12 col-md-12">
                                <label for="description">Why you want to join:</label>
                                <textarea id="description" class="form-control" name="description" rows="3"
                                    placeholder="Why are you interested in joining us ?">{{$data->description}}</textarea>
                                {!! $errors->first('description') !!}
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <!-- Bootstrap JS and jQuery CDN links -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</body>

</html>