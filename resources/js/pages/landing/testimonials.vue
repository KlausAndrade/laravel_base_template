<template>
  <div>
    <section id="recommendations" class="bg-white border-b py-8">
      <div class="container mx-auto flex flex-wrap pt-4 pb-12">
        <h1 class="w-full my-2 text-5xl font-bold leading-tight text-center text-gray-800">
          {{ $t('testimonials') }}
        </h1>
        <div class="w-full mb-4">
          <div class="h-1 mx-auto gradient w-64 opacity-25 my-0 py-0 rounded-t" />
        </div>

        <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
          <div class="flex-1 bg-gray-100 rounded-t rounded-b-none overflow-hidden shadow">
            <a href="#" class="flex flex-wrap no-underline hover:no-underline">
              <p class="text-gray-800 italic text-base px-6 pt-4 mb-5">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at ipsum eu nunc commodo posuere et sit amet ligula.
              </p>
            </a>
          </div>
          <div class="flex">
            <p class="mt-2"><b>Andrade</b>, Klaus</p>
          </div>
        </div>
        <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
          <div class="flex-1 bg-gray-100 rounded-t rounded-b-none overflow-hidden shadow">
            <a href="#" class="flex flex-wrap no-underline hover:no-underline">
              <p class="text-gray-800 italic text-base px-6 pt-4 mb-5">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at ipsum eu nunc commodo posuere et sit amet ligula.
              </p>
            </a>
          </div>
          <div class="flex">
            <p class="mt-2"><b>Doe</b>, John</p>
          </div>
        </div>
        <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
          <div class="flex-1 bg-gray-100 rounded-t rounded-b-none overflow-hidden shadow">
            <a href="#" class="flex flex-wrap no-underline hover:no-underline">
              <p class="text-gray-800 italic text-base px-6 pt-4 mb-5">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam at ipsum eu nunc commodo posuere et sit amet ligula.
              </p>
            </a>
          </div>
          <div class="flex">
            <p class="mt-2"><b>Doe</b>, Jane</p>
          </div>
        </div>

      </div>
    </section>
  </div>
</template>

<script>
export default {}
</script>
