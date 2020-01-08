<template>
  <div v-if="isLoading" class="flex justify-center">
    <loader />
  </div>
  <form v-else class="max-w-6xl px-4 mx-auto flex flex-wrap" @submit.prevent="handleHouse" @keydown="form.onKeydown($event)">
    <!-- Name -->
    <div class="w-full md:w-1/2 mt-4">
      <div class="p-2">
        <label class="col-md-3 col-form-label text-md-right mb-2" for="name">{{ $t('name') }}</label>
        <div class="col-md-7">
          <input id="name" v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-input w-full" type="text" name="name" placeholder="House name" required>
          <has-error :form="form" field="name" />
        </div>
      </div>
    </div>
    <!-- Address -->
    <div class="w-full md:w-1/2 mt-4">
      <div class="p-2">
        <label class="col-md-3 col-form-label text-md-right mb-2" for="address">{{ $t('address') }}</label>
        <div class="col-md-7">
          <input id="address" v-model="form.address" :class="{ 'is-invalid': form.errors.has('address') }" class="form-input w-full" type="text" name="address" placeholder="Address">
          <has-error :form="form" field="address" />
        </div>
      </div>
    </div>
    <!-- Number -->
    <div class="w-full md:w-1/2 mt-4">
      <div class="p-2">
        <label class="col-md-3 col-form-label text-md-right mb-2" for="number">{{ $t('number') }}</label>
        <div class="col-md-7">
          <input id="number" v-model="form.number" :class="{ 'is-invalid': form.errors.has('number') }" class="form-input w-full" type="text" name="number" placeholder="Number">
          <has-error :form="form" field="number" />
        </div>
      </div>
    </div>
    <!-- City -->
    <div class="w-full md:w-1/2 mt-4">
      <div class="p-2">
        <label class="col-md-3 col-form-label text-md-right mb-2" for="city">{{ $t('city') }}</label>
        <div class="col-md-7">
          <input id="city" v-model="form.city" :class="{ 'is-invalid': form.errors.has('city') }" class="form-input w-full" type="text" name="city" placeholder="City">
          <has-error :form="form" field="city" />
        </div>
      </div>
    </div>
    <!-- State -->
    <div class="w-full md:w-1/2 mt-4">
      <div class="p-2">
        <label class="col-md-3 col-form-label text-md-right mb-2" for="state">{{ $t('state') }}</label>
        <div class="col-md-7">
          <input id="state" v-model="form.state" :class="{ 'is-invalid': form.errors.has('state') }" class="form-input w-full" type="text" name="state" placeholder="State">
          <has-error :form="form" field="state" />
        </div>
      </div>
    </div>
    <!-- ZIP -->
    <div class="w-full md:w-1/2 mt-4">
      <div class="p-2">
        <label class="col-md-3 col-form-label text-md-right mb-2" for="zipcode">{{ $t('zipcode') }}</label>
        <div class="col-md-7">
          <input id="zipcode" v-model="form.zipcode" :class="{ 'is-invalid': form.errors.has('zipcode') }" class="form-input w-full" type="text" name="zipcode" placeholder="ZIP">
          <has-error :form="form" field="zipcode" />
        </div>
      </div>
    </div>
    <!-- Country -->
    <div class="w-full md:w-1/2 mt-4">
      <div class="p-2">
        <label class="col-md-3 col-form-label text-md-right mb-2" for="country">{{ $t('country') }}</label>
        <div class="col-md-7">
          <input id="country" v-model="form.country" :class="{ 'is-invalid': form.errors.has('country') }" class="form-input w-full" type="text" name="country" placeholder="Country">
          <has-error :form="form" field="country" />
        </div>
      </div>
    </div>
    <!-- Type -->
    <div class="w-full md:w-1/2 mt-4">
      <div class="p-2">
        <label class="col-md-3 col-form-label text-md-right mb-2" for="type">{{ $t('type') }}</label>
        <div class="col-md-7">
          <select id="type" v-model="form.type" class="form-select w-full">
            <option value="house">
              House
            </option>
            <option value="apartment">
              Apartment
            </option>
          </select>
        </div>
      </div>
    </div>
    <!-- Space -->
    <div class="w-full md:w-1/2 mt-4">
      <div class="p-2">
        <label class="col-md-3 col-form-label text-md-right mb-2" for="space">{{ $t('space') }}</label>
        <div class="col-md-7">
          <select id="space" v-model="form.space" class="form-select w-full">
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
    </div>
    <div class="w-full md:w-1/2 mt-4">
      <div class="p-2">
        <label class="col-md-3 col-form-label text-md-right mb-2" for="start_contract">{{ $t('start_contract') }}</label>
        <div class="col-md-7">
          <input id="start_contract" v-model="form.start" :class="{ 'is-invalid': form.errors.has('start_contract') }"
                 class="form-input w-full" type="date" name="start_contract" placeholder="start_contract"
          >
          <has-error :form="form" field="start" />
        </div>
      </div>
    </div>

    <div class="w-full md:w-1/2 mt-4">
      <div class="p-2">
        <label class="col-md-3 col-form-label text-md-right mb-2" for="end_contract">{{ $t('end_contract') }}</label>
        <div class="col-md-7">
          <input id="end_contract" v-model="form.end" :class="{ 'is-invalid': form.errors.has('end_contract') }" class="form-input w-full" type="date" name="end_contract" placeholder="end_contract">
          <has-error :form="form" field="end" />
        </div>
      </div>
    </div>
    <!-- Guests -->
    <div class="w-full md:w-1/2 mt-4">
      <div class="p-2">
        <label class="col-md-3 col-form-label text-md-right mb-2" for="guests">{{ $t('guests') }}</label>
        <div class="col-md-7">
          <input id="guests" v-model="form.guests" :class="{ 'is-invalid': form.errors.has('guests') }" class="form w-full form-input" type="number" name="guests" placeholder="Guests">
          <has-error :form="form" field="guests" />
        </div>
      </div>
    </div>

    <!-- Rooms -->
    <div class="w-full md:w-1/2 mt-4">
      <div class="p-2">
        <label class="col-md-3 col-form-label text-md-right mb-2" for="rooms">{{ $t('rooms') }}</label>
        <div class="col-md-7">
          <input id="rooms" v-model="form.rooms" :class="{ 'is-invalid': form.errors.has('rooms') }" class="form-input w-full" type="number" name="rooms" placeholder="Rooms">
          <has-error :form="form" field="rooms" />
        </div>
      </div>
    </div>
    
    <!-- Lang -->
    <div class="w-full md:w-1/2 mt-4">
      <div class="p-2">
        <label class="col-md-3 col-form-label text-md-right mb-2" for="type">{{ $t('language') }}</label>
        <div class="col-md-7">
          <select id="type" v-model="form.lang" class="form-select w-full">
            <option v-for="(lang, i) in $store.state.lang.locales" :value="lang.toLocaleLowerCase()">
              {{ lang }}
            </option>
          </select>
        </div>
      </div>
    </div>

    <amenities :house-id="houseId" :house-amenities="amenities" />

    <!-- Description -->
    <vue-editor v-model="form.description" class="mt-4 w-full" required />
    <br>
    <br>
    <br>

    <div v-if="form.image && form.image.length > 0" class="px-2 mt-4">
      <br>
      <br>
      <div class="flex flex-wrap -mx-2">
        <div v-for="(image, i) in form.image" :key="i" class="w-1/3 px-2 relative mt-4">
          <div class="text-red-700 absolute right-0 mx-4 font-bold text-lg" @click="removeImage(image)">
            &times;
          </div>
          <img :src="image.url" class=""></img>
        </div>
      </div>
    </div>

    <div class="mt-4 w-full">
      <div ref="imageUpload" class="p-2 dropzone rounded" />
    </div>

    <div class="mt-4 flex flex-col md:flex-row items-start md:items-center justify-between">
      <!-- Submit Button -->
      <tw-button v-if="type === 'create'" class="mr-4" :loading="form.busy">
        {{ $t('add') }}
      </tw-button>
      <tw-button v-else class="mr-4" :loading="form.busy">
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
import Amenities from './amenities'

export default {
    name: 'HouseForm',
    components: { Amenities, Loader, TwButton, VueEditor },
    props: ['houseId', 'type'],
    data: () => ({
        remember: false,
        isLoading: false,
        dropzone: null,
        amenities: [],
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
            start: '',
            end: '',
            guests: '',
            rooms: '',
            description: '',
            active: '',
            lang: "pt"
        })

    }),
    mounted () {
        this.dropzone = new Dropzone(this.$refs.imageUpload, {
            url: `/api/houses/${this.houseId}/images`,
            acceptedFiles: 'image/*',
            autoProcessQueue: this.type === 'edit'
        })
        this.form.lang = this.lang;
        if (this.type === 'edit') this.getHouse()
    },
    computed: {
      lang(){
        return this.$store.state.lang.locale;
      }
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
                this.amenities = obj.amenity
                this.form.image = obj.image

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
