@extends('Admin::layouts.master')
@section('body')

<div class="block-header block-header-2">
    <h2 class="pull-left">
        View Of Partner Member
    </h2>
    <a style="margin-left: 10px;" href="javascript:history.back()"
      class="btn btn-warning waves-effect pull-right">Back</a>
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
                            <th>Status</th>
                            <td>{{ isset($data->status)?ucfirst($data->status):'' }}</td>
                        </tr>


                        <tr>
                            <th>Image</th>
                            <td>
                                @if(isset($data->image_link) > 0 && !empty ($data->image_link))

                                <a target="_blank" href="{{URL::to('')}}/uploads/partner/{{$data->image_link}}">
                                    <img width="50" height="50"
                                      src="{{URL::to('')}}/uploads/partner/{{$data->image_link}}">
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