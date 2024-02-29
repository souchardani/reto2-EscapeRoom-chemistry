<template>
    <div
        class="container-fluid backdrop-blur-lg min-h-screen px-2 p-2 pt-8 md:px-12 md:p-8 overflow-hidden"
        style="
            background-color: rgb(88, 28, 135);
            background-image: radial-gradient(
                    at 86% 61%,
                    rgb(190, 24, 93) 0,
                    transparent 57%
                ),
                radial-gradient(
                    at 56% 55%,
                    rgb(52, 211, 153) 0,
                    transparent 28%
                ),
                radial-gradient(
                    at 49% 17%,
                    rgb(34, 211, 238) 0,
                    transparent 75%
                ),
                radial-gradient(at 75% 23%, rgb(30, 64, 175) 0, transparent 73%),
                radial-gradient(
                    at 77% 71%,
                    rgb(252, 211, 77) 0,
                    transparent 25%
                ),
                radial-gradient(
                    at 87% 91%,
                    rgb(139, 92, 246) 0,
                    transparent 81%
                );
        "
    >
        <div>
            <i
                class="ph ph-info text-2xl text-white"
                v-show="!visibilidad"
                @click="info()"
            ></i>
            <div
                id="tarjeta-info"
                v-show="visibilidad"
                class="flex align-center justify-between gap-5 font-medium font-bold text-gray-500 text-sm bg-yellow-100 text-yellow-700 py-8 px-5 rounded-lg relative mr-2"
            >
                <i class="ph ph-info text-2xl"></i>
                <span class="text-left"
                    >Aqui podrás elegir la opcion de jugar de manera invitado.
                    Disfrutarás de toda la extensión del juego, pero tu progreso
                    no se guardará. Si ya dispones de una cuenta, solo necisitas
                    rellenar el nombre de iusuario y contraseña. Si aún no
                    tienes una y quieres disfrutar de la competicion con tus
                    compañeros por una mejor puntuación, Registrate en solo 30
                    segundos!</span
                >
                <i
                    class="ph ph-x absolute top-2 right-2 text-xl hover:scale-125 cursor-pointer"
                    @click="info()"
                ></i>
            </div>
        </div>
        <h1
            class="text-center text-[32px] md:text-[32px] lg:text-[48px] xl:text-[56px] font-bold p-6"
        >
            Escape Room Química
        </h1>
        <div v-if="message" class="flex justify-center">
            <p class="w-1/2 bg-green-300 p-4 rounded-xl text-center">
                {{ message }}
            </p>
        </div>
        <div class="grid gap-8 lg:grid-cols-2 place-items-center p-4">
            <UserLogin></UserLogin
            ><!--Componente para logearse-->
            <div v-show="idioma.find((idioma) => idioma.estado)?.name === 'es'">
                <div
                    class="bg-white opacity-60 rounded-xl p-8 w-[350px] flex flex-col items-center"
                >
                    <h1 class="text-3xl font-bold text-center">
                        Solo quieres Jugar una partida?
                    </h1>
                    <h6 class="p-4 text-center font-semibold text-xl">
                        Puedes jugar como invitado si asi lo deseas, pero tu
                        progreso no se guardará. Ya puedes empezar, suerte!
                    </h6>

                    <button
                        class="bg-gray-400 p-4 rounded-xl hover:bg-gray-300 font-bold"
                        @click="this.$router.push('/login')"
                    >
                        Invitado
                    </button>
                </div>
            </div>
            <div v-show="idioma.find((idioma) => idioma.estado)?.name === 'en'">
                <div
                    class="bg-white opacity-60 rounded-xl p-8 w-[350px] flex flex-col items-center"
                >
                    <h1 class="text-3xl font-bold text-center">
                        Do you only want to play one game?
                    </h1>
                    <h6 class="p-4 text-center font-semibold text-xl">
                        You can play as a guest if you wish, but your progress
                        will not be saved. progress will not be saved. You can
                        start now, good luck!
                    </h6>

                    <button
                        class="bg-gray-400 p-4 rounded-xl hover:bg-gray-300 font-bold"
                        @click="this.$router.push('/login')"
                    >
                        Guest
                    </button>
                </div>
            </div>
            <div v-show="idioma.find((idioma) => idioma.estado)?.name === 'eu'">
                <div
                    class="bg-white opacity-60 rounded-xl p-8 w-[350px] flex flex-col items-center"
                >
                    <h1 class="text-3xl font-bold text-center">
                        Joko bat jokatu nahi duzu
                    </h1>
                    <h6 class="p-4 text-center font-semibold text-xl">
                        Gonbidatu gisa jokatu dezakezu nahi baduzu, baina zuk
                        aurrerapena ez da gordeko. Orain has zaitezke, zorte on!
                    </h6>

                    <button
                        class="bg-gray-400 p-4 rounded-xl hover:bg-gray-300 font-bold"
                        @click="this.$router.push('/login')"
                    >
                        Sartu
                    </button>
                </div>
            </div>
        </div>
        <div class="my-4">
            <Footer></Footer>
        </div>
    </div>
</template>

<script>
import { useHelpStore } from "../store/help";
import Footer from "../components/Footer.vue";
import UserLogin from "../components/UserLogin.vue";
import { useMessageStore } from "../store/SessionMessageStore";
import { mapWritableState, mapActions } from "pinia";
import { useLoginStore } from "../store/LoginStore";
import { useIdioma } from "../store/languages";
export default {
    data() {
        return {
            visibilidad: true,
        };
    },
    components: {
        Footer,
        UserLogin,
    },
    computed: {
        ...mapWritableState(useMessageStore, ["message"]),
        ...mapWritableState(useLoginStore, ["usuario", "registrado"]),
        ...mapWritableState(useIdioma, ["idioma"]),
    },

    methods: {
        info() {
            this.visibilidad = !this.visibilidad;
        },
        ...mapActions(useIdioma, ["cambioIdioma"]),
        ...mapActions(useMessageStore, ["setMessage"]),
    },
};
</script>
