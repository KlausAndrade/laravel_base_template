<template>
  <form class="px-4 max-w-2xl mx-auto" @submit.prevent="updateProduct" @keydown="form.onKeydown($event)">
    <!-- Name -->
    <div class="mt-4">
      <label class="col-md-3 col-form-label text-md-right mb-2" for="name">{{ $t('name') }}</label>
      <div class="col-md-7">
        <input id="name" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-input" type="text" name="name" placeholder="Product name" required>
        <has-error :form="form" field="name" />
      </div>
    </div>
    <!-- Price -->
    <div class="mt-4">
      <label class="col-md-3 col-form-label text-md-right mb-2" for="price">{{ $t('price') }}</label>
      <div class="col-md-7">
        <input id="price" v-model="form.price" :class="{ 'is-invalid': form.errors.has('price') }" class="form-input" type="text" name="price" placeholder="Price in cents" required>
        <has-error :form="form" field="price" />
      </div>
    </div>
    <!-- Description -->
    <div class="mt-4">
      <label class="col-md-3 col-form-label text-md-right mb-2" for="description">{{ $t('description') }}</label>
      <div class="col-md-7">
        <input id="description" v-model="form.description" :class="{ 'is-invalid': form.errors.has('description') }" class="form-input" type="text" name="description" placeholder="Product description" required>
        <has-error :form="form" field="description" />
      </div>
    </div>
    <!-- Image -->s
    <div class="mt-4">
      <label class="col-md-3 col-form-label text-md-right mb-2" for="image">{{ $t('image') }}</label>
      <div class="col-md-7">
        <input multiple id="image" :class="{ 'is-invalid': form.errors.has('image') }" class="form-input" type="file" name="image" @change="onFileSelected">
        <has-error :form="form" field="image" />
        <img alt="Preview" class="mt-4" v-if="imgUrl" :src="imgUrl" />
      </div>
    </div>
    <div class="mt-4 flex flex-col md:flex-row items-start md:items-center justify-between">
      <!-- Submit Button -->
      <tw-button :loading="form.busy">
        {{ $t('add_product') }}
      </tw-button>
    </div>
  </form>
</template>

<script>
import Form from 'vform'
import TwButton from '../../components/TwButton'

export default {
  name: 'ProductForm',
  components: { TwButton },
  props: ['product'],
  data: () => ({
    form: new Form({
      name: '',
      price: '',
      description: '',
      image: ''
    }),
    imgUrl: null,
    remember: false
  }),
  methods: {
    async updateProduct () {
      const { data } = await this.form.post('/api/products/store')

      await this.$store.dispatch('auth/updateUser', { user: data })
    },
    onFileSelected (e) {
      this.imgUrl = URL.createObjectURL(e.target.files[0]);
      this.form.image.push(e.target.files[0])
    }
  }
}
</script>

<style scoped>

</style>
