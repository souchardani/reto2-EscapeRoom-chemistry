import { defineStore } from 'pinia'

export const useCheckStore = defineStore('checks',{
    state:{
        juego1:false,
        juego2:false,
        juego3:false,
        juego4:false
    },
    getters:{

    },
    actions:{
        changeJuego1(){
            this.juego1=true;
        },
        changeJuego2(){
            this.juego2=true;
        },
        changeJuego3(){
            this.juego3=true;
        },
        changeJuego4(){
            this.juego4=true;
        },
    }

})

