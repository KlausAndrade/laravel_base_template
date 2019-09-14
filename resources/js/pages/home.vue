<template>
  <div class="container mx-auto">
    <tw-card :title="$t('home')">
      {{ $t('you_are_logged_in') }}
      {{ $t('verified') }}
      {{ tt ? 'is admin' : 'user' }}
    </tw-card>
  </div>
</template>

<script>
export default {
  middleware: 'auth',

  metaInfo () {
    return { title: this.$t('home') }
  },
  data () {
    return {
      tt: this.$store.getters['auth/user'].role
    }
  }
}
</script>
