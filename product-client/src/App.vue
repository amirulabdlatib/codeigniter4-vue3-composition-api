<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <header>
    <div class="wrapper">
      <nav class="text-blue-500 underline space-x-3 ">
        <RouterLink to="/" class="hover:text-blue-800">Home</RouterLink>
        <RouterLink to="/test" class="hover:text-blue-800">Test</RouterLink>
      </nav>
    </div>
  </header>

  <RouterView />
</template>
