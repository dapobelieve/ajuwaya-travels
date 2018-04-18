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
	        <h5>Update Post</h5>
	        
	    </div>
	    <div class="widget-content">
	    @include('template.partials.alert')
	        <div class="row">
	            <div class="widget-content nopadding">
	                <form method="post" action="{{ route('gala.update', $post->id )}}" enctype="multipart/form-data" class="form-horizontal"> 
	                	{{method_field('PUT')}}

					  <div class="form-group">
						<label class="col-sm-3 col-md-3 col-lg-2 control-label">Post Title:</label>
						<div class="col-sm-9 col-md-9 col-lg-10">
							<input type="text" required name="postTitle" value="{{ Request::old('postTitle') ?: $post->caption }}" id="postTitle" class="form-control input-sm" />
						</div>
					</div>



					  <div class="form-group">
						<label class="col-sm-3 col-md-3 col-lg-2 control-label">Image</label>
						<div class="col-sm-9 col-md-9 col-lg-10">
							<input type="file" name="postImage" onchange="prevImg(event)" id="postImage" />
							<br>
							<img style="width:300px" id="output_image" src="{{$post->img}}">
						</div>
					</div>

					  <button type="submit" class="btn btn-default">Submit</button>

					  {{csrf_field()}}
					</form>                           
	            </div>
	        </div>
	        <br>
	        <br>
	        <br>
	        {{-- <button class="btn btn-default btn-md" >Add Post</button>            --}}
	    </div>
     </div>
<script type='text/javascript'>
	function prevImg(event) 
	{
	 var reader = new FileReader();
	 reader.onload = function()
	 {
	  var output = document.getElementById('output_image');
	  output.src = reader.result;
	 }
	 reader.readAsDataURL(event.target.files[0]);
	}
</script>
@stop