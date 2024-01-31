<template>
    <div class="flex justify-center">
        <div
            v-show="help"
            id="tarjeta-info"
            class="flex align-center justify-between gap-5 font-medium font-bold text-gray-500 text-sm bg-yellow-100 text-yellow-700 py-8 px-5 rounded-lg relative mr-2"
        >
            <i class="ph ph-info text-2xl"></i>
            <span class="text-left"
                >Adivina la palabra secreta letra a letra.</span
            >
            <i
                class="ph ph-x absolute top-2 right-2 text-xl hover:scale-125 cursor-pointer"
                @click="hideTutorial"
            ></i>
        </div>
        <div class="flex w-100 h-10">
            <GlassBtn @click="apagar()">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    height="16"
                    width="18"
                    viewBox="0 0 576 512"
                >
                    <path
                        d="M301.1 34.8C312.6 40 320 51.4 320 64V448c0 12.6-7.4 24-18.9 29.2s-25 3.1-34.4-5.3L131.8 352H64c-35.3 0-64-28.7-64-64V224c0-35.3 28.7-64 64-64h67.8L266.7 40.1c9.4-8.4 22.9-10.4 34.4-5.3zM425 167l55 55 55-55c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-55 55 55 55c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-55-55-55 55c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l55-55-55-55c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0z"
                    />
                </svg>
            </GlassBtn>
            <GlassBtn class="ml-2" @click="encender()">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    height="16"
                    width="14"
                    viewBox="0 0 448 512"
                >
                    <path
                        d="M301.1 34.8C312.6 40 320 51.4 320 64V448c0 12.6-7.4 24-18.9 29.2s-25 3.1-34.4-5.3L131.8 352H64c-35.3 0-64-28.7-64-64V224c0-35.3 28.7-64 64-64h67.8L266.7 40.1c9.4-8.4 22.9-10.4 34.4-5.3zM412.6 181.5C434.1 199.1 448 225.9 448 256s-13.9 56.9-35.4 74.5c-10.3 8.4-25.4 6.8-33.8-3.5s-6.8-25.4 3.5-33.8C393.1 284.4 400 271 400 256s-6.9-28.4-17.7-37.3c-10.3-8.4-11.8-23.5-3.5-33.8s23.5-11.8 33.8-3.5z"
                    />
                </svg>
            </GlassBtn>
        </div>
    </div>
    <div class="mx-auto p-5 text-center mb-10 text-4xl">
        <div>
            <label for="">Introduce una letra</label>
            <div class="pb-5 mt-20 mb-12">
                <img v-bind:src="imagen" class="mx-auto" />
            </div>

            <input type="text" id="letra" maxlength="1" size="1" @click="vaciar()"  @keyup.enter="mostrarLetra" class="border-4 text-center">
            <!-- <div class="mt-4 p-4 flex text-center m-auto justify-center w-48">

                <GlassBtn @click="mostrarLetra()">pulsar</GlassBtn>
            </div> -->
        </div>
        <div>
            <!-- <h1>{{ palabraBarra }}</h1> -->
            <h2>{{ mostrar.toString() }}</h2>
        </div>
        <success
            v-bind:enhorabuena="enhorabuena"
            @clicked2="closeModal"
            :pista="this.clave[2]"
        ></success>
        <unsuccess v-bind:mostrar="mostrarm" @clicked="closeModal"></unsuccess>
    </div>
</template>
<script>
let z = 0;
let contador = 0;
import ProgressBar from "../components/ProgressBar.vue";
import GlassBtn from "../components/GlassBtn.vue";
import { mapWritableState, mapActions } from "pinia";
import { useProgressBarStore } from "../store/progressBar";
import { useTemporizadorStore } from "../store/TemporizadorStore";
import { useCheckStore } from "../store/checkState";
import { useLoginStore } from "../store/LoginStore";
import Reloj from "../components/Reloj.vue";
import unsuccess from "../components/modals/unsuccess.vue";
import success from "../components/modals/success.vue";
import axios from "axios";
import { useFinalyWord } from "../store/finalyWord";

export default {
    data() {
        return {
            // palabras:["botella","manzana","escoba"],
            help: true,
            palabras: [],
            random: "",
            palabraBarra: "",
            mostrar: [],
            letra: "",
            imagen: "",
            pista: "",
            mostrarm: false,

            enhorabuena:false,
            audioAcertado:new Audio('/sounds/1200.mp3'),
            audioIncorrecto:new Audio('/sounds/incorrect-cbt-sound.mp3'),
            aplausos:new Audio('/sounds/claps-44774.mp3'),
            fail:new Audio('/sounds/fail-144746.mp3'),
            descontarTiempo:0,//variable para saber el tiempo a descontar

        }

    },
    methods: {
        resetData() {
            this.palabras = [];
            this.random = "";
            this.palabraBarra = "";
            this.mostrar = [];
            this.letra = "";
            this.imagen = "";
            this.help = true;

            this.mostrarm = false;
            this.enhorabuena = false;
        },

        hideTutorial() {
            this.help = false;
        },

        apagar() {
            this.audioAcertado.muted = true;
            this.audioIncorrecto.muted = true;
            this.aplausos.muted = true;
            this.fail.muted = true;
        },
        encender() {
            this.audioAcertado.muted = false;
            this.audioIncorrecto.muted = false;
            this.aplausos.muted = false;
            this.fail.muted = false;
        },

        vaciar(){
            document.getElementById('letra').value="";
        },
        insertarPalabra() {
            this.random =
                this.palabras[Math.floor(Math.random() * this.palabras.length)];
            return this.random.word;
        },

        mostrarLetra(event){

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
                            this.audioAcertado.play();
                            document.getElementById('letra').style.borderColor="green";
                    }


            for (let i = 0; i < letram.length; i++) {
                // Oculta la palabra con _ _ _
                if (this.mostrar[i] == null) {
                    this.mostrar[i] = "_";
                }
                // si hay un espacio que me muestre el espacio
                if (letram[i] == " ") {
                    this.mostrar[i] = " ";
                }


                // cuando haces 6 fallos se termina el
                }
                if(z==6){
                    this.fail.play();
                    this.mostrarm=true;
                    this.descontarTiempo=this.saberTiempoXdificultad(this.usuario.dificultad);
                    this.reduceTime(this.descontarTiempo);
                    z=0;

                }
            }

            // si al recorrer la palabra falla

            if (acertado == false && z < 6 && z > 0) {
                this.imagen =
                    "/img/game3_hangman_img/hangman" + z + ".png";
                this.marcaError(contador);
                z = z + 1;
                contador = contador + 1;
                this.audioIncorrecto.play();
                document.getElementById("letra").style.borderColor = "red";
            }
            // para que el inicio del juego el input sea de color blanco
            if (z == 0 && acertado == false) {
                this.imagen =
                    "/img/game3_hangman_img/hangman" + z + ".png";
                this.marcaError(contador);
                contador = contador + 1;
                z = z + 1;
                document.getElementById("letra").style.borderColor = "black";

                // cuando haces 6 fallos se termina el
            }
            if (z == 6) {
                this.fail.play();
                this.mostrarm = true;
                this.descontarTiempo = this.saberTiempoXdificultad(
                    this.usuario.dificultad
                );
                this.reduceTime(this.descontarTiempo);
            }

            //si se muestra toda la palabra
            if (this.mostrar.includes("_") == false) {
                this.aplausos.play();
                this.enhorabuena = true;
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
        ...mapActions(useTemporizadorStore, [
            "reduceTime",
            "saberTiempoXdificultad",
        ]),
        ...mapActions(useCheckStore, ["changeJuego3"]),
        ...mapActions(useProgressBarStore, ["resetState", "marcaError"]),
        async getAllData() {
            const allData = await axios.get(
                "http://44.196.190.239/api/getjuego3"
            );
            this.palabras = allData.data;
            console.log(this.palabras);
            this.insertarPalabra();
            this.mostrarLetra();
        },
    },
    mounted() {
        this.resetState();
        this.resetData();
        this.getAllData();
    },
    components: {
        GlassBtn,
        Reloj,
        ProgressBar,
        unsuccess,
        success,
    },
    computed: {
        ...mapWritableState(useProgressBarStore, ["contador"]),
        ...mapWritableState(useFinalyWord, ["clave"]),
        ...mapWritableState(useLoginStore, ["usuario"]),
        ...mapWritableState(useTemporizadorStore, ["showModal"]),
    },
};
</script>
