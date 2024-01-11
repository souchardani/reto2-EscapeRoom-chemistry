<template>
    <div>
        <label for="">Introduce una letra</label>
        <div class="pb-5 mt-20 mb-12">

            <img v-bind:src="imagen" class='mx-auto'>

        </div>
        <input type="text" id="letra" maxlength="1" size="1" style="text-align:center"><br><br>
        <button class="rounded-2xl bg-white bg-opacity-40 px-5 py-1.5 mb-5 text-2xl font-semibold text-gray-900 shadow-sm hover:bg-red-500 hover:text-white cursor-pointer focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
            style="backdrop-filter: blur(20px)" @click="mostrarLetra()">pulsar</button><br>

    </div>
    <div>
        <!-- <h1>{{ palabraBarra }}</h1> -->
        <h2>{{ mostrar }}</h2>
        <!-- <h1>{{ imagen }}</h1> -->
    </div>
    <success v-bind:enhorabuena="enhorabuena" @clicked2="closeModal"></success>
    <unsuccess v-bind:mostrar="mostrarm" @clicked="closeModal"></unsuccess>
</template>

<script>
let z=0;
let aciertos=0;
import ProgressBar from "../components/ProgressBar.vue";
import { mapWritableState,mapActions  } from "pinia";
import {useProgressBarStore} from "../store/progressBar";
import unsuccess from "../components/modals/unsuccess.vue";
import success from "../components/modals/success.vue";

export default {

    data() {
        return {
            palabras:["botella","manzana","escoba"],
            random:"",
            oculto:"",
            palabraBarra:"",
            mostrar:[],
            letra:"",
            imagen: "",
            mostrarm: false,
            enhorabuena:false,

        }
    },
    methods: {
        insertarPalabra(){
            this.random=this.palabras[Math.floor(Math.random()*this.palabras.length)];
            return this.random;
        },
        mostrarLetra(){
            this.letra=document.getElementById('letra').value;
            let acertado=false;

                // Oculta la palabra con _ _ _
                for (let i = 0; i < this.random.length; i++) {

                    if (this.mostrar[i]==null) {
                        this.mostrar[i]="_";
                    }

                    // Si es correcta la letra
                    if (this.letra==this.random[i]) {

                            this.mostrar[i]=this.letra;
                            acertado=true;
                            aciertos++;


                    }



                }

                // si al recorrer la palabra falla

                if(acertado==false && z<6) {
                    this.imagen="../../public/game3_hangman_img/hangman"+z+".png";
                    this.marcaError(z);
                    z=z+1;
                }
                if(z==6){
                    this.mostrarm=true;
                }

                // if(this.mostrar.filter())

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
    },
    mounted(){
        this.insertarPalabra();
        this.mostrarLetra();
    },
    components:{
        ProgressBar,
        unsuccess,
        success
    },
    computed:{
        ...mapWritableState(useProgressBarStore,["contador"]),
    }
}
</script>
