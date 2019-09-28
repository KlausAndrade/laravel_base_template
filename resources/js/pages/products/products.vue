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
import axios from 'axios'

export default {
  name: 'Products',
  components: { Product },
  data () {
    return {
      products: []
    }
  },
  beforeMount () {
    this.getProducts()
  },

  methods: {
    async getProducts () {
      try {
        const { data } = await axios.get('/api/products')
        this.products = data.data
        this.isLoading = false
      } catch (error) {
        this.error = this.$t('product_not_found')
        this.isLoading = false
      }
    },

    goTo (path) {
      this.$router.push(path)
    }
  }
}
</script>
