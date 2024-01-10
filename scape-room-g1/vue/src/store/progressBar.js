import { defineStore} from 'pinia';

export const useProgressBarStore=defineStore('progressbar',{
    state:()=>{
        return{
            contador:1,
            fallo1:false,
            fallo2:false,
            fallo3:false,
            fallo4:false,
            fallo5:false,
            inicio1:true,
            inicio2:true,
            inicio3:true,
            inicio4:true,
            inicio5:true
        }
    },
    getters:{

    },
    actions:{
        insertaFallo1(){
            this.inicio1=false;
            this.fallo1=true;
            this.incrementafallo();
        },
        insertaFallo2(){
            this.inicio2=false;
            this.fallo2=true;
            this.incrementafallo();
        },
        insertaFallo3(){
            this.inicio3=false;
            this.fallo3=true;
            this.incrementafallo();
        },
        insertaFallo4(){
            this.inicio4=false;
            this.fallo4=true;
            this.incrementafallo();
        },
        insertaFallo5(){
            this.inicio5=false;
            this.fallo5=true;
            setTimeout(() => {
                        this.contador=1;
                        this.fallo1=false;
                        this.inicio1=true;
                        this.fallo2=false;
                        this.inicio2=true;
                        this.fallo3=false;
                        this.inicio3=true;
                        this.fallo4=false;
                        this.inicio4=true;
                        this.fallo5=false;
                        this.inicio5=true;
            }, 400);
        },
        incrementafallo(){
            this.contador++;
        }
    }
});
