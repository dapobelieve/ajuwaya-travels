<template>
    <section>
        <div class="tabs tabs-style-bar">
            <nav>
                <ul>
                    <li>
                        <a class="icon icon-home">
                            <span>Submit Details</span>
                        </a>
                    </li>
                    <li><a class="icon icon-config"><span>Confirm Details</span></a></li>
                    <li ><a class="icon icon-plug"><span>Payment</span></a></li>
                    <!-- <li><a class="icon icon-upload"><span>Upload</span></a></li> -->
                </ul>
            </nav>
            <section id="content">
              <div class="container">
                <div class="row">
                  <div class="col-sm-6">
                      this is the Payment or summary component
                      <form @submit.prevent="payNow" action="">
                          <button type="submit" class="btn-success center btn btn-lg">Pay &#x20A6 1000 </button>
                      </form>
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
        methods: {
            payNow () {
                alert('Paying...');
            }
        },
        mounted() {
            console.log('Payment Component mounted.')
        }
    }
</script>

<style>
    /**/
    /*.tabs-nav {
        position: fixed;
    }*/
</style>