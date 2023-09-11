@extends('Admin::layouts.master')
@section('body')
<?php
use Illuminate\Support\Facades\Input;
?>
<div class="block-header block-header-2">
    <h2 class="pull-left">
        Client 
    </h2>
    <a style="margin-left: 10px;" href="javascript:history.back()" class="btn btn-warning waves-effect pull-right">Back</a>
    <a href="{{route('admin.client.create')}}" class="btn btn-primary waves-effect pull-right">Add Client</a>
</div>
{!! Form::open(['method' =>'GET', 'route' => 'admin.client.search', 'id'=>'', 'class' => '']) !!}
<div class="input-group">
    <div class="form-line">            
        {!! Form::text('search_keywords',@Input::get('search_keywords')? Input::get('search_keywords') : null,['class' => 'form-control','placeholder'=>'Type Search Key']) !!}
    </div>
    <span class="input-group-addon">
        <button type="submit" class="btn bg-red waves-effect">
            Search
        </button>
    </span>
</div>
{!! Form::close() !!}

<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    LIST OF CLIENTS
                </h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    @if(count($data) > 0)
                    <div>
                        {{$data->links()}}
                    </div>
                    @endif
                    <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                        <thead>
                            <tr>
                                <th> No</th>
                                <th> Title </th>
                                <th> Status</th>
                                <th> Image</th>
                                <th> Action </th>
                            </tr>
                        </thead>

                        <tbody>
                            @if(count($data) > 0)

                            @foreach($data as $key=> $values)
                            <tr>
                                <td>
                                    {{ ($data->currentpage()-1) * $data->perpage() + $key + 1 }}
                                </td>
                                <td>
                                    {{$values->title}}
                                </td>

                               
                                <td>
                                    {{$values->status}}
                                </td>
                                <td>
                                    @if(isset($values->image_link) > 0 && !empty($values->image_link))
                                    <img width="50" height="50" src="{{URL::to('')}}/uploads/client/{{$values->image_link}}">
                                    @endif
                                </td>
                                <td>
                                    <a href="{{ route('admin.client.show', $values->id) }}" class="demo-google-material-icon"><i class="material-icons">remove_red_eye</i></a>
                                    <a href="{{ route('admin.client.edit', $values->id) }}" class="demo-google-material-icon" ><i class="material-icons">border_color</i></a>
                                    <a href="{{ route('admin.client.destroy', $values->id) }}" class="demo-google-material-icon" onclick="return confirm('Are you sure to Delete?')" ><i class="material-icons">delete</i></a>
                                </td>
                            </tr>

                            @endforeach
                            @endif

                        </tbody>
                    </table>
                    @if(count($data) > 0)
                    <div>
                        {{$data->links()}}
                    </div>
                    @endif

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

