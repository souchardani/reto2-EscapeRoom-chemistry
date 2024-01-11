<template>
    <div
        @click="finishBeforeTimeGame()"
        class="rounded-2xl bg-white bg-opacity-40 px-5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-red-500 hover:text-white cursor-pointer focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
        style="backdrop-filter: blur(20px)"
    >
        Salir
    </div>
</template>

<script>
import { useTemporizadorStore } from "../store/TemporizadorStore";
import { useLoginStore } from "../store/LoginStore";
import { mapWritableState, mapActions } from "pinia";
export default {
    data() {
        return {};
    },
    methods: {
        ...mapActions(useTemporizadorStore, ["reiniciarEstadoTiempo"]),
        ...mapActions(useLoginStore, ["resetUser", "getUsuario"]),
        finishBeforeTimeGame() {
            const salir = confirm(
                "¿Estás seguro de que quieres salir del juego? Esto hará que pierdas la partida, eliminando tu progreso, y tendrás que volver a empezar."
            );
            if (salir) {
                //reinicamos los valores de usuario
                this.resetUser();
                //ponemos el tiempo final de nuevo a 0
                this.reiniciarEstadoTiempo();
                this.$router.push("/login");
                console.log(this.getUsuario());
            }
        },
    },
    computed: {},
};
</script>
