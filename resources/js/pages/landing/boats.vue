<template>
  <div>
    <!--Boats-->
    <div class="pt-6 bg-gray-100">

      <div class=" px-3 mx-auto flex flex-wrap flex-col flex-col-reverse md:flex-row items-center">
        <!--Left Col-->
        <div class="w-full md:w-1/2 py-6 text-center mb-12">
          <svg class="-ml-10 w-full h-auto" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" id="fab417e8-a014-4924-af3a-60c14cbf464e" data-name="Layer 1" width="892.19463" height="746.42928" viewBox="0 0 892.19463 746.42928"><defs><linearGradient id="ba5dc2b7-ca42-4f2e-9a45-768e37a33bc6" x1="231.97829" y1="331.46449" x2="231.97829" y2="18.57072" gradientUnits="userSpaceOnUse"><stop offset="0" stop-color="gray" stop-opacity="0.25"/><stop offset="0.53514" stop-color="gray" stop-opacity="0.12"/><stop offset="1" stop-color="gray" stop-opacity="0.1"/></linearGradient></defs><title>Yacht</title><circle cx="231.97829" cy="175.0176" r="156.44688" fill="url(#ba5dc2b7-ca42-4f2e-9a45-768e37a33bc6)"/><circle cx="231.97829" cy="175.0176" r="146.79226" fill="#ff5252"/><rect x="437.19463" width="14" height="136" fill="#38b2ac"/><rect x="248.19463" y="128" width="398" height="204" fill="#464353"/><g opacity="0.5"><rect x="274.19463" y="169" width="84" height="67" fill="#38b2ac"/><rect x="413.19463" y="169" width="84" height="67" fill="#38b2ac"/><rect x="552.19463" y="169" width="84" height="67" fill="#38b2ac"/></g><path d="M1046.09731,353.78536a396.90116,396.90116,0,0,1-397,397h-477v-397Z" transform="translate(-153.90269 -76.78536)" fill="#464353"/><path d="M1046.09731,353.78536a398.47471,398.47471,0,0,1-7.87,79h-866.13v-79Z" transform="translate(-153.90269 -76.78536)" fill="#38b2ac"/><path d="M956.69729,604.78536a399.35749,399.35749,0,0,1-86.83,79h-697.77v-79Z" transform="translate(-153.90269 -76.78536)" fill="#38b2ac"/><g opacity="0.5"><rect x="51.19463" y="400" width="84" height="67" fill="#38b2ac"/><rect x="190.19463" y="400" width="84" height="67" fill="#38b2ac"/><rect x="329.19463" y="400" width="84" height="67" fill="#38b2ac"/></g><g opacity="0.5"><rect x="465.19463" y="400" width="84" height="67" fill="#38b2ac"/><rect x="604.19463" y="400" width="84" height="67" fill="#38b2ac"/><rect x="743.19463" y="400" width="84" height="67" fill="#38b2ac"/></g><rect y="666.12518" width="748.43423" height="10.70721" rx="5" fill="#38b2ac"/><rect y="686.46888" width="277.31683" height="10.70721" rx="4.99999" fill="#38b2ac"/><rect x="213.07355" y="711.09547" width="277.31683" height="10.70721" rx="4.99999" fill="#38b2ac"/><rect x="444.34936" y="735.72207" width="277.31683" height="10.70721" rx="4.99999" fill="#38b2ac"/><rect x="777.34371" y="666.12518" width="49.25318" height="10.70721" rx="5" fill="#38b2ac"/><rect x="495.74399" y="686.46888" width="49.25318" height="10.70721" rx="4.99999" fill="#38b2ac"/><rect x="70.66761" y="711.09547" width="49.25318" height="10.70721" rx="4.99999" fill="#38b2ac"/><rect x="546.06789" y="711.09547" width="49.25318" height="10.70721" rx="4.99999" fill="#38b2ac"/><rect x="39.61669" y="735.72207" width="277.31683" height="10.70721" rx="4.99999" fill="#38b2ac"/><path d="M605.09731,76.78536s133,5,153,0c0,0-13,25,0,40s-10,28-10,28h-150Z" transform="translate(-153.90269 -76.78536)" fill="#38b2ac"/></svg>
        </div>
        <!--Right Col-->
        <div class="flex flex-col w-full md:w-1/2 justify-center items-start text-center">
          <p class="uppercase tracking-loose w-full">{{$t('boats_heading')}}</p>
          <h1 class="my-4 text-5xl font-bold leading-tight">{{$t('boats_title')}}</h1>
          <p class="leading-normal w-full text-2xl mb-8">{{$t('boats_subheading')}}</p>

          <div class="w-full">
            <button class="mx-auto lg:mx-0 gradient text-white font-bold rounded-full mt-6 mb-12 py-4 px-8 shadow-lg">{{$t('boats_contact')}}</button>
          </div>

        </div>
      </div>
    </div>
  </div>
</template>

<script>
    export default {}
</script>
