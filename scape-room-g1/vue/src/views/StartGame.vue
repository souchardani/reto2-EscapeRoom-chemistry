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
            class="text-center font-medium text-5xl md:text-4xl mb-5 drop-shadow-2xl lg:pb-2"
        >
            Scape Room
        </h1>
        <h2></h2>
        <div class="flex">
            <!-- <button @click="storeTemporizador.reiniciarEstadoTiempo()">
                resetear contador
            </button> -->
            <div class="w-100 mx-auto md:w-100">
                <div class="relative">
                    <img
                        src="../assets/labsharp.jpg"
                        class="lg:w-[80vw] rounded-2xl lg:h-[90vh]"
                    />
                    <!-- reloj -->
                    <div
                        class="bottom-[300px] md:bottom-[600px] m-auto w-4/5 md:w-1/2 text-justify relative px-8 py-2 bg-white shadow-lg rounded-3xl sm:rounded-3xl bg-clip-padding bg-opacity-30 border border-gray-200 mb-3"
                        style="backdrop-filter: blur(20px)"
                    >
                        <h1
                            class="text-center font-medium text-2xl md:text-4xl pb-2 drop-shadow-2xl text-red-500"
                        >
                            Te quedan {{ storeTemporizador.minutes }}:{{
                                storeTemporizador.seconds
                            }}
                        </h1>
                    </div>
                    <router-link :to="!store.juego1 ? '/juego1' : ''">
                        <button
                            @click="handleModal(store.juego1)"
                            style="backdrop-filter: blur(20px)"
                            :class="[
                                'bg-green-400',
                                'flex',
                                'absolute',
                                'bottom-[110px]',
                                'left-[110px]',
                                'grow',
                                'rounded-2xl',
                                'bg-opacity-60',
                                'px-3.5',
                                'py-2.5',
                                'mb-8',
                                'text-sm',
                                'font-semibold',
                                'text-gray-900',
                                'shadow-sm',
                                'hover:bg-gray-200',
                                'focus-visible:outline',
                                'focus-visible:outline-2',
                                'focus-visible:outline-offset-2',
                                'focus-visible:outline-white',
                                'md:bottom-[200px]',
                                'md:left-[200px]',
                                'lg:bottom-[150px]',
                                'lg:left-[390px]',
                            ]"
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
                            ><span>1</span>
                        </button>
                    </router-link>
                    <router-link
                        :to="store.juego1 && !store.juego2 ? '/juego2' : ''"
                    >
                        <button
                            @click="handleModal(store.juego2, store.juego1)"
                            ref="juego2"
                            style="backdrop-filter: blur(20px)"
                            :class="[
                                {
                                    // isDisabled: store.activarJuego2,
                                    'bg-red-400': !store.juego1,
                                    'bg-green-400':
                                        store.juego1 || store.juego2,
                                },
                                'flex',
                                'absolute',
                                'bottom-20',
                                'right-20',
                                'grow',
                                'rounded-2xl',
                                'bg-opacity-60',
                                'px-3.5',
                                'py-2.5',
                                'mb-8',
                                'text-sm',
                                'font-semibold',
                                'text-gray-900',
                                'shadow-sm',
                                'hover:bg-gray-200',
                                'focus-visible:outline',
                                'focus-visible:outline-2',
                                'focus-visible:outline-offset-2',
                                'focus-visible:outline-white',
                                'md:bottom-[300px]',
                                'lg:bottom-[400px]',
                            ]"
                        >
                            <i
                                ><svg
                                    :class="{
                                        check: store.juego2,
                                    }"
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
                            <span>2</span>
                        </button>
                    </router-link>
                    <router-link
                        :to="store.juego2 && !store.juego3 ? '/juego3' : ''"
                    >
                        <button
                            @click="handleModal(store.juego3, store.juego2)"
                            ref="juego3"
                            style="backdrop-filter: blur(20px)"
                            :class="[
                                {
                                    // 'pointer-events-none': store.activarJuego3,
                                    'bg-red-400': !store.juego2,
                                    'bg-green-400':
                                        store.juego2 || store.juego3,
                                },
                                'flex',
                                'absolute',
                                'bottom-32',
                                'left-2',
                                'grow',
                                'rounded-2xl',
                                'bg-opacity-60',
                                'px-3.5',
                                'py-2.5',
                                'mb-8',
                                'text-sm',
                                'font-semibold',
                                'text-gray-900',
                                'shadow-sm',
                                'hover:bg-gray-200',
                                'focus-visible:outline',
                                'focus-visible:outline-2',
                                'focus-visible:outline-offset-2',
                                'focus-visible:outline-white',
                                'md:bottom-72',
                                'lg:bottom-[300px]',
                            ]"
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
                            <span>3</span>
                        </button>
                    </router-link>
                    <router-link
                        :to="store.juego3 && !store.juego4 ? '/juego4' : ''"
                    >
                        <button
                            @click="handleModal(store.juego3, store.juego4)"
                            ref="juego4"
                            style="backdrop-filter: blur(20px)"
                            :class="[
                                {
                                    'bg-red-400': !store.juego3,
                                    'bg-green-400':
                                        store.juego3 || store.juego4,
                                },
                                'flex',
                                'absolute',

                                'bottom-32',
                                'right-32',
                                'grow',
                                'rounded-2xl',
                                'bg-opacity-60',
                                'px-3.5',
                                'py-2.5',
                                'mb-8',
                                'text-sm',
                                'font-semibold',
                                'text-gray-900',
                                'shadow-sm',
                                'hover:bg-gray-200',
                                'focus-visible:outline',
                                'focus-visible:outline-2',
                                'focus-visible:outline-offset-2',
                                'focus-visible:outline-white',
                                'md:bottom-36',
                                'md:right-44',
                                'lg:right-[300px]',
                                'lg:bottom-[210px]',
                            ]"
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
                            <span>4</span>
                        </button>
                    </router-link>
                </div>
            </div>
        </div>
        <!--footer-->
        <div class="w-100 py-2 max-sm:max-w-xl max-sm:mx-auto max-sm:m-6">
            <!-- aqui va el footer -->
            <Footer></Footer>
        </div>
        <!--modal-->
        <ModalStartGame
            @close="showModal = false"
            :showModal="showModal"
            :bgColor="background"
            :titulo="titulo"
            :texto="descripcion"
        ></ModalStartGame>
    </div>
</template>

<script setup>
import Footer from "../components/Footer.vue";
import BtnSalir from "../components/BtnSalir.vue";
import { useCheckStore } from "../store/checkState";
import { useLoginStore } from "../store/LoginStore";
import Reloj from "../components/Reloj.vue";
import { useTemporizadorStore } from "../store/TemporizadorStore";
import { mapWritableState, mapActions } from "pinia";
import { ref } from "vue";
import { reactive, computed } from "vue";
import ModalStartGame from "../components/modals/ModalStartGame.vue";

const store = useCheckStore();
const storeLogin = useLoginStore();
const storeTemporizador = useTemporizadorStore();

const titulo = ref();
const descripcion = ref();
const background = ref();

const obtenerRojo = (juegoActual, juegoPrevio) => {
    if (juegoPrevio) {
        return false;
    } else {
        return true;
    }
};

const showModal = ref(false);

const handleModal = (terminado, juegoPrevio = null) => {
    if (juegoPrevio == null) {
        if (terminado) {
            titulo.value = "Juego completado";
            descripcion.value =
                "Ya has completado este juego, no puedes volver a entrar";
            background.value = "bg-green-400";
            showModal.value = !showModal.value;
        }
    } else {
        if (terminado) {
            titulo.value = "Juego completado";
            descripcion.value =
                "Ya has completado este juego, no puedes volver a entrar";
            background.value = "bg-green-400";
            showModal.value = !showModal.value;
        } else if (!juegoPrevio) {
            titulo.value = "Juego no disponible";
            descripcion.value =
                "Para poder acceder a este juego, debes completar el anterior";
            background.value = "bg-red-400";
            showModal.value = !showModal.value;
        }
    }
};
</script>
<style scoped>
.check {
    width: 3rem;
    height: 1rem;
    color: rgb(89, 240, 89);
}
</style>
