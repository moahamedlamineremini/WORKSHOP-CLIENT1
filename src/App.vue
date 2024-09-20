<script setup>
import Footer from './components/Footer.vue'
import Header from './components/Header.vue'
import Acceuil from './components/Acceuil.vue'
import { RouterView } from 'vue-router';
</script>

<template>
   <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Press+Start+2P&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Bayon&display=swap" rel="stylesheet">
  
  <header>

      <Header />
  </header>

  <main>
   <router-view/>
  </main>
  <footer>
    <Footer/>
  </footer>
</template>

<style scoped>
body{
  color: black;
  margin: 0;}


</style>./components/Footer.vue
