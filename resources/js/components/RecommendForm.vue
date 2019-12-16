<template>
  <div v-if="isSending">
    <loader />
  </div>
  <div v-else-if="sent" class="text-center">
    <success />
    {{ $t('message_sent') }}
  </div>
  <form v-else class="w-full max-w-lg px-4 py-6" @submit.prevent="send">
      <h1 class="text-3xl mb-6">
          {{ $t('recommend_a_host') }}
      </h1>
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
            {{ $t('fullname') }}
        </label>
        <input id="grid-first-name" v-model="form.name" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Jane Doe">
      </div>
      <div class="w-full md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
            {{ $t('email') }}
        </label>
        <input id="grid-email" required v-model="form.email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="email" placeholder="jane@doe.com">
      </div>
      <div class="w-full md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-phone">
            {{ $t('phone') }}
        </label>
        <input id="grid-phone" v-model="form.phone" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="tel" placeholder="+000 000 000 000">
      </div>
    </div>
    <hr class="pb-1 border-t">
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3 mb-6 md:mb-0">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-first-name">
            {{ $t('his_fullname') }}
        </label>
        <input id="grid-his-first-name" v-model="form.friend.name" class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white" type="text" placeholder="Jane Doe">
      </div>
      <div class="w-full md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
            {{ $t('his_email') }}
        </label>
        <input id="grid-his-email" required v-model="form.friend.email" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="email" placeholder="jane@doe.com">
      </div>
      <div class="w-full md:w-1/2 px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-his-phone">
            {{ $t('his_phone') }}
        </label>
        <input id="grid-phone" v-model="form.friend.phone" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="tel" placeholder="+000 000 000 000">
      </div>
    </div>

    <div class="flex items-end mt-6">
      <tw-button class="w-full my-4">
        Enviar
      </tw-button>
    </div>
  </form>
</template>

<script>

import TwButton from './TwButton'
import Form from 'vform'
import axios from 'axios'
import Loader from './Loader'
import Success from './Success'

export default {
  name: 'RecommendForm',
    components: { Success, Loader, TwButton },
    data () {
        return {
            form: new Form({
                name: '',
                email: '',
                phone: '',
                friend: {
                  name: '',
                  email: '',
                  phone: ''
                }
            }),
            isSending: false,
            sent: false
        }
    },
    methods: {
        async send () {
            this.isSending = true
            const { data } = await axios.post(`/api/mail/recommendHost`, this.form)
            if (data.success) {
                this.isSending = false
                this.sent = true
            }
        }
    }
}
</script>

<style scoped>

</style>
