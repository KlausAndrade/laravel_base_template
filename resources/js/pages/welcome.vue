<template>
  <div>
    <hero></hero>
    <cases></cases>
    <services></services>
    <pricing></pricing>
    <call-to-action></call-to-action>
    <Footer></Footer>
  </div>
</template>

<script>
  import { mapGetters } from 'vuex'
  import Hero from './landing/hero'
  import Cases from './landing/cases'
  import Services from './landing/services'
  import Pricing from './landing/pricing'
  import CallToAction from './landing/call-to-action'
  import Footer from './landing/footer'

export default {

  components: {
    Hero,
    Cases,
    Services,
    Pricing,
    CallToAction,
    Footer
  },

  metaInfo () {
    return { title: this.$t('home') }
  },

  data: () => ({
    title: window.config.appName
  }),

  computed: mapGetters({
    authenticated: 'auth/check'
  })
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
