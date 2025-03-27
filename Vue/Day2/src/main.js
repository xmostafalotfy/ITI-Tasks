import '../node_modules/bootstrap/dist/css/bootstrap.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'
import router from './routers/index.js'

import Wrapper from './wrapper.vue'

const pinia = createPinia();

createApp(Wrapper).use(pinia).use(router).mount('#app')
import '../node_modules/bootstrap/dist/css/bootstrap.css'
