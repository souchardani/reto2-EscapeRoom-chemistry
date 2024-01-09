import { defineStore } from 'pinia'

export const useCheckStore = defineStore('checkState',{
    state:()=>{
        return{
        juego1:false,
        juego2:false,
        juego3:false,
        juego4:false,
        activarJuego2:true,
        }
    },
    getters:{

    },
    actions:{
        changeJuego1(){
            this.juego1=true;
            this.activarJuego2 = false;
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
});

