<template>
    <section>
        <div class="tabs tabs-style-bar">
            <nav>
                <ul>
                    <li><a class="icon icon-home"  ><span>Details</span></a></li>
                    <li :class="{'tab-current': activeNav}" ><a href=""  class="icon icon-box"><span>Confirm</span></a></li>
                    <li  ><a class="icon icon-display"><span>Analytics</span></a></li>
                    <li><a class="icon icon-upload"><span>Upload</span></a></li>
                    <li><a class="icon icon-tools"><span>Settings</span></a></li>
                </ul>
            </nav>
            <section id="content">
                <div class="container">
                    <form @submit="sendData" class="">
                        <div class="row">
                            <div class="col-sm-6">
                                    <h2 class="">
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
                                        <option>Sex</option>
                                        <option value="male">Male</option>
                                        <option value="female">Female</option>
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
                                                @click.prevent="toggleButton" 
                                                class="calc-button s1">1
                                            </button>
                                            <button @click.prevent="toggleButton" class="calc-button s2">2</button>
                                            <button @click.prevent="toggleButton" class="calc-button ">3</button>
                                            <button @click.prevent="toggleButton" class="calc-button">4</button>
                                            <button @click.prevent="toggleButton" class="calc-button  ">5</button>
                                            <button disabled class="calc-button free">Exit</button>
                                            <button @click.prevent="toggleButton" class="calc-button ">6</button>
                                            <button @click.prevent="toggleButton" class="calc-button">7</button>
                                            <button @click.prevent="toggleButton" class="calc-button ">8</button>
                                            <button disabled class="calc-button  free"></button>
                                            <button @click.prevent="toggleButton" class="calc-button ">9</button>
                                            <button @click.prevent="toggleButton" class="calc-button">10</button>
                                            <button @click.prevent="toggleButton" class="calc-button">11</button>
                                            <button  disabled class="calc-button  free"></button>
                                            <button @click.prevent="toggleButton" class="calc-button">12</button>
                                            <button @click.prevent="toggleButton" class="calc-button">13</button>
                                            <button @click.prevent="toggleButton" class="calc-button">14</button>
                                            <button @click.prevent="toggleButton" class="calc-button">15</button>
                                        </div>
                                    </div>
                            </div>                     
                        </div>
                        <div class=" csd col-sm-8 col-md-offset-2">
                            <button type="submit" class=" btn btn-common" >Submit</button>
                            <!-- <router-link :to="{name: 'confirmBook',params:{ bookId: 'aRtTds34s9iSk9Njh' } }" type="submit" class=" btn btn-common">submit</router-link> -->
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
                book: {
                    name:  '',
                    email: '',
                    phone: '',
                    sex:   '',
                    seat:  [],
                    rid:  '',
                    userId: '',
                    // amount: 
                },

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
                 axios.post('/api/process', data )
                 .then (response => {
                    var bkId = response.data;
                    //go to the next route with the booking ref
                    this.$router.push({ name: 'confirmBook', params: { bookId: bkId }})
                    
                 })
                 .catch(error => {
                    // this.errors = error.response.data.errors;
                    console.log(error);
                 });
            } 
        },
        mounted() {
            console.log('Confirm Component mounted.')
        },
        beforeRouteEnter (to, from, next) {
            // console.log(to.params.bookId);

            let bookRef = to.params.bookId;
            // we confirm if the booking id exists and pull in the record
            // send axios request

            axios.get('api/book-details/' +bookRef)
            .then(response => {
                // this.book = response.data.details;
                console.log(response.data.details);
                next();
            })
            .catch( error => {
                alert('Invalid Details');
                console.log(error.data);
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