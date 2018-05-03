@extends('admin.index')

@section('admin-style')
    <link rel="stylesheet" href="/authmin/css/select2.css" />
    <link rel="stylesheet" href="/authmin/datey/date.css" />
    <script src="/authmin/datey/date.js"></script>
@stop

@section('big-name')
    Edit Route
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
                <h5>Edit Route Details</h5>
            </div>
            <div class="widget-content nopadding">
                <form action="{{ route('routes.update', $route->id) }}"  method="post" class="form-horizontal">
                    <input type="hidden" name="_method" value="PUT" >
                    <div class="form-group {{ $errors->has('state') ? ' has-error' : '' }}">
                        <label class="col-sm-3 col-md-3 col-lg-2 control-label">Select State:</label>
                        <div class="col-sm-9 col-md-9 col-lg-10">
                            <select required name="state" id="sel2">
                                <option selected value="{{ $route->location->id }}">{{ $route->location->state }}</option>
                                @foreach($locations as $location)
                                    <option value="{{ $location->id }}">{{ ucwords($location->state) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('take_off') ? ' has-error' : '' }}">
                        <label class="col-sm-3 col-md-3 col-lg-2 control-label">Location:</label>
                        <div class="col-sm-9 col-md-9 col-lg-10">
                            <input name="take_off" value="{{ Request::old('take_off') ?: $route->take_off }}" type="text" placeholder="Take off point in selected state" class="form-control input-sm" />
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('camp') ? ' has-error' : '' }}">
                        <label class="col-sm-3 col-md-3 col-lg-2 control-label">Destination:</label>
                        <div class="col-sm-9 col-md-9 col-lg-10">
                            <select required name="camp" id="sel1">
                                <option selected value="{{ $route->camp->id }}">{{ $route->camp->name }}</option>
                                @foreach($camps as $location)
                                    <option value="{{ $location->id }}">{{ ucwords($location->name) }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('price') ? ' has-error' : '' }}">
                        <label class="col-sm-3 col-md-3 col-lg-2 control-label">Price:</label>
                        <div class="col-sm-9 col-md-9 col-lg-10">
                            <input name="price" value="{{ Request::old('price') ?: $route->price }}" type="text" onkeydown="return editInput(event)" placeholder="Transport Fare" class="form-control input-sm" />
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('seater') ? ' has-error' : '' }}">
                        <label class="col-sm-3 col-md-3 col-lg-2 control-label">Bus Seater:</label>
                        <div class="col-sm-9 col-md-9 col-lg-10">
                            <select name="seater" id="sel1">
                                <option value="15">15</option>
                                <option value="35">35</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group" {{ $errors->has('ref') ? ' has-error' : '' }}>
                        <label class="col-sm-3 col-md-3 col-lg-2 control-label">Ref Code:</label>
                        <div class="col-sm-9 col-md-9 col-lg-10">
                            <input type="text" name="ref" value="{{ $route->ref }}" readonly class="form-control input-sm" />
                        </div>
                    </div>
                    <div class="form-group {{ $errors->has('date') ? ' has-error' : '' }}">
                        <label class="col-sm-3 col-md-3 col-lg-2 control-label">Date/Time:</label>
                        <div class="col-sm-9 col-md-9 col-lg-10">
                            <input type="text" value="{{ Request::old('date') ?: '' }}" required name="date" class="form-control input-sm" />
                            <script type="text/javascript">
                                $(function(){
                                    $('*[name=date]').appendDtpicker();
                                });
                            </script>                       
                        </div>
                    </div>       
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary btn-sm">Save Route</button>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>                      
    </div>
@stop

@section('admin-scripts')
    <script src="/authmin/js/select2.min.js"></script>  
    <script>
        $(document).ready(function () {
            $("#sel1").select2();
            $("#sel2").select2();
        })
    </script>
    <script>
        function editInput(e)
        {
            var chaCode = (e.which) ? e.which : event.keyCode
            if(chaCode > 31 && (chaCode < 48 || chaCode > 57))
                return false
            // console.log(e.target.value);
        }
    </script>
@stop