@extends('admin.index')

@section('big-name')
    <small>Bookings </small>

@stop

@section('admin-style')

<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css"/>
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.1/css/buttons.dataTables.min.css"/>
 
 

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
            <div class="widget-box">
                <div class="widget-title">
                    {{-- <span class="icon with-checkbox">
                        <input type="checkbox" class="checkbox_all" id="title-checkbox" name="title-checkbox" />
                    </span> --}}
                    <h5>Bookings</h5>
                </div>
                <div class="table-responsive widget-content nopadding">
                    <table class="data-table table table-bordered table-striped table-hover with-check">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Booked By</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Pay Status</th>
                                <th>Seat Number(s)</th>
                                <th>Amount Paid</th>
                                <th>Gender</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($bookings as $booking)
                            <tr>
                                <td>{{ $loop->index + 1 }}</td>
                                <td>{{ $booking->user->email }}</td>
                                <td>{{ $booking->email }}</td>
                                <td>{{ $booking->phone }}</td>
                                <td>{{ $booking->getPay() }}</td>
                                <td>{{ $booking->seat }}</td>
                                <td>&#x20A6 {{  number_format($booking->amount) }}</td>
                                <td>{{ $booking->gender }}</td>
                                <td>{{ $booking->created_at->format('Y-m-d | g:i A') }}</td>
                            @empty
                            <tr>
                                No Bookings for this Route yet.
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
     
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.1/js/buttons.print.min.js"></script>
<script src="/authmin/js/unicorn.tables.js"></script>
    
@stop


