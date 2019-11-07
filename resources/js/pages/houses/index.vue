<template>
  <div class="w-full md:px-10 mx-auto">
    <div v-if="$store.getters['auth/role']" class="w-full flex justify-end px-6">
      <router-link :to="{ name: 'houses.create' }" class="btn btn-primary">
        {{ $t('add') }}
      </router-link>
    </div>
    <router-view></router-view>
  </div>
</template>

<script>

export default {
  name: 'Index',
}
</script>

<style scoped>

</style>
