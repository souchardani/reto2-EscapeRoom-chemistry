<template>
    <div>
        <div class="flex justify-center mb-12">
            <div
                id="tarjeta-info"
                class="flex align-center justify-between gap-5 font-medium font-bold text-gray-500 text-sm bg-yellow-100 text-yellow-700 py-8 px-5 rounded-lg relative"
            >
                <i class="ph ph-info text-2xl"></i>
                <span class="text-left"
                    >Selecciona la casilla que corresponda</span
                >
                <i
                    class="ph ph-x absolute top-2 right-2 text-xl hover:scale-125 cursor-pointer"
                ></i>
            </div>
        </div>
        <GlassCard>
            <!--<h4 class="text-3xl text-center">{{ quizs[contador].caracteristics }}</h4>-->
        </GlassCard>

        <div class="text-center m-4 flex justify-center">
            <select
                name="answeres"
                class="block px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
            >
                <option v-for="grow in quizs" value="">
                    {{ grow.growth }}
                </option>
            </select>
        </div>

        <div class="text-center m-4 p-4 flex justify-center w-48 m-auto">
            <GlassBtn
                ><button class="w-28" @click="contador++">
                    Next
                </button></GlassBtn
            >
        </div>
    </div>
</template>
<script>
import GlassCard from "../components/GlassCard.vue";
import GlassBtn from "../components/GlassBtn.vue";
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
            quizsAxios: [],
            grows: [
                {
                    quiz: "Recuento de mesófilos, aerobios y heterótrofos.",
                    answere: "PCA",
                },
                {
                    quiz: "Detección de Coliformes, los de fermentación lenta tardan en crecer.",
                    answere: "MCCONKEY",
                },
                {
                    quiz: "Detección y recuento de E. coli y coliformes.",
                    answere: "CCA",
                },
                {
                    quiz: "Para la confirmación de enterococos.",
                    answere: "KAA",
                },
                {
                    quiz: "Detección y recuento de coliformes en agua, alimentos….",
                    answere: "VRBG",
                },
                {
                    quiz: "Se usa para el aislamiento y el cultivo de microorganismos Gram - entéricos, y especialmente para el aislamiento de especies de Shigella y Salmonella.",
                    answere: "HEKTOEN",
                },
                {
                    quiz: "Crecimiento general. Recuento de totales.",
                    answere: "TSA",
                },
                {
                    quiz: "Diferenciación de enterobacterias en base a la fermentación de hidratos de carbono y a la producción de ácido sulfhídrico.",
                    answere: "KIA",
                },
                {
                    quiz: "Diferenciación de enterobacterias en base la capacidad de usar citrato como única fuente de carbono y energía.",
                    answere: "CITRATO SIMMONS",
                },
                {
                    quiz: "Se utiliza para la detección de coliformes y la detección fluorogénica de Escherichia coli en un entorno de laboratorio.",
                    answere: "LAURIL SULFATO CON MUG",
                },
                {
                    quiz: "Es ideal para la enumeración de enterococos mediante el método de dilución en serie (NMP).",
                    answere: "CALDO DE GLUCOSA ACIDA (ROTHE)",
                },
                {
                    quiz: "Aislamiento y recuento de enterococos.",
                    answere: "AGAR SLANETZ Y BARTLEY",
                },
                {
                    quiz: "Al ser con sangre permite crecimiento de organismos nutricionalmente exigentes y la clara visualización de la hemólisis.",
                    answere: "AGAR SANGRE",
                },
                {
                    quiz: "Aislamiento y recuento selectivo de Clostridium perfringens y sus esporas. Colonias amarillo-verdosas.",
                    answere: "MCP",
                },
                {
                    quiz: "Aislamiento  y recuento de Clostridium perfringens en agua, alimentos….",
                    answere: "TSC",
                },
                {
                    quiz: "Diluyente y enriquecimiento bacteriano Se usa en la prueba INDOL y ONPG.",
                    answere: "AGUA DE PEPTONA",
                },
                {
                    quiz: "Para analizar la sensibilidad de cepas aisladas a partir de agentes antimicrobianos ANTIBIOGRAMAS.",
                    answere: "MUELLER-HILTON",
                },
                {
                    quiz: "Diferenciación de la fermentación de lactosa  de tipo butanodiólica y ácido mixta (Diferenciar Serratia-E.coli).",
                    answere: "EMB",
                },
                {
                    quiz: "Se utiliza para el cultivo de microorganismos heterótrofos.",
                    answere: "BACTO 2R",
                },
                {
                    quiz: "Medio selectivo y diferencial utilizado para el control presuntivo de E. coli y coliformes en aguas.",
                    answere: "CHAPMAN TTC",
                },
                {
                    quiz: "Es utilizado en el control de esterilidad de productos biológicos, farmacéuticos y cosméticos.",
                    answere: "TSB",
                },
                {
                    quiz: "Medio selectivo y diferencial para enumeración de coliformes fecales por la técnica de Filtración de Membrana, en aguas.",
                    answere: "M-FC",
                },
                {
                    quiz: "Este medio se utiliza para el aislamiento primario de Salmonella a partir de muestras fecales humanas.",
                    answere: "SALMONELLA-SHIGELLA",
                },
                {
                    quiz: "La selectividad se debe al sulfito de sodio, supresión parcial de los microorganismos Gram +",
                    answere: "ENDO",
                },
                {
                    quiz: "Medio para la detección y recuento de enterococos.",
                    answere: "ESTREPTOCOCOS-KF",
                },
                {
                    quiz: "Se usa para el aislamiento de hongos.",
                    answere: "SABOURAUD CON CLORANFENICOL",
                },
                {
                    quiz: "Es un medio nutricionalmente rico que se utiliza principalmente para el cultivo de bacterias..",
                    answere: "LURIA",
                },
                {
                    quiz: "Recuento y detección de E. coli en alimentos.",
                    answere: "TSX",
                },
                {
                    quiz: "Medio de cultivo utilizado para diferenciar microorganismos, especialmente Salmonella spp., basado en la descarboxilación y desaminación de la lisina y en la producción de ácido sulfhídrico.",
                    answere: "LIA",
                },
                {
                    quiz: "Medio para ensayos de Rojo de metilo y Voges-Proskauer (APHA) para la identificación acorde al IMVIC.",
                    answere: "CLARCK Y LUBS",
                },
            ],
        };
    },
    methods: {/*
        loadQuizs() {
            for (let i = 0; i < 10; i++) {
                let random = Math.floor(Math.random() * this.grows.length);

                let object = {
                    growth: this.quizsAxios[random],
                    caracteristics: this.quizsAxios[random]
                };
                this.quizs.push(object);
            }
        },*/

        async getAllData() {
            const allData = await axios.get(
                "http://127.0.0.1:8000/api/getjuego4"
            );
            this.quizsAxios = allData.data;
            console.log(this.quizsAxios);
            //this.getNames();
            //this.getNamesCopia(this.cards);
            //this.loadQuizs();
            console.log(this.quizsAxios[0].growth + " - " + this.quizsAxios[0].caracteristics);

            for (let i = 0; i < 10; i++) {
                let random = Math.floor(Math.random() * this.quizsAxios.length);

                let object = {
                    growth: this.quizsAxios[random].growth,
                    caracteristics: this.quizsAxios[random].caracteristics
                };
                this.quizs.push(object);
            }
        },
    },/*
    beforeMount() {
        for (let i = 0; i < 10; i++) {
            let qquiz = Math.floor(Math.random() * this.grows.length);

            let object = {
                quiz: this.grows[qquiz].quiz,
                answere: this.grows[qquiz].answere,
            };
            this.quizs.push(object);
        }
    },*/
    mounted() {
        this.getAllData();

    }
};
</script>
