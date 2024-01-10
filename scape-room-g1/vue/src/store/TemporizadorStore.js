import { defineStore } from "pinia";

export const useTemporizadorStore = defineStore("TemporizadorStore", {
    state: () => {
        return {
            tiempo: 0,
            temporizador: null,
            totalTime: 1800,
            currentTime: 1800,
        };
    },
    getters: {
        minutos(state) {
            return Math.floor(state.tiempo / 60);
        },
        segundos(state) {
            return state.tiempo % 60;
        },
        minutes(state) {
            return String(Math.floor(state.currentTime / 60)).padStart(2, "0");
        },
        seconds(state) {
            return String(state.currentTime % 60).padStart(2, "0");
        },
    },
    actions: {
        iniciarTemporizador() {
            this.temporizador = setInterval(() => {
                this.tiempo++;
            }, 1000);
        },
        detenerTemporizador() {
            clearInterval(this.temporizador);
        },
        getTiempo() {
            return `${this.minutos} minutos, ${this.segundos} segundos`;
        },
        reduceTime(seconds) {
            // Asegúrate de que no reduzca el tiempo por debajo de cero
            this.currentTime = Math.max(0, this.currentTime - seconds);
        },
        iniciarCuentaAtras() {
            // Inicializar el temporizador
            setInterval(() => {
                if (this.currentTime > 0) {
                    this.currentTime -= 1;
                } else {
                    // Puedes agregar lógica aquí cuando el tiempo llega a cero
                    alert("el juego ha terminado");
                }
            }, 1000);
        },
    },
});
