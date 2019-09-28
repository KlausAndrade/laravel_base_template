<template>
  <div ref="card" />
</template>

<script>

let stripe = Stripe(process.env.MIX_STRIPE)
let elements = stripe.elements()
let card = undefined

export default {
    mounted: function () {
        card = elements.create('card')
        card.mount(this.$refs.card)
    },

    purchase: function () {
        stripe.createToken(card).then(function (result) {
            // Access the token with result.token
        })
    }
}
</script>

<style scoped>
  /**
   * The CSS shown here will not be introduced in the Quickstart guide, but shows
   * how you can use CSS to style your Element's container.
   */
  .StripeElement {
    box-sizing: border-box;

    height: 40px;

    padding: 10px 12px;

    border: 1px solid transparent;
    border-radius: 4px;
    background-color: white;

    box-shadow: 0 1px 3px 0 #e6ebf1;
    -webkit-transition: box-shadow 150ms ease;
    transition: box-shadow 150ms ease;
  }

  .StripeElement--focus {
    box-shadow: 0 1px 3px 0 #cfd7df;
  }

  .StripeElement--invalid {
    border-color: #fa755a;
  }

  .StripeElement--webkit-autofill {
    background-color: #fefde5 !important;
  }
</style>
