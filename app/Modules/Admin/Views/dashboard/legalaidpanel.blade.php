@extends('Admin::layouts.master')
@section('body')
<?php
use Illuminate\Support\Facades\Input;
?>
<div class="block-header block-header-2">
    <h2 class="pull-left">
    Legal Aid Panel
    </h2>
    <a style="margin-left: 10px;" href="javascript:history.back()" class="btn btn-warning waves-effect pull-right">Back</a>
</div>

<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    LIST OF LEGAL AID PANEL DATA
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
                                <th> Name </th>
                                <th> Email </th>
                                <th> Phone </th>
                                <th> Education </th>
                                <th> Institute </th>
                                <th> Image</th>
                                <th> Status</th>
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
                                    {{$values->name}}
                                </td>
                                <td>
                                    {{$values->email}}
                                </td>
                                <td>
                                    {{$values->phone}}
                                </td>
                                
                                <td>
                                    {{$values->education}}
                                </td>
                                <td>
                                    {{$values->institute}}
                                </td>
                               
                                
                                <td>
                                    @if(isset($values->image_link) > 0 && !empty($values->image_link))
                                    <img width="50" height="50" src="{{URL::to('')}}/uploads/LegalAidPanel/{{$values->image_link}}">
                                    @endif
                                </td>
                                <td>
                                    {{$values->status}}
                                </td>
                                <td>
                                    <a href="#" class="demo-google-material-icon"><i class="material-icons">remove_red_eye</i></a>
                                    
                                    <a href="#" class="demo-google-material-icon" onclick="return confirm('Are you sure to Delete?')" ><i class="material-icons">delete</i></a>
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

