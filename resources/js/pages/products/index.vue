<template>
  <div class="max-w-5xl mx-auto">
    <div v-if="$store.getters['auth/role']" class="w-full flex justify-end px-6">
      <router-link :to="{ name: 'products.create' }" class="btn btn-primary">
        {{ $t('products_create') }}
      </router-link>
    </div>
    <router-view></router-view>
  </div>
</template>

<script>

export default {
  name: 'Index',
  data () {
    return {
    }
  },
}
</script>

<style scoped>

</style>
