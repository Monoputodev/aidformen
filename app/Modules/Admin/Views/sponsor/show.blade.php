@extends('Admin::layouts.master')
@section('body')

<div class="block-header block-header-2">
    <h2 class="pull-left">
      View Of Team Member
    </h2>    
    <a style="margin-left: 10px;" href="javascript:history.back()" class="btn btn-warning waves-effect pull-right">Back</a>            
</div>

<div class="row clearfix">

    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="body">

                <div class="table-responsive">  
                    <table id="" class="table">
                        <tr>
                            <th>Name</th>
                            <td>{{ isset($data->name)?ucfirst($data->name):''}}</td>
                        </tr>
                        <tr>
                            <th>Email</th>
                            <td>{{ isset($data->email)?ucfirst($data->email):''}}</td>
                        </tr>
                        <tr>
                            <th>Phone</th>
                            <td>{{ isset($data->phone)?ucfirst($data->phone):''}}</td>
                        </tr>
                        <tr>
                            <th>Designation</th>
                            <td>{{ isset($data->designation)?ucfirst($data->designation):''}}</td>
                        </tr>
                        <tr>
                            <th>Facebook Link</th>
                            <td>{{ isset($data->facebook_link)?ucfirst($data->facebook_link):''}}</td>
                        </tr>
                        <tr>
                            <th>Twitter Link</th>
                            <td>{{ isset($data->twitter_link)?ucfirst($data->twitter_link):''}}</td>
                        </tr>
                        <tr>
                            <th>linkedin Link</th>
                            <td>{{ isset($data->linkndin_link)?ucfirst($data->linkndin_link):''}}</td>
                        </tr>
                        <tr>
                            <th>Skype Link</th>
                            <td>{{ isset($data->skype_link)?ucfirst($data->skype_link):''}}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{!! isset($data->description)?ucfirst($data->description):'' !!}</td>
                        </tr>
                        <tr>
                            <th>Education</th>
                            <td>{!! isset($data->education)?ucfirst($data->education):'' !!}</td>
                        </tr>
                       
                        <tr>
                            <th>Status</th>
                            <td>{{ isset($data->status)?ucfirst($data->status):'' }}</td>
                        </tr>
                        

                        <tr>
                            <th>Image</th>
                            <td>
                                @if(isset($data->image_link) > 0 && !empty ($data->image_link))
                                    
                                <a target="_blank" href="{{URL::to('')}}/uploads/team/{{$data->image_link}}">
                                    <img width="50" height="50" src="{{URL::to('')}}/uploads/team/{{$data->image_link}}">            
                                </a>
                                @endif
                            </td>
                        </tr>

                    </table>
                </div>

            </div>
        </div>
    </div>

</div>

@endsection  