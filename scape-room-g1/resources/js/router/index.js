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
import EndGame from "../views/EndGame.vue";
import AdminLogin from "../views/AdminLogin.vue";
import StartGame from "../views/StartGame.vue";
import Ranking from "../views/Ranking.vue";
import PruebaDrag from "../views/PruebaDrag.vue";
import ModalStartGame from "../components/modals/ModalStartGame.vue";
import UserloginView from "../views/UserLoginView.vue"
//store with pinia
import { useLoginStore } from "../store/LoginStore";
import pruebas from "../views/pruebas.vue";

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
        path: "/userlogin",
        name: "Userlogin",
        meta: { juegoIniciado: false },
        component: UserloginView,
    },
    {
        path: "/juegos",
        redirect: "/juego1",
        name: "Juego",
        meta: { juegoIniciado: true, requiresAuth: true },
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
                    description: `Demuestra tu conocimiento agrupando los compuestos con sus categorías.\nDebes arrastrar los compuestos a la categoría correspondiente.`,
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
            {
                path: "/juego5",
                name: "Juego5",
                component: EndGame,
                meta: {
                    title: "Resuelve la combinación",
                    description:
                        "Tendras que colocar y completar las pistas que has estado recibiendo. Con el nombre del científico, deberías saber completar el hueco que te falta",
                },
            },
            {
                path: "/pruebas",
                name: "pruebas",
                component: pruebas,
                meta: {
                    title: "Pruebas",
                    description: "pruebas",
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
    // {
    //     path: "/dashboard",
    //     name: "Dashboard",
    //     meta: { autenticado: true },
    //     component: Dashboard,
    // },
    {
        path: "/game",
        name: "Game",
        meta: { autenticado: true },
        component: GameLayout,
    },
    {
        path: "/startGame",
        name: "startGame",
        meta: { autenticado: false, requiresAuth: true },
        component: StartGame,
    },
    {
        path: "/ranking",
        name: "Ranking",
        component: Ranking,
    },
    {
        path: "/test",
        name: "TestJuego2",
        component: ModalStartGame,
    },
];

const router = createRouter({
    history: createWebHistory(),
    routes,
});

router.beforeEach((to, from, next) => {
    const store = useLoginStore();
    if (to.meta.requiresAuth && !store.$state.usuario.nick) {
        next({ name: "Login" });
    } else if (to.name === "Login" && store.$state.usuario.nick) {
        next({ name: "startGame" });
    } else {
        next();
    }
});

export default router;
