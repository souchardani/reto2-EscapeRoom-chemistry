<template>
    <!-- <GameThree />
    <GameFour />
    <GameOne /> -->
    <Reloj ref="relojContador"></Reloj>
    <button class="bg-blue-500 py-2 px-4 rounded-full m-5" @click="reduceTime">
        Reducir tiempo
    </button>
</template>

<script>
import Reloj from "./components/Reloj.vue";

export default {
    components: {
        Reloj,
    },
    methods: {
        reduceTime() {
            this.$refs.relojContador.reduceTime(60); // Reducir 1 minuto (60 segundos)
        },
    },
};
</script>
