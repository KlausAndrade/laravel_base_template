<template>
  <div class="w-full">
    <h3 class="my-2">
      Amenities
    </h3>

    <div class="flex flex-wrap justify-between my-2">
      <div v-for="(amenity, i) in amenities" :key="i" @click="updateHouseAmenities(amenity)">
        <amenity :amenity="amenity" :enable="containAmenity(amenity.icon)"></amenity>
      </div>
    </div>
  </div>
</template>

<script>
import axios from 'axios'
import Amenity from "./amenity";

export default {
    name: 'Amenities',
    components: {Amenity},
    props: ['houseId', 'houseAmenities'],
    data () {
        return {
            amenities: []

        }
    },

    beforeMount () {
        this.getAmenities()
    },
    methods: {

        containAmenity (icon) {
            return this.houseAmenities.some((e) => e.icon === icon)
        },

        async getAmenities () {
            try {
                const { data } = await axios.get(`/api/houses/${this.houseId}/amenities`)

                let obj = data.data

                this.amenities = obj
            } catch (error) {
                this.error = this.$t('house_not_found')
                this.isLoading = false
            }
        },

        async updateHouseAmenities (icon) {
            try {

                await axios.post(`/api/houses/${this.houseId}/amenities/${icon.id}`)

                this.$emit('updateAmenities')

            } catch (error) {
                this.error = this.$t('house_not_found')
                this.isLoading = false
            }
        }
    }
}
</script>

<style scoped>

</style>
