<template>
    <div>
        <div class="flex justify-center mb-12">
            <div
                v-show="help"
                id="tarjeta-info"
                class="flex align-center justify-between gap-5 font-medium font-bold text-gray-500 text-sm bg-yellow-100 text-yellow-700 py-8 px-5 rounded-lg relative"
            >
                <i class="ph ph-info text-2xl"></i>
                <span class="text-left">Selecciona la casilla que corresponda</span>
                <i class="ph ph-x absolute top-2 right-2 text-xl hover:scale-125 cursor-pointer" @click="hideTutorial"></i>
            </div>
        </div>

        <form @submit.prevent>
            <GlassCard>
                <!-- Muestra la pregunta -->
                <!-- el if hace que muestre la pregunta despues de que se hayan añadido al quizs con axios -->
                <input
                    type="text" disabled name="question" id="question"
                    class="text-3xl text-center w-full bg-inherit"
                    v-bind:value="quizs[quizsIndex].caracteristics" v-if="quizs.length>0"
                >
                <!-- Se hace la comprobacion con el input hidden -->
                <input type="hidden" name="questionID" id="questionID" v-bind:value="quizs[quizsIndex].id" v-if="quizs.length>0">
            </GlassCard>
            <div class="text-center m-4 flex justify-center">
                <select v-model="growObject"
                    name="answers"
                    id="answers"
                    class="block px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border-4 border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                >
                    <option v-for="grow in quizEliminar" v-bind:value="grow.id">
                        {{ grow.growth }}
                    </option>
                </select>
            </div>

            <div class="text-center m-4 p-4 flex justify-center w-48 m-auto flex-wrap">
                <GlassBtn>
                    <button  class="w-28" @click="checkQuestion">
                        Siguiente
                    </button>
                </GlassBtn>
                <div class="mt-4 font-semibold text-gray-900 text-lg">
                    <h3>{{success}} / 10</h3>
                </div>
            </div>
        </form>
        <success v-bind:enhorabuena="enhorabuena" @clicked2="closeModal" :pista="this.clave[4]"></success>
        <unsuccess v-bind:mostrar="mostrarm" @clicked="closeModal"></unsuccess>
    </div>
</template>
<script>
import GlassCard from "../components/GlassCard.vue";
import GlassBtn from "../components/GlassBtn.vue";
import { useFinalyWord } from "../store/finalyWord";
import { mapWritableState } from "pinia";
import { mapActions } from "pinia";
import ProgressBar from "../components/ProgressBar.vue";
import {useProgressBarStore} from "../store/progressBar";
import { useTemporizadorStore } from "../store/TemporizadorStore";
import { useLoginStore } from "../store/LoginStore";
import unsuccess from "../components/modals/unsuccess.vue";
import success from "../components/modals/success.vue";
import axios from "axios";

export default {

    /*
     1- obtener registros mediante axios
     2- meter en un array 10 registros aleatorios
     3- cuando se hace click comprueba si la opcion seleccionada es correcta
        las respuestas correctas se eliminan del array
        los fallos se guardan en la barra de fallos
     4- cuando se hace click pasa al siguiente registro como un carrusel

    */

    components: {
        GlassCard,
        GlassBtn,
        ProgressBar,
        unsuccess,
        success
    },
    data() {
        return {
            descontarTiempo:0,
            pista:"",//variable que le pasamos a los props del componente success
            muestra: false,
            help: true,
            quizsIndex: 0,
            errores: 0,
            success: 0,
            quizs: [],
            growObject: 0,
            randomNumbers: [],
            quizsAxios: [],
            quizsLocal: [
                {
                    id: 1,
                    growth: "Recuento de mesófilos, aerobios y heterótrofos.",
                    caracteristics: "PCA",
                },
                {
                    id: 2,
                    growth: "Detección de Coliformes, los de fermentación lenta tardan en crecer.",
                    caracteristics: "MCCONKEY",
                },
                {
                    id: 3,
                    growth: "Detección y recuento de E. coli y coliformes.",
                    caracteristics: "CCA",
                },
                {
                    id: 4,
                    growth: "Para la confirmación de enterococos.",
                    caracteristics: "KAA",
                },
                {
                    id: 5,
                    growth: "Detección y recuento de coliformes en agua, alimentos….",
                    caracteristics: "VRBG",
                },
                {
                    id: 6,
                    growth: "Se usa para el aislamiento y el cultivo de microorganismos Gram - entéricos, y especialmente para el aislamiento de especies de Shigella y Salmonella.",
                    caracteristics: "HEKTOEN",
                },
                {
                    id: 7,
                    growth: "Crecimiento general. Recuento de totales.",
                    caracteristics: "TSA",
                },
                {
                    id: 8,
                    growth: "Diferenciación de enterobacterias en base a la fermentación de hidratos de carbono y a la producción de ácido sulfhídrico.",
                    caracteristics: "KIA",
                },
                {
                    id: 9,
                    growth: "Diferenciación de enterobacterias en base la capacidad de usar citrato como única fuente de carbono y energía.",
                    caracteristics: "CITRATO SIMMONS",
                },
                {
                    id: 10,
                    growth: "Se utiliza para la detección de coliformes y la detección fluorogénica de Escherichia coli en un entorno de laboratorio.",
                    caracteristics: "LAURIL SULFATO CON MUG",
                },
                {
                    id: 11,
                    growth: "Es ideal para la enumeración de enterococos mediante el método de dilución en serie (NMP).",
                    caracteristics: "CALDO DE GLUCOSA ACIDA (ROTHE)",
                },
                {
                    id: 12,
                    growth: "Aislamiento y recuento de enterococos.",
                    caracteristics: "AGAR SLANETZ Y BARTLEY",
                },
                {
                    id: 13,
                    growth: "Al ser con sangre permite crecimiento de organismos nutricionalmente exigentes y la clara visualización de la hemólisis.",
                    caracteristics: "AGAR SANGRE",
                },
                {
                    id: 14,
                    growth: "Aislamiento y recuento selectivo de Clostridium perfringens y sus esporas. Colonias amarillo-verdosas.",
                    caracteristics: "MCP",
                },
                {
                    id: 15,
                    growth: "Aislamiento  y recuento de Clostridium perfringens en agua, alimentos….",
                    caracteristics: "TSC",
                },
                {
                    id: 16,
                    growth: "Diluyente y enriquecimiento bacteriano Se usa en la prueba INDOL y ONPG.",
                    caracteristics: "AGUA DE PEPTONA",
                },
                {
                    id: 17,
                    growth: "Para analizar la sensibilidad de cepas aisladas a partir de agentes antimicrobianos ANTIBIOGRAMAS.",
                    caracteristics: "MUELLER-HILTON",
                },
                {
                    id: 18,
                    growth: "Diferenciación de la fermentación de lactosa  de tipo butanodiólica y ácido mixta (Diferenciar Serratia-E.coli).",
                    caracteristics: "EMB",
                },
                {
                    id: 19,
                    growth: "Se utiliza para el cultivo de microorganismos heterótrofos.",
                    caracteristics: "BACTO 2R",
                },
                {
                    id: 20,
                    growth: "Medio selectivo y diferencial utilizado para el control presuntivo de E. coli y coliformes en aguas.",
                    caracteristics: "CHAPMAN TTC",
                }
            ],
            mostrarm: false,
            enhorabuena:false
        };
        //this.enhorabuena=true; ganado
    },
    methods: {

        hideTutorial() {
            this.help = false;
        },

        resetData() {
            this.muestra = false;
            this.help = true,
            this.quizsIndex = 0;
            this.errores = 0;
            this.success = 0;
            this.quizs = [];
            this.growObject = 0;
            this.randomNumbers = [];
            this.quizsAxios = [];
            this.mostrarm = false;
            this.enhorabuena = false;
        },

        async getAllData() {
            // obtiene mediante axios los datos del juego
            const allData = await axios.get(
                "http://127.0.0.1:8000/api/getjuego4"
            );

            this.quizsAxios = allData.data;
            //console.log(this.quizsAxios);

            // inserta 10 de los registros en el quizs
            for (let i = 0; i < 10; i++) {
                let random = Math.floor(Math.random() * this.quizsAxios.length);

                // previene que se repita el mismo registro
                if (this.randomNumbers.includes(random)) {
                    random = Math.floor(Math.random() * this.quizsAxios.length);
                    i--;
                }

                else {
                    // inserta el registro aleatorio
                    let object = {
                        id: this.quizsAxios[random].id,
                        growth: this.quizsAxios[random].growth,
                        caracteristics: this.quizsAxios[random].caracteristics
                    };
                    this.quizs.push(object);
                    this.randomNumbers.push(random);
                    this.quizsIndex = Math.floor(Math.random() * this.quizs.length);
                }
            }
            // muestra las preguntas con sus respuestas
            console.log("--Las respuestas correctas:");
            console.log(this.quizs);
        },
        checkQuestion() {
            // obtiene los datos
            // se usan las ID para hacer la comprobacion
            let question = document.getElementById("questionID").value;
            let answerUser = document.getElementById("answers").value;

            // si es correcto
            if (question == answerUser) {
                console.log("Correcto!");

                // obtiene el indice del objeto con el id
                let i = this.quizs.findIndex(o => o.id == this.growObject);
                // borra la pregunta correcta para evitar que se repita
                this.quizs.splice(i,1);

                // pasa a la siguiente pregunta
                this.quizsIndex++;
                this.success++;
                // vuelve al inicio cuando llega al final del quizs
                if (this.quizsIndex == this.quizs.length || this.quizsIndex > this.quizs.length) {
                    this.quizsIndex = 0;
                }

                // cambia el color segun fallo o acierto
                document.getElementById("answers").style.borderColor="green";
            }
            else {
                console.log("Incorrecto!");

                this.errores++;
                this.marcaError(this.errores);

                // pasa a la siguiente pregunta
                this.quizsIndex++;
                // vuelve al inicio cuando llega al final del quizs
                if (this.quizsIndex == this.quizs.length) {
                    this.quizsIndex = 0;
                }

                //cambia el color segun fallo o acierto
                document.getElementById("answers").style.borderColor="red";
            }
            // perdido
            if (this.errores == 5) {
                this.mostrarm=true;
                this.descontarTiempo=this.saberTiempoXdificultad(this.usuario.dificultad);
                this.reduceTime(this.descontarTiempo);
            }
            // ganado
            if (this.quizs.length == 0) {
                this.enhorabuena=true;
            }
        },

        // modals de juego ganado o perdido
        closeModal() {
            this.mostrar = false;
            this.enhorabuena = false;
            this.resetState();
            this.$router.push("StartGame");
        },
        ...mapActions(useTemporizadorStore, ["reduceTime"]),
        ...mapActions(useProgressBarStore, [
            "insertaFallo1",
            "insertaFallo2",
            "insertaFallo3",
            "insertaFallo4",
            "insertaFallo5",
            "incrementafallo",
            "resetState"
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
    }

    },
    created() {
        this.resetData();
        this.resetState();
        this.getAllData();
    },
    computed:{
        ...mapWritableState(useProgressBarStore,["contador"]),
        ...mapWritableState(useFinalyWord,["clave"]),//store de juego 5
        ...mapWritableState(useLoginStore,["usuario"]),//store de login

        quizEliminar() {
            return this.quizs;
        }

    }
}
</script>
