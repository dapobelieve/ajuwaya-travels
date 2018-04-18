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
                    <li :class="{'tab-current': activeNav}" ><a class="icon icon-plug"><span>Payment</span></a></li>
                    <!-- <li><a class="icon icon-upload"><span>Upload</span></a></li> -->
                </ul>
            </nav>
            <section id="content">
              <div class="container">
                <div class="row">
                  <div class="col-sm-12 center">
                      this is the Payment or summary component
                      <form @submit.prevent="payNow" action="">
                          <button type="submit" class="btn-success center btn btn-lg">Pay &#x20A6 {{ payObj.format }} </button>
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
                    format:    '',
                    key:       '',
                    reference: ''
                },
            }
        },
        methods: {
            payNow () {
                alert('Paying...');

                axios.post('api/payment', this.payObj)
                .then(response => {
                    console.log(response.data);
                })
                .catch(error => {
                    console.log(error.data)
                })
            }
        },
        beforeRouteEnter(to, from, next)
        {
            let bookRef = to.params.bRef;

            axios.get('/api/getpay/'+bookRef)
            .then( response => {
                // console.log(response.data);
                next(vm => {
                    vm.payObj.amount = response.data.amount;
                    vm.payObj.format = response.data.format;
                    vm.payObj.email  = response.data.email;
                    vm.payObj.key    = response.data.psKey;
                    vm.payObj.reference = response.data.ref;

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
    /*.tabs-nav {
        position: fixed;
    }*/
</style>