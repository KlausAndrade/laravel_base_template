<template>
  <section id="services" class="bg-white border-b py-8">
    <div class="container mx-auto flex flex-wrap pt-4 pb-12">
      <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
        {{ $t('products') }}
      </h1>
      <div class="w-full mb-4">
        <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t" />
      </div>

      <product v-for="(product, i) in products" :key="i" :product="product" />
    </div>
  </section>
</template>

<script>
import Product from './product'

export default {
  name: 'Products',
  components: { Product },
  data () {
    return {
      products: [
        {
          id: '1',
          name: 'House xyz',
          price: 12.20,
          image: 'path/to/img',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ac hendrerit nulla. Mauris condimentum cursus sem, non sagittis quam auctor vitae. Cras odio felis, dapibus eu magna vitae, rhoncus hendrerit nibh. Donec fermentum malesuada ante, sit amet fermentum orci pellentesque consequat. Nulla posuere pharetra nunc non dapibus. Nam maximus feugiat elementum. Vestibulum sit amet felis neque. Ut nec auctor turpis.'
        },
        {
          id: '2',
          name: 'House xyz',
          price: 12.20,
          image: 'path/to/img',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ac hendrerit nulla. Mauris condimentum cursus sem, non sagittis quam auctor vitae. Cras odio felis, dapibus eu magna vitae, rhoncus hendrerit nibh. Donec fermentum malesuada ante, sit amet fermentum orci pellentesque consequat. Nulla posuere pharetra nunc non dapibus. Nam maximus feugiat elementum. Vestibulum sit amet felis neque. Ut nec auctor turpis.'
        },
        {
          id: '3',
          name: 'House xyz',
          price: 12.20,
          image: 'path/to/img',
          description: 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi ac hendrerit nulla. Mauris condimentum cursus sem, non sagittis quam auctor vitae. Cras odio felis, dapibus eu magna vitae, rhoncus hendrerit nibh. Donec fermentum malesuada ante, sit amet fermentum orci pellentesque consequat. Nulla posuere pharetra nunc non dapibus. Nam maximus feugiat elementum. Vestibulum sit amet felis neque. Ut nec auctor turpis.'
        },
        {
          id: '4',
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
