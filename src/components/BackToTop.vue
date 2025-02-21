<script setup>
import { ref, onMounted, onUnmounted } from 'vue'

const isVisible = ref(false)

const toggleVisibility = () => {
  isVisible.value = window.scrollY > 300
}

const scrollToTop = () => {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  })
}

onMounted(() => {
  window.addEventListener('scroll', toggleVisibility)
})

onUnmounted(() => {
  window.removeEventListener('scroll', toggleVisibility)
})
</script>

<template>
  <div 
    class="back-to-top" 
    :class="{ 'show': isVisible }"
    @click="scrollToTop"
  >
    <font-awesome-icon :icon="['fas', 'arrow-up']" />
  </div>
</template>

<style scoped>
.back-to-top {
  position: fixed;
  bottom: 30px;
  right: 30px;
  background: linear-gradient(135deg, #8e7ff1, #544297);
  color: white;
  width: 45px;
  height: 45px;
  border-radius: 20%;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  opacity: 0;
  visibility: hidden;
  transform: translateY(20px);
  transition: all 0.3s ease;
  box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
  z-index: 1000;
}

.back-to-top.show {
  opacity: 1;
  visibility: visible;
  transform: translateY(0);
}

.back-to-top:hover {
    transition: all 0.3s ease;
    background: linear-gradient(135deg, #544297, #8e7ff1);
    transform: translateY(-3px);
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
}

@media (max-width: 768px) {
  .back-to-top {
    bottom: 20px;
    right: 20px;
    width: 40px;
    height: 40px;
  }
}
</style>
