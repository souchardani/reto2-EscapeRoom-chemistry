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
            this.$refs.relojContador.reduceTime(60); // Reducir 1 minuto (60 segundos)
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
