<template>
  <div>
    <section id="recommendations" class="bg-white border-b py-8">
      <div class="container mx-auto flex flex-wrap pt-4 pb-12">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
          {{ $t('testimonials') }}
        </h1>
        <div class="w-full mb-4">
          <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t" />
        </div>
        <div class="w-full">
          <h3 class="font-bold text-gray-600 text-lg mt-8">
            {{ $t('testimonials_guests') }}
          </h3>
        </div>

        <testimonial>
          {{ $t('testimonials_guest_1') }}
          <template slot="author">
            <b>Rocha</b>, Gonçalo
          </template>
        </testimonial>

        <testimonial>
          {{ $t('testimonials_guest_2') }}
          <template slot="author">
            <b>Andrade</b>, Klaus
          </template>
        </testimonial>

        <testimonial>
          {{ $t('testimonials_guest_3') }}
          <template slot="author">
            <b>Henrique</b>, Fernando
          </template>
        </testimonial>

        <hr>

        <div class="w-full">
          <h3 class="font-bold text-gray-600 text-lg mt-8">
            {{ $t('testimonials_hosts') }}
          </h3>
        </div>

        <testimonial>
          {{ $t('testimonials_host_1') }}
          <template slot="author">
            <b>Moura</b>, Marcela
          </template>
        </testimonial>

        <testimonial>
          {{ $t('testimonials_host_2') }}
          <template slot="author">
            <b>Galizia</b>, Giorgia
          </template>
        </testimonial>

        <testimonial>
          {{ $t('testimonials_host_3') }}
          <template slot="author">
            <b>Bernardo</b>, Stefani
          </template>
        </testimonial>
      </div>
    </section>
  </div>
</template>

<script>
import Testimonial from '../../components/Testimonial'
export default {
    components: { Testimonial }
}
</script>
