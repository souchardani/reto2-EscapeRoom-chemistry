import "../css/app.css";

import { createApp } from "vue";
import { createPinia } from "pinia";
import Index from "./views/Index.vue";
import router from "./router";
import App from "./App.vue";
import store from "./store";

const app = createApp(App);

const pinia = createPinia();

app.use(pinia);
app.use(store).use(router).mount("#app");

const onConfirmRefresh = function (event) {
    // Obtiene la ruta actual
    const currentPath = window.location.pathname;
    console.log("Ruta actual:", currentPath);
    // Lista de rutas donde se aplicará la lógica de confirmación
    const routesWithConfirmation = [
        "/dashboard",
        "/login",
        "/register",
        "/admin",
        "/profile",
        "/editUser",
    ]; // Reemplaza con las rutas que desees
    // Verifica si la ruta actual está en la lista
    if (
        !routesWithConfirmation.some((prefix) => currentPath.startsWith(prefix))
    ) {
        event.preventDefault();
        event.returnValue =
            "¿Estás seguro de que deseas recargar la página? Se perderá todo tu progreso.";
    }
};
// const onConfirmRefresh = function (event) {
//     event.preventDefault();
//     return (event.returnValue =
//         "Estas seguro que deseas recargar la pagina? perderas todo tu progreso");
// };

window.addEventListener("beforeunload", onConfirmRefresh, { capture: true });

import Alpine from "alpinejs";

window.Alpine = Alpine;

Alpine.start();
