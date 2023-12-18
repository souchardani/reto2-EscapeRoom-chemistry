<template>
    <div class="bg-gray-800 p-4 rounded-lg inline-block m-5 w-11/12">
        <div
            class="flex items-center gap-3 flex-col justify-center font-bold text-white"
        >
            <h1 class="text-4xl">Tiempo restante</h1>
            <div class="text-6xl bg-[#131921] rounded-full px-9 py-2">
                <span>{{ minutes }}</span>
                <span>:</span>
                <span>{{ seconds }}</span>
            </div>
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
