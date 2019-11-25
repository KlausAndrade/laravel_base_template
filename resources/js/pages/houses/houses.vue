<template>
  <section id="services" class="bg-white border-b py-8">
    <div class="container mx-auto justify-start flex flex-wrap pt-4 pb-12">
      <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
        {{ $t('houses') }}
      </h1>
      <div class="w-full mb-4">
        <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t" />
      </div>

      <house v-for="(house, i) in houses" :key="i" :house="house" />
    </div>
  </section>
</template>

<script>
import House from './house'
import axios from 'axios'

export default {
  name: 'Houses',
  components: { House },
  data () {
    return {
      houses: []
    }
  },
  mounted () {
    this.getHouse()
  },

  methods: {
    async getHouse () {
      try {
        const { data } = await axios.get('/api/houses')
        this.houses = data.data
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
