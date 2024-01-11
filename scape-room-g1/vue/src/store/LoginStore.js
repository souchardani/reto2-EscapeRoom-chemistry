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
    actions: {
        setUsuario(nick, dificultad) {
            this.usuario.nick = nick;
            this.usuario.dificultad = dificultad;
            this.usuario.iniciado = true;
        },
        setTerminado() {
            this.usuario.terminado = true;
        },
        setSalirAntesDeTiempo() {
            this.usuario.salirAntesDeTiempo = true;
        },
        reset() {
            this.usuario.nick = null;
            this.usuario.dificultad = null;
            this.usuario.iniciado = false;
            this.usuario.terminado = false;
            this.usuario.salirAntesDeTiempo = false;
        },
    },
});
