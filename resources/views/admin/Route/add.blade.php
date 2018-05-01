@extends('admin.index')

@section('admin-style')
    <link rel="stylesheet" href="/authmin/css/select2.css" />
@stop

@section('big-name')
    Create New Route
@stop

@section('admin-content')
   <div class="col-xs-12">
        <div class="widget-box">
            <div class="widget-title">
                <span class="icon">
                    <i class="fa fa-align-justify"></i>                                 
                </span>
                <h5>Route Details</h5>
            </div>
            <div class="widget-content nopadding">
                <form action="#" method="get" class="form-horizontal">
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-2 control-label">Select State</label>
                        <div class="col-sm-9 col-md-9 col-lg-10">
                            <select id="sel2">
                                <option>First option</option>
                                <option>Second option</option>
                                <option>Third option</option>
                                <option>Fourth option</option>
                                <option>Fifth option</option>
                                <option>Sixth option</option>
                                <option>Seventh option</option>
                                <option>Eighth option</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-2 control-label">Password input</label>
                        <div class="col-sm-9 col-md-9 col-lg-10">
                            <input type="password" class="form-control input-sm" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-2 control-label">Input with placeholder</label>
                        <div class="col-sm-9 col-md-9 col-lg-10">
                            <input type="text" class="form-control input-sm" placeholder="This is a placeholder..." />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-2 control-label">Read-only input</label>
                        <div class="col-sm-9 col-md-9 col-lg-10">
                            <input type="text" class="form-control input-sm" placeholder="You can only read this..." readonly />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-2 control-label">Disabled input</label>
                        <div class="col-sm-9 col-md-9 col-lg-10">
                            <input type="text" class="form-control input-sm" placeholder="This input is disabled..." disabled />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-2 control-label">Input with description</label>
                        <div class="col-sm-9 col-md-9 col-lg-10">
                            <div class="row">
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-sm" />
                                    <span class="help-block text-left">This is a description</span>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-sm" />
                                    <span class="help-block text-center">This is a description in center</span>
                                </div>
                                <div class="col-md-4">
                                    <input type="text" class="form-control input-sm" />
                                    <span class="help-block text-right">This is a description on right</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="" class="col-sm-3 col-md-3 col-lg-2 control-label">Input with tooltip</label>
                        <div class="col-sm-9 col-md-9 col-lg-10">
                            <input type='text' title="Tooltip on input field" class="tip-bottom form-control input-sm" />
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 col-md-3 col-lg-2 control-label">Normal textarea</label>
                        <div class="col-sm-9 col-md-9 col-lg-10">
                            <textarea rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary btn-sm">Save</button> or <a class="text-danger" href="#">Cancel</a>
                    </div>
                </form>
            </div>
        </div>                      
    </div>
@stop

@section('admin-scripts')
    <script src="/authmin/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            $("#sel2").select2();
        })
    </script>
@stop