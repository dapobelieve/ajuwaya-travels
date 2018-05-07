<template>
    <section>
        <div class="tabs tabs-style-bar">
            <nav>
                <ul>
                    <li :class="{'tab-current': activeNav}" ><a class="icon icon-upload"  ><span>Submit Details</span></a></li>
                    <li><a class="icon icon-config"><span>Confirm Details</span></a></li>
                    <li><a class="icon icon-plug"><span>Payment</span></a></li>
                    <!-- <li><a class="icon icon-upload"><span>Upload</span></a></li> -->
                </ul>
            </nav>
            <section id="content">
                <div class="container">
                    <div class="row"> 
                        <div class="col-sm-6 col-sm-6 col-xs-12">
                            <!-- <br>
                            <br> -->
                            <div class="category-box border-6 wow fadeInUpQuick" data-wow-delay="1.8s">
                                <div class="icon">
                                  <a ><i class="lnr lnr-pencil color-2"></i></a>
                                </div>
                                <div class="category-header">  
                                  <a ><h4>Confirm Your Details</h4></a>
                                </div>
                                <div class="category-content">
                                  <ul>
                                    <li>
                                      <a> Name: <span class="details">{{ book.name }}</span> </a>
                                    </li>
                                    <li>
                                      <a href=""> Email: <span class="details">{{ book.email }}</span> </a>
                                    </li>
                                    <li>
                                      <a href="">Sex:   <span class="details">{{ book.sex }}</span></a>
                                    </li>
                                    <li>
                                      <a href="">Phone Number: <span class="details">{{ book.phone }}</span></a>
                                    </li>
                                    <li>
                                      <a href="">Selected Seat(s): <span class="details">{{ book.seat }}</span></a>
                                    </li>
                                    <li>
                                      <a href="">Price: <span class="details">{{ book.seat }}</span></a>
                                    </li>
                                    <li>
                                      
                                    </li>
                                  </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-sm-6 col-xs-12">
                              <div style="height: 220px" class="category-box border-3 wow fadeInUpQuick" data-wow-delay="0.9s">
                                    <div class="icon">
                                      <a ><i class="lnr lnr-cog color-3"></i></a>
                                    </div>
                                    <div class="category-header">  
                                      <a ><h4>Details </h4></a>
                                    </div>
                                    <div class="category-content">
                                      <ul>
                                        <li>
                                          <strong><a style="color: #424248">{{ route.from }} → {{ route.to }}</a></strong> 
                                        </li>
                                        <li>
                                          <a style="color: #424248">Price: <strong> &#x20A6 {{ route.price }}</strong></a>
                                        </li>
                                        <li>
                                          <a style="color: #424248">Time: <strong>{{ datey }}</strong> </a>
                                        </li>
                                        <li>
                                          <a style="color: #424248">Takeoff Point: <strong>{{ route.takeoff }}</strong> </a>
                                        </li>
                                      </ul>
                                    </div>
                              </div>
                        </div>                     
                    </div>
                    <div class=" csd col-sm-8 col-md-offset-2">
                        <button type="submit" class=" btn btn-common" >Submit</button>
                    </div>
                </div>
            </section>
        </div><!-- /tabs -->     
    </section>
</template>

<script>

    import moment from 'moment';
    export default {
        data () {
            return {
                activeNav: false,
                ref: '',
                route: {
                    busType: '',
                    seats: [],
                    from:    null,
                    to:      null,
                    time:    null,
                    price:   null,
                    takeoff: null,
                },
                book: {
                    name:  null,
                    email: null,
                    phone: null,
                    sex:   null,
                    seat:  [],
                    rid:  null
                },
            }
        },
        methods: {
            fetchRoute (ref)
            {
                axios.get('api/details/'+ref)
                .then(response => {
                    console.log(response.data.route);

                    // load some of the b0ok data of this component
                    this.route.busType = response.data.route.bus_type;

                    this.route.seats = response.data.seats;
                    this.route.from = response.data.route.location.state;
                    this.route.to   = response.data.route.camp.name;
                    this.route.price   = response.data.price;
                    this.route.time   = response.data.route.takeoff;
                    this.route.takeoff   = response.data.route.take_off;

                    // set id
                    this.book.rid = response.data.route.id;
                    
                    
                })
                .catch(function (error) {
                    console.log(error);
                    // alert('Server Error');
                });
            },
        },
        computed: {
            datey () {
                return moment(this.route.time).format('lll')
            }
        },
        beforeRouteEnter (to, from, next){
            var ref = to.params.bookId;
            console.log(ref);
            axios.get('api/book-view/' +ref)
            .then(response => {
                console.log(response.data);

                next(vm => {
                    vm.book.name   = response.data.details.name;
                    vm.book.email  = response.data.details.email;
                    vm.book.sex    = response.data.details.gender;
                    vm.book.phone  = response.data.details.phone;
                    vm.book.bkRef  = to.params.bookId;
                    vm.book.bkId   = response.data.details.id;
                    // route details
                });
            })
            .catch(function (error) {
                console.log(error);
                // alert('Server Error');
            });
            // next();
        },
        mounted() {
        }
    }
</script>

<style>
    /**/
    .csd {
        text-align: center;
        padding-top: 2rem;
        /*display: inherit;*/
    }
    .* {
        box-sizing: border-box;
    }
    .details {
        font-weight: 600;
    }

    .iselect {
        background: #19b507fa !important;
        color: #fff !important;
        border: none;
        border-radius: 5px;
    }
    .calculator {
        background-color: #f6f6f6;
        padding-bottom: 2rem;
        padding: 0.4rem;
        max-width: 300px;
        margin: 0 auto;
        /*border: 0.1rem light #111;*/
        border-radius: 5px;
        box-shadow: 0 1px 5px rgba(204, 104, 204, 1.6);
    }

    .alata {
        color: red;
    }

    .calculator input {
        background: none;
        border: none;
        box-shadow: none;
        width: 100%;
        /*border-bottom: 0.1rem solid #111;*/
        text-align: center;
        font-size: 2rem;
    }

    .free {
        cursor: none;
        background: #cc0000fa !important;
        box-shadow: none !important;
    }

    /*css grid happens here*/
    .calculator-buttons {
        padding: 1.6rem;
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr;
        grid-template-rows: repeat(5, 1fr);
        grid-gap: 1rem; 
    }

    .s1 {
        grid-column: 3 / 4; 
    }
    .smalld {
        text-align: center;
        display: block;
    }

    .head {
        color: #000;
    }


    .calc-button {
        background: #5dc1a2;
        border: none;
        padding: 1.5rem;
        color: #fff;
        border-radius: 5px;
        font-size: 1.4rem;
        cursor: pointer;
        box-shadow: 0 1px 5px rgba(104, 104, 104, 0.8);
    }
</style>