@extends('Admin::layouts.master')
@section('body')

<?php
use Illuminate\Support\Facades\Input;
?>
<div class="row clearfix">
  <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="card">
      <div class="body">

       {!! Form::model($data, ['method' => 'PATCH', 'files'=> true, 'route'=> ['admin.statustic.update', $data->id],"class"=>"", 'id' => '']) !!}

       <div class="row">

        <div class="col-md-3">
          <div class="form-group">

            <div class="form-line">
              {!! Form::label('clients', 'Clients', array('class' => 'col-form-label')) !!}<span class="required"> *</span> 

              {!! Form::text('clients',Input::old('clients'),['id'=>'clients','class' => 'form-control','required'=> 'required',  'placeholder'=>'Enter total clients']) !!}
              <span class="error">{!! $errors->first('clients') !!}</span>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
            <div class="form-line">
              {!! Form::label('success_rate', 'Success Rate ', array('class' => 'col-form-label')) !!}<span class="required"> *</span> 

              {!! Form::text('success_rate',Input::old('success_rate'),['id'=>'success_rate','class' => 'form-control','required'=> 'required',  'placeholder'=>'Enter Success Rate']) !!}
              <span class="error">{!! $errors->first('success_rate') !!}</span>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">

            <div class="form-line">
              {!! Form::label('project', 'Project ', array('class' => 'col-form-label')) !!}<span class="required"> *</span> 

              {!! Form::text('project',Input::old('project'),['id'=>'project','class' => 'form-control','required'=> 'required',  'placeholder'=>'Enter Project']) !!}
              <span class="error">{!! $errors->first('project') !!}</span>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="form-group">
           <div class="form-line">
            {!! Form::label('award', 'Award ', array('class' => 'col-form-label')) !!}<span class="required"> *</span> 

            {!! Form::text('award',Input::old('award'),['id'=>'award','class' => 'form-control','required'=> 'required',  'placeholder'=>'Enter Award']) !!}
            <span class="error">{!! $errors->first('award') !!}</span>
          </div>

        </div>
      </div>
      <div class="col-md-12">
        {!! Form::submit('Save changes', ['class' => 'btn btn-primary pull-right btn-sm font-10 m-t-15','data-placement'=>'top','data-content'=>'click save changes button for save role information']) !!}&nbsp;
      </div>
    </div>
    {!! Form::close() !!}   

  </div>
</div>
</div>
</div>

@endsection

