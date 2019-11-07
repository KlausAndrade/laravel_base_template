<template>
  <section id="houses-show" class="bg-white border-b py-8">
    <div class=" mx-auto flex flex-wrap pt-4 pb-12">
      <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
        {{ $t('houses') }}
      </h1>
      <div class="w-full mb-4">
        <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t" />
      </div>

      <div class="flex w-full flex-wrap my-2">
        <div class="w-full md:w-full lg:w-5/12">
          <div class="px-4">
            <vue-carousel v-if="house.image && house.image.length > 0" class="max-w-full" :data="images" />
            <div v-else>
              No images added yet
            </div>
          </div>
        </div>
        <div class="w-full md:w-7/12 my-2">
          <div class="px-4">

              <div v-html="house.description">

              </div>

            <h3 class="my-2">
              Amenities
            </h3>

            <div class="flex flex-wrap my-2">
              <div v-for="(amenity, i) in house.amenity" :key="i">
                <amenity :amenity="amenity" :active="containAmenity(amenity.icon)" />
              </div>
            </div>
          </div>
        </div>
<!--        <div class="w-full md:w-6/12 lg:w-3/12 my-2">-->
<!--          <div class="px-4 md:text-left text-center md:mt-4">-->
<!--            <button class="btn btn-primary">-->
<!--              Pay now-->
<!--            </button>-->
<!--            <button class="btn btn-secondary bg-gray-300 ml-2">-->
<!--              Pay as service-->
<!--            </button>-->
<!--          </div>-->
<!--        </div>-->
      </div>
    </div>
  </section>
</template>

<script>
import House from './house'
import axios from 'axios'
import VueCarousel from '@chenfengyuan/vue-carousel'
import Amenity from './amenity'

export default {
    name: 'Show',
    components: { Amenity, House, VueCarousel },
    data () {
        return {
            house: ''
        }
    },
    computed: {

        images () {
            if (!this.house.image) return []
            return this.house.image.map((image) => `<img src="${image.url}" />`)
        }
    },
    mounted () {
        this.getHouse()
    },

    methods: {

        containAmenity (icon) {
            return this.house.amenity.some((e) => e.icon === icon)
        },

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
