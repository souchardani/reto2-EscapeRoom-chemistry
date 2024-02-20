<template>
    <div>
        <div class="flex justify-center">
            <div
                v-show="help"
                id="tarjeta-info"
                class="flex align-center justify-between gap-5 font-medium font-bold text-gray-500 text-sm bg-yellow-100 text-yellow-700 py-8 px-5 rounded-lg relative mr-2"
            >
                <i class="ph ph-info text-2xl"></i>
                <span class="text-left"
                    >Selecciona la casilla que corresponda.</span
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
        <form @submit.prevent>
            <GlassCard>
                <!-- Muestra la pregunta -->
                <!-- el if hace que muestre la pregunta despues de que se hayan añadido al quizs con axios -->
                <h2
                    name="question"
                    id="question"
                    v-if="quizs.length > 0"
                    class="text-3xl text-center w-full bg-inherit"
                >
                    {{ quizs[quizsIndex].caracteristics }}
                </h2>
                <!-- Se hace la comprobacion con el input hidden -->
                <input
                    type="hidden"
                    name="questionID"
                    id="questionID"
                    v-bind:value="quizs[quizsIndex].id"
                    v-if="quizs.length > 0"
                />
            </GlassCard>
            <div class="text-center m-4 flex justify-center">
                <select
                    v-model="growObject"
                    name="answers"
                    id="answers"
                    class="block px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border-4 border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                >
                    <option v-for="grow in quizEliminar" v-bind:value="grow.id">
                        {{ grow.growth }}
                    </option>
                </select>
            </div>

            <div
                class="text-center m-4 p-4 flex justify-center w-48 m-auto flex-wrap"
            >
                <GlassBtn>
                    <button class="w-28" @click="checkQuestion">
                        Siguiente
                    </button>
                </GlassBtn>
                <div class="mt-4 font-semibold text-gray-200 text-2xl">
                    <h3>{{ success }} / 10</h3>
                </div>
            </div>
        </form>
        <success
            v-bind:enhorabuena="enhorabuena"
            @clicked2="closeModal"
            :pista="this.clave[4]"
        ></success>
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
import { useProgressBarStore } from "../store/progressBar";
import { useTemporizadorStore } from "../store/TemporizadorStore";
import { useLoginStore } from "../store/LoginStore";
import { useCheckStore } from "../store/checkState";
import unsuccess from "../components/modals/unsuccess.vue";
import success from "../components/modals/success.vue";
import axios from "axios";
import JSConfetti from "js-confetti";

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
        success,
    },
    data() {
        return {
            descontarTiempo: 0,
            pista: "", //variable que le pasamos a los props del componente success
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
                },
            ],
            mostrarm: false,
            enhorabuena: false,
            audioAcertado: new Audio("/sounds/1200.mp3"),
            audioIncorrecto: new Audio("/sounds/incorrect-cbt-sound.mp3"),
            aplausos: new Audio("/sounds/claps-44774.mp3"),
            fail: new Audio("/sounds/fail-144746.mp3"),
        };
        //this.enhorabuena=true; ganado
    },
    methods: {
        // tutoriales y sonidos
        hideTutorial() {
            this.help = false;
        },

        resetData() {
            this.muestra = false;
            this.help = true;
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

        async getAllData() {
            // obtiene mediante axios los datos del juego
            const allData = await axios.get(
                "http://127.0.0.1:8000/api/getjuego4"
                //"http://44.196.190.239/api/getjuego4"
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
                } else {
                    // inserta el registro aleatorio
                    let object = {
                        id: this.quizsAxios[random].id,
                        growth: this.quizsAxios[random].growth,
                        caracteristics: this.quizsAxios[random].caracteristics,
                    };
                    this.quizs.push(object);
                    this.randomNumbers.push(random);
                    this.quizsIndex = Math.floor(
                        Math.random() * this.quizs.length
                    );
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
                this.audioAcertado.play();
                // obtiene el indice del objeto con el id
                let i = this.quizs.findIndex((o) => o.id == this.growObject);
                // borra la pregunta correcta para evitar que se repita
                this.quizs.splice(i, 1);

                // pasa a la siguiente pregunta
                this.quizsIndex++;
                this.success++;
                // vuelve al inicio cuando llega al final del quizs
                if (
                    this.quizsIndex == this.quizs.length ||
                    this.quizsIndex > this.quizs.length
                ) {
                    this.quizsIndex = 0;
                }

                // cambia el color segun fallo o acierto
                document.getElementById("answers").style.borderColor = "green";
            } else {
                console.log("Incorrecto!");
                this.audioIncorrecto.play();
                this.errores++;
                this.marcaError(this.errores);

                // pasa a la siguiente pregunta
                this.quizsIndex++;
                // vuelve al inicio cuando llega al final del quizs
                if (this.quizsIndex == this.quizs.length) {
                    this.quizsIndex = 0;
                }

                //cambia el color segun fallo o acierto
                document.getElementById("answers").style.borderColor = "red";
            }
            // perdido
            if (this.errores == 5) {
                this.mostrarm = true;
                this.fail.play();
                this.descontarTiempo = this.saberTiempoXdificultad(
                    this.usuario.dificultad
                );
                this.reduceTime(this.descontarTiempo);
            }
            // ganado
            if (this.quizs.length == 0) {
                this.enhorabuena = true;
                this.aplausos.play();
                const jsConfetti = new JSConfetti();
                jsConfetti.addConfetti();
                this.changeJuego4();
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
        ...mapActions(useCheckStore, ["changeJuego4"]),
        ...mapActions(useProgressBarStore, [
            "insertaFallo1",
            "insertaFallo2",
            "insertaFallo3",
            "insertaFallo4",
            "insertaFallo5",
            "incrementafallo",
            "resetState",
            "marcaError",
        ]),
    },
    created() {
        this.resetData();
        this.resetState();
        this.getAllData();
    },
    computed: {
        ...mapWritableState(useProgressBarStore, ["contador"]),
        ...mapWritableState(useFinalyWord, ["clave"]), //store de juego 5
        ...mapWritableState(useLoginStore, ["usuario"]), //store de login

        quizEliminar() {
            return this.quizs;
        },
    },
};
</script>
