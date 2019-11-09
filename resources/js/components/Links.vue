<template>
  <!-- Top nav links -->
  <div class="text-sm sm:flex-grow" :class="colors">
    <a href="/#pricing" class="block mt-4 text-lg lg:inline-block lg:mt-0 mr-4" :class="color">{{ $t('pricing') }}</a>
    <a href="/#services" class="block mt-4 text-lg lg:inline-block lg:mt-0 mr-4" :class="color">{{ $t('services') }}</a>
    <a href="/#recommendations" class="block mt-4 text-lg lg:inline-block lg:mt-0 mr-4" :class="color">{{ $t('recommendations') }}</a>
    <a href="/houses" class="block mt-4 text-lg lg:inline-block lg:mt-0 mr-4" :class="color">{{ $t('houses') }}</a>
    <a href="/products" class="block mt-4 text-lg lg:inline-block lg:mt-0 mr-4" :class="color">{{ $t('products') }}</a>
<!--    <a href="/#who_we_are" class="block mt-4 text-lg lg:inline-block lg:mt-0 mr-4" :class="color">{{ $t('who_we_are') }}</a>-->
    <a href="/#contact" class="block mt-4 text-lg lg:inline-block lg:mt-0 mr-4" :class="color" @click="showContact = true">{{ $t('contact') }}</a>
    <a class="border border-white rounded py-2 px-4 block mt-4 lg:inline-block lg:mt-0 mr-4 text-yellow-400 text-xl" :class="color" @click="showRecommend = true">{{ $t('recommend_a_host') }}</a>
      <span>ganhe500e</span>
    <modal :show.sync="showContact">
      <contact-form class="p-6" />
    </modal>

    <modal :show.sync="showRecommend">
      <recommend-form />
    </modal>
  </div>
</template>

<script>
import ContactForm from './ContactForm'
import RecommendForm from './RecommendForm'
export default {
    name: 'Links',
    // eslint-disable-next-line vue/no-unused-components
    components: { RecommendForm, ContactForm },
    props: {
        colors: { default: 'text-white font-bold', type: String },
        color: { default: 'hover:text-teal-200', type: String }
    },
    data () {
        return {
            showRecommend: false,
            showContact: false
        }
    }
}
</script>

<style scoped>

</style>
