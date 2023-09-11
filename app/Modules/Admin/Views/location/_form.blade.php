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


    <div class="col-md-6">


        <div class="form-group">
            <div class="form-line">
                {!! Form::label('description', 'Description', array('class' => 'col-form-label')) !!}
                {!! Form::textarea('description',Input::old('description'),['id'=>'summary-ckeditor','class' =>
                'form-control wysiwyg_custome_editor', 'placeholder'=>'Enter Description','rows'=>'5', 'cols'=>'30'])
                !!}
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