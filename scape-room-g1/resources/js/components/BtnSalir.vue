<template>
    <div
        @click="showModal = true"
        class="rounded-2xl bg-white bg-opacity-40 px-5 py-1.5 text-sm font-semibold text-gray-900 shadow-sm hover:bg-red-500 hover:text-white cursor-pointer focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
        style="backdrop-filter: blur(20px)"
    >
        Salir
    </div>
    <ModalExit
        @cancelar="showModal = false"
        @close="finishBeforeTimeGame"
        :showModal="showModal"
        bgColor="bg-red-500"
        titulo="Estás seguro de que quieres salir del juego"
        texto="Esto hará que pierdas la partida, eliminando tu progreso, y tendrás que volver a empezar."
    ></ModalExit>
</template>

<script>
import ModalExit from "./modals/ModalExit.vue";
import { useTemporizadorStore } from "../store/TemporizadorStore";
import { useLoginStore } from "../store/LoginStore";
import { useCheckStore } from "../store/checkState";
import { mapWritableState, mapActions } from "pinia";
import { useProgressBarStore } from "../store/progressBar";
export default {
    data() {
        return {
            showModal: false,
        };
    },
    methods: {
        ...mapActions(useTemporizadorStore, ["reiniciarEstadoTiempo"]),
        ...mapActions(useLoginStore, ["resetUser", "getUsuario"]),
        // ...mapWritableState(useLoginStore, ["getUsuario"]),
        ...mapActions(useCheckStore, ["resetSetState"]),
        ...mapActions(useProgressBarStore, ["resetState"]),
        finishBeforeTimeGame() {
            //reinicamos los valores de usuario
            this.resetUser();
            //ponemos el tiempo final de nuevo a 0
            this.reiniciarEstadoTiempo();
            //reiciamos el setState
            this.resetSetState();
            //reniciamos el progressbar
            this.resetState();
            console.log(this.getUsuario());
            this.$router.push("/login");
        },
    },
    computed: {},
    components: {
        ModalExit,
    },
};
</script>
