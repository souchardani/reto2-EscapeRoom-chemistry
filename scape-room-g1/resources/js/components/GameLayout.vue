<template>
    <div
        class="relative container-fluid min-h-screen px-8 p-3 md:px-20"
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
        <!--Boton de salir-->
        <div class="flex justify-between item-center">
            <div class="flex gap-2 items-center">
                <img
                    src="data:image/png;base64,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"
                    class="rounded-full w-8 h-8 border border-gray-500"
                />
                <span class="text-sm font-semibold">{{ usuario.nick }}</span>
            </div>
            <BtnSalir></BtnSalir>
        </div>
        <!--titulo del juego-->
        <GameTitle :texto="titulo"></GameTitle>
        <!--Descripcion del juego-->
        <DescripcionJuego :texto="descripcion"></DescripcionJuego>
        <!--Reloj del juego-->
        <Reloj></Reloj>
        <!--barra de progreso-->
        <ProgressBar></ProgressBar>
        <!--juego-->
        <router-view></router-view>
        <!-- Modal al terminar el tiempo -->
        <ModalFailGame :showModal="showModal" @cerrar-modal="closeModalTime" />
    </div>
</template>
<script>
import DescripcionJuego from "./DescripcionJuego.vue";
import ProgressBar from "./ProgressBar.vue";
import Reloj from "./Reloj.vue";
import GameTitle from "./GameTitle.vue";
import BtnSalir from "./BtnSalir.vue";
import ModalFailGame from "../components/modals/ModalFailGame.vue";
import { useTemporizadorStore } from "../store/TemporizadorStore";
import { useLoginStore } from "../store/LoginStore";
import { useCheckStore } from "../store/checkState";
import { mapWritableState, mapActions } from "pinia";
import { useProgressBarStore } from "../store/progressBar";

export default {
    methods: {
        ...mapActions(useTemporizadorStore, ["reiniciarEstadoTiempo"]),
        ...mapActions(useLoginStore, ["resetUser", "getUsuario"]),
        // ...mapWritableState(useLoginStore, ["getUsuario"]),
        ...mapActions(useCheckStore, ["resetSetState"]),
        ...mapActions(useProgressBarStore, ["resetState"]),
        closeModalTime() {
            //reinicamos los valores de usuario
            this.resetUser();
            //ponemos el tiempo final de nuevo a 0
            this.reiniciarEstadoTiempo();
            //reiciamos el setState
            this.resetSetState();
            this.resetState();
            console.log(this.getUsuario());
            this.$router.push("login");
        },
    },
    components: {
        DescripcionJuego,
        ProgressBar,
        Reloj,
        GameTitle,
        BtnSalir,
        ModalFailGame,
    },
    computed: {
        titulo() {
            // Accede al título desde la ruta activa
            return this.$route.meta.title || "Default Title";
        },
        descripcion() {
            // Accede a la descripción desde la ruta activa
            return this.$route.meta.description || "Default Description";
        },
        ...mapWritableState(useTemporizadorStore, ["showModal"]),
        ...mapWritableState(useLoginStore, ["registrado", "usuario"]),
    },
};
</script>
