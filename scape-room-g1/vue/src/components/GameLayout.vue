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
        <div class="flex justify-end">
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

export default {
    methods: {
        ...mapActions(useTemporizadorStore, ["reiniciarEstadoTiempo"]),
        ...mapActions(useLoginStore, ["resetUser", "getUsuario"]),
        // ...mapWritableState(useLoginStore, ["getUsuario"]),
        ...mapActions(useCheckStore, ["resetSetState"]),
        closeModalTime() {
            //reinicamos los valores de usuario
            this.resetUser();
            //ponemos el tiempo final de nuevo a 0
            this.reiniciarEstadoTiempo();
            //reiciamos el setState
            this.resetSetState();
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
    },
};
</script>
