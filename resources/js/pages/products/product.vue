<template>
  <div :class="size" class="mx-auto">
    <div class="flex items-center justify-center">
      <div class="w-full sm:w-full lg:w-full py-6 px-3">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
          <div class="bg-cover bg-center h-56 p-4" style="background-image: url(https://via.placeholder.com/450x450)" />
          <div class="p-4">
            <p class="uppercase tracking-wide text-sm font-bold text-gray-700">
              {{ product.name }}
            </p>
            <p class="text-3xl text-gray-900">
              €{{ product.price }}
            </p>
          </div>
          <div class="p-4 border-t border-gray-300 text-gray-700">
            <p class="text-gray-700">
              {{ description }}
            </p>
            <p v-if="hasViewMore" class="cursor-pointer text-blue-500 mt-2" @click="viewMore = !viewMore">
              view more
            </p>
          </div>
          <div class="px-4 pt-3 pb-4 border-t border-gray-300 bg-gray-100">
            <div class="flex items-center justify-center pt-2">
              <TwButton>Comprar</TwButton>
              <router-link v-if="$store.getters['auth/role']" class="font-bold ml-4" :to="{name: 'products.edit', params: { id: product.id }}">
                Edit
              </router-link>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import TwButton from '../../components/TwButton'
export default {
  name: 'Product',
  components: { TwButton },
  props: {
    product: { required: true },
    size: { default: 'max-w-6xl w-1/3' }
  },
  data () {
    return {
      viewMore: false
    }
  },
  computed: {
    description () {
      if (this.product.description.length > 80 && !this.viewMore) {
        return this.product.description.substring(0, 80) + '...'
      }

      return this.product.description
    },
    hasViewMore () {
      return this.product.description.length > 80
    }
  }
}
</script>

<style scoped>

</style>
