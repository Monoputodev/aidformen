@extends('Admin::layouts.master')
@section('body')

<div class="block-header block-header-2">
        <h2 class="pull-left">
          View Of MediaGallery
        </h2>    
        <a style="margin-left: 10px;" href="javascript:history.back()" class="btn btn-warning waves-effect pull-right">Back</a>            
    </div>
    <div class="row clearfix">

        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="body">

                    <div class="table-responsive">  
                       
                    <table id="" class="table table-bordered  table-striped">
                    <tr>
                        <th>Title</th>
                        <td>{{ isset($data->title)?ucfirst($data->title):''}}</td>
                    </tr>
                    <tr>
                        <th>Slug</th>
                        <td>{{ isset($data->slug)?ucfirst($data->slug):''}}</td>
                    </tr> 
                    <tr>
                        <th>Desegnation</th>
                        <td>{!! $data->short_description !!}</td>
                    </tr>
                    <tr>
                        <th>Message</th>
                        <td>{!! $data->description !!}</td>
                    </tr>
                    <tr>
                        <th> Image</th>
                        <td>@if(isset($data->image_link))
                                    <img src="{{URL::to('')}}/uploads/mediaGallery/{{$data->image_link}}" alt="{{$data->title}}" ></img>
                                    @endif </td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ isset($data->status)?ucfirst($data->status):'' }}</td>
                    </tr>


                </table>
            </div>
        </div>
        <!-- end panel-body -->
    </div>
    <!-- end panel -->
</div>
</div>
@endsection  