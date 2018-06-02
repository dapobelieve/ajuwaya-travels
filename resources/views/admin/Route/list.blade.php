@extends('admin.index')
@section('big-name')
    All Routes
@stop

@section('admin-content')
<div class="row">
    <div class="col-xs-12">
        @if(Session::has('sms'))
        <div class="alert alert-info">
           {{ Session::get('sms') }}
            <a href="#" data-dismiss="alert" class="close">×</a>
        </div>
        @endif
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
        <div class="alert alert-info">
            <strong>Info</strong>. 
            {{-- <a href="#" data-dismiss="alert" class="close">×</a> --}}
            <ul>
                <li>Routes should <strong>not be DELETED</strong> as they are tied to bookings.</li>
                <small>They have been ordered according to the latest, and paginated as such. <br>
                    You should instead change their active status.
                </small>
            </ul>
        </div>
        <span class="heady">
            {{-- <div class="search">
                <form action="">
                    <label for="search"> Enter Route Ref Code:</label>
                    <input type="text" placeholder="e.g AJT-1u9gPdo4e"/>
                    <button type="submit" class="tip-right" title="Search"><i class="fa fa-search"></i></button>
                </form>
            </div> --}}
            <div class="form-actions">
                <a href="{{ route('routes.create') }}" type="submit" class="btn btn-success btn-sm">Add Route</a>
            </div>
        </span>

        <div class="widget-box">
            <div class="widget-title">
                <span class="icon with-checkbox">
                    <input type="checkbox" class="checkbox_all" id="title-checkbox" name="title-checkbox" />
                </span>
                <h5>Routes</h5>
            </div>
            <div class="widget-content nopadding">
                <table class="table table-bordered table-striped table-hover with-check">
                    <thead>
                        <tr>
                            <th><i class="fa fa-resize-vertical"></i></th>
                            {{-- <th>Column name</th> --}}
                            <th>#</th>
                            <th>From</th>
                            <th>To</th>
                            <th> <strong>Bus Type</strong> </th>
                            <th>ref Code</th>
                            <th>Status</th>
                            <th>Take Off</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($routes as $route)
                        <tr>
                            <td><input type="checkbox" class="checkbox_delete" name="entries_to_delete[]" value="{{ $route->id }}" /></td>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $route->location->state }}</td>
                            <td>{{ $route->camp->toUp() }}</td>
                            <td>{{ $route->bus_type }}</td>
                            <td>{{ $route->ref }}</td>
                            <td><strong>{{ $route->status() }}</strong></td>
                            <td>{{ $route->takeoff->format('D, M j | g:i A') }}</td>
                            <td>
                                <div class="btn-group">
                                    <button data-toggle="dropdown" class="btn btn-xs btn-red dropdown-toggle">Options <span class="caret"></span></button>
                                    <ul class="dropdown-menu ">
                                        <li>
                                            <form style=" display: inline; padding-left: 2.3rem" 
                                                action="{{ route('routes.edit', $route->id) }}">
                                            <input type="hidden" name="_method" value="PUT">
                                            {{ csrf_field() }}

                                            <button class="btn btn-xs btn-success">Edit</button>
                                            </form>
                                        </li>
                                        <li>
                                            <form style=" display: inline; padding-left: 2.3rem" 
                                                action="{{ route('route.booking', $route->ref) }}" method="get">
                                            <button class="btn btn-xs btn-info">Bookings</button>
                                            </form>
                                        </li>
                                        {{-- <li class="divider"></li> --}}
                                        <li>
                                            <form method="POST" style=" display: inline; padding-left: 2.3rem" action="#"
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
                <div class="bottom" style="padding-left: 20px; padding-top: 10px; padding-bottom: 10px;">
                    <div class="item">{{ $routes->links() }}</div>
                    <div class="item">
                        <form onsubmit="confirm('Are you sure you want to delete those records?')" action="{{ route('delete.multiple') }}" method="post">
                            <input type="hidden" name="_method" value="DELETE">
                            <input type="hidden" required name="ids" id="ids" value="">
                            {{ csrf_field() }}
                            <input type="submit" value="Delete" class="btn btn-danger">
                        </form>
                    </div>
                </div>                          
            </div>
        </div>
        
    </div>
</div>

@stop


@section('admin-scripts')
    <script>
        $('.checkbox_all').click(function () {
            $('input.checkbox_delete').prop('checked', this.checked);
            getIds();
        });

        $('.checkbox_delete').change(function () {
            getIds();
        })

        function getIds()
        {
            var ids = [];
            $('.checkbox_delete').each(function () {
                if($(this).is(":checked")) {
                    ids.push($(this).val());
                }
            });

            $('#ids').val(ids.join());

        }
    </script>
@stop


