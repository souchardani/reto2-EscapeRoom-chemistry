import { defineStore } from "pinia";

export const useCheckStore = defineStore("checkState", {
    //variables
    state: () => {
        return {
            juego1: false,
            juego2: false,
            juego3: false,
            juego4: false,
        };
    },
    //propiedades computadas
    getters: {},
    //metodos o setters
    actions: {
        changeJuego1() {
            this.juego1 = true;
        },
        changeJuego2() {
            this.juego2 = true;
        },
        changeJuego3() {
            this.juego3 = true;
        },
        changeJuego4() {
            this.juego4 = true;
        },
        resetSetState() {
            this.juego1 = false;
            this.juego2 = false;
            this.juego3 = false;
            this.juego4 = false;
        },
    },
});
