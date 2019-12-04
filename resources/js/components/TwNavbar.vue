<template>
  <nav class="flex items-center justify-between flex-wrap bg-green-500 p-6 mb-8">
    <div id="home" class="flex items-center flex-no-shrink text-white mr-6">
      <!-- Logo -->
      <router-link :to="{ name: user ? 'home' : 'welcome' }" class="font-semibold text-3xl tracking-tight">
        <img src="/img/logo/just-book-it-logo-white.svg" :alt="appName + ' logo'" class="w-32" />
      </router-link>
    </div>
    <div class="block sm:hidden">
      <button class="flex items-center px-3 py-2 border rounded text-green-300 border-green-light hover:text-white hover:border-white" @click="toggleNav">
        <svg class="fill-current h-3 w-3" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><title>Menu</title><path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z" /></svg>
      </button>
    </div>
    <div :class="openNav ? 'block': 'hidden'" class="w-full flex-grow sm:flex sm:items-center sm:w-auto">
      <links />

      <locale-switcher />

      <!-- Authenticated -->
      <div v-if="user" class="bg-grey-lighter flex flex-col md:flex-row justify-between items-start md:items-center">
        <router-link :to="{ name: 'settings.profile' }">
          <img :src="user.photo_url" class="w-10 h-10 rounded-full mt-2 md:mt-0 lg:mt-0" :alt="$t('settings')" :title="$t('settings')">
        </router-link>
        <router-link :to="{ name: 'settings.profile' }" class="text-green-200 px-2 font-semibold">
          {{ user.name }}
        </router-link>
        <a href="#" class="no-underline inline-block text-sm px-4 py-2 leading-none border rounded text-white border-white mt-4 sm:mt-0" @click.prevent="logout"><fa icon="sign-out-alt" fixed-width />{{ $t('logout') }}</a>
      </div>

      <!-- Guest -->
      <template v-else>
        <div class="nav-item mr-4 font-semibold text-white">
          <router-link :to="{ name: 'login' }" class="">
            {{ $t('login') }}
          </router-link>
        </div>
        <div class="nav-item font-semibold text-white">
          <router-link :to="{ name: 'register' }" class="border rounded text-white border-white px-4 py-1 hover:bg-green-600">
            {{ $t('register') }}
          </router-link>
        </div>
      </template>
    </div>
  </nav>
</template>

<script>
import { mapGetters } from 'vuex'
import LocaleSwitcher from './LocaleSwitcher'
import Links from './Links'

export default {
  components: { Links, LocaleSwitcher },
  data: () => ({
    appName: window.config.appName,
    openNav: false
  }),

  computed: mapGetters({
    user: 'auth/user'
  }),

  methods: {
    async logout () {
      // Log out the user.
      await this.$store.dispatch('auth/logout')

      // Redirect to login.
      this.$router.push({ name: 'login' })
    },
    toggleNav: function () {
      this.openNav = !this.openNav
    }
  }
}
</script>
