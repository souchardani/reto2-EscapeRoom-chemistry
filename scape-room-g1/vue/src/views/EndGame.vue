<template>

    <div class="container-fluid flex mx-4 p-4 justify-center items-center">
        <h1 class="text-4xl font-medium md:text-5xl">{{ this.cientifico }}</h1>
    </div>
    <div class="container-fluid flex justify-center items-center mx-4 p-4">
        <input type="text" id="1" maxlength="1" v-model="words[0].input" :class="['flex','w-[70px]','h-[70px]','md:w-[150px]','md:h-[150px]','xl:w-[200px]','xl:h-[200px]',{'bg-red-500':words[0].estado=='rojo','bg-green-500':words[0].estado=='verde',},{'bg-white': words[0].estado == undefined},'shadow-lg','rounded-3xl','bg-opacity-60','border','border-gray-200','mx-1','md:mx-2,','text-center','justify-center','items-center','my-auto','text-3xl','md:text-5xl','font-medium']" @keyup="comprobarClave(0)">
        <input type="text" id="2" maxlength="1" v-model="words[1].input" :class="['flex','w-[70px]','h-[70px]','md:w-[150px]','md:h-[150px]','xl:w-[200px]','xl:h-[200px]',{'bg-red-500':words[1].estado=='rojo','bg-green-500':words[1].estado=='verde',},{'bg-white': words[0].estado == undefined},'shadow-lg','rounded-3xl','bg-opacity-60','border','border-gray-200','mx-1','md:mx-2,','text-center','justify-center','items-center','my-auto','text-3xl','md:text-5xl','font-medium']" @keyup="comprobarClave(1)">
        <input type="text" id="3" maxlength="1" v-model="words[2].input" :class="['flex','w-[70px]','h-[70px]','md:w-[150px]','md:h-[150px]','xl:w-[200px]','xl:h-[200px]',{'bg-red-500':words[2].estado=='rojo','bg-green-500':words[2].estado=='verde',},{'bg-white': words[0].estado == undefined},'shadow-lg','rounded-3xl','bg-opacity-60','border','border-gray-200','mx-1','md:mx-2,','text-center','justify-center','items-center','my-auto','text-3xl','md:text-5xl','font-medium']" @keyup="comprobarClave(2)">
        <input type="text" id="4" maxlength="1" v-model="words[3].input" :class="['flex','w-[70px]','h-[70px]','md:w-[150px]','md:h-[150px]','xl:w-[200px]','xl:h-[200px]',{'bg-red-500':words[3].estado=='rojo','bg-green-500':words[3].estado=='verde',},{'bg-white': words[0].estado == undefined},'shadow-lg','rounded-3xl','bg-opacity-60','border','border-gray-200','mx-1','md:mx-2,','text-center','justify-center','items-center','my-auto','text-3xl','md:text-5xl','font-medium']" @keyup="comprobarClave(3)">
        <input type="text" id="5" maxlength="1" v-model="words[4].input" :class="['flex','w-[70px]','h-[70px]','md:w-[150px]','md:h-[150px]','xl:w-[200px]','xl:h-[200px]',{'bg-red-500':words[4].estado=='rojo','bg-green-500':words[4].estado=='verde',},{'bg-white': words[0].estado == undefined},'shadow-lg','rounded-3xl','bg-opacity-60','border','border-gray-200','mx-1','md:mx-2,','text-center','justify-center','items-center','my-auto','text-3xl','md:text-5xl','font-medium']" @keyup="comprobarClave(4)">
    </div>
    <unsuccess v-bind:mostrar="mostrar" @clicked="closeModal"></unsuccess>

</template>
<script>
import { useFinalyWord } from '../store/finalyWord';
import { useProgressBarStore } from '../store/progressBar';
import { mapWritableState,mapActions } from 'pinia';
import { useTemporizadorStore } from '../store/TemporizadorStore';
import unsuccess from '../components/modals/unsuccess.vue';
export default{
    data() {
        return {
            //esta variable es el nombre el cientifico que daremos como pista
            pista:this.clave,//esta variable es la pista completa que tienen que resolver
            words:[
                {input:"",estado:""},
                {input:"",estado:""},
                {input:"",estado:""},
                {input:"",estado:""},
                {input:"",estado:""},
            ],
            estado:true,
            contador:0,
            mostrar:false,
            aciertos:0
        }

    },
    methods:{
        comprobarClave(indice){
                    if(this.words[indice].input==""){
                        this.words[indice].estado="";
                    }else {
                        if(this.words[indice].input.toLocaleUpperCase()===this.pista[indice]){
                            this.words[indice].estado="verde";
                            this.aciertos++;
                            this.compruebaAciertos(this.aciertos);
                        }else if (this.words[indice].input!=this.pista[indice]) {
                            this.words[indice].estado="rojo";
                            this.contador++;
                            this.marcaError(this.contador);
                            this.compruebafallo(this.contador,this.words);
                        }
                }
            },
            compruebafallo(contador,array){
                if(contador==5){
                    this.mostrar=true;
                    this.reduceTime(300);
                    this.resetState();
                    this.contador=0;
                    array.forEach(element => {
                        element.input="";
                        element.estado="";

                    });
                }
            },
            closeModal() {
            this.mostrar = false;

            },
            compruebaAciertos(aciertos){
                if(aciertos==5){
                    this.$router.push("Ranking");
                }
            },
            ...mapActions(useProgressBarStore,["insertaFallo1",
                                                "insertaFallo2",
                                                "insertaFallo3",
                                                "insertaFallo4",
                                                "insertaFallo5",
                                                "incrementafallo",
                                                "marcaError",
                                                "resetState",]),
            ...mapActions(useTemporizadorStore,["reduceTime"]),
    },
    computed:{


        ...mapWritableState(useFinalyWord,["cientifico","clave"]),
    },
    components:{
        unsuccess
    }
}
</script>
