<template>
    <div>
        <div class="flex justify-center mb-12">
            <div
                id="tarjeta-info"
                class="flex align-center justify-between gap-5 font-medium font-bold text-gray-500 text-sm bg-yellow-100 text-yellow-700 py-8 px-5 rounded-lg relative"
            >
                <i class="ph ph-info text-2xl"></i>
                <span class="text-left">Selecciona la casilla que corresponda</span>
                <i class="ph ph-x absolute top-2 right-2 text-xl hover:scale-125 cursor-pointer"></i>
            </div>
        </div>

        <form @submit.prevent>
            <GlassCard>
                <!-- Muestra la pregunta -->
                <input
                    type="text" disabled name="question" id="question"
                    class="text-3xl text-center w-full"
                    v-bind:value="quizs[contador].caracteristics" v-if="quizs.length>0"
                >
                <!-- Se hace la comprobacion con el input hidden -->
                <input type="hidden" name="questionID" id="questionID" v-bind:value="quizs[contador].id" v-if="quizs.length>0">
            </GlassCard>
            <div class="text-center m-4 flex justify-center">
                <select
                    name="answers"
                    id="answers"
                    class="block px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                >
                    <option v-for="grow in quizs" v-bind:value="grow.id">
                        {{ grow.growth }}
                    </option>
                </select>
            </div>

            <div class="text-center m-4 p-4 flex justify-center w-48 m-auto">
                <GlassBtn>
                    <button class="w-28" @click="contador++">
                        Siguiente
                    </button>
                </GlassBtn>
            </div>
        </form>

    </div>
</template>
<script>
import GlassCard from "../components/GlassCard.vue";
import GlassBtn from "../components/GlassBtn.vue";
import { mapWritableState } from "pinia";
import { mapActions } from "pinia";
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
    },
    data() {
        return {
            muestra: false,
            contador: 0,
            quizs: [],
            randomNumbers: [],
            quizsAxios: [],
            quizsLocal: [
                {
                    growth: "Recuento de mesófilos, aerobios y heterótrofos.",
                    caracteristics: "PCA",
                },
                {
                    growth: "Detección de Coliformes, los de fermentación lenta tardan en crecer.",
                    caracteristics: "MCCONKEY",
                },
                {
                    growth: "Detección y recuento de E. coli y coliformes.",
                    caracteristics: "CCA",
                },
                {
                    growth: "Para la confirmación de enterococos.",
                    caracteristics: "KAA",
                },
                {
                    growth: "Detección y recuento de coliformes en agua, alimentos….",
                    caracteristics: "VRBG",
                },
                {
                    growth: "Se usa para el aislamiento y el cultivo de microorganismos Gram - entéricos, y especialmente para el aislamiento de especies de Shigella y Salmonella.",
                    caracteristics: "HEKTOEN",
                },
                {
                    growth: "Crecimiento general. Recuento de totales.",
                    caracteristics: "TSA",
                },
                {
                    growth: "Diferenciación de enterobacterias en base a la fermentación de hidratos de carbono y a la producción de ácido sulfhídrico.",
                    caracteristics: "KIA",
                },
                {
                    growth: "Diferenciación de enterobacterias en base la capacidad de usar citrato como única fuente de carbono y energía.",
                    caracteristics: "CITRATO SIMMONS",
                },
                {
                    growth: "Se utiliza para la detección de coliformes y la detección fluorogénica de Escherichia coli en un entorno de laboratorio.",
                    caracteristics: "LAURIL SULFATO CON MUG",
                },
                {
                    growth: "Es ideal para la enumeración de enterococos mediante el método de dilución en serie (NMP).",
                    caracteristics: "CALDO DE GLUCOSA ACIDA (ROTHE)",
                },
                {
                    growth: "Aislamiento y recuento de enterococos.",
                    caracteristics: "AGAR SLANETZ Y BARTLEY",
                },
                {
                    growth: "Al ser con sangre permite crecimiento de organismos nutricionalmente exigentes y la clara visualización de la hemólisis.",
                    caracteristics: "AGAR SANGRE",
                },
                {
                    growth: "Aislamiento y recuento selectivo de Clostridium perfringens y sus esporas. Colonias amarillo-verdosas.",
                    caracteristics: "MCP",
                },
                {
                    growth: "Aislamiento  y recuento de Clostridium perfringens en agua, alimentos….",
                    caracteristics: "TSC",
                },
                {
                    growth: "Diluyente y enriquecimiento bacteriano Se usa en la prueba INDOL y ONPG.",
                    caracteristics: "AGUA DE PEPTONA",
                },
                {
                    growth: "Para analizar la sensibilidad de cepas aisladas a partir de agentes antimicrobianos ANTIBIOGRAMAS.",
                    caracteristics: "MUELLER-HILTON",
                },
                {
                    growth: "Diferenciación de la fermentación de lactosa  de tipo butanodiólica y ácido mixta (Diferenciar Serratia-E.coli).",
                    caracteristics: "EMB",
                },
                {
                    growth: "Se utiliza para el cultivo de microorganismos heterótrofos.",
                    caracteristics: "BACTO 2R",
                },
                {
                    growth: "Medio selectivo y diferencial utilizado para el control presuntivo de E. coli y coliformes en aguas.",
                    caracteristics: "CHAPMAN TTC",
                },
                {
                    growth: "Es utilizado en el control de esterilidad de productos biológicos, farmacéuticos y cosméticos.",
                    caracteristics: "TSB",
                },
                {
                    growth: "Medio selectivo y diferencial para enumeración de coliformes fecales por la técnica de Filtración de Membrana, en aguas.",
                    caracteristics: "M-FC",
                },
                {
                    growth: "Este medio se utiliza para el aislamiento primario de Salmonella a partir de muestras fecales humanas.",
                    caracteristics: "SALMONELLA-SHIGELLA",
                },
                {
                    growth: "La selectividad se debe al sulfito de sodio, supresión parcial de los microorganismos Gram +",
                    caracteristics: "ENDO",
                },
                {
                    growth: "Medio para la detección y recuento de enterococos.",
                    caracteristics: "ESTREPTOCOCOS-KF",
                },
                {
                    growth: "Se usa para el aislamiento de hongos.",
                    caracteristics: "SABOURAUD CON CLORANFENICOL",
                },
                {
                    growth: "Es un medio nutricionalmente rico que se utiliza principalmente para el cultivo de bacterias..",
                    caracteristics: "LURIA",
                },
                {
                    growth: "Recuento y detección de E. coli en alimentos.",
                    caracteristics: "TSX",
                },
                {
                    growth: "Medio de cultivo utilizado para diferenciar microorganismos, especialmente Salmonella spp., basado en la descarboxilación y desaminación de la lisina y en la producción de ácido sulfhídrico.",
                    caracteristics: "LIA",
                },
                {
                    growth: "Medio para ensayos de Rojo de metilo y Voges-Proskauer (APHA) para la identificación acorde al IMVIC.",
                    caracteristics: "CLARCK Y LUBS",
                },
            ],
        };
    },
    methods: {

        async getAllData() {
            // obtiene mediante axios los datos del juego
            const allData = await axios.get(
                "http://127.0.0.1:8000/api/getjuego4"
            );

            this.quizsAxios = allData.data;
            console.log(this.quizsAxios);

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
                    console.log(this.quizs[i]);
                }
            }
        },
        checkQuestion() {

        }

    },
    created() {
        this.getAllData();

    }
};
</script>
