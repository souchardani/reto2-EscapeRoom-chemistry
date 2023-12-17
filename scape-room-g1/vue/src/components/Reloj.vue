<template>
    <div class="bg-gray-800 p-4 rounded-lg inline-block m-5 w-11/12">
        <div class="flex items-center justify-center">
            <span class="text-6xl font-bold text-white">{{ minutes }}</span>
            <span class="text-6xl font-bold text-white">:</span>
            <span class="text-6xl font-bold text-white">{{ seconds }}</span>
        </div>
    </div>
</template>

<script>
export default {
    data() {
        return {
            totalTime: 1800, // 30 minutos en segundos
            currentTime: 1800, // Tiempo actual en segundos
        };
    },
    computed: {
        minutes() {
            return String(Math.floor(this.currentTime / 60)).padStart(2, "0");
        },
        seconds() {
            return String(this.currentTime % 60).padStart(2, "0");
        },
    },
    methods: {
        reduceTime(seconds) {
            // Asegúrate de que no reduzca el tiempo por debajo de cero
            this.currentTime = Math.max(0, this.currentTime - seconds);
        },
    },
    mounted() {
        // Inicializar el temporizador
        setInterval(() => {
            if (this.currentTime > 0) {
                this.currentTime -= 1;
            } else {
                // Puedes agregar lógica aquí cuando el tiempo llega a cero
            }
        }, 1000);
    },
};
</script>

<style scoped></style>
