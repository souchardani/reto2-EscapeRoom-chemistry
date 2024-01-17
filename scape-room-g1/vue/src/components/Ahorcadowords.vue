<template>
    <div>
        <label for="">Introduce una letra</label>
        <div class="pb-5 mt-20 mb-12">

            <img v-bind:src="imagen" class='mx-auto'>

        </div>
        <input type="text" id="letra" maxlength="1" size="1" @click="vaciar()" class="border-4 text-center">
        <div class="mt-4 p-4 flex text-center m-auto justify-center w-48">
            <GlassBtn  @click="mostrarLetra()">pulsar</GlassBtn>
        </div>
    </div>
    <div>
        <!-- <h1>{{ palabraBarra }}</h1> -->
        <h2>{{ mostrar.toString() }}</h2>


    </div>
    <success v-bind:enhorabuena="enhorabuena" @clicked2="closeModal" :pista="this.clave[3]"></success>
    <unsuccess v-bind:mostrar="mostrarm" @clicked="closeModal"></unsuccess>
</template>

<script>
let z=0;

import ProgressBar from "../components/ProgressBar.vue";
import GlassBtn from "../components/GlassBtn.vue";
import { mapWritableState,mapActions  } from "pinia";
import {useProgressBarStore} from "../store/progressBar";
import { useTemporizadorStore } from "../store/TemporizadorStore";
import { useCheckStore } from "../store/checkState";
import Reloj from "../components/Reloj.vue";
import unsuccess from "../components/modals/unsuccess.vue";
import success from "../components/modals/success.vue";
import axios from "axios";
import { useFinalyWord } from "../store/finalyWord";
export default {

    data() {
        return {
            // palabras:["botella","manzana","escoba"],
            palabras:[],
            random:"",
            oculto:"",
            palabraBarra:"",
            mostrar:[],
            letra:"",
            imagen: "",
            mostrarm: false,
            enhorabuena: false,
            pista:""
        };
    },
    methods: {
        vaciar(){
            document.getElementById('letra').value="";
        },
        insertarPalabra(){
            this.random=this.palabras[Math.floor(Math.random()*this.palabras.length)];
            return this.random.word;
        },
        mostrarLetra(){
            this.letra=document.getElementById('letra').value.toLowerCase();
            let letram= this.random.word.toLowerCase();
            let acertado=false;

                for (let i = 0; i < letram.length; i++) {
                    // Oculta la palabra con _ _ _
                    if (this.mostrar[i]==null) {
                        this.mostrar[i]="_";
                    }
                    // si hay un espacio que me muestre el espacio
                    if(letram[i]==" "){
                        this.mostrar[i]=" ";
                    }

                    // Si es correcta la letra te marca verde
                    if (this.letra==letram[i]) {
                            acertado=true;
                            this.mostrar[i]=this.letra;
                            document.getElementById('letra').style.borderColor="green";
                    }

                }

                // si al recorrer la palabra falla

                if(acertado==false && z<6 && z>0) {
                    this.imagen="../../public/game3_hangman_img/hangman"+z+".png";
                    this.marcaError(z);
                    z=z+1;
                    document.getElementById('letra').style.borderColor="red";
                }
                // para que el inicio del juego el input sea de color blanco
                if(z==0 && acertado==false){
                    this.imagen="../../public/game3_hangman_img/hangman"+z+".png";
                    this.marcaError(z);
                    z=z+1;
                    document.getElementById('letra').style.borderColor="black";

                // cuando haces 6 fallos se termina el
                }
                if(z==6){
                    this.mostrarm=true;
                    this.reduceTime(300);

                }


                //si se muestra toda la palabra
                if(this.mostrar.includes("_")==false){
                    this.enhorabuena=true;
                    this.changeJuego3();
                }
                console.log(this.random.word);

        },
        closeModal() {
            this.mostrarm = false;
            this.enhorabuena = false;
            this.$router.push("StartGame");
        },
        ...mapActions(useProgressBarStore, [
            "insertaFallo1",
            "insertaFallo2",
            "insertaFallo3",
            "insertaFallo4",
            "insertaFallo5",
            "incrementafallo",

        ]),
        ...mapActions(useTemporizadorStore, ["reduceTime"]),
        ...mapActions(useCheckStore, ["changeJuego3"]),

        marcaError(contador) {
            switch (contador) {
                case 1:
                    this.insertaFallo1();
                    break;
                case 2:
                    this.insertaFallo2();
                    break;
                case 3:
                    this.insertaFallo3();
                    break;
                case 4:
                    this.insertaFallo4();
                    break;
                case 5:
                    this.insertaFallo5();
                    break;
            }
    },
    async getAllData() {
            const allData = await axios.get(
                "http://127.0.0.1:8000/api/getjuego3"
            );
            this.palabras = allData.data;
            console.log(this.palabras);
            this.insertarPalabra();
            this.mostrarLetra();
        },
    },
    mounted(){

        this.getAllData();
    },
    components:{
        GlassBtn,
        Reloj,
        ProgressBar,
        unsuccess,
        success,
    },
    computed: {
        ...mapWritableState(useProgressBarStore, ["contador"]),
        ...mapWritableState(useFinalyWord,["clave"]),
    },
}
</script>
