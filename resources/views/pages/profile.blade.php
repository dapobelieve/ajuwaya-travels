@extends('layout.template')
@section('styles')

    {{-- <link rel="stylesheet" type="text/css" href="/tabstyle/css/normalize.css" /> --}}
    {{-- <link rel="stylesheet" type="text/css" href="/tabstyle/css/demo.css" /> --}}
    <script src="/tabstyle/js/modernizr.custom.js"></script>
    <style>
        h2 {
          text-align: center;
        }

        table caption {
            padding: .5em 0;
        }

        @media screen and (max-width: 767px) {
          table caption {
            border-bottom: 1px solid #ddd;
          }
        }

        .p {
          text-align: center;
          padding-top: 140px;
          font-size: 14px;
        }
    </style>
    <script type="text/javascript" src="/aju/assets/fonts/all.js"></script>
@stop

@section('title')
My Bookings | AjuwayaTravels
@stop


@section('content')

<section id="categories-homepage">
    <div class="container-fluid">
        <div class="row">
            <h2>My Bookings</h2>

            <div class="container">
              <div class="row">
                <div class="col-xs-12">
                  <div class="table-responsive">
                        <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover">
                          <caption class="text-center">All Bookings 
                          <thead>
                            <tr>
                              <th>S/N</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Ref</th>
                              <th>No. of Seats</th>
                              <th>Status</th>
                              <th>Date</th>
                            </tr>
                          </thead>
                          <tbody>
                            @forelse($bookings as $booking)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $booking->email }}</td>
                              <td>{{ $booking->phone }}</td>
                              <td>{{ $booking->bk_ref }}</td>
                              <td>{{ $booking->seat_num }}</td>
                              <td>{{ $booking->getPay() }}</td>
                              <td>{{ $booking->created_at->format('l jS \\of F Y') }}</td>
                            </tr>
                            @empty
                            <tr>
                                No Bookings Yet
                            </tr>
                            @endforelse
                          </tbody>
                          <tfoot>
                          </tfoot>
                        </table>
                      </div><!--end of .table-responsive-->
                </div>
              </div>
            </div>
        </div>
    </div>

    <br>
    <br>
    <br>
    <br>
    <br>
</section>
            
@stop
