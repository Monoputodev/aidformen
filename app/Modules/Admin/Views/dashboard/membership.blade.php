@extends('Admin::layouts.master')
@section('body')
<?php
use Illuminate\Support\Facades\Input;
?>
<div class="block-header block-header-2">
    <h2 class="pull-left">
        Membership
    </h2>
    <a style="margin-left: 10px;" href="javascript:history.back()"
      class="btn btn-warning waves-effect pull-right">Back</a>
</div>

<!-- Basic Examples -->
<div class="row clearfix">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="card">
            <div class="header">
                <h2>
                    LIST OF MEMBERSHIP DATA
                </h2>
            </div>
            <div class="body">
                <div class="table-responsive">
                    @if(count($data) > 0)
                    <div>
                        {{$data->links()}}
                    </div>

                    <div>
                        <a href="{{route('admin.membership.print.all')}}"
                          class="btn btn-primary demo-google-material-icon my-2">Print all <i
                              class="material-icons">print</i></a>
                    </div>
                    @endif
                    <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                        <thead>
                            <tr>
                                <th>

                                    <input type="checkbox" class="select-all" />
                                </th>
                                <th> Name </th>
                                <th> Email </th>
                                <th> Phone </th>
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
                                    @if(isset($values->image_link) > 0 && !empty($values->image_link))
                                    <img width="50" height="50"
                                      src="{{URL::to('')}}/uploads/membership/{{$values->image_link}}">
                                    @endif
                                </td>
                                <td>
                                    {{$values->status}}
                                </td>
                                <td>

                                    <a href="{{route('admin.membership.print',$values->id)}}"
                                      class="demo-google-material-icon"><i class="material-icons">print</i></a>

                                    <a href="{{route('admin.membership.view',$values->id)}}"
                                      class="demo-google-material-icon"><i class="material-icons">remove_red_eye</i></a>

                                    <a href="#" class="demo-google-material-icon"
                                      onclick="return confirm('Are you sure to Delete?')"><i
                                          class="material-icons">delete</i></a>
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

<script>
    // JavaScript to handle Select All checkbox
    document.addEventListener('DOMContentLoaded', function () {
        const selectAllCheckbox = document.querySelector('.select-all');
        const checkboxes = document.querySelectorAll('input[name="selected_items[]"]');

        selectAllCheckbox.addEventListener('change', function () {
            checkboxes.forEach(checkbox => {
                checkbox.checked = selectAllCheckbox.checked;
            });
        });
    });
</script>
@endsection