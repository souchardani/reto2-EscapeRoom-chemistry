<template>
    <div
        class="relative container-fluid backdrop-blur-lg min-h-screen px-12 p-3"
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
        <!--barra de progreso-->
        <ProgressBar></ProgressBar>
        <!--juego-->
        <router-view></router-view>
        <!--Reloj del juego-->
        <Reloj></Reloj>
    </div>
</template>
<script>
import DescripcionJuego from "./DescripcionJuego.vue";
import ProgressBar from "./ProgressBar.vue";
import Reloj from "./Reloj.vue";
import GameTitle from "./GameTitle.vue";
import BtnSalir from "./BtnSalir.vue";

export default {
    components: { DescripcionJuego, ProgressBar, Reloj, GameTitle, BtnSalir },
    computed: {
        titulo() {
            // Accede al título desde la ruta activa
            return this.$route.meta.title || "Default Title";
        },
        descripcion() {
            // Accede a la descripción desde la ruta activa
            return this.$route.meta.description || "Default Description";
        },
    },
};
</script>
