<?php
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Input;
?>

<div class="row">

    <div class="col-md-6">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('name', 'Name', array('class' => 'col-form-label')) !!}<span class="required"> *</span>
                {!! Form::text('name',Input::old('name'),['id'=>'name','class' => 'form-control','required'=>
                'required', 'placeholder'=>'Enter Name','onkeyup'=>"convert_to_slug();"]) !!}
                <span class="error">{!! $errors->first('name') !!}</span>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('slug', 'Slug', array('class' => 'col-form-label')) !!}<span class="required"> *</span>
                {!! Form::text('slug',Input::old('slug'),['id'=>'slug','class' => 'form-control','required'=>
                'required', 'placeholder'=>'Attorney Slug' ]) !!}
                <span class="error">{!! $errors->first('slug') !!}</span>
            </div>
        </div>
    </div>

    <div class="col-md-4">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('email', 'Email', array('class' => 'col-form-label')) !!}
                {!! Form::email('email',Input::old('email'),['id'=>'email','class' =>
                'form-control','placeholder'=>'Enter email']) !!}
                <span class="error">{!! $errors->first('email') !!}</span>
            </div>
        </div>
    </div>

    <div class="col-md-4">

        <div class="form-group">
            <div class="form-line">
                {!! Form::label('phone', 'Phone', array('class' => 'col-form-label')) !!}
                {!! Form::number('phone',Input::old('phone'),['id'=>'phone','class' =>
                'form-control','placeholder'=>'Enter Phone Number']) !!}
                <span class="error">{!! $errors->first('phone') !!}</span>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('designation', 'Designation', array('class' => 'col-form-label')) !!}<span
                  class="required"> *</span>
                {!! Form::text('designation',Input::old('designation'),['id'=>'designation','class' =>
                'form-control','required'=> 'required', 'placeholder'=>'Enter designation']) !!}
                <span class="error">{!! $errors->first('designation') !!}</span>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('facebook_link', 'Facebook Link', array('class' => 'col-form-label')) !!}
                {!! Form::text('facebook_link',Input::old('facebook_link'),['id'=>'facebook_link','class' =>
                'form-control', 'placeholder'=>'https://www.facebook.com/xyz']) !!}
                <span class="error">{!! $errors->first('facebook_link') !!}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('twitter_link', 'Twitter Link', array('class' => 'col-form-label')) !!}
                {!! Form::text('twitter_link',Input::old('twitter_link'),['id'=>'twitter_link','class' =>
                'form-control','placeholder'=>'https://twitter.com/xyz']) !!}
                <span class="error">{!! $errors->first('twitter_link') !!}</span>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('linkndin_link', 'linkedin Link', array('class' => 'col-form-label')) !!}
                {!! Form::text('linkndin_link',Input::old('linkndin_link'),['id'=>'linkndin_link','class' =>
                'form-control','placeholder'=>'https://linkedin.com/xyz']) !!}
                <span class="error">{!! $errors->first('linkndin_link') !!}</span>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('skype_link', 'Skype Link', array('class' => 'col-form-label')) !!}
                {!! Form::text('skype_link',Input::old('skype_link'),['id'=>'skype_link','class' =>
                'form-control','placeholder'=>'Enter your skype link']) !!}
                <span class="error">{!! $errors->first('skype_link') !!}</span>
            </div>
        </div>
    </div>


    <div class="col-md-6">

        <div class="form-group">
            <div class="form-line">
                {!! Form::label('education', 'Education', array('class' => 'col-form-label')) !!}
                {!! Form::textarea('education',Input::old('education'),['id'=>'education','class' => 'form-control',
                'placeholder'=>'Enter education','rows'=>'5', 'cols'=>'30']) !!}
                <span class="error">{!! $errors->first('education') !!}</span>
            </div>
        </div>
    </div>
    <div class="col-md-6">

        <div class="form-group">
            <div class="form-line">
                {!! Form::label('description', 'About You', array('class' => 'col-form-label')) !!}
                {!! Form::textarea('description',Input::old('description'),['id'=>'description','class' =>
                'form-control', 'placeholder'=>'Enter About You','rows'=>'5', 'cols'=>'30']) !!}
                <span class="error">{!! $errors->first('description') !!}</span>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('status', 'Status', array('class' => 'col-form-label')) !!}<span class="required">
                    *</span>
                {!! Form::Select('status',array('active'=>'Active','inactive'=>'Inactive','cancel' =>
                'Cancel'),Input::old('status'),['id'=>'status', 'class'=>'form-control selectheight']) !!}
                <span class="error">{!! $errors->first('status') !!}</span>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('type', 'Type', array('class' => 'col-form-label')) !!}<span class="required">
                    *</span>
                {!! Form::Select('type',array('1'=>'Excecutive Comittie','2'=>'Others
                Comittie'),Input::old('type'),['id'=>'type', 'class'=>'form-control selectheight']) !!}
                <span class="error">{!! $errors->first('type') !!}</span>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <div class="form-line">
                {!! Form::label('image_link', 'Image Link', array('class' => 'col-form-label')) !!} (<span
                  class="error">Supported format :: jpeg,png,jpg,gif & file size max :: 1MB</span>)

                <div style="position:relative;">
                    <a class='btn btn-primary btn-sm font-10' href='javascript:;'>
                        Choose File...
                        <input name="image_link" type="file"
                          style='position:absolute;z-index:2;top:0;left:0;filter: alpha(opacity=0);-ms-filter:"progid:DXImageTransform.Microsoft.Alpha(Opacity=0)";opacity:0;background-color:transparent;color:transparent;'
                          name="file_source" size="40" onchange='$("#upload-file-info").html($(this).val());'>
                    </a>
                    &nbsp;
                    <span class='label label-info' id="upload-file-info"></span>
                </div>
                @if(isset($data['image_link'] ) && !empty($data['image_link']) )
                <a target="_blank" href="{{URL::to('')}}/uploads/team/{{$data->image_link}}" style="margin-top: 5px;"
                  class="btn btn-primary btn-sm font-10"><img src="{{URL::to('')}}/uploads/team/{{$data->image_link}}"
                      height="50px" alt="{{$data['image_link']}}">
                </a>

                @endif

                <span class="error">{!! $errors->first('image_link') !!}</span>
            </div>
        </div>
    </div>
    <div class="col-md-12">

        {!! Form::submit('Save changes', ['class' => 'btn btn-primary pull-right btn-sm font-10
        m-t-15','data-placement'=>'top','data-content'=>'click save changes button for save role information'])
        !!}&nbsp;
    </div>

</div>

<script>
    function convert_to_slug(){
        var str = document.getElementById("name").value;
        str = str.replace(/[^a-zA-Z0-12\s]/g,"");
        str = str.toLowerCase();
        str = str.replace(/\s/g,'-');
        document.getElementById("slug").value = str;

    }

</script>