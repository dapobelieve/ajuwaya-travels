<template>
    <section>
        <div class="tabs tabs-style-bar">
            <nav>
                <ul>
                    <li :class="{'tab-current': activeNav}" ><a  class="icon icon-upload"  ><span>Home</span></a></li>
                    <li><a  class="icon icon-tools"><span>Archive</span></a></li>
                    <li  ><a class="icon icon-display"><span>Analytics</span></a></li>
                    <li><a class="icon icon-upload"><span>Upload</span></a></li>
                    <!-- <li><a class="icon icon-tools"><span>Settings</span></a></li> -->
                </ul>
            </nav>
            <section id="content">
            <div class="container">
                <form class="">
                    <div class="row">
                        
                        <div class="col-sm-6">
                                <h2 class="title-2">
                                    Booking Details
                                </h2>
                                <div class="form-group">
                                  <label class="control-label" for="textarea">Full Name</label>
                                  <input type="text" required class="form-control" placeholder="Your Full Name" >
                                </div>
                                <div class="form-group">
                                  <label class="control-label" for="seller-Location">Gender</label>
                                  <select id="Location" name="Location" class="form-control">
                                    <option value="1">Option one</option>
                                    <option value="2">Option two</option>
                                  </select>
                                </div>
                                <div class="form-group">
                                  <label class="control-label" for="textarea">Email</label>
                                  <input type="text" class="form-control" placeholder="Your Email" >
                                </div>
                                <div class="form-group">
                                  <label class="control-label" for="textarea">Phone Number</label>
                                  <input type="text" class="form-control" placeholder="Phone Number">
                                </div>
                                
                                <!-- <div class="form-group">
                                  <div class="well">
                                    <div class="checkbox">
                                      <label><input type="checkbox"> I agree to the <a href="#">Terms of Use</a></label>
                                    </div>
                                    <router-link :to="{name: 'confirmBook'}" class="btn btn-common">deset</router-link>
                                    
                                  </div> 
                                </div> -->                            
                        </div>
                        <div class="col-sm-6">
                                <!-- <p>Select Seat Number</p> -->
                                <h5 style="text-align: center; display: block">Select Seat Number</h5>
                                <small style="text-align: center; display: block">*disabled buttons are seats that have been booked*</small>
                                <div class="calculator">
                                    <input readonly type="text">
                                    <div class="calculator-buttons">
                                        <button class="calc-button s1">1</button>
                                        <button class="calc-button s2">2</button>
                                        <button class="calc-button ">3</button>
                                        <button class="calc-button">4</button>
                                        <button class="calc-button  ">5</button>
                                        <button disabled class="calc-button free"></button>
                                        <button class="calc-button ">6</button>
                                        <button class="calc-button">7</button>
                                        <button class="calc-button ">8</button>
                                        <button disabled class="calc-button  free"></button>
                                        <button class="calc-button ">9</button>
                                        <button class="calc-button">10</button>
                                        <button class="calc-button">11</button>
                                        <button disabled class="calc-button  free"></button>
                                        <button class="calc-button">12</button>
                                        <button class="calc-button">13</button>
                                        <button class="calc-button">14</button>
                                        <button class="calc-button">15</button>
                                    </div>
                                </div>
                        </div>                     
                    </div>
                    <div class=" csd col-sm-8 col-md-offset-2">
                        <router-link :to="{name: 'confirmBook'}" class=" btn btn-common">submit</router-link>
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
                    seat:  ''
                }
            }
        },
        mounted() {
            console.log('Component mounted.')
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
    background: #af2c2c !important;
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


.calc-button {
    background: #4caf50;
    border: none;
    padding: 1.5rem;
    color: #fff;
    border-radius: 5px;
    font-size: 1.4rem;
    cursor: pointer;
    box-shadow: 0 1px 5px rgba(104, 104, 104, 0.8);
}


</style>