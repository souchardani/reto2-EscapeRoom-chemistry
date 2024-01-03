<template>
    <!-- main cards -->
    <div class="grid grid-cols-2 place-content-center justify-items-center" @change="comprobar">
         <FlipCard @volteo="volteo=$event" :ref="'FlipCard'+index" v-for="(card,index) in cards" :key="index">
                    <p class="text-center">{{ card.name }}</p>
        </FlipCard>
       <!--  <FlipCard v-for="(card) in cards">
                <img :src="obtenerImagenes(card.name)"/>
         </FlipCard>-->
        </div>
</template>
<script>
import DescripcionJuego from "../components/DescripcionJuego.vue";
import GlassCard from "../components/GlassCard.vue";
import Reloj from "../components/Reloj.vue";
import ProgressBar from "../components/ProgressBar.vue";
import BtnSalir from "../components/BtnSalir.vue";
import FlipCard from "../components/Flip-Card.vue";
export default {
    data() {
        return {
            cards: [],
            volteo:null,
            names:[],
            imgs:[],
            parejas:[],
            arrayconcatenado:[],
            arrayDesordenado:[],
            giradas:0,
            FormulaNames: [
                {
                    //los objetos estan hardcodeados para hacer pruebas, deaspues se tendrán que recoger de la BD
                    name: "Formaldehyde.svg",
                    img: "Formaldehyde.svg",
                },
                {
                    name: "Beta-D-Galactopyranose.svg",
                    img: "Beta-D-Galactopyranose.svg",
                },
                {
                    name: "D-ribosa.svg",
                    img: "D-ribosa.svg",
                },
                {
                    name: "Pyruvate_decarb_1.svg",
                    img: "Pyruvate_decarb_1.svg",
                },
                {
                    name: "Lactic-acid-skeletal.svg",
                    img: "Lactic-acid-skeletal.svg",
                },
                {
                    name: "Benzyl_chloride.svg",
                    img: "Benzyl_chloride.svg",
                },
                {
                    name: "Phenol_chemical_structure_es.svg",
                    img: "Phenol_chemical_structure_es.svg",
                },
                {
                    name: "Anisol.svg",
                    img: "Anisol.svg",
                },
                {
                    name: "Sodium_acetate_formula_V_1.svg",
                    img: "Sodium_acetate_formula_V_1.svg",
                },
                {
                    name: "Ethyl_benzoate.svg",
                    img: "Ethyl_benzoate.svg",
                },
                {
                    name: "Methyl_acetate.svg",
                    img: "Methyl_acetate.svg",
                },
                {
                    name: "Benzoic_anhydride.svg",
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
        //en esta funcion separo de las imagenes que se han seleccionado, separo el nombre y el nombre de la img
        selectName(array){
            array.forEach(element => {
                let name=element['name'];
                this.names.push(name);
                let img=element['img'];
                this.imgs.push(img);
                });
            },
        //concateno los dos arrays de nombre y nombre de imgenes
        concatenarArray(array,array2){
            this.arrayconcatenado=array.concat(array2)
            return this.arrayconcatenado;
        },
        //desordeno el array para que aparezcan en posiciones diferentes
        desordenarArray(array){
            this.arrayDesordenado=array.sort(function(){return Math.random() -0.5});
            return this.arrayDesordenado;
        },
        obtenerImagenes(name) {
            let respuestaAObtener = this.FormulaNames.filter(
                (respuesta) => respuesta.name === name
            );
            let img = respuestaAObtener[0].img;
            console.log(img);
            return "game1_puzzles_img/" + img;
        },
        comprobar(){
                    this.cards.forEach(card => {
                        // Accedo a la instancia del componente hijo usando $refs
                        const flipCardInstance = this.$refs['FlipCard' + card.index][0];

                        // Ahora puedes acceder a la propiedad ConVolteo
                        if (flipCardInstance.ConVolteo) {
                        this.giradas++;
                        }
                    });
                },

    },
    mounted() {
        this.getNames();
        this.selectName(this.cards);
        this.concatenarArray(this.names,this.imgs);
        this.desordenarArray(this.arrayconcatenado);
    },

    components: {
        DescripcionJuego,
        GlassCard,
        Reloj,
        ProgressBar,
        BtnSalir,
        FlipCard
    },
    computed: {

    },
};
 </script>

