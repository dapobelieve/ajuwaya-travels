<template>
    <section>
        <div class="tabs tabs-style-bar">
            <nav>
                <ul>
                    <li><a class="icon icon-home"><span>Submit Details</span></a></li>
                    <li :class="{'tab-current': activeNav}" ><a href=""  class="icon icon-config"><span>Confirm Details</span></a></li>
                    <li  ><a class="icon icon-plug"><span>Payment</span></a></li>
                    <!-- <li><a class="icon icon-upload"><span>Upload</span></a></li> -->
                </ul>
            </nav>
            <section id="content">
                <div class="container">
                    <form @submit="sendData" class="">
                        <div class="row">
                            <div class="col-sm-6">
                                    <h2 class="">
                                        Confirm your Details
                                    </h2>
                                    <br>
                                    <br>
                                    <div class="form-group">
                                      <label class="control-label" for="textarea">Full Name</label>
                                      <input type="text" v-model="book.name"  class="form-control" placeholder="Your Full Name" >
                                      <span v-if="errors.name"  class="alata smalld">* {{ errors.name[0] }} </span>
                                    </div>
                                    <div class="form-group">
                                      <label >Gender</label>
                                      <select v-model="book.sex" class="form-control">
                                        <option value="">Select Gender</option>
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                      </select>
                                      <span v-if="errors.sex" class="alata smalld">* {{ errors.sex[0] }}</span>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label" for="textarea">Email</label>
                                      <input type="text" v-model="book.email" class="form-control" placeholder="Your Email" >
                                      <span v-if="errors.phone"  class="alata smalld">* {{ errors.email[0] }}</span>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label" for="textarea">Phone Number</label>
                                      <input type="text" v-model="book.phone"  class="form-control" placeholder="Phone Number">
                                      <span v-if="errors.phone"  class="alata smalld">* {{ errors.phone[0] }}</span>
                                    </div>
                            </div>
                            <div class="col-sm-6">
                                    <!-- <p>Select Seat Number</p> -->
                                    <!-- {{ errors }} -->
                                    <h5 class="smalld">Select Seat Number</h5>
                                    <small class="smalld">*disabled buttons are seats that have been booked*</small>
                                    <span v-if="errors.seat"  class="alata smalld">* {{ errors.seat[0] }} </span>
                                    <div class="calculator">
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
                            </div>                     
                        </div>
                        <div class=" csd col-sm-8 col-md-offset-2">
                            <button type="submit" class=" btn btn-lg btn-success" >Confirm</button>
                        </div>
                    </form>
                </div>
            </section>
        </div><!-- /tabs -->     
    </section>
</template>

<script>
    export default {
        data () {
            return {
                activeNav: true,
                route: {
                    busType: '',
                    seats: [],
                },
                book: {
                    name:  '',
                    email: '',
                    phone: '',
                    sex:   '',
                    seat:  [],
                    bkRef:  '',
                    bkId: '',
                    price: '',
                },

                errors: [],
            }
        },
        methods: {
            toggleButton (e) {
                // alert('hello world');
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
                    // load some of the b0ok data of this component
                    this.route.busType = response.data.route.bus_type;

                    this.route.seats = response.data.seats;

                    // set id
                    this.book.rid = response.data.route.id;
                    // console.log(this.route.seats);
                    
                })
                .catch(function (error) {
                    console.log(error.data);
                    alert('Server Error');
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
                 axios.post('/api/update', data )
                 .then (response => {
                    var bref = response.data;
                    //go to the next route with the booking ref
                    alert('Update Successful');

                    this.$router.push({ name: 'payNow', params: { bRef: bref } })
                    
                 })
                 .catch(error => {
                    this.errors = error.response.data.errors;
                    console.log(error.response.data);
                 });
            } 
        },
        beforeRouteEnter (to, from, next) {
            // console.log(to.params.bookId);
            let bookRef = to.params.bookId;

            axios.get('api/book-details/' +bookRef)
            .then(response => {
                // this.book = response.data.details;
                // console.log(response.data.details.route.price);
                next(vm => {
                    vm.book.name   = response.data.details.name;
                    vm.book.email  = response.data.details.email;
                    vm.book.sex    = response.data.details.gender;
                    vm.book.phone  = response.data.details.phone;
                    vm.book.bkRef  = to.params.bookId;
                    vm.route.seats = response.data.seats;
                    vm.book.bkId   = response.data.details.id,
                    vm.book.price  = response.data.details.route.price
                });
            })
            .catch( error => {
                alert('Couldnt get your booking details. Unauthorised Access!');                
            });
        }
    }
</script>

<style>
    /**/
    .tabs-nav {
        position: fixed;
    }
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

    .disabled {

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