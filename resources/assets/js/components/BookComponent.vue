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
                    <form @submit="sendData" class="">
                        <div class="row"> 
                            <div class="col-sm-4">
                                    <h2 class="head">
                                        Fill your Details
                                    </h2>
                                    <br>
                                    <br>
                                    <div class="form-group">
                                      <label class="control-label" for="textarea">Full Name</label>
                                      <input type="text" v-model="book.name"  class="form-control" placeholder="Your Full Name" >
                                      <span v-if="errors.name"  class="alata smalld">* {{ errors.name[0] }} </span>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label" for="seller-Location">Gender</label>
                                      <select v-model="book.sex" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                      </select>
                                      <span v-if="errors.sex" class="alata smalld">* {{ errors.sex[0] }}</span>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label" for="textarea">Email</label>
                                      <input type="email" v-model="book.email" class="form-control" placeholder="Your Email" >
                                      <span v-if="errors.email"  class="alata smalld">* {{ errors.email[0] }}</span>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label" for="textarea">Phone Number</label>
                                      <input type="number" v-model="book.phone"  class="form-control" placeholder="Phone Number">
                                      <span v-if="errors.phone"  class="alata smalld">* {{ errors.phone[0] }}</span>
                                    </div>
                            </div>
                            <div class="col-sm-4">
                                    <!-- <p>Select Seat Number</p> -->
                                    <!-- {{ errors }} -->
                                    <h5 class="smalld">Select Seat Number</h5>
                                    <small class="smalld" style="color: red">*disabled buttons are seats that have been booked*</small>
                                    <span v-if="errors.seat"  class="alata smalld">* {{ errors.seat[0] }} </span>
                                    <div v-if="route.busType === 15" class="calculator">
                                        <input v-model="book.seat" readonly type="text">
                                        <div class="calculator-buttons">
                                            <img src="/aju/assets/images/icon.svg" alt="">
                                            <button 
                                                :disabled="checkSeat(1)" 
                                                :class="{ 'free' : checkSeat(1) }" 
                                                @click.prevent="toggleButton" 
                                                class="calc-button s1">1
                                            </button>
                                            <button :disabled="checkSeat(2)" :class="{ 'free' : checkSeat(2) }" @click.prevent="toggleButton" class="calc-button s2">2</button>
                                            <button :disabled="checkSeat(3)" :class="{ 'free' : checkSeat(3) }" @click.prevent="toggleButton" class="calc-button ">3</button>
                                            <button :disabled="checkSeat(4)" :class="{ 'free' : checkSeat(4) }" @click.prevent="toggleButton" class="calc-button">4</button>
                                            <button :disabled="checkSeat(5)" :class="{ 'free' : checkSeat(5) }" @click.prevent="toggleButton" class="calc-button  ">5</button>
                                            <button disabled class="calc-button free">Exit</button>
                                            <button :disabled="checkSeat(6)" :class="{ 'free' : checkSeat(6) }" @click.prevent="toggleButton" class="calc-button ">6</button>
                                            <button :disabled="checkSeat(7)" :class="{ 'free' : checkSeat(7) }" @click.prevent="toggleButton" class="calc-button">7</button>
                                            <button :disabled="checkSeat(8)" :class="{ 'free' : checkSeat(8) }" @click.prevent="toggleButton" class="calc-button ">8</button>
                                            <button disabled class="calc-button  free"></button>
                                            <button :disabled="checkSeat(9)" :class="{ 'free' : checkSeat(9) }" @click.prevent="toggleButton" class="calc-button ">9</button>
                                            <button :disabled="checkSeat(10)" :class="{ 'free' : checkSeat(10) }" @click.prevent="toggleButton" class="calc-button">10</button>
                                            <button :disabled="checkSeat(11)" :class="{ 'free' : checkSeat(11) }" @click.prevent="toggleButton" class="calc-button">11</button>
                                            <button  disabled class="calc-button  free"></button>
                                            <button :disabled="checkSeat(12)" :class="{ 'free' : checkSeat(12) }" @click.prevent="toggleButton" class="calc-button">12</button>
                                            <button :disabled="checkSeat(13)" :class="{ 'free' : checkSeat(13) }" @click.prevent="toggleButton" class="calc-button">13</button>
                                            <button :disabled="checkSeat(14)" :class="{ 'free' : checkSeat(14) }" @click.prevent="toggleButton" class="calc-button">14</button>
                                            <button :disabled="checkSeat(15)" :class="{ 'free' : checkSeat(15) }" @click.prevent="toggleButton" class="calc-button">15</button>
                                        </div>
                                    </div>
                                    <div v-else-if="route.busType === 35" class="calculator">
                                        <input v-model="book.seat" readonly type="text">
                                        <div class="calculator-buttons">
                                            <img src="/aju/assets/images/icon.svg" alt="">
                                            <button 
                                                :disabled="checkSeat(1)" 
                                                :class="{ 'free' : checkSeat(1) }" 
                                                @click.prevent="toggleButton" 
                                                class="calc-button s1">1
                                            </button>
                                            <button :disabled="checkSeat(2)" :class="{ 'free' : checkSeat(2) }" @click.prevent="toggleButton" class="calc-button s2">2</button>
                                            <button :disabled="checkSeat(3)" :class="{ 'free' : checkSeat(3) }" @click.prevent="toggleButton" class="calc-button ">3</button>
                                            <button :disabled="checkSeat(4)" :class="{ 'free' : checkSeat(4) }" @click.prevent="toggleButton" class="calc-button">4</button>
                                            <button :disabled="checkSeat(5)" :class="{ 'free' : checkSeat(5) }" @click.prevent="toggleButton" class="calc-button  ">5</button>
                                            <button disabled class="calc-button free">Exit</button>
                                            <button :disabled="checkSeat(6)" :class="{ 'free' : checkSeat(6) }" @click.prevent="toggleButton" class="calc-button ">6</button>
                                            <button :disabled="checkSeat(7)" :class="{ 'free' : checkSeat(7) }" @click.prevent="toggleButton" class="calc-button">7</button>
                                            <button :disabled="checkSeat(8)" :class="{ 'free' : checkSeat(8) }" @click.prevent="toggleButton" class="calc-button ">8</button>
                                            <button :disabled="checkSeat(9)" :class="{ 'free' : checkSeat(9) }" @click.prevent="toggleButton" class="calc-button ">9</button>
                                            <button :disabled="checkSeat(10)" :class="{ 'free' : checkSeat(10) }" @click.prevent="toggleButton" class="calc-button">10</button>
                                            <button :disabled="checkSeat(11)" :class="{ 'free' : checkSeat(11) }" @click.prevent="toggleButton" class="calc-button">11</button>
                                            <button :disabled="checkSeat(12)" :class="{ 'free' : checkSeat(12) }" @click.prevent="toggleButton" class="calc-button">12</button>
                                            <button :disabled="checkSeat(13)" :class="{ 'free' : checkSeat(13) }" @click.prevent="toggleButton" class="calc-button">13</button>
                                            <button :disabled="checkSeat(14)" :class="{ 'free' : checkSeat(14) }" @click.prevent="toggleButton" class="calc-button">14</button>
                                            <button :disabled="checkSeat(15)" :class="{ 'free' : checkSeat(15) }" @click.prevent="toggleButton" class="calc-button">15</button>
                                            <button :disabled="checkSeat(16)" :class="{ 'free' : checkSeat(16) }" @click.prevent="toggleButton" class="calc-button">16</button>
                                            <button :disabled="checkSeat(17)" :class="{ 'free' : checkSeat(17) }" @click.prevent="toggleButton" class="calc-button">17</button>
                                            <button :disabled="checkSeat(18)" :class="{ 'free' : checkSeat(18) }" @click.prevent="toggleButton" class="calc-button">18</button>
                                            <button :disabled="checkSeat(19)" :class="{ 'free' : checkSeat(19) }" @click.prevent="toggleButton" class="calc-button">19</button>
                                            <button :disabled="checkSeat(20)" :class="{ 'free' : checkSeat(20) }" @click.prevent="toggleButton" class="calc-button">20</button>
                                            <button :disabled="checkSeat(21)" :class="{ 'free' : checkSeat(21) }" @click.prevent="toggleButton" class="calc-button">21</button>
                                            <button :disabled="checkSeat(22)" :class="{ 'free' : checkSeat(22) }" @click.prevent="toggleButton" class="calc-button">22</button>
                                            <button :disabled="checkSeat(23)" :class="{ 'free' : checkSeat(23) }" @click.prevent="toggleButton" class="calc-button">23</button>
                                            <button :disabled="checkSeat(24)" :class="{ 'free' : checkSeat(24) }" @click.prevent="toggleButton" class="calc-button">24</button>
                                            <button :disabled="checkSeat(25)" :class="{ 'free' : checkSeat(25) }" @click.prevent="toggleButton" class="calc-button">25</button>
                                            <button :disabled="checkSeat(26)" :class="{ 'free' : checkSeat(26) }" @click.prevent="toggleButton" class="calc-button">26</button>
                                            <button :disabled="checkSeat(27)" :class="{ 'free' : checkSeat(27) }" @click.prevent="toggleButton" class="calc-button">27</button>
                                            <button :disabled="checkSeat(28)" :class="{ 'free' : checkSeat(28) }" @click.prevent="toggleButton" class="calc-button">28</button>
                                            <button :disabled="checkSeat(29)" :class="{ 'free' : checkSeat(29) }" @click.prevent="toggleButton" class="calc-button">29</button>
                                            <button :disabled="checkSeat(30)" :class="{ 'free' : checkSeat(30) }" @click.prevent="toggleButton" class="calc-button">30</button>
                                            <button :disabled="checkSeat(31)" :class="{ 'free' : checkSeat(31) }" @click.prevent="toggleButton" class="calc-button">31</button>
                                            <button :disabled="checkSeat(32)" :class="{ 'free' : checkSeat(32) }" @click.prevent="toggleButton" class="calc-button">32</button>
                                            <button :disabled="checkSeat(33)" :class="{ 'free' : checkSeat(33) }" @click.prevent="toggleButton" class="calc-button">33</button>
                                            <button :disabled="checkSeat(34)" :class="{ 'free' : checkSeat(34) }" @click.prevent="toggleButton" class="calc-button">34</button>
                                            <button :disabled="checkSeat(35)" :class="{ 'free' : checkSeat(35) }" @click.prevent="toggleButton" class="calc-button">35</button>
                                        </div>
                                    </div>
                            </div>
                            <div class="col-sm-4 col-sm-6 col-xs-12">
                                  <div style="height: 220px" class="category-box border-3 wow fadeInUpQuick" data-wow-delay="0.9s">
                                        <div class="icon">
                                          <a href="category.html"><i class="lnr lnr-cog color-3"></i></a>
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
                    </form>
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
                    name:  '',
                    email: '',
                    phone: '',
                    sex:   '',
                    seat:  [],
                    rid:  '',
                    userId: '',
                },
                // route: '',
                errors: [],
            }
        },
        methods: {
            toggleButton (e) {
                var val = e.target.textContent;
                if(this.book.seat.includes(val)){
                    this.book.seat.pop();
                }else{
                    this.book.seat.push(val); 
                }

                let button = e.target;
                button.classList.toggle('iselect');
            },
            fetchRoute (ref)
            {
                axios.get('api/details/'+ref)
                .then(response => {
                    // console.log(response.data.route);

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
            //method to check if a seat has been booked
            checkSeat (x)
            {
                if(this.route.seats.includes(x)){
                    return true;
                }else {
                    return false;
                }                
            },
            sendData (e) {
                 e.preventDefault();
                 var data = this.book;
                 // console.log(data)
                 axios.post('/api/process', data )
                 .then (response => {
                    var bkId = response.data;
                    //go to the next route with the booking ref
                    this.$router.push({ name: 'viewbook', params: { bookId: bkId }})
                    
                 })
                 .catch(error => {
                    this.errors = error.response.data.errors;
                    console.log(error.response.data);
                 });
            } 
        },
        computed: {
            datey () {
                return moment(this.route.time).format('lll')
            }
        },
        mounted() {
            // grab the booking ref from the routes meta data
            // console.log(this.$route.meta.mdata);
            var ref = this.$route.meta.mdata;
            this.book.userId = this.$route.meta.userId;

            // send axios request
            this.fetchRoute(ref);
                        
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