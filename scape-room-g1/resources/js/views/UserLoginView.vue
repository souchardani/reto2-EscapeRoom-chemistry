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
        <div class="grid gap-8 lg:grid-cols-2 place-items-center p-4 mt-44">
            <UserLogin></UserLogin><!--Componente para logearse-->
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
                >
                    Invitado
                </button>
            </div>
        </div>
        <Footer></Footer>
    </div>
</template>

<script>
import Footer from "../components/Footer.vue";
import UserLogin from "../components/UserLogin.vue"
export default {
    components: {
        Footer,UserLogin
    },
};
</script>
