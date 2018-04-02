<template>
    <section>
        <div class="tabs tabs-style-bar">
            <nav>
                <ul>
                    <li><a class="icon icon-home"  ><span>Home</span></a></li>
                    <li :class="{'tab-current': activeNav}" ><a href=""  class="icon icon-box"><span>Archive</span></a></li>
                    <li  ><a class="icon icon-display"><span>Analytics</span></a></li>
                    <li><a class="icon icon-upload"><span>Upload</span></a></li>
                    <li><a class="icon icon-tools"><span>Settings</span></a></li>
                </ul>
            </nav>
            <section id="content">
              <div class="container">
                <div class="row">
                  <div class="col-sm-6">
                      <!-- <div class="page-ads box">
                              <h2 class="title-2">
                                Post A Free Classified Ad
                              </h2>
                              <form class="form-ad">
                                    <div class="form-group">
                                      <label class="control-label">Category</label>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label">Ad title</label>
                                      <input name="Adtitle" placeholder="Ad title" class="form-control input-md" required="" type="text">
                                      <span class="help-block">A great title needs at least 60 characters. </span>
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label" for="textarea">Describe ad </label>
                                      <textarea class="form-control" id="textarea" name="textarea">Describe what makes your ad unique</textarea>
                                    </div>    
                                    <div class="form-group">
                                      <label class="control-label" for="textarea">Price</label>            
                                      <div class="form-inline">
                                        <div class="form-group">                  
                                          <div class="input-group">                        
                                            <input type="text" id="price" class="form-control" placeholder="placeholder">
                                            <span class="input-group-addon addon">$</span>
                                          </div>
                                        </div>
                                        <div class="form-group">
                                          <p class="form-control-static" style="padding: 5px 10px;">or</p>
                                        </div>
                                        <div class="form-group">
                                          <select class="form-control">
                                            <option value="0" selected="selected">Select alternative pricing</option>
                                            <option value="1">By deal</option>
                                            <option value="2">By offer</option>
                                            <option value="3">Exchange</option>
                                            <option value="4">For free</option>
                                          </select>
                                        </div>
                                      </div>
                                    </div>
                                    <h2 class="title-2">
                                      Your personal details
                                    </h2>
                                    <div class="form-group">
                                      <label class="control-label" for="textarea">Name</label>
                                      <input type="text" class="form-control" placeholder="Your Name" >
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label" for="textarea">Email</label>
                                      <input type="text" class="form-control" placeholder="Your Email" >
                                    </div>
                                    <div class="form-group">
                                      <label class="control-label" for="textarea">Phone Number</label>
                                      <input type="text" class="form-control" placeholder="Phone Number">
                                      <div class="checkbox">
                                        <label><input type="checkbox"> <small>Hide the phone number on this ads.</small></label>
                                      </div>
                                    </div> 
                                    <div class="form-group">
                                      <label class="control-label" for="textarea">Password</label>
                                      <input type="password" class="form-control"  placeholder="Password">
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
                      </div> -->
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
            // console.log('Component mounted.')
        }
    }
</script>

<style>
    /**/
    .tabs-nav {
        position: fixed;
    }
</style>