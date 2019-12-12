<template>
  <!-- Top nav links -->
  <div class="text-sm sm:flex-grow flex mt-10" :class="colors">
    <a href="/#pricing" class="block mt-4 text-lg lg:inline-block lg:mt-0 mr-4" :class="color">{{ $t('pricing') }}</a>
    <a href="/#services" class="block mt-4 text-lg lg:inline-block lg:mt-0 mr-4" :class="color">{{ $t('services') }}</a>
    <a href="/#recommendations" class="block mt-4 text-lg lg:inline-block lg:mt-0 mr-4" :class="color">{{ $t('recommendations') }}</a>
    <a href="/houses" class="block mt-4 text-lg lg:inline-block lg:mt-0 mr-4" :class="color">{{ $t('houses') }}</a>
    <a href="/products" class="block mt-4 text-lg lg:inline-block lg:mt-0 mr-4" :class="color">{{ $t('products') }}</a>
<!--    <a href="/#who_we_are" class="block mt-4 text-lg lg:inline-block lg:mt-0 mr-4" :class="color">{{ $t('who_we_are') }}</a>-->
    <a class="block cursor-pointer mt-4 text-lg lg:inline-block lg:mt-0 mr-4" :class="color" @click="showContact = true">{{ $t('contact') }}</a>
    <a class="recommend cursor-pointer border relative border-white rounded py-2 px-4 lg:inline-block lg:mt-0 mr-4 text-yellow-400 text-xl"
       :class="color" @click="showRecommend = true"
       style="width: 288px;top:-10px">
        {{ $t('recommend_a_host') }}
        <span class="ribbon">
            <span class="ribbon3 text-sm">
                <span class="absolute ml-2" style="bottom: -10px"> {{$t('earn_500')}}</span>
            </span>
        </span>
    </a>

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
        color: { default: 'hover:text-green-200', type: String }
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

    .ribbon {
        position: relative;
        padding-bottom: 30px;
        background-size: cover;
        color: white;
    }

    .ribbon3 {
        width: 105px;
        height: 30px;
        line-height: 50px;
        padding-right: 15px;
        position: absolute;
        left: -79px;
        top: -35px;
        background: #ff6584;
    }
    .ribbon3:before, .ribbon3:after {
        content: "";
        position: absolute;
    }
    .ribbon3:before {
        height: 0;
        width: 0;
        bottom: -8.5px;
        right: 0.1px;
        border-top: 9px solid black;
        border-right: 9px solid transparent;
    }
    .ribbon3:after {
        height: 0;
        width: 0;
        left: -14.5px;
        border-top: 15px solid transparent;
        border-bottom: 15px solid transparent;
        border-right: 15px solid #ff6584;
    }
    footer .recommend {
        color: #333;
        padding: 10px 4px;
        font-size: 18px;
        margin-top: 22px;
        border: 1px solid;
        width: 216px;
    }
    @media only screen and (max-width: 1200px) {

        .recommend {
            top: 15px;
        }
    }
</style>
