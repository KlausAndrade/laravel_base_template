<template>
  <form class="w-full max-w-lg">
    <h1 class="text-3xl mb-6">
      Contacte-nos
    </h1>
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
          {{ $t('fullname') }}
        </label>
        <input id="grid-first-name" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Jane">
        <p class="text-red-500 text-xs italic">
          {{ $t('fill_out_field') }}
        </p>
      </div>
      <div class="w-full md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-last-name">
          {{ $t('email') }}
        </label>
        <input id="grid-email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Doe">
      </div>
    </div><div data-v-76db242e="" class="flex flex-wrap -mx-3 mb-6">
      <div data-v-76db242e="" class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
        <label data-v-76db242e="" for="grid-first-name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
          {{ $t('phone') }}
        </label>
        <input id="grid-phone" data-v-76db242e="" type="text" placeholder="Jane" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-red-500 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
      </div> <div data-v-76db242e="" class="w-full md:w-1/2 px-3">
        <label data-v-76db242e="" for="grid-last-name" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
          {{ $t('rooms') }}
        </label>

        <select id="grid-rooms" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
          <option>0</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5+</option>
        </select>
      </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-password">
            {{ $t('address') }}
        </label>
        <input id="grid-password" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="password" placeholder="">
      </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-2">
      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-city">
            {{ $t('city') }}
        </label>
        <input id="grid-city" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="Albuquerque">
      </div>
      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-state">
            {{ $t('state') }}
        </label>
        <div class="relative">
          <select id="grid-state" class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            <option>Lisboa</option>
            <option>Porto</option>
            <option>Coimbra</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center px-2 text-gray-700">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /></svg>
          </div>
        </div>
      </div>
      <div class="w-full md:w-1/3 px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-zip">
            {{ $t('zip') }}
        </label>
        <input id="grid-zip" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text" placeholder="90210">
      </div>
    </div>
    <div class="flex items-end mt-6">
      <tw-button class="w-full">
          {{ $t('send') }}
      </tw-button>
    </div>
  </form>
</template>

<script>
import TwButton from './TwButton'
export default {
    name: 'ContactForm',
    components: { TwButton }
}
</script>

<style scoped>

</style>
