<template>
  <tw-card class="max-w-lg mx-auto">
    <section id="products-create" class="bg-white border-b py-8">
      <div class="container mx-auto flex flex-wrap pt-4 pb-12">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
          {{ $t('edit') }}
        </h1>
        <div class="w-full mb-4">
          <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t" />
        </div>
      </div>

      <product-form :product-id="this.$route.params.id" />
    </section>
  </tw-card>
</template>

<script>
import ProductForm from './product-form'
export default {
  name: 'Edit',
  components: { ProductForm },

}
</script>

<style scoped>

</style>
