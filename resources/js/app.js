import { createApp } from "vue";
import App from "./App.vue";
import router from "./Router";

require('./bootstrap');

const app = createApp(App);
app.use(router);
app.mount("#vue-app");
