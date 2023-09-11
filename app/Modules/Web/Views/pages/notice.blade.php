@extends('Web::layouts.master') 
@section('body') 

<div id="our-team" class="section">
		<div class="content-wrap">
			<div class="container">
				<div class="row">
					<div class="col-sm-12 col-md-12">
						<h2 class="section-heading center">
							All <span>Notice</span>
						</h2>
						
					</div>
				</div>
				<div class="col-xl-12 col-md-12 col-lg-12">
                <div class="table-responsive">
                    @if(count($notice) > 0)
                    <div>
                        {{$notice->links()}}
                    </div>
                    @endif
                    <table class="table table-bordered table-striped table-hover dataTable js-basic-example">
                        <thead>
                            <tr>
                                <th> No</th>
                                <th> Notice Title </th>
                                <th> Action </th>
                            </tr>
                        </thead>

                        <tbody>
                            @if(count($notice) > 0)

                            @foreach($notice as $key=> $values)
                            <tr>
                                <td>
                                    {{ ($notice->currentpage()-1) * $notice->perpage() + $key + 1 }}
                                </td>
                                <td>
                                    {{$values->title}}
                                </td>
                                <td>
                                    <a href="{{URL::to('')}}/uploads/notice/{{$values->image_link}}" class="btn btn-info"><i class="fa fa-download"></i> Download</a>
                                    

                                </td>
                            </tr>

                            @endforeach
                            @endif

                        </tbody>
                    </table>
                    @if(count($notice) > 0)
                    <div>
                        {{$notice->links()}}
                    </div>
                    @endif

                </div>
         </div>

				

			</div>
		</div>
	</div>
@endsection
