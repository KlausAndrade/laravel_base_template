<template>
  <div class="main-layout">
    <tw-navbar />
    <main>
      <child />
    </main>
    <Footer />
    <locale-switcher />
  </div>
</template>

<script>
import TwNavbar from '~/components/TwNavbar'
import LocaleSwitcher from '~/components/LocaleSwitcher'
import Footer from '../pages/landing/footer'

export default {
    name: 'MainLayout',

    components: {
        Footer,
        TwNavbar,
        LocaleSwitcher
    }
}
</script>
