import { createApp } from 'vue'
import 'bootstrap/dist/css/bootstrap.min.css'
import 'bootstrap/dist/js/bootstrap.bundle.min.js'
import App from './App.vue'
import { createPinia } from 'pinia'
import { library } from '@fortawesome/fontawesome-svg-core'
import { faFacebook, faTwitter, faTiktok, faInstagram } from '@fortawesome/free-brands-svg-icons'
import { faUser,faShoppingBasket, faArrowUp  } from '@fortawesome/free-solid-svg-icons';
import router from './router.js';
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'



// Ajoute les icônes à la bibliothèque
library.add(faUser, faFacebook, faTwitter, faTiktok, faInstagram, faShoppingBasket, faArrowUp)
const app = createApp(App)
app.component('font-awesome-icon', FontAwesomeIcon)

app.use(createPinia()).use(router)

app.mount('#app')
