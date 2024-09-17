
import { createApp } from 'vue'
import App from './App.vue'
import { createPinia } from 'pinia'
import 'bootstrap/dist/css/bootstrap.min.css';
import { library } from '@fortawesome/fontawesome-svg-core'
import { faFacebook, faTwitter, faTiktok, faInstagram } from '@fortawesome/free-brands-svg-icons'
import faUser from '@fortawesome/fontawesome-free-solid/faUser';

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'



// Ajoute les icônes à la bibliothèque
library.add(faUser,faFacebook, faTwitter, faTiktok, faInstagram)
const app = createApp(App)
app.component('font-awesome-icon', FontAwesomeIcon)

app.use(createPinia())

app.mount('#app')
