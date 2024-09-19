import { createRouter, createWebHistory } from 'vue-router';
import Home from './components/Acceuil.vue';
import Produit from './components/Produit.vue';

const routes = [
  { path: '/', name: 'Home', component: Home },
  { path: '/produit', name: 'Produit', component: Produit }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;
