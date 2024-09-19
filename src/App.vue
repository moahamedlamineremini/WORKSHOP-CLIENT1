<script setup>
import HelloWorld from './components/HelloWorld.vue'
import Footer from './components/Footer.vue'
import Header from './components/Header.vue'
import Acceuil from './components/Acceuil.vue'


</script>

<template>

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
