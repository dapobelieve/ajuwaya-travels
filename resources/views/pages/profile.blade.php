@extends('layout.template')
@section('styles')
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
<div class="page-header" style="background: url(/aju/assets/img/banner1.jpg);">
      <div class="container">
        <div class="row">         
          <div class="col-md-12">
            <div class="breadcrumb-wrapper">
              <h2 class="page-title">My Bookings</h2>
            </div>
          </div>
        </div>
      </div>
    </div>

<section id="categories-homepage">
    <div style="margin-bottom: 30px" class="container-fluid">
        <div class="row">
            <div class="container">
              <div class="row">
                <div class="col-xs-12">
                  <div class="table-responsive">
                        <table summary="This table shows how to create responsive tables using Bootstrap's default functionality" class="table table-bordered table-hover">
                          <caption class="text-center">
                          <thead>
                            <tr>
                              <th>S/N</th>
                              <th>Email</th>
                              <th>Phone</th>
                              <th>Ref</th>
                              <th>No. of Seats</th>
                              <th>Status</th>
                              <th>Date</th>
                              <th>Action</th>
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
                                <td> 
                                    @if($booking->pay_status)
                                        <a style="font-weight: 600; color: #25e85f" href="#">Print</a>
                                    @endif
                                </td>
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

</section>
            
@stop
