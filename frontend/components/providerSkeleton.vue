<template>
  <div class="grid grid-cols-1 lg:grid-cols-3 md:grid-cols-2 gap-6 p-6">
      <div v-for="n in 6" :key="n" class="bg-gray-300 animate-pulse flex items-center rounded-lg p-4  shadow-md">
        <div class="size-14 bg-gray-400 rounded-full aspect-square"></div>
        <div class="flex flex-col justify-center space-y-2 ps-8 w-full">
          <div class="h-4 bg-gray-400 rounded w-3/4"></div>
          <div class="h-4 bg-gray-400 rounded w-1/2"></div>
          <div class="flex items-center space-x-2 mt-1">
            <div class="h-4 bg-gray-400 rounded w-5"></div>
            <div class="h-4 bg-gray-400 rounded w-10"></div>
          </div>
        </div>
      </div>
    </div>
</template>

<script lang="ts" setup>

</script>

<style>

</style>