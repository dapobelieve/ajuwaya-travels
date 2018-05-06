@extends('admin.index')

@section('admin-style')
    <link rel="stylesheet" href="/authmin/css/dataTables.bootstrap.css">
    <link rel="stylesheet" href="/authmin/css/buttons.dataTables.min.css">
@stop

@section('big-name')
    <small>Bookings </small>

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
                    <span class="icon with-checkbox">
                        <input type="checkbox" class="checkbox_all" id="title-checkbox" name="title-checkbox" />
                    </span>
                    <h5>Bookings</h5>
                </div>
                <div class="widget-content nopadding">
                    <table id="dtable" class="table table-bordered table-striped table-hover with-check">
                        <thead>
                            <tr>
                                <th>#</th>
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
                                <td>{{ $booking->email }}</td>
                                <td>{{ $booking->phone }}</td>
                                <td>{{ $booking->getPay() }}</td>
                                <td>{{ $booking->seat }}</td>
                                <td>&#x20A6 {{  number_format($booking->amount) }}</td>
                                <td>{{ $booking->gender }}</td>
                                <td>{{ $booking->created_at->format('D, M j  @   g:i A') }}</td>
                            </tr>
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
    <script src="/authmin/js/jquery.dataTables.min.js"></script>
    <script src="/authmin/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(document).ready(function () {
            $('#dtable').DataTable();
        })
    </script>
@stop


