import { defineStore } from 'pinia'

export const useCheckStore = defineStore('checkState',{
    //variables
    state:()=>{
        return{
        juego1:false,
        juego2:false,
        juego3:false,
        juego4:false,
        activarJuego1:false,
        activarJuego2:true,
        activarJuego3:true,
        activarJuego4:true,
        }
    },
    //propiedades computadas
    getters:{

    },
    //metodos o setters
    actions:{
        changeJuego1(){
            this.juego1=true;
            this.activarJuego2 = false;
            this.activarJuego1 = true;
        },
        changeJuego2(){
            this.juego2=true;
            this.activarJuego3= false;
            this.activarJuego2= true;
        },
        changeJuego3(){
            this.juego3=true;
            this.activarJuego4=false;
            this.activarJuego3=true;
        },
        changeJuego4(){
            this.juego4=true;
        },
    }
});

