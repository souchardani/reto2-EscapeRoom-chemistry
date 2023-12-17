import { createRouter, createWebHistory } from "vue-router";
import AdminLayout from "../components/AdminLayout.vue";
import GameLayout from "../components/GameLayout.vue";
import Index from "../views/Index.vue";
import Login from "../views/Login.vue";
import Dashboard from "../views/Dashboard.vue";
import GameOne from "../views/GameOne.vue";
import GameTwo from "../views/GameTwo.vue";
import GameThree from "../views/GameThree.vue";
import GameFour from "../views/GameFour.vue";
import AdminLogin from "../views/AdminLogin.vue";
//store with vuex
import store from "../store";

const routes = [
    ,
    {
        path: "/login",
        name: "Login",
        meta: { juegoIniciado: false },
        component: Login,
    },
    {
        path: "/",
        name: "Index",
        meta: { juegoIniciado: false },
        component: Index,
    },
    {
        path: "/juegos",
        redirect: "/juego1",
        name: "Juego",
        meta: { juegoIniciado: true },
        component: GameLayout,
        children: [
            { path: "/juego1", name: "Juego1", component: GameOne },
            { path: "/juego2", name: "Juego2", component: GameTwo },
            { path: "/juego3", name: "Juego3", component: GameThree },
            { path: "/juego4", name: "Juego4", component: GameFour },
        ],
    },
    {
        path: "/adminLogin",
        name: "adminLogin",
        meta: { autenticado: false },
        component: AdminLogin,
    },
    {
        path: "/dashboard",
        name: "Dashboard",
        meta: { autenticado: true },
        component: Dashboard,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

// router.beforeEach((to, from, next) => {
//     if (to.meta.requiresAuth && !store.state.user.token) {
//         next({ name: "Login" });
//     } else if (store.state.user.token && to.meta.isGuest) {
//         next({ name: "Dashboard" });
//     } else {
//         next();
//     }
// });

export default router;
