<template>
    <section>
        <div class="tabs tabs-style-bar">
            <nav>
                <ul>
                    <li  ><a class="icon icon-upload"  ><span>Submit Details</span></a></li>
                    <li :class="{'tab-current': activeNav}" ><a class="icon icon-config"><span>Confirm Details</span></a></li>
                    <li><a class="icon icon-plug"><span>Payment</span></a></li>
                    <!-- <li><a class="icon icon-upload"><span>Upload</span></a></li> -->
                </ul>
            </nav>
            <section id="content">
                <div class="container">
                    <span class="center" v-if="admin" style="color: red;">* As and Administrator ensure you've received payment before submitting.</span>
                    <div class="row"> 

                        <div class="col-sm-6 col-sm-6 col-xs-12">
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
                                      <a href="">Price: <span class="details"> &#x20A6 {{ book.price }}</span></a>
                                    </li>
                                    <li>
                                      
                                    </li>
                                  </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6 col-sm-6 col-xs-12">
                              <div class="category-box border-3 wow fadeInUpQuick" data-wow-delay="0.9s">
                                    <div class="icon">
                                      <a ><i class="lnr lnr-cog color-3"></i></a>
                                    </div>
                                    <div class="category-header">  
                                      <a ><h4>Route Details </h4></a>
                                    </div>
                                    <div class="category-content">
                                      <ul>

                                        <li>
                                          <strong><a style="color: #424248">{{ route.from }} → {{ route.to }}</a></strong> 
                                        </li>
                                        <li>
                                          <a style="color: #424248">Destination: <strong>{{ route.destination }}</strong></a>
                                        </li>
                                        <li>
                                          <a style="color: #424248">Price: <strong> &#x20A6 {{ route.price }}</strong></a>
                                        </li>
                                        <li>
                                          <a style="color: #424248">Date: <strong>{{ datey }}</strong> </a>
                                        </li>
                                        <li>
                                          <a style="color: #424248">Time: <strong>{{ timey }}</strong> </a>
                                        </li>
                                        <li>
                                          <a style="color: #424248">Takeoff Point: <strong>{{ route.takeoff }}</strong> </a>
                                        </li>
                                      </ul>
                                    </div>
                              </div>
                        </div>                     
                    </div>
                    <div class="editpay">
                        <div class="edit items pull-right">
                            <button style="background: #888" type="submit" @click.prevent="editBook()" class=" btn btn-common " >Edit</button>
                        </div>
                        <div v-if="admin" class="pay">
                            <button @click.prevent="adminPay()" type="submit" :disabled=button.enable class=" btn btn-common" >Submit</button>
                        </div>
                        <div v-else class="pay items">
                            <button @click.prevent="payNow()" type="submit" :disabled=button.enable class=" btn btn-common" >Pay Now</button>
                        </div>
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
                activeNav: true,
                ref: '',
                button: {
                    enable: false,

                },
                route: {
                    busType: '',
                    seats: [],
                    from:    null,
                    to:      null,
                    time:    null,
                    price:   null,
                    takeoff: null,
                    destination: null
                },
                book: {
                    name:  null,
                    email: null,
                    phone: null,
                    sex:   null,
                    price:   null,
                    seat:  [],
                    seats: null,
                    bkRef: null
                },
                admin: false
            }
        },
        methods: {
            editBook () {
                this.$router.push({ name: 'confirmBook', params: { bookId: this.book.bkRef }})
            },
            payNow () {
                this.button.enable = true;
                this.$router.push({ name: 'payNow', params: { bRef: this.book.bkRef }})
            },
            adminPay () {
                this.button.enable = true;
                // send ajax request to update payment
                axios.post('/api/adminpay', {
                    ref: this.book.bkRef,
                    admin: true
                })
                .then( response => {
                    // console.log(response.data);
                    window.location = window.url+`success/${this.book.bkRef}`;
                })
                .catch(error => {
                    console.log(error);
                })
                // goto success page
            }
        },
        computed: {
            datey () {
                return moment(this.route.time).format('MMMM Do YYYY');
            },
            timey () {
                return moment(this.route.time).format('h:mm a ');
            }
        },
        beforeRouteEnter (to, from, next){
            var ref = to.params.bookId;

            axios.get('api/book-view/' +ref)
            .then(response => {
                next(vm => {
                    vm.book.name   = response.data.details.name;
                    vm.book.email  = response.data.details.email;
                    vm.book.sex    = response.data.details.gender;
                    vm.book.phone  = response.data.details.phone;
                    vm.book.bkRef  = to.params.bookId;
                    vm.book.bkId   = response.data.details.id;
                    vm.book.seat  = response.data.details.seat;
                    vm.book.price  = response.data.tprice;
                    // route details

                    // this.route.seats = response.data.seats;
                    vm.route.from = response.data.route.location.state;
                    vm.route.to   = response.data.route.camp.name;
                    vm.route.price   = response.data.price;
                    vm.route.time   = response.data.route.takeoff;
                    vm.route.takeoff   = response.data.route.take_off;
                    vm.route.destination = response.data.route.camp.details
                });
            })
            .catch(function (error) {
                console.log(error);
                // alert('Server Error');
            });
            // next();
        },
        mounted() {
            if (window.mail === 'admin@ajuwayatravel.com'){
                this.admin = true;
            }      

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
    .act-buttons {
        margin-top: 12px;
    }
    .edit-button {
        margin-right: 2px !important;
    }
    .details {
        font-weight: 600;
        color: #000;
        /*font-size: 20px*/
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

    .editpay {
        display: grid;
        grid-template-columns: 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr 1fr;
        grid-column-gap: 1.5rem;
    }

    .edit {
        grid-column: 6 ;
    }
    .pay {
        grid-column: 7;
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