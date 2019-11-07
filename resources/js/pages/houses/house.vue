<template>
  <div v-if="$store.getters['auth/role'] || house.active" id="house" :class="size" class="mx-auto" style="min-width: 300px;">
    <div class="flex items-center justify-center">
      <div class="w-full sm:w-full lg:w-full py-6 px-3">
        <div class="bg-white shadow-xl rounded-lg overflow-hidden">
          <div class="relative">
            <div v-if="$store.getters['auth/role']" class="text-right absolute z-30 right-0 top-0 px-1 m-1 bg-white shadow" title="Show or hide house for customers">
              <input v-model="house.active" type="checkbox" @click="updateActive(house)">
            </div>
            <vue-carousel v-if="images.length > 0" :data="images" />

            <div v-else class="bg-cover bg-center h-56 p-4" style="background-image: url(https://via.placeholder.com/450x450)" />
          </div>
          <div class="p-4">
            <p class="uppercase tracking-wide text-sm font-bold text-gray-700">
              {{ house.name }}
            </p>
            <p v-if="house.price" class="text-3xl text-gray-900">
              €{{ house.price | currency }}
            </p>
          </div>
          <div class="p-4 border-t border-gray-300 text-gray-700">
            <div class="text-gray-700" v-html="description">
              {{ $t('no_description') }}
            </div>

            <router-link :to="{name: 'houses.show', params: { id: house.id }}">
              <p v-if="hasViewMore" class="cursor-pointer text-blue-500 mt-2">
                {{ $t('read_more') }}
              </p>
            </router-link>
          </div>
          <div class="px-4 pt-3 pb-4 border-t border-gray-300 bg-gray-100">
            <div class="flex items-center justify-center pt-2">
              <router-link v-if="$store.getters['auth/role']" class="font-bold ml-4" :to="{name: 'houses.edit', params: { id: house.id }}">
                {{ $t('edit') }}
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
import axios from 'axios'
import VueCarousel from '@chenfengyuan/vue-carousel'

export default {
    name: 'House',
    components: { TwButton, VueCarousel },
    filters: {
        currency (value) {
            if (!value) return
            return value.toFixed(2)
        }
    },
    props: {
        house: { required: true },
        size: { default: 'max-w-6xl w-1/3' }
    },
    data () {
        return {
            viewMore: false
        }
    },
    computed: {
        images () {
            if (!this.house.image) return []
            return this.house.image.map((image) => `<img src="${image.url}" />`)
        },

        description () {
            if (this.house.description.length > 190 && !this.viewMore) {
                return this.house.description.substring(0, 190) + '...'
            }

            return this.house.description
        },
        hasViewMore () {
            return this.house.description.length > 190
        }
    },
    methods: {

        async updateActive (house) {
            let reqObject = { id: house.id, active: !house.active }
            try {
                await axios.patch('/api/houses/updateActive', reqObject)
            } catch (error) {
                this.error = this.$t('house_not_found')
            }
        }

    }
}
</script>

<style>
  #house h1{
    font-size: 32px;
    font-weight: bold;
  }
  h2{
    font-size: 28px;
    font-weight: bold;
  }
  h3{
    font-size: 24px;
    font-weight: bold;
  }
</style>
