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
import StartGame from "../views/StartGame.vue";
import Ranking from "../views/Ranking.vue";

//store with vuex
import store from "../store";

const routes = [
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
            {
                path: "/juego1",
                name: "Juego1",
                component: GameOne,
                meta: {
                    title: "El Rompecabezas de los Elementos",
                    description:
                        "Trabaja tu memoria volteado las tarjetas y juntando las imagenes con los nombres",
                },
            },
            {
                path: "/juego2",
                name: "Juego2",
                component: GameTwo,
                meta: {
                    title: "Agrupando",
                    description:
                        "Demuestra tu conocimiento agrupando los compuestos con sus categorías.",
                },
            },
            {
                path: "/juego3",
                name: "Juego3",
                component: GameThree,
                meta: {
                    title: "El ahorcado",
                    description:
                        "Adivina la palabra oculta antes de que se acabe el tiempo.",
                },
            },
            {
                path: "/juego4",
                name: "Juego4",
                component: GameFour,
                meta: {
                    title: "Cada Oveja con su Pareja",
                    description:
                        "Agrupa los compuestos con sus nombres y formula. Ya estas cerca de conseguir el objetivo, solo tendrás que terminar esta prueba. Deberás responder bie a 10 cuestiones seleccionando las respuestas que estan en el desplegable. Solo se te concederán 5 fallos. Te deseo Suerte!",
                },
            },
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
    {
        path: "/game",
        name: "Game",
        meta: { autenticado: true },
        component: GameLayout,
    },
    {
        path: "/startGame",
        name: "startGame",
        meta: { autenticado: false },
        component: StartGame,
    },
    {
        path: "/ranking",
        name: "Ranking",
        component: Ranking,
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
