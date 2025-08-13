<script setup>
import { RouterLink, RouterView } from "vue-router";
import { ref } from "vue";

const isMenuOpen = ref(false);

const toggleMenu = () => {
  isMenuOpen.value = !isMenuOpen.value;
};
</script>

<template>
  <header class="bg-black shadow-lg">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
      <div class="flex justify-between items-center h-16">
        <!-- Logo/Brand (optional) -->
        <div class="flex-shrink-0">
          <RouterLink to="/" class="text-xl font-semibold text-white"> Brand </RouterLink>
        </div>

        <!-- Desktop Navigation -->
        <nav class="hidden md:flex space-x-8">
          <RouterLink to="/" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors duration-200"> Home </RouterLink>
          <RouterLink to="/test" class="text-gray-300 hover:text-white px-3 py-2 text-sm font-medium transition-colors duration-200"> Test </RouterLink>
        </nav>

        <!-- Mobile menu button -->
        <div class="md:hidden">
          <button @click="toggleMenu" class="text-gray-300 hover:text-white focus:outline-none focus:text-white p-2">
            <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path v-if="!isMenuOpen" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
              <path v-else stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>
      </div>

      <!-- Mobile Navigation Menu -->
      <div v-if="isMenuOpen" class="md:hidden">
        <nav class="px-2 pt-2 pb-3 space-y-1 border-t border-gray-700">
          <RouterLink to="/" @click="toggleMenu" class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-gray-800 rounded-md text-base font-medium transition-colors duration-200"> Home </RouterLink>
          <RouterLink to="/test" @click="toggleMenu" class="block px-3 py-2 text-gray-300 hover:text-white hover:bg-gray-800 rounded-md text-base font-medium transition-colors duration-200"> Test </RouterLink>
        </nav>
      </div>
    </div>
  </header>

  <main>
    <RouterView />
  </main>
</template>
