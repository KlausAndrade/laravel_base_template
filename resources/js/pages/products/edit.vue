<template>
  <div v-if="isLoading" class="flex justify-center">
    <svg width="45" height="45" viewBox="0 0 45 45" xmlns="http://www.w3.org/2000/svg" stroke="#38b2ac">
      <g fill="none" fill-rule="evenodd" transform="translate(1 1)" stroke-width="2">
        <circle cx="22" cy="22" r="6" stroke-opacity="0">
          <animate attributeName="r"
                   begin="1.5s" dur="3s"
                   values="6;22"
                   calcMode="linear"
                   repeatCount="indefinite"
          />
          <animate attributeName="stroke-opacity"
                   begin="1.5s" dur="3s"
                   values="1;0" calcMode="linear"
                   repeatCount="indefinite"
          />
          <animate attributeName="stroke-width"
                   begin="1.5s" dur="3s"
                   values="2;0" calcMode="linear"
                   repeatCount="indefinite"
          />
        </circle>
        <circle cx="22" cy="22" r="6" stroke-opacity="0">
          <animate attributeName="r"
                   begin="3s" dur="3s"
                   values="6;22"
                   calcMode="linear"
                   repeatCount="indefinite"
          />
          <animate attributeName="stroke-opacity"
                   begin="3s" dur="3s"
                   values="1;0" calcMode="linear"
                   repeatCount="indefinite"
          />
          <animate attributeName="stroke-width"
                   begin="3s" dur="3s"
                   values="2;0" calcMode="linear"
                   repeatCount="indefinite"
          />
        </circle>
        <circle cx="22" cy="22" r="8">
          <animate attributeName="r"
                   begin="0s" dur="1.5s"
                   values="6;1;2;3;4;5;6"
                   calcMode="linear"
                   repeatCount="indefinite"
          />
        </circle>
      </g>
    </svg>
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

export default {
  name: 'Edit',
  components: { Product },
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
