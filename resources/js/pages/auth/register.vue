<template>
  <div class="sm:w-full max-w-md mx-auto">
    <tw-card v-if="mustVerifyEmail" :title="$t('register')">
      <div class="alert alert-success" role="alert">
        {{ $t('verify_email_address') }}
      </div>
    </tw-card>
    <tw-card v-else :title="$t('register')">
      <form @submit.prevent="register" @keydown="form.onKeydown($event)">
        <!-- Name -->
        <div class="mt-4">
          <label class="col-md-3 col-form-label text-md-right">{{ $t('name') }}</label>
          <div class="col-md-7">
            <input v-model="form.name" :class="{ 'is-invalid': form.errors.has('name') }" class="form-input w-full" type="text" name="name" required autocomplete="username">
            <has-error :form="form" field="name" />
          </div>
        </div>

        <!-- Email -->
        <div class="mt-4">
          <label class="col-md-3 col-form-label text-md-right">{{ $t('email') }}</label>
          <div class="col-md-7">
            <input v-model="form.email" :class="{ 'is-invalid': form.errors.has('email') }" class="form-input w-full" type="email" name="email" required autocomplete="email">
            <has-error :form="form" field="email" />
          </div>
        </div>

        <!-- Phone -->
        <div class="mt-4">
          <label class="col-md-3 col-form-label text-md-right">{{ $t('phone') }}</label>
          <div class="col-md-7">
            <input v-model="form.phone" :class="{ 'is-invalid': form.errors.has('phone') }" class="form-input w-full" type="phone" name="phone" required autocomplete="phone">
            <has-error :form="form" field="phone" />
          </div>
        </div>

        <!-- Plan id -->
        <div class="mt-4">
          <label class="col-md-3 col-form-label text-md-right">{{ $t('plan') }}</label>
          <div class="col-md-7">
            <select v-model.number="form.plan_id" :class="{ 'is-invalid': form.errors.has('plan_id') }" class="form-input w-full" name="plan_id" required>
              <option value="1">
                Basic 10%
              </option>
              <option value="2">
                Regular 15%
              </option>
              <option value="3">
                Premium 20%
              </option>
            </select>
            <has-error :form="form" field="plan_id" />
          </div>
        </div>

        <!-- Password -->
        <div class="mt-4">
          <label class="col-md-3 col-form-label text-md-right">{{ $t('password') }}</label>
          <div class="col-md-7">
            <input v-model="form.password" :class="{ 'is-invalid': form.errors.has('password') }" class="form-input w-full" type="password" name="password" required autocomplete="new-password">
            <has-error :form="form" field="password" />
          </div>
        </div>

        <!-- Password Confirmation -->
        <div class="mt-4">
          <label class="col-md-3 col-form-label text-md-right">{{ $t('confirm_password') }}</label>
          <div class="col-md-7">
            <input v-model="form.password_confirmation" :class="{ 'is-invalid': form.errors.has('password_confirmation') }" class="form-input w-full" type="password" required name="password_confirmation" autocomplete="new-password">
            <has-error :form="form" field="password_confirmation" />
          </div>
        </div>

        <div class="mt-4">
          <div class="col-md-7 offset-md-3 d-flex">
            <!-- Submit Button -->
            <tw-button :loading="form.busy">
              {{ $t('register') }}
            </tw-button>
          </div>
        </div>
      </form>
    </tw-card>
  </div>
</template>

<script>
import Form from 'vform'

export default {
    middleware: 'guest',

    metaInfo () {
        return { title: this.$t('register') }
    },

    data: () => ({
        form: new Form({
            name: '',
            email: '',
            phone: '',
            plan_id: 1,
            password: '',
            password_confirmation: ''
        }),
        mustVerifyEmail: false
    }),
    computed: {
        plan () {
            if (this.$route && this.$route.query.plan) {
                return this.$route.query.plan > 0 && this.$route.query.plan < 4 ? this.$route.query.plan : 1
            }
            return 1
        }
    },

    mounted () {
        this.form.plan_id = this.plan
    },

    methods: {
        async register () {
            // Register the user.
            const { data } = await this.form.post('/api/register')

            // Must verify email fist.
            if (data.status) {
                this.mustVerifyEmail = true
            } else {
                // Log in the user.
                const { data: { token } } = await this.form.post('/api/login')

                // Save the token.
                this.$store.dispatch('auth/saveToken', { token })

                // Update the user.
                await this.$store.dispatch('auth/updateUser', { user: data })

                // Redirect home.
                this.$router.push({ name: 'home' })
            }
        }
    }
}
</script>
