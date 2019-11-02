<template>
  <div>
    <input ref="cardHolderName" type="text">

    <!-- Stripe Elements Placeholder -->
    <div ref="cardElement" />

    <button ref="cardButton">
      Process Payment
    </button>
  </div>
</template>

<script>

let stripe = Stripe(process.env.MIX_STRIPE)
let elements = stripe.elements()
let cardElement

export default {
    mounted: function () {
        cardElement = elements.create('card')
        cardElement.mount(this.$refs.cardElement)

        const cardHolderName = this.$refs.cardHolderName
        const cardButton = this.$refs.cardButton

        cardButton.addEventListener('click', async (e) => {
            const { paymentMethod, error } = await stripe.createPaymentMethod(
                'card', cardElement, {
                    billing_details: { name: cardHolderName.value }
                }
            )

            if (error) {
                // Display "error.message" to the user...
            } else {
                // The card has been verified successfully...
            }
        })
    },

    purchase: function () {
        stripe.createToken(cardElement).then(function (result) {
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
