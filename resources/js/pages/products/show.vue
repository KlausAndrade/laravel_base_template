<template>
  <section id="products-show" class="bg-white border-b py-8">
    <div class=" mx-auto flex flex-wrap pt-4 pb-12">
      <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
        {{ $t('products') }}
      </h1>
      <div class="w-full mb-4">
        <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t" />
      </div>

      <div class="flex flex-wrap md:flex-no-wrap w-full">
        <div class="sm:w-full md:w-4/12 my-4">
          <vue-carousel v-if="product.images && product.images.length > 0" :data="Product.images" />
          <div v-else>
            No images added yet
          </div>
        </div>
        <div class="sm:w-full md:w-4/12 my-4" v-html="product.description" />
        <div class="sm:w-full md:w-4/12 my-4">
          <stripe />
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import Product from './product'
import axios from 'axios'
import VueCarousel from '@chenfengyuan/vue-carousel'
import Stripe from '../../components/Stripe'

export default {
    name: 'Show',
    components: { Stripe, Product, VueCarousel },
    data () {
        return {
            product: ''
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
        },

        async payNow () {
            try {
                const { data } = await axios.post('/api/checkout/charge', { a: 'ler' })
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
