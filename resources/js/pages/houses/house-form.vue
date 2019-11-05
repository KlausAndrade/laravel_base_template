<template>
  <div v-if="isLoading" class="flex justify-center">
    <loader />
  </div>
  <form v-else class="px-4 max-w-2xl mx-auto" @submit.prevent="handleHouse" @keydown="form.onKeydown($event)">
    <!-- Name -->
    <div class="mt-4">
      <label class="col-md-3 col-form-label text-md-right mb-2" for="name">{{ $t('name') }}</label>
      <div class="col-md-7">
        <input id="name" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-input w-full" type="text" name="name" placeholder="House name" required>
        <has-error :form="form" field="name" />
      </div>
    </div>
    <!-- Address -->
    <div class="mt-4">
      <label class="col-md-3 col-form-label text-md-right mb-2" for="address">{{ $t('address') }}</label>
      <div class="col-md-7">
        <input id="address" v-model="form.address" :class="{ 'is-invalid': form.errors.has('address') }" class="form-input w-full" type="text" name="address" placeholder="Address" required>
        <has-error :form="form" field="address" />
      </div>
    </div>
    <!-- Country -->
    <div class="mt-4">
      <label class="col-md-3 col-form-label text-md-right mb-2" for="country">{{ $t('country') }}</label>
      <div class="col-md-7">
        <input id="country" v-model="form.country" :class="{ 'is-invalid': form.errors.has('country') }" class="form-input w-full" type="text" name="country" placeholder="Country" required>
        <has-error :form="form" field="country" />
      </div>
    </div>
    <!-- Number -->
    <div class="mt-4">
      <label class="col-md-3 col-form-label text-md-right mb-2" for="number">{{ $t('number') }}</label>
      <div class="col-md-7">
        <input id="number" v-model="form.number" :class="{ 'is-invalid': form.errors.has('number') }" class="form-input w-full" type="text" name="number" placeholder="Number" required>
        <has-error :form="form" field="number" />
      </div>
    </div>
    <!-- City -->
    <div class="mt-4">
      <label class="col-md-3 col-form-label text-md-right mb-2" for="city">{{ $t('city') }}</label>
      <div class="col-md-7">
        <input id="city" v-model="form.city" :class="{ 'is-invalid': form.errors.has('city') }" class="form-input w-full" type="text" name="city" placeholder="City" required>
        <has-error :form="form" field="city" />
      </div>
    </div>
    <!-- State -->
    <div class="mt-4">
      <label class="col-md-3 col-form-label text-md-right mb-2" for="state">{{ $t('state') }}</label>
      <div class="col-md-7">
        <input id="state" v-model="form.state" :class="{ 'is-invalid': form.errors.has('state') }" class="form-input w-full" type="text" name="state" placeholder="State" required>
        <has-error :form="form" field="state" />
      </div>
    </div>
    <!-- ZIP -->
    <div class="mt-4">
      <label class="col-md-3 col-form-label text-md-right mb-2" for="zipcode">{{ $t('zipcode') }}</label>
      <div class="col-md-7">
        <input id="zipcode" v-model="form.zipcode" :class="{ 'is-invalid': form.errors.has('zipcode') }" class="form-input w-full" type="text" name="zipcode" placeholder="ZIP" required>
        <has-error :form="form" field="zipcode" />
      </div>
    </div>
    <!-- Type -->
    <div class="mt-4">
      <label class="col-md-3 col-form-label text-md-right mb-2" for="type">{{ $t('type') }}</label>
      <div class="col-md-7">
        <select id="type" v-model="form.type" class="form-select w-full" required>
          <option value="house">
            House
          </option>
          <option value="apartment">
            Apartment
          </option>
        </select>
      </div>
    </div>
    <!-- Space -->
    <div class="mt-4">
      <label class="col-md-3 col-form-label text-md-right mb-2" for="space">{{ $t('space') }}</label>
      <div class="col-md-7">
        <select id="space" v-model="form.space" class="form-select w-full" required>
          <option value="entire-place">
            Entire place
          </option>
          <option value="private-room">
            Private room
          </option>
          <option value="shared-room">
            Shared room
          </option>
        </select>
      </div>
    </div>
    <!-- Dedicated -->
    <div class="mt-4">
      <label class="col-md-3 col-form-label text-md-right mb-2" for="dedicated">{{ $t('dedicated') }}</label>
      <div class="col-md-7">
        <input id="dedicated" v-model="form.dedicated" class="form-checkbox" type="checkbox" name="dedicated">
      </div>
    </div>
    <!-- Price -->
    <div class="mt-4">
      <label class="col-md-3 col-form-label text-md-right mb-2" for="price">{{ $t('price') }}</label>
      <div class="col-md-7">
        <input id="price" v-model="form.price" :class="{ 'is-invalid': form.errors.has('price') }" class="form-input w-full" type="text" name="price" placeholder="Price" required>
        <has-error :form="form" field="price" />
      </div>
    </div>
    <!-- Checkin -->
    <div class="mt-4">
      <label class="col-md-3 col-form-label text-md-right mb-2" for="checkin">{{ $t('checkin') }}</label>
      <div class="col-md-7">
        <input id="checkin" v-model="form.checkin" :class="{ 'is-invalid': form.errors.has('checkin') }" class="form-input w-full" type="date" name="checkin" placeholder="Checkin" required>
        <has-error :form="form" field="checkin" />
      </div>
    </div>
    <!-- Checkout -->
    <div class="mt-4">
      <label class="col-md-3 col-form-label text-md-right mb-2" for="checkout">{{ $t('checkout') }}</label>
      <div class="col-md-7">
        <input id="checkout" v-model="form.checkout" :class="{ 'is-invalid': form.errors.has('checkout') }" class="form-input w-full" type="date" name="checkout" placeholder="Checkout" required>
        <has-error :form="form" field="checkout" />
      </div>
    </div>
    <!-- Guests -->
    <div class="mt-4">
      <label class="col-md-3 col-form-label text-md-right mb-2" for="guests">{{ $t('guests') }}</label>
      <div class="col-md-7">
        <input id="guests" v-model="form.guests" :class="{ 'is-invalid': form.errors.has('guests') }" class="form w-full" type="number" name="guests" placeholder="Guests" required>
        <has-error :form="form" field="guests" />
      </div>
    </div>
    <!-- Rooms -->
    <div class="mt-4">
      <label class="col-md-3 col-form-label text-md-right mb-2" for="rooms">{{ $t('rooms') }}</label>
      <div class="col-md-7">
        <input id="rooms" v-model="form.rooms" :class="{ 'is-invalid': form.errors.has('rooms') }" class="form-input w-full" type="number" name="rooms" placeholder="Rooms" required>
        <has-error :form="form" field="rooms" />
      </div>
    </div>

    <!-- Description -->
    <vue-editor v-model="form.description" class="mt-4" />

    <div v-if="form.image && form.image.length > 0" class="px-2 mt-4">
      <div class="flex flex-wrap -mx-2">
        <div v-for="(image, i) in form.image" :key="i" class="w-1/3 px-2 relative mt-4">
          <div class="text-red-700 absolute right-0 mx-4 font-bold text-lg" @click="removeImage(image)">
            &times;
          </div>
          <img :src="image.url" class=""></img>
        </div>
      </div>
    </div>

    <div class="mt-4">
      <div ref="imageUpload" class="p-2 dropzone" />
    </div>

    <div class="mt-4 flex flex-col md:flex-row items-start md:items-center justify-between">
      <!-- Submit Button -->
      <tw-button v-if="type === 'create'" :loading="form.busy">
        {{ $t('add') }}
      </tw-button>
      <tw-button v-else :loading="form.busy">
        {{ $t('update') }}
      </tw-button>
      <a v-if="houseId" class="text-pink-400 font-bold" :loading="form.busy" @click="deleteHouse">
        {{ $t('delete') }}
      </a>
    </div>
  </form>
</template>

<script>
import axios from 'axios'
import Form from 'vform'
import Dropzone from 'dropzone'
import { VueEditor } from 'vue2-editor'
import TwButton from '../../components/TwButton'
import Loader from '../../components/Loader'

export default {
    name: 'HouseForm',
    components: { Loader, TwButton, VueEditor },
    props: ['houseId', 'type'],
    data: () => ({
        remember: false,
        isLoading: false,
        dropzone: null,
        form: new Form({
            name: '',
            country: '',
            address: '',
            number: '',
            city: '',
            state: '',
            zipcode: '',
            type: '',
            space: '',
            dedicated: false,
            price: '',
            checkin: '',
            checkout: '',
            guests: '',
            rooms: '',
            description: '',
            active: ''
        })

    }),
    mounted () {
        this.dropzone = new Dropzone(this.$refs.imageUpload, {
            url: `/api/houses/${this.houseId}/images`,
            acceptedFiles: 'image/*',
            autoProcessQueue: this.type === 'edit'
        })
        if (this.type === 'edit') this.getHouse()
    },
    methods: {
        handleHouse () {
            this.isLoading = true

            if (this.type === 'create') this.createHouse()
            else this.updateHouse()

            this.isLoading = false
        },

        async getHouse () {
            try {
                const { data } = await axios.get(`/api/houses/${this.houseId}`)

                let obj = data.data

                for (let key in obj) {
                    if (this.form.hasOwnProperty(key)) {
                        this.form[key] = obj[key]
                    }
                }
                this.form.image = obj.image;

                this.isLoading = false
            } catch (error) {
                this.error = this.$t('house_not_found')
                this.isLoading = false
            }
        },

        async deleteHouse () {
            try {
                if (confirm(this.$t('are_you_sure'))) {
                    const { data } = await axios.delete(`/api/houses/destroy/${this.houseId}`)

                    if (data.success) {
                        this.$toasted.success(this.$t('house_deleted'))
                        this.$router.push({ name: 'houses.houses' })
                    } else {
                        this.$toasted.error(this.$t('something_went_wrong'))
                    }

                    this.isLoading = false
                }
            } catch (error) {
                this.error = this.$t('house_not_found')
                this.isLoading = false
            }
        },
        async createHouse () {
            const { data } = await this.form.post('/api/houses/store')

            if (data.success) {
                this.dropzone.options.url = `/api/houses/${data.data.id}/images`
                this.dropzone.processQueue()
                this.$toasted.success(this.$t('house_registered'))
            } else {
                this.$toasted.error(this.$t('something_went_wrong'))
            }
            this.$router.push({ name: 'houses.houses' })
        },
        async updateHouse () {
            const { data } = await this.form.patch(`/api/houses/update/${this.houseId}`)

            if (data.success) {
                this.$toasted.success(this.$t('house_updated'))
                this.$router.push({ name: 'houses.houses' })
            } else {
                this.$toasted.error(this.$t('something_went_wrong'))
            }
        },
        async removeImage (image) {
            const { data } = await this.form.delete(`/api/houses/${this.houseId}/image/${image.id}`)

            if (data.success) {
                this.$toasted.success(this.$t('image_removed'))
                this.getHouse()
            } else {
                this.$toasted.error(this.$t('something_went_wrong'))
            }
        }

    }
}
</script>

<style scoped>
  @import "~vue2-editor/dist/vue2-editor.css";
</style>
