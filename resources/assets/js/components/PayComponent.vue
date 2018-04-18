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
                      <!-- <paystack
                        :amount="payObj.amount"
                        :email="payObj.email"
                        :paystackkey="payObj.psKey"
                        :reference="payObj.reference"
                        :callback="payNow"
                        :close="close"
                        :bearer="payObj.bearer"
                        :embed="false"
                    ></paystack> -->


                    <form @submit.prevent="payWithPaystack" action="">
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
// import paystack from 'vue-paystack';
    export default {
        data () {
            return {
                activeNav: true,
                bookRef: '',
                payObj: {
                    email:     '',
                    amount:    null,
                    format:    '',
                    key:       '',
                    reference: '',
                    psKey: 'pk_test_baad97319b760bb836a0c1cb81848264cde2fea6',
                    bearer: 'DapoMichaels'
                },
            }
        },
        computed: {
            scriptLoaded: function() {
              return new Promise((resolve) => {
                  this.loadScript(() => {
                      resolve()
                  })
              })
            }
        },
        methods: {
            payNow (response) {
                alert('Paying...');

                axios.post('api/payment', {
                    ref: response
                })
                .then(response => {
                    console.log(response.data);
                })
                .catch(error => {
                    console.log(error.data)
                })
            },
            close: function(){
                console.log("Payment closed")
            },
            loadScript(callback) {
              const script = document.createElement('script')
              script.src = 'https://js.paystack.co/v1/inline.js'
              document.getElementsByTagName('head')[0].appendChild(script)
              if (script.readyState) {  // IE
                  script.onreadystatechange = () => {
                      if (script.readyState === 'loaded' || script.readyState === 'complete') {
                          script.onreadystatechange = null
                          callback()
                      }
                  }
              } else {  // Others
                  script.onload = () => {
                      callback()
                  }
              }
            },
            payWithPaystack() {
                  this.scriptLoaded.then(() => {
                      const paystackOptions = {
                          key: this.payObj.psKey,
                          email: this.payObj.email,
                          amount: this.payObj.amount,
                          ref: this.payObj.reference,
                          callback: this.payNow(response),
                          onClose: () => {
                              this.close()
                          },
                          metadata: this.metadata,
                          currency: this.currency,
                      }

                      if (this.embed) {
                          paystackOptions.container = 'paystackEmbedContainer'
                      }

                      const handler = window.PaystackPop.setup(paystackOptions)
                      if (!this.embed) {
                          handler.openIframe()
                      }
                  })
            }
        },
        mounted() {
            if (this.embed) {
              this.payWithPaystack()
            }
        },
        beforeRouteEnter(to, from, next)
        {
            let bookRef = to.params.bRef;

            axios.get('/api/getpay/'+bookRef)
            .then( response => {
                // console.log(response.data);
                next(vm => {
                    vm.payObj.amount = parseInt(response.data.amount * 100);
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