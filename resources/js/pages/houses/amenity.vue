<template>
  <div class="w-1/10 m-2 p-2 rounded flex items-enter " :class="{'bg-green-200': status}" @click="status = !status">
    <img class="w-10" :src="`/img/icons/amenities/${amenity.icon}.svg`" :title="amenity.name">
  </div>
</template>

<script>

export default {
    name: 'Amenity',
    props: ['amenity', 'enable'],
    data () {
        return {
            status: this.enable
        }
    }
}
</script>

<style scoped>

</style>
