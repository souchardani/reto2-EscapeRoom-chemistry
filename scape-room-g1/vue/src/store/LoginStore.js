import { defineStore } from "pinia";

export const useLoginStore = defineStore("LoginStore", {
    state: () => {
        return {
            usuario: {
                nick: null,
                dificultad: null,
                iniciado: false,
                terminado: false,
                salirAntesDeTiempo: false,
            },
        };
    },
    getters: {},
    actions: {},
});
