<template>
    <div
        class="container-fluid backdrop-blur-lg lg:pt-6 px-8"
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
        <div class="flex justify-end">
            <BtnSalir></BtnSalir>
        </div>
        <h1
            class="text-center font-medium p-5 py-12 text-5xl md:text-4xl mb-5 drop-shadow-2xl lg:py-6"
        >
            Scape Room
        </h1>
        <div class="flex">
            <div class="w-100 mx-auto md:w-100">
                <div class="relative">
                    <img
                        src="../assets/lab.jpg"
                        class="lg:w-[80vw] rounded-2xl lg:h-[90vh]"
                    />
                    <router-link to="/juego1">
                        <button
                            style="backdrop-filter: blur(20px)"
                            class="flex absolute bottom-[90px] left-[110px] grow rounded-2xl bg-white bg-opacity-20 px-3.5 py-2.5 mb-8 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white md:bottom-[200px] md:left-[200px] lg:bottom-[100px] lg:left-[250px]"
                        >
                            <i
                                ><svg
                                    ref="juego1"
                                    :class="{ check: store.juego1 }"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 16 12"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="4"
                                        d="M1 5.917 5.724 10.5 15 1.5"
                                    /></svg></i
                            ><span>Game 1</span>
                        </button>
                    </router-link>
                    <router-link to="/juego2">
                        <button
                            ref="juego2"
                            style="backdrop-filter: blur(20px)"
                            class="flex absolute bottom-20 right-20 grow rounded-2xl bg-white bg-opacity-20 px-3.5 py-2.5 mb-8 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white md:bottom-[300px] lg:bottom-[200px]"
                        >
                            <i
                                ><svg
                                    :class="{ check: store.juego2 }"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 16 12"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="4"
                                        d="M1 5.917 5.724 10.5 15 1.5"
                                    /></svg
                            ></i>
                            <span>Game 2</span>
                        </button>
                    </router-link>
                    <router-link to="/juego3">
                        <button
                            ref="juego3"
                            style="backdrop-filter: blur(20px)"
                            class="flex absolute bottom-32 left-2 grow rounded-2xl bg-white bg-opacity-20 px-3.5 py-2.5 mb-8 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white md:bottom-72 lg:bottom-[180px]"
                        >
                            <i
                                ><svg
                                    :class="{ check: store.juego3 }"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 16 12"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="4"
                                        d="M1 5.917 5.724 10.5 15 1.5"
                                    /></svg
                            ></i>
                            <span>Game 3</span>
                        </button>
                    </router-link>
                    <router-link to="/juego4">
                        <button
                            ref="juego4"
                            style="backdrop-filter: blur(20px)"
                            class="flex absolute bottom-32 right-32 grow rounded-2xl bg-white bg-opacity-20 px-3.5 py-2.5 mb-8 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-200 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white md:bottom-36 md:right-44 lg:right-80"
                        >
                            <i
                                ><svg
                                    :class="{ check: store.juego4 }"
                                    aria-hidden="true"
                                    xmlns="http://www.w3.org/2000/svg"
                                    fill="none"
                                    viewBox="0 0 16 12"
                                >
                                    <path
                                        stroke="currentColor"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        stroke-width="4"
                                        d="M1 5.917 5.724 10.5 15 1.5"
                                    /></svg
                            ></i>
                            <span>Game 4</span>
                        </button>
                    </router-link>
                </div>
            </div>
        </div>
        <!--footer-->
        <div class="w-100 py-5 pt-12 max-sm:max-w-xl max-sm:mx-auto max-sm:m-6">
            <!-- aqui va el footer -->
            <Footer></Footer>
        </div>
    </div>
    <button @click="activacheck">cambiar check</button>
</template>

<script setup>
import Footer from "../components/Footer.vue";
import BtnSalir from "../components/BtnSalir.vue";
import { useCheckStore } from "../store/checkState";
import { useLoginStore } from "../store/LoginStore";

const store = useCheckStore();
const storeLogin = useLoginStore();
</script>
<style scoped>
.check {
    width: 3rem;
    height: 1rem;
    color: rgb(89, 240, 89);
}
</style>
