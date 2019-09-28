<template>
  <div>
    <!--Footer-->
    <footer class="bg-white">
      <div class="container mx-auto  px-8">
        <div class="w-full flex flex-col md:flex-row py-6">
          <div class="flex-1 mb-6">
            <a class="text-teal-600 no-underline hover:no-underline font-bold text-2xl lg:text-4xl" href="#">
              <!--Icon from: http://www.potlabicons.com/ -->
              Just book It
            </a>
          </div>

          <div class="flex-1">
            <p class="uppercase text-gray-500 md:mb-6">
              Links
            </p>
            <links class="flex flex-col" colors="text-black-900" color="hover:text-teal-500" />
          </div>
          <div class="flex-1">
            <p class="uppercase text-gray-500 md:mb-6">
              Legal
            </p>
            <ul class="list-reset mb-6">
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="#" class="no-underline text-gray-800 hover:text-teal-500">Terms</a>
              </li>
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="#" class="no-underline text-gray-800 hover:text-teal-500">Privacy</a>
              </li>
            </ul>
          </div>
          <div class="flex-1">
            <p class="uppercase text-gray-500 md:mb-6">
              Social
            </p>
            <ul class="list-reset mb-6">
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="#" class="no-underline text-gray-800 hover:text-teal-500">Facebook</a>
              </li>
              <li class="mt-2 inline-block mr-2 md:block md:mr-0">
                <a href="#" class="no-underline text-gray-800 hover:text-teal-500">Instagram</a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </footer>
  </div>
</template>

<script>
import Links from '../../components/Links'
export default {
  components: { Links }
}
</script>
