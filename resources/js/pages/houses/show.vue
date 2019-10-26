<template>
  <section id="houses-show" class="bg-white border-b py-8">
    <div class=" mx-auto flex flex-wrap pt-4 pb-12">
      <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
        {{ $t('houses') }}
      </h1>
      <div class="w-full mb-4">
        <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t" />
      </div>

      <div class="flex w-full">
        <div class="w-6/12">
          <vue-carousel v-if="house.images && house.images.length > 0" :data="House.images" />
          <div v-else>
            No images added yet
          </div>
        </div>
        <div class="w-4/12">
          Description
        </div>
        <div class="w-2/12">
          Confirm
            Pagar agora | Deduzir de serviços
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import House from './house'
import axios from 'axios'
import VueCarousel from '@chenfengyuan/vue-carousel'

export default {
    name: 'Show',
    components: { House, VueCarousel },
    data () {
        return {
            house: ''
        }
    },
    mounted () {
        this.getHouse()
    },

    methods: {
        async getHouse () {
            try {
                const { data } = await axios.get(`/api/houses/${this.$route.params.id}`)
                this.house = data.data
                this.isLoading = false
            } catch (error) {
                this.error = this.$t('house_not_found')
                this.isLoading = false
            }
        },

        goTo (path) {
            this.$router.push(path)
        }
    }
}
</script>
