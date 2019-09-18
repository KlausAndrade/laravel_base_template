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
      products: [
        {
          name: 'House xyz',
          price: 12.20,
          image: 'path/to/img',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ac hendrerit nulla. Mauris condimentum cursus sem, non sagittis quam auctor vitae. Cras odio felis, dapibus eu magna vitae, rhoncus hendrerit nibh. Donec fermentum malesuada ante, sit amet fermentum orci pellentesque consequat. Nulla posuere pharetra nunc non dapibus. Nam maximus feugiat elementum. Vestibulum sit amet felis neque. Ut nec auctor turpis.'
        },
        {
          name: 'House xyz',
          price: 12.20,
          image: 'path/to/img',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ac hendrerit nulla. Mauris condimentum cursus sem, non sagittis quam auctor vitae. Cras odio felis, dapibus eu magna vitae, rhoncus hendrerit nibh. Donec fermentum malesuada ante, sit amet fermentum orci pellentesque consequat. Nulla posuere pharetra nunc non dapibus. Nam maximus feugiat elementum. Vestibulum sit amet felis neque. Ut nec auctor turpis.'
        },
        {
          name: 'House xyz',
          price: 12.20,
          image: 'path/to/img',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ac hendrerit nulla. Mauris condimentum cursus sem, non sagittis quam auctor vitae. Cras odio felis, dapibus eu magna vitae, rhoncus hendrerit nibh. Donec fermentum malesuada ante, sit amet fermentum orci pellentesque consequat. Nulla posuere pharetra nunc non dapibus. Nam maximus feugiat elementum. Vestibulum sit amet felis neque. Ut nec auctor turpis.'
        },
        {
          name: 'House xyz',
          price: 12.20,
          image: 'path/to/img',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ac hendrerit nulla. Mauris condimentum cursus sem, non sagittis quam auctor vitae. Cras odio felis, dapibus eu magna vitae, rhoncus hendrerit nibh. Donec fermentum malesuada ante, sit amet fermentum orci pellentesque consequat. Nulla posuere pharetra nunc non dapibus. Nam maximus feugiat elementum. Vestibulum sit amet felis neque. Ut nec auctor turpis.'
        }
      ]
    }
  },
  methods: {
    goTo (path) {
      this.$router.push(path)
    }
  }
}
</script>

<style scoped>

</style>
