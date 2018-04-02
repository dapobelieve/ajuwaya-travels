<template>
    <section>
        <div class="tabs tabs-style-bar">
            <nav>
                <ul>
                    <li :class="{'tab-current': activeNav}" ><a  class="icon icon-home"  ><span>Home</span></a></li>
                    <li><a  class="icon icon-box"><span>Archive</span></a></li>
                    <li  ><a class="icon icon-display"><span>Analytics</span></a></li>
                    <li><a class="icon icon-upload"><span>Upload</span></a></li>
                    <li><a class="icon icon-tools"><span>Settings</span></a></li>
                </ul>
            </nav>
            <section id="content">
              <div class="container">
                <div class="row">
                  <div class="col-sm-6">
                      <div class="page-ads box">
                              <h2 class="title-2">
                                Booking Details
                              </h2>
                              <form class="form-ad">
                                    <div class="form-group">
                                      <label class="control-label" for="textarea">Full Name</label>
                                      <input type="text" required class="form-control" placeholder="Your Full Name" >
                                    </div>

                                    <div class="form-group">
                                      <label class="control-label" for="textarea">Gender</label>            
                                      <div class="form-inline">
                                        <div class="form-group">
                                          <select class="form-control">
                                            <option value="0" selected="selected">Gender</option>
                                            <option value="male">Male</option>
                                            <option value="female">Female</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label" for="textarea">Email</label>
                                      <input type="text" class="form-control" placeholder="Your Email" >
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label" for="textarea">Phone Number</label>
                                      <input type="text" class="form-control" placeholder="Phone Number">
                                    </div> 
                                    <div class="form-group">
                                      <label class="control-label" for="seller-Location">Location</label>
                                      <select id="Location" name="Location" class="form-control">
                                        <option value="1">Option one</option>
                                        <option value="2">Option two</option>
                                      </select>
                                    </div>  
                                    <div class="form-group">
                                      <div class="well">
                                        <div class="checkbox">
                                          <label><input type="checkbox"> I agree to the <a href="#">Terms of Use</a></label>
                                        </div>
                                        <router-link :to="{name: 'confirmBook'}" class="btn btn-common">deset</router-link>
                                        
                                      </div> 
                                    </div>                            
                              </form>
                      </div>
                  </div>
                  <div class="col-sm-6"></div>
                </div>
              </div>
            </section>
        </div><!-- /tabs -->     
    </section>
</template>

<script>
    export default {
        data () {
            return {
                activeNav: true
            }
        },
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

<style>
    /**/
    .tabs-nav {
        position: fixed;
    }
</style>