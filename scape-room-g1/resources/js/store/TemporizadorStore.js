import { defineStore } from "pinia";

export const useTemporizadorStore = defineStore("TemporizadorStore", {
    state: () => {
        return {
            tiempo: 0,
            temporizador: null,
            totalTime: 1800,
            currentTime: 1800,
            temporizadorCuentaAtras: null,
            showModal: false,
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
        getTiempoLaravel() {
            clearInterval(this.temporizador);
            return `00:${this.minutos}:${this.segundos}`;
        },
        saberTiempoXdificultad(dificultad, menosT) {
            switch (dificultad) {
                case "Facil":
                    menosT = 300;
                    return menosT;
                case "Normal":
                    menosT = 420;
                    return menosT;
                case "Dificil":
                    menosT = 720;
                    return menosT;
            }
        },
        reduceTime(seconds) {
            // Asegúrate de que no reduzca el tiempo por debajo de cero
            this.currentTime = Math.max(0, this.currentTime - seconds);
        },
        iniciarCuentaAtras() {
            // Inicializar el temporizador
            this.temporizadorCuentaAtras = setInterval(() => {
                if (this.currentTime > 0) {
                    this.finalizado = false;
                    this.currentTime--;
                }
                if (this.currentTime == 0) {
                    this.showModal = true;
                }
            }, 1000);
        },
        detenerCuentaAtras() {},
        reiniciarEstadoTiempo() {
            this.tiempo = 0;
            clearInterval(this.temporizador);
            this.temporizador = null;
            this.totalTime = 1800;
            this.currentTime = 1800;
            clearInterval(this.temporizadorCuentaAtras);
            this.temporizadorCuentaAtras = null;
            this.showModal = false;
        },
    },
});
