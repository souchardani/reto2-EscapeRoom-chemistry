<template>
    <div
        class="relative container-fluid backdrop-blur-lg min-h-screen px-12 p-8"
        style="
            background-color: rgb(88, 28, 135);
            background-image: radial-gradient(
                    at 86% 61%,
                    rgb(190, 24, 93) 0,
                    transparent 57%
                ),
                radial-gradient(
                    at 56% 55%,
                    rgb(52, 211, 153) 0,
                    transparent 28%
                ),
                radial-gradient(
                    at 49% 17%,
                    rgb(34, 211, 238) 0,
                    transparent 75%
                ),
                radial-gradient(at 75% 23%, rgb(30, 64, 175) 0, transparent 73%),
                radial-gradient(
                    at 77% 71%,
                    rgb(252, 211, 77) 0,
                    transparent 25%
                ),
                radial-gradient(
                    at 87% 91%,
                    rgb(139, 92, 246) 0,
                    transparent 81%
                );
        "
    >
        <div class="flex justify-end">
            <BtnSalir></BtnSalir>
        </div>
        <h1
            class="text-center font-medium p-5 pt-6 pb-6 text-4xl mb-5 drop-shadow-2xl md:text-5xl"
        >
            El Rompecabezas de los Elementos
        </h1>
        <!-- glass card -->
        <DescripcionJuego
            texto="Trabaja tu memoria volteado las tarjetas y juntando las imagenes con los nombres"
        ></DescripcionJuego>
        <!-- component -->
        <ProgressBar></ProgressBar>
        <!-- main cards -->
        <div
            class="grid grid-cols-2 gap-5 items-center m-5 justify-items-center m-5"
        >
            <CardJuego v-for="card in cards">
                <p class="text-center">{{ card.name }}</p>
            </CardJuego>
            <CardJuego v-for="card in cards">
                <img :src="obtenerImagenes(card.name)" alt="" />
            </CardJuego>
        </div>
        <!-- reloj transparente -->
        <Reloj></Reloj>
        <!-- boton salir -->
    </div>
</template>

<!-- glass component -->
<!-- <div class="w-100 p-3 m-6">
    <div
        class="text-justify relative px-8 py-10 bg-white shadow-lg rounded-3xl sm:rounded-3xl bg-clip-padding bg-opacity-60 border border-gray-200"
        style="backdrop-filter: blur(20px)"
    >
        <div class="mx-auto">
            contenido
        </div>
    </div>
</div> -->

<!-- boton component -->
<!-- <a
    href="#"
    class="rounded-md bg-white bg-opacity-60 px-3.5 py-2.5 mb-8 text-sm font-semibold text-gray-900 shadow-sm hover:bg-gray-100 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-white"
    style="backdrop-filter: blur(20px)"
>Iniciar Partida</a> -->
<!-- <template>



    </div>
</template> -->
<script>
import DescripcionJuego from "../components/DescripcionJuego.vue";
import GlassCard from "../components/GlassCard.vue";
import Reloj from "../components/Reloj.vue";
import ProgressBar from "../components/ProgressBar.vue";
import CardJuego from "../components/CardJuego.vue";
import BtnSalir from "../components/BtnSalir.vue";

export default {
    data() {
        return {
            cards: [],
            FormulaNames: [
                {
                    //los objetos estan hardcodeados para hacer pruebas, deaspues se tendrán que recoger de la BD
                    name: "Formaldehído",
                    img: "Formaldehyde.svg",
                },
                {
                    name: "Galactosa",
                    img: "Beta-D-Galactopyranose.svg",
                },
                {
                    name: "Ribosa",
                    img: "D-ribosa.svg",
                },
                {
                    name: "Piruvato",
                    img: "Pyruvate_decarb_1.svg",
                },
                {
                    name: "Acido Lactico",
                    img: "Lactic-acid-skeletal.svg",
                },
                {
                    name: "Cloruro de Bencilo",
                    img: "Benzyl_chloride.svg",
                },
                {
                    name: "Fenol",
                    img: "Phenol_chemical_structure_es.svg",
                },
                {
                    name: "Anisol",
                    img: "Anisol.svg",
                },
                {
                    name: "Acetato Sódico",
                    img: "Sodium_acetate_formula_V_1.svg",
                },
                {
                    name: "Benzoato de etilo",
                    img: "Ethyl_benzoate.svg",
                },
                {
                    name: "Acetato de Metilo",
                    img: "Methyl_acetate.svg",
                },
                {
                    name: "Anhídrido Benzoico",
                    img: "Benzoic_anhydride.svg",
                },
            ],
        };
    },
    methods: {
        getNames() {
            for (let i = 0; i < 4; i++) {
                let formulas = Math.floor(
                    Math.random() * this.FormulaNames.length
                );
                this.cards.push(this.FormulaNames[formulas]);
            }
            return this.cards;
        },
        obtenerImagenes(name) {
            let respuestaAObtener = this.FormulaNames.filter(
                (respuesta) => respuesta.name === name
            );
            let img = respuestaAObtener[0].img;
            console.log(img);
            return "game1_puzzles_img/" + img;
        },
    },
    mounted() {
        this.getNames();
    },
    components: {
        DescripcionJuego,
        GlassCard,
        Reloj,
        ProgressBar,
        CardJuego,
        BtnSalir,
    },
    computed: {},
};
</script>
