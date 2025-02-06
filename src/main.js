
import { createApp } from 'vue'
import App from './App.vue'
import { createPinia } from 'pinia'
import 'bootstrap/dist/css/bootstrap.min.css';
import { library } from '@fortawesome/fontawesome-svg-core'
import { faFacebook, faTwitter, faTiktok, faInstagram } from '@fortawesome/free-brands-svg-icons'
import { faUser,faShoppingBasket  } from '@fortawesome/free-solid-svg-icons';
import router from './router.js';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'



library.add(faUser, faFacebook, faTwitter, faTiktok, faInstagram, faShoppingBasket)
const app = createApp(App)
app.component('font-awesome-icon', FontAwesomeIcon)

app.use(createPinia())
   .use(router) 
app.mount('#app')
