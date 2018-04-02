@extends('layout.template')
@section('content')
        <!-- Start intro section -->
    <section id="intro" class="section-intro">
      <div class="overlay">
        <div class="container">
          <div class="main-text">
            <h1 class="intro-title">Welcome To <span style="color: #3498DB">Ajuwaya.com</span></h1>
            <p class="sub-title">Get easy transportation to states you've been posted to for service.</p>

            <!-- Start Search box -->
            <div class="row search-bar">
              <div class="advanced-search">
                <form class="search-form" method="get">
                  <div class="col-md-3 col-sm-6 search-col">
                    <div class="input-group-addon search-category-container">
                      <label class="styled-select">
                        <select class="dropdown-product selectpicker" name="product-cat" >
                          <option value="0">All Categories Items For Sale Items For Sale</option>
                          <option class="subitem" value="community"> Community</option>
                          <option value="items-for-sale"> Items For Sale</option>
                          <option value="jobs"> Jobs</option>
                          <option value="personals"> Personals</option>
                          <option value="training"> Training</option>
                          <option value="real_estate"> Real Estate</option>
                          <option value="services"> Services</option>
                          <option value="vehicles"> Vehicles</option>
                        </select>                                    
                      </label>
                    </div>
                  </div>
                  <div class="col-md-3 col-sm-6 search-col">
                    <div class="input-group-addon search-category-container">
                      <label class="styled-select location-select">
                        <select class="dropdown-product selectpicker" name="product-cat" >
                          <option value="0">All Locations</option>
                          <option value="New York">New York</option>
                          <option value="California">California</option>
                          <option value="Washington">Washington</option>
                          <option value="churches">Birmingham</option>
                          <option value="Birmingham">Chicago</option>
                          <option value="Phoenix">Phoenix</option>
                        </select>                                    
                      </label>
                    </div>


                  </div>
                  <div class="col-md-3 col-sm-6 search-col">
                    <button class="btn btn-common btn-search btn-block"><strong>Search</strong></button>
                  </div>
                </form>
              </div>
            </div>
            <!-- End Search box -->
          </div>
        </div>
      </div>
    </section>
    <!-- end intro section -->
    <div id="content">
      <div class="container">
        <div class="row">
          <div class="col-sm-12">
              <h2 class="title-2"><i class="fa fa-search"></i> Search Results</h2>
              <div class="table-responsive">
                <table class="table table-striped add-manage-table">
                  <thead>
                    <tr>
                      <th> Details</th>
                      <th>Price</th>
                      <th>Option</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="ads-details-td">
                        <h4><a href="ads-details.html">Brand New All about iPhones</a></h4>
                        <p> <strong> Posted On </strong>:
                        02-Oct-2016, 04:38 PM </p>
                        <p> <strong>Visitors </strong>: 221 <br> <strong>Located In:</strong> New York </p>
                      </td>
                      <td class="">
                        <strong> $199</strong>
                      </td>
                      <td class="action-td">
                        <p><a class="btn btn-success btn-xs"> <i class="fa fa-bus"></i> Book Now</a></p>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>               
          </div>
          
        </div> 
      </div> 

    </div>
@stop
@section('scripts')

<script type="text/javascript" src="/aju/assets/js/material.min.js"></script>
<script type="text/javascript" src="/aju/assets/js/material-kit.js"></script>
<script type="text/javascript" src="/aju/assets/js/jquery.parallax.js"></script>
<script type="text/javascript" src="/aju/assets/js/owl.carousel.min.js"></script>
<script type="text/javascript" src="/aju/assets/js/wow.js"></script>
<script type="text/javascript" src="/aju/assets/js/main.js"></script>

@stop
