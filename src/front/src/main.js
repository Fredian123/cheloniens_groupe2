import { createApp } from 'vue'

import App from '@/App.vue'
import router from "@/router.js"
import "@/main.css"

// Init :

// Main :
createApp(App).use(router).mount("#app")
