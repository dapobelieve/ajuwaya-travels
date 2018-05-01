@extends('admin.index')
@section('big-name')
    Create New Route
@stop

@section('admin-content')
<div class="row">
    <div class="col-xs-12">
        {{-- <div class="alert alert-info">
           t Welcome in the <strong>Unicorn Admin Theme</strong>. Don't forget to check all the pages!
            <a href="#" data-dismiss="alert" class="close">×</a>
        </div> --}}
        <span class="heady">
            <div class="search">
                <form action="">
                    <label for="search"> Enter Booking Ref:</label>
                    <input type="text" disabled placeholder="Search here..."/>
                    <button type="submit" class="tip-right" title="Search"><i class="fa fa-search"></i></button>
                </form>
            </div>
            <div class="form-actions">
                <a href="{{ route('routes.create') }}" type="submit" class="btn btn-success btn-sm">Add Route</a>
            </div>
        </span>

        <div class="widget-box">
            <div class="widget-title">
                <span class="icon with-checkbox">
                    <input type="checkbox" id="title-checkbox" name="title-checkbox" />
                </span>
                <h5>Active Routes</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered table-striped table-hover with-check">
                    <thead>
                        <tr>
                            <th><i class="fa fa-resize-vertical"></i></th>
                            <th>Column name</th>
                            <th>From</th>
                            <th>To</th>
                            <th> <strong>Bus Type</strong> </th>
                            <th>Take Off</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($routes as $route)
                        <tr>
                            <td><input type="checkbox" /></td>
                            <td>{{ $route->id }}</td>
                            <td>{{ $route->location->state }}</td>
                            <td>{{ $route->camp->toUp() }}</td>
                            <td>{{ $route->bus_type }}</td>
                            <td>{{ $route->takeoff->format('D, M j  @   g:i A') }}</td>
                            <td>
                                <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-xs btn-red dropdown-toggle">Options <span class="caret"></span></button>
                                    <ul class="dropdown-menu ">
                                        <li><a href="#">Edit</a></li>
                                        <li><a href="#">View Bookings</a></li>
                                        <li class="divider"></li>
                                        <li>
                                            <form style=" display: inline; padding-left: 2.3rem" action="#"
                                                onsubmit="return confirm('Are you sure?');">
                                            <input type="hidden" name="_method" value="DELETE">
                                            {{ csrf_field() }}

                                            <button class="btn btn-xs btn-danger">Delete</button>
                                            </form>
                                        </li>
                                    </ul>
                                </div> 
                            </td>
                        </tr>
                        @empty
                        <tr>
                            No Routes Listed yet.
                        </tr>
                        @endforelse
                    </tbody>
                </table>                            
            </div>
        </div>
        
    </div>
</div>

@stop


@section('admin-scripts')

@stop


