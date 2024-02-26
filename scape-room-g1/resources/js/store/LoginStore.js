import { defineStore } from "pinia";

export const useLoginStore = defineStore("LoginStore", {
    state: () => {
        return {
            usuario: {
                nick: null,
                dificultad: null,
                password: null,
                iniciado: false,
                terminado: false,
                salirAntesDeTiempo: false,
                id: null, //para hacer la insercion en la base de datos y que tenga relacion con la tabla ranking y jugadores
            },
            registrado: {
                name: null,
                logeado: false,
                id: null,
            },
        };
    },
    getters: {},
    actions: {
        setUsuario(nick, dificultad, id) {
            this.usuario.nick = nick;
            this.usuario.dificultad = dificultad;
            this.usuario.iniciado = true;
            this.usuario.id = id;
        },
        setTerminado() {
            this.usuario.terminado = true;
        },
        setSalirAntesDeTiempo() {
            this.usuario.salirAntesDeTiempo = true;
        },
        resetUser() {
            this.usuario.nick = null;
            this.usuario.dificultad = null;
            this.usuario.iniciado = false;
            this.usuario.terminado = false;
            this.usuario.salirAntesDeTiempo = false;
            this.usuario.id = null;
        },
        getUsuario() {
            return this.usuario;
        },
        editUsuarioRegistrado(usuario) {
            this.registrado.name = usuario.name;
            this.registrado.nick = usuario.nick;
            this.registrado.password = usuario.password;
        },
    },
});
