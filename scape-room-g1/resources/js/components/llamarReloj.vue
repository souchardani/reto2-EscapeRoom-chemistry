<template>
    <Reloj ref="relojContador"></Reloj>
    <button class="bg-blue-500 py-2 px-4 rounded-full m-5" @click="reduceTime">
        Reducir tiempo
    </button>
</template>

<script>
import Reloj from "../components/Reloj.vue";

export default {
    name: "GameTwo",
    data() {
        return {
            // Variables
        };
    },
    methods: {
        reduceTime() {
            this.$refs.relojContador.reduceTime(60); // Reduce el tiempo en segundos
            /* Tiempos
            60  - 1min
            120 - 2mins
            180 - 3mins
            240 - 4mins
            300 - 5mins
            360 - 6mins
            420 - 7mins
            480 - 8mins
            540 - 8mins
            600 - 10mins
            */
        },
    },
    mounted() {
        // Mounted
    },
    components: {
        Reloj,
    },
};
</script>
