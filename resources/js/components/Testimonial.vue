<template>
  <div class="w-full md:w-1/3 p-6 flex flex-col flex-grow flex-shrink">
    <div class="flex-1 bg-gray-100 rounded-t rounded-b-none overflow-hidden shadow">
      <a href="#" class="flex flex-wrap no-underline hover:no-underline">
        <p class="text-gray-800 italic text-base px-6 pt-4 mb-5">
          <slot />
        </p>
      </a>
    </div>
    <div class="flex">
      <p class="mt-2">
        <slot name="author" />
      </p>
    </div>
  </div>
</template>

<script>
export default {
    name: 'Testimonial'
}
</script>
