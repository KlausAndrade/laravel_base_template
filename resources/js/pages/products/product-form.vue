<template>
  <div v-if="isLoading" class="flex justify-center">
    <loader />
  </div>
  <form v-else class="px-4 max-w-2xl mx-auto" @submit.prevent="handleProduct" @keydown="form.onKeydown($event)">
    <!-- Name -->
    <div class="mt-4">
      <label class="col-md-3 col-form-label text-md-right mb-2" for="name">{{ $t('name') }}</label>
      <div class="col-md-7">
        <input id="name" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-input w-full" type="text" name="name" placeholder="Product name" required>
        <has-error :form="form" field="name" />
      </div>
    </div>
    <!-- Price -->
    <div class="mt-4">
      <label class="col-md-3 col-form-label text-md-right mb-2" for="price">{{ $t('price') }}</label>
      <div class="col-md-7">
        <input id="price" v-model="form.price" :class="{ 'is-invalid': form.errors.has('price') }" class="form-input w-full" type="text" name="price" placeholder="Price in cents" required>
        <has-error :form="form" field="price" />
      </div>
    </div>

    <!-- Description -->
    <vue-editor v-model="form.description" class="mt-4" />

    <div v-if="form.image.length > 0" class="px-2 mt-4">
      <div class="flex flex-wrap -mx-2">
        <div v-for="(image, i) in form.image" :key="i" class="w-1/3 px-2 relative mt-4">
          <div class="text-red-700 absolute right-0 mx-4 font-bold text-lg" @click="removeImage(image)">
            &times;
          </div>
          <img :src="image.url" class=""></img>
        </div>
      </div>
    </div>

    <div class="mt-4">
      <div ref="imageUpload" class="p-2 dropzone" />
    </div>

    <div class="mt-4 flex flex-col md:flex-row items-start md:items-center justify-between">
      <!-- Submit Button -->
      <tw-button v-if="type === 'create'" :loading="form.busy">
        {{ $t('add') }}
      </tw-button>
      <tw-button v-else :loading="form.busy">
        {{ $t('update') }}
      </tw-button>
      <a v-if="productId" class="text-pink-400 font-bold" :loading="form.busy" @click="deleteProduct">
        {{ $t('delete') }}
      </a>
    </div>
  </form>
</template>

<script>
import axios from 'axios'
import Form from 'vform'
import Dropzone from 'dropzone'
import { VueEditor } from 'vue2-editor'
import TwButton from '../../components/TwButton'
import Loader from '../../components/Loader'

export default {
  name: 'ProductForm',
  components: { Loader, TwButton, VueEditor },
  props: ['productId', 'type'],
  data: () => ({
    remember: false,
    isLoading: false,
    dropzone: null,
    form: new Form({
      name: '',
      price: '',
      description: '',
      image: ''
    })

  }),
  mounted () {
    this.dropzone = new Dropzone(this.$refs.imageUpload, {
      url: `/api/products/${this.productId}/images`,
      acceptedFiles: 'image/*',
      autoProcessQueue: this.type === 'edit'
    })
    if (this.type === 'edit') this.getProduct()
  },
  methods: {
    handleProduct () {
      this.isLoading = true

      if (this.type === 'create') this.createProduct()
      else this.updateProduct()

      this.isLoading = false
    },

    async getProduct () {
      try {
        const { data } = await axios.get(`/api/products/${this.productId}`)

        this.form.name = data.data.name
        this.form.price = data.data.price
        this.form.description = data.data.description
        this.form.image = data.data.image

        this.isLoading = false
      } catch (error) {
        this.error = this.$t('product_not_found')
        this.isLoading = false
      }
    },

    async deleteProduct () {
      try {
        if (confirm(this.$t('are_you_sure'))) {
          const { data } = await axios.delete(`/api/products/destroy/${this.productId}`)

          if (data.success) {
            this.$toasted.success(this.$t('product_deleted'))
            this.$router.push({ name: 'products.products' })
          } else {
            this.$toasted.error(this.$t('something_went_wrong'))
          }

          this.isLoading = false
        }
      } catch (error) {
        this.error = this.$t('product_not_found')
        this.isLoading = false
      }
    },
    async createProduct () {
      const { data } = await this.form.post('/api/products/store')

      if (data.success) {
        this.dropzone.options.url = `/api/products/${data.data.id}/images`
        this.dropzone.processQueue()

        this.$toasted.success(this.$t('product_registered'))
      } else {
        this.$toasted.error(this.$t('something_went_wrong'))
      }
      this.$router.push({ name: 'products.products' })
    },
    async updateProduct () {
      const { data } = await this.form.patch(`/api/products/update/${this.productId}`)

      if (data.success) {
        this.$toasted.success(this.$t('product_updated'))
        this.$router.push({ name: 'products.products' })
      } else {
        this.$toasted.error(this.$t('something_went_wrong'))
      }
    },
    async removeImage (image) {
      const { data } = await this.form.delete(`/api/products/${this.productId}/image/${image.id}`)

      if (data.success) {
        this.$toasted.success(this.$t('image_removed'))
        this.getProduct()
      } else {
        this.$toasted.error(this.$t('something_went_wrong'))
      }
    }

  }
}
</script>

<style scoped>
  @import "~vue2-editor/dist/vue2-editor.css";
</style>
