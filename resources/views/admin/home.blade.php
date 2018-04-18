
@extends('admin.index')

@section('admin-content')
		@if(count($errors) > 0)
			<div class="alert alert-danger">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<strong>Errors:</strong>
				<ul>
				@foreach($errors->all() as $error)
				<li> {{ $error }} </li>
				@endforeach
				</ul>
			</div>
		@endif
		<div class="widget-box">
	    <div class="widget-title">
	        <span class="icon"><i class="fa fa-signal"></i></span>
	        <h5>Events</h5>
	        {{-- <div class="buttons">
	            <a href="#" class="btn"><i class="fa fa-refresh"></i> <span class="text">Update stats</span></a>
	        </div> --}}
	    </div>
	    <div class="widget-content">
	    @include('template.partials.alert')
	        <div class="row">
	            <div class="widget-content nopadding">
	                <table class="table table-bordered table-striped table-hover catArr">
	                    <thead>
	                        <tr>
	                            <th class="col-xs-6">Title</th>
	                            <th class="col-xs-3">Date Posted</th>
	                            <th class="col-xs-3">Action</th>
	                        </tr>
	                    </thead>
	                    <tbody>
	                    @foreach($post as $post)
	                        <tr data-zid="">
	                            <td>{{ $post->title }}</td>
	                            <td>{{ $post->created_at->diffForHumans() }}</td>
	                            <td>
	                            <div class="btn-group">
										<button data-toggle="dropdown" class="btn btn-xs btn-danger dropdown-toggle">Options <span class="caret"></span></button>
										<ul class="dropdown-menu dropdown-danger">
											<li><form action="{{ route('posts.edit', $post->id) }}" method="GET">
				                            	{{csrf_field()}}
				                            	<button class="btn btn-default btn-xs cdit">
				                            	<i class="fa fa-edit"></i> Edit</button> 
				                            </form>
				                            </li>
											<li>
												<form action="{{ route('posts.destroy', $post->id) }}" method="POST">
						                            {{ csrf_field()}}
						                            {{method_field('DELETE')}}
					                            	<button class="btn btn-default btn-xs cdel"><i class="fa fa-trash-o"></i> Delete</button>
					                            </form>
											</li>
											
										</ul>
									</div>
	                            </td>
	                        </tr>
	                    @endforeach
	                    </tbody>
	                </table>                            
	            </div>
	        </div>
	        <br>
	        <br>
	        <br>
	                 <a href="{{ route('posts.create') }}" class="btn btn-default btn-md" >Add Event</a>           
	    </div>
     </div>
     {{-- Modal Goes here --}}
     {{--  --}}	
@stop

{{-- @section('admin-scripts')
<script>
	
</script>
<script src="/authmin/js/cat.js"></script>
@stop --}}