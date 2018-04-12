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
                  <div class="col-sm-12 center">
                      this is the Payment or summary component
                      <form @submit.prevent="payNow" action="">
                          <button type="submit" class="btn-success center btn btn-lg">Pay &#x20A6 1000 </button>
                      </form>
                  </div>
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
                activeNav: true,
                bookRef: '',
                payObj: {
                    email:     '',
                    amount:    '',
                    key:       '',
                    reference: ''
                },
            }
        },
        methods: {
            payNow () {
                alert('Paying...');

                axios.post('api/payment')
            }
        },
        beforeRouteEnter(to, from, next)
        {
            let bookRef = to.params.bRef;
            console.log(bookRef);

            axios.get('/api/getpay/'+bookRef)
            .then( response => {
                console.log(response.data)
                // next(vm => {

                // })
            })
        .catch( error => {

            })
            next();
        }
    }
</script>

<style>
    /**/
    /*.tabs-nav {
        position: fixed;
    }*/
</style>