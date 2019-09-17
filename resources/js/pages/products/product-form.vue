<template>
  <div v-if="isLoading" class="flex justify-center">
    <loader />
  </div>
  <form v-else class="px-4 max-w-2xl mx-auto" @submit.prevent="updateProduct" @keydown="form.onKeydown($event)">
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
    <div class="mt-4">
      <label class="col-md-3 col-form-label text-md-right mb-2" for="description">{{ $t('description') }}</label>
      <div class="col-md-7">
        <input id="description" v-model="form.description" :class="{ 'is-invalid': form.errors.has('description') }" class="form-input w-full" type="text" name="description" placeholder="Product description" required>
        <has-error :form="form" field="description" />
      </div>
    </div>
    <!-- Image -->
    <div class="mt-4">
      <label class="col-md-3 col-form-label text-md-right mb-2" for="image">{{ $t('image') }}</label>
      <div class="col-md-7">
        <input id="image" multiple :class="{ 'is-invalid': form.errors.has('image') }" class="form-input w-full" type="file" name="image" @change="onFileSelected">
        <has-error :form="form" field="image" />
        <img v-if="imgUrl" alt="Preview" class="mt-4" :src="imgUrl">
      </div>
    </div>
    <div class="mt-4 flex flex-col md:flex-row items-start md:items-center justify-between">
      <!-- Submit Button -->
      <tw-button :loading="form.busy">
        {{ $t('add') }}
      </tw-button>
    </div>
  </form>
</template>

<script>
import Form from 'vform'
import TwButton from '../../components/TwButton'
import Loader from '../../components/Loader'

export default {
  name: 'ProductForm',
  components: { Loader, TwButton },
  props: ['product', 'type'],
  data: () => ({
    form: new Form({
      name: '',
      price: '',
      description: '',
      image: ''
    }),
    imgUrl: null,
    remember: false,
    isLoading: false
  }),
  methods: {
    async updateProduct () {
      this.isLoading = true
      const { data } = await this.form.post('/api/products/store')

      if (data.success) {
        this.$toasted.success(this.$t('product_registered'))
      } else {
        this.$toasted.error(this.$t('something_went_wrong'))
      }

      this.isLoading = false
      this.$router.push({ name: 'products.products' })
    },
    onFileSelected (e) {
      this.imgUrl = URL.createObjectURL(e.target.files[0])
      this.form.image.push(e.target.files[0])
    }
  }
}
</script>

<style scoped>

</style>
