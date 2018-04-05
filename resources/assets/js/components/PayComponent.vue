<template>
    <section>
        <div class="tabs tabs-style-bar">
            <nav>
                <ul>
                    <li><a class="icon icon-home"  ><span>Home</span></a></li>
                    <li :class="{'tab-current': activeNav}" ><a href=""  class="icon icon-box"><span>Archive</span></a></li>
                    <li  ><a class="icon icon-display"><span>Confirmation</span></a></li>
                    <li :class="{'tab-current': activeNav}"><a class="icon icon-upload"><span>Summary</span></a></li>
                    <li><a class="icon icon-tools"><span>Settings</span></a></li>
                </ul>
            </nav>
            <section id="content">
              <div class="container">
                <div class="row">
                  <div class="col-sm-6">
                      this is the Payment or summary component
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