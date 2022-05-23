import { createApp } from "vue";
import App from "./App.vue";
import router from "./Router";

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

require('./bootstrap');

const app = createApp(App);
app.use(router);
app.use(VueSweetalert2);
app.mount("#vue-app");
