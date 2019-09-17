<template>
  <div v-if="isLoading" class="flex justify-center">
    <loader />
  </div>
  <div v-else>
    <product :product="product" size="max-w-6xl w-full" />
    <p v-if="error">
      {{ error }}
    </p>
  </div>
</template>

<script>
import axios from 'axios'
import Product from './product'
import Loader from '../../components/Loader'

export default {
  name: 'Edit',
  components: { Loader, Product },
  data () {
    return {
      isLoading: true,
      product: null,
      error: null
    }
  },
  mounted () {
    this.getProduct()
  },

  methods: {
    async getProduct () {
      try {
        const { data } = await axios.get(`/api/products/${this.$route.params.id}`)
        this.product = data.data
        this.isLoading = false
      } catch (error) {
        this.error = this.$t('product_not_found')
        this.isLoading = false
      }
    }
  }
}
</script>

<style scoped>

</style>
