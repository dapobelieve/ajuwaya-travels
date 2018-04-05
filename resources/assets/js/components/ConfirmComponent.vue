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
                      this is the confirm component
                      {{ $route.params.bookId}}
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
                activeNav: true,
                dum: ['aRtTds34s9iSk9Njh','aRtTds34s9iSk9Njhcsdf']
            }
        },
        mounted() {
            // console.log('Component mounted.')
        },
        beforeRouteEnter (to, from, next) {

            console.log(to.params.bookId);
            next(vm => {
                
            });
        }
    }
</script>

<style>
    /**/
    .tabs-nav {
        position: fixed;
    }
</style>