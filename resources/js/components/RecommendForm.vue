<template>
  <form class="w-full max-w-lg px-4">
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
          Full Name
        </label>
        <input id="grid-first-name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Jane Doe">
      </div>
      <div class="w-full md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
          Email
        </label>
        <input id="grid-email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="email" placeholder="jane@doe.com">
      </div>
      <div class="w-full md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-phone">
          Telefone
        </label>
        <input id="grid-phone" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="tel" placeholder="+000 000 000 000">
      </div>
    </div>

    <div class="flex items-end mt-6">
      <tw-button class="w-full">
        Enviar
      </tw-button>
    </div>
  </form>
</template>

<script>
import TwButton from './TwButton'
export default {
  name: 'RecommendForm',
  components: { TwButton }
}
</script>

<style scoped>

</style>
