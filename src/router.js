import { createRouter, createWebHistory } from 'vue-router';
import Home from './components/Acceuil.vue';
import Produit from './components/Produit.vue';
import article from './components/Article.vue';
import Header from './components/Header.vue';


const routes = [
  { path: '/', name: 'Home', component: Home },
  { path: '/article', name: 'article', component: article },
  { path: '/Header', name: 'Header', component: Header },

  { path: '/article', name: 'article', component: article },


  { path: '/produit', name: 'Produit', component: Produit }
];

const router = createRouter({
  history: createWebHistory(),
  routes
});

export default router;