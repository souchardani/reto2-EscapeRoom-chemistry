import { createApp } from "vue";
import { createPinia } from "pinia";

import App from "./App.vue";
import "./index.css";
import store from "./store";
import router from "./router";

const app = createApp(App);
const pinia = createPinia();

app.use(pinia);

app.use(store).use(router).mount("#app");
