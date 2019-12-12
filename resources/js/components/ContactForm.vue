<template>
  <div v-if="isSending">
    <loader />
  </div>
  <div v-else-if="sent" class="text-center">
    <success />
    {{ $t('message_sent') }}
  </div>
  <form v-else class="w-full max-w-lg" @submit.prevent="send">
    <h1 class="text-3xl mb-6">
      {{ $t('contact') }}
    </h1>
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="px-2">
        <p>
          {{ $t('can_contact_us_message') }} <a class="text-green-400" href="mailto:master@jbi.pt">master@jbi.pt</a>.
        </p>
          <p><a href="phone:+351 918 037 611" class="text-green-400"> +351 918 037 611 </a> </p>
          <p><a href="phone:+351 915 434 634" class="text-green-400"> +351 915 434 634 </a> </p>
          <br>
      </div>
      <div class="w-full px-3 mb-6 md:mb-0">
          <div class="field">
            <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-name">
              {{ $t('fullname') }}
            </label>
            <input id="grid-name"
                   v-model="form.name"
                   required class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
                   type="text"
                   :placeholder="$t('fullname')">
          </div>
      </div>
      <div class="w-full px-3">
        <label class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2" for="grid-email">
          {{ $t('email') }}
        </label>
        <input id="grid-email"
               v-model="form.email"
               class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500"
               type="email"
               placeholder="email@example.com">
      </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3 mb-6 md:mb-0">
        <label for="grid-phone" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
          {{ $t('phone') }}
        </label>
        <input id="grid-phone"
               v-model="form.phone"
               required type="phone"
               placeholder="(+012) 345 678 910"
               class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white">
      </div>
    </div>
    <div class="flex flex-wrap -mx-3 mb-6">
      <div class="w-full px-3 mb-6 md:mb-0">
        <label for="grid-message" class="block uppercase tracking-wide text-gray-700 text-xs font-bold mb-2">
          {{ $t('message') }}
        </label>
        <textarea id="grid-message"
                  required
                  v-model="form.message"
                  :placeholder="$t('leave_message')"
                  class="appearance-none block w-full bg-gray-200 text-gray-700 border rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white"
        />
      </div>
    </div>
    <div class="flex items-end mt-6">
      <tw-button class="w-full" @click="send">
        {{ $t('send') }}
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
    name: 'ContactForm',
    components: { Success, Loader, TwButton },
    data () {
        return {
            form: new Form({
                name: '',
                email: '',
                phone: '',
                message: ''
            }),
            isSending: false,
            sent: false
        }
    },
    methods: {
        async send () {
            this.isSending = true
            const { data } = await axios.post(`/api/mail/contact`, this.form)
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
