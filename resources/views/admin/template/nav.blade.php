<div id="sidebar">
    <ul>
        <li class="{{ Request::is( 'admin/routes') ? ' active' : ''  }}">
            <a href="{{ route('routes.index') }}"><i class="fa fa-home"></i> <span>Routes</span></a>
        </li>


        <li class="{{ Request::is( 'admin/bookings') ? ' active' : ''  }}">
            <a href="{{ route('booking.index') }}"><i class="fa fa-edit"></i> <span>Bookings</span></a>
        </li>

        <li class="{{ Request::is( 'admin/camps') ? ' active' : ''  }}">
            <a href="{{ route('camps.index') }}"><i class="fa fa-cogs"></i> <span>Camps</span></a>
        </li>
        {{-- <li>
            <a href="#"><i class="fa fa-cogs"></i> <span>Gallery</span></a>
        </li>
        <li>
            <a href="#"><i class="fa exit"></i> <span>Logout</span></a>
        </li> --}}
        {{-- <li>
            <a href="charts.html"><i class="fa fa-cogs"></i> <span>Messages <span class="label label-danger">5</span></span></a>
        </li> --}}
    </ul>
</div>