<template>
  <div>
    <hero />
    <cases />
    <services />
    <testimonials />
    <pricing />
    <boats />
    <call-to-action />
    <transition name="fade">
      <div v-if="showBackTop" class="fixed bottom-0 right-0 m-4 p-2 rounded bg-teal-500 text-white text-center" @click="backToTop">
        <svg class="text-white fill-current" xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill-rule="evenodd" clip-rule="evenodd"><path d="M23.245 20l-11.245-14.374-11.219 14.374-.781-.619 12-15.381 12 15.391-.755.609z" /></svg>
      </div>
    </transition>
  </div>
</template>

<script>
import { mapGetters } from 'vuex'
import Hero from './landing/hero'
import Cases from './landing/cases'
import Services from './landing/services'
import Pricing from './landing/pricing'
import Testimonials from './landing/testimonials'
import CallToAction from './landing/call-to-action'
import Footer from './landing/footer'
import Boats from './landing/boats'

export default {

    components: {
        Boats,
        Hero,
        Cases,
        Services,
        Pricing,
        Testimonials,
        CallToAction,
        Footer
    },

    metaInfo () {
        return { title: this.$t('home') }
    },

    data: () => ({
        title: window.config.appName,
        showBackTop: false
    }),

    computed: mapGetters({
        authenticated: 'auth/check'
    }),

    mounted () {
        window.addEventListener('scroll', this.handleScroll)
    },
    destroyed () {
        window.removeEventListener('scroll', this.handleScroll)
    },

    methods: {
        handleScroll () {
            this.showBackTop = window.scrollY > 10
        },
        backToTop () {
            window.scrollTo(0, 0)
        }
    }
}
</script>

<style>

  .gradient {
    background: linear-gradient(90deg, #38b2ac 0%, #2b847f 100%)
  }
.top-right {
  position: absolute;
  right: 10px;
  top: 18px;
}

.title {
  font-size: 85px;
}
</style>
