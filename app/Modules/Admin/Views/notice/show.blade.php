@extends('Admin::layouts.master')
@section('body')

<div class="block-header block-header-2">
    <h2 class="pull-left">
      View
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
                            <th>Title</th>
                            <td>{{ isset($data->title)?ucfirst($data->title):''}}</td>
                        </tr>
                        <tr>
                            <th>Description</th>
                            <td>{!! isset($data->description)?ucfirst($data->description):'' !!}</td>
                        </tr>
                         
                        <tr>
                            <th>Status</th>
                            <td>{{ isset($data->status)?ucfirst($data->status):'' }}</td>
                        </tr>
                        

                        <tr>
                            <th>File</th>
                            <td>
                                @if(isset($data->image_link) > 0 && !empty ($data->image_link))
                                
                                <embed src="{{URL::to('')}}/uploads/notice/{{$data->image_link}}#toolbar=0&navpanes=0&scrollbar=0" type="application/pdf" width="100%" height="600px" />
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