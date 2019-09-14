<template>
  <transition v-if="show" name="fade">
    <div v-if="show" @click.self="dismiss" class="bg-modal bottom-0 fixed h-full flex items-center justify-center left-0 modal right-0 top-0 w-full z-30">
      <div :class="classes" class="bg-white p-2 rounded min-h-modal min-w-modal max-h-modal max-w-modal flex items-center justify-center">
        <div class="-mt-3 absolute close mr-4 right-0 text-5xl text-white top-0" @click="dismiss">
          &times;
        </div>
        <div>
          <slot />
        </div>
      </div>
    </div>
  </transition>
</template>

<script>
export default {
  name: 'Modal',
  model: {
    prop: 'show',
    event: 'change'
  },

  props: {
    classes: { default: 'text-black', type: String },
    show: { type: Boolean }
  },

  watch: {
    show: {
      immediate: true,
      handler: show => {
        if (show) {
          document.body.style.setProperty('overflow', 'hidden')
        } else {
          document.body.style.removeProperty('overflow')
        }
      }
    }
  },

  created () {
    const listener = document.addEventListener('keydown', e => {
      if (this.show && e.keyCode === 27) {
        this.dismiss()
      }
    })
    this.$once('hook:beforeDestroy', () => {
      document.removeEventListener('keydown', listener)
    })
  },
  methods: {
    dismiss () {
      this.$emit('update:show', !this.show)
    }
  }
}
</script>

<style scoped>
  .bg-modal{
    background-color: rgba(0,0,0,.5) ;
  }
  .min-h-modal{
    min-width: 40vw;
  }
  .min-w-modal{
    min-height: 40vh;
  }
  .max-h-modal{
    max-width: 80vw;
  }
  .max-w-modal{
    max-height: 80vh;
  }
</style>
