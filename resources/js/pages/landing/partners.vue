<template>
  <div>
    <h1 class="w-full mt-8 my-2 text-5xl font-bold leading-tight text-center text-white">
      Nossos parceiros
    </h1>
    <div class="w-full mb-4">
      <div class="h-1 mx-auto bg-white w-1/6 opacity-25 my-0 py-0 rounded-t" />
    </div>
    <div class="flex flex-wrap justify-center items-center my-8">
      <div v-for="(partner, i) in partners" :key="i" class=" w-1/2 lg:w-1/4">
        <div class="h-32 flex items-center bg-white rounded my-4 mx-4">
          <img class="px-2" :src="'/img/partners/'+partner+'.png'" :alt="partner + ' partner logo' ">
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
    name: 'Partners',
    data () {
        return {
            partners: ['booking', 'airbnb', 'tripadvisor', 'windu', 'homeaway', 'warmrental', 'rentalia', 'uniplaces']
        }
    }
}
</script>

<style scoped>

</style>
