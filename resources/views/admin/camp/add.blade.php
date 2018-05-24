@extends('admin.index')

@section('big-name')
    Create New Camp
@stop

@section('admin-content')
   <div class="col-xs-12">
        @if(count($errors) > 0)
        <div class="alert alert-danger">
            <strong>Error Alert</strong>. 
            <a href="#" data-dismiss="alert" class="close">×</a>
            <ul>
                @foreach($errors->all() as $error)
                    <li> {{ $error }} </li>
                @endforeach
            </ul>
        </div>
        @endif
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fa fa-align-justify"></i>                                 
                </span>
                <h5>Camp Details</h5>
            </div>
            <div class="widget-content nopadding">
                <form action="{{ route('camps.store') }}" method="post" class="form-horizontal">
                    <div class="form-group" {{ $errors->has('name') ? ' has-error' : '' }}>
                        <label class="col-sm-3 col-md-3 col-lg-2 control-label">Name:</label>
                        <div class="col-sm-9 col-md-9 col-lg-10">
                            <input type="text" placeholder="Name of Orientation Camp" name="camp"  class="form-control input-sm" />
                        </div>
                    </div>
                    <div class="form-group" {{ $errors->has('details') ? ' has-error' : '' }}>
                        <label class="col-sm-3 col-md-3 col-lg-2 control-label">Details:</label>
                        <div class="col-sm-9 col-md-9 col-lg-10">
                            <textarea name="details" placeholder="Additiional Details" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-success btn-sm">Add Camp</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>                      
    </div>
@stop
