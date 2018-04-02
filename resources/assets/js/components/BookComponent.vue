<template>
    <section>
        <div class="tabs tabs-style-bar">
            <nav>
                <ul>
                    <li :class="{'tab-current': activeNav}" ><a href="#section-bar-1" class="icon icon-home"  ><span>Home</span></a></li>
                    <li><a href="#section-bar-2"  class="icon icon-box"><span>Archive</span></a></li>
                    <li  ><a href="#section-bar-3" class="icon icon-display"><span>Analytics</span></a></li>
                    <li><a href="#section-bar-4" class="icon icon-upload"><span>Upload</span></a></li>
                    <li><a href="#section-bar-5" class="icon icon-tools"><span>Settings</span></a></li>
                </ul>
            </nav>
            <div class="content-wrap">
                <section id="section-bar-1">
                    <p>1</p>
                </section>
            </div><!-- /content -->
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