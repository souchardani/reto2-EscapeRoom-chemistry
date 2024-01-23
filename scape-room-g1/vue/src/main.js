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

const onConfirmRefresh = function (event) {
    event.preventDefault();
    return (event.returnValue =
        "Estas seguro que deseas recargar la pagina? perderas todo tu progreso");
};

window.addEventListener("beforeunload", onConfirmRefresh, { capture: true });
