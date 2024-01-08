<template>
    <!-- main cards -->
    <div class="grid grid-cols-2 place-content-center justify-items-center">
        <FlipCard  @volteo="comprobar" v-for="(card,index) in cards" :key="index" :name="card.name" :id="card.id" :ref="card.id">
                    <p class="text-center">{{ card.name }}</p>
        </FlipCard>
        <FlipCard  @volteo="comprobar" v-for="(card,index) in cards" :key="index" :name="card.name" :id="card.id" :ref="card.id">
                <img :src="obtenerImagenes(card.name)"/>
         </FlipCard>
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
                    id:1,
                    name: "Formaldehyde",
                    img: "Formaldehyde.svg",
                },
                {
                    id:2,
                    name: "Beta-D-Galactopyranose",
                    img: "Beta-D-Galactopyranose.svg",
                },
                {
                    id:3,
                    name: "D-ribosa",
                    img: "D-ribosa.svg",
                },
                {
                    id:4,
                    name: "Pyruvate_decarb_1",
                    img: "Pyruvate_decarb_1.svg",
                },
                {
                    id:5,
                    name: "Lactic-acid-skeletal",
                    img: "Lactic-acid-skeletal.svg",
                },
                {
                    id:6,
                    name: "Benzyl_chloride",
                    img: "Benzyl_chloride.svg",
                },
                {
                    id:7,
                    name: "Phenol_chemical_structure_es",
                    img: "Phenol_chemical_structure_es.svg",
                },
                {
                    id:8,
                    name: "Anisol",
                    img: "Anisol.svg",
                },
                {
                    id:9,
                    name: "Sodium_acetate_formula_V_1",
                    img: "Sodium_acetate_formula_V_1.svg",
                },
                {
                    id:10,
                    name: "Ethyl_benzoate",
                    img: "Ethyl_benzoate.svg",
                },
                {
                    id:11,
                    name: "Methyl_acetate",
                    img: "Methyl_acetate.svg",
                },
                {
                    id:12,
                    name: "Benzoic_anhydride",
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
        comprobar(estado,id){

                this.parejas.push(id);
                this.giradas++;
                if(this.giradas==2){
                    if(this.parejas[0]===this.parejas[1]){
                        alert ("pareja encontrada");
                    }else{
                        alert("las parejas no son iguales");
                        this.parejas.forEach(pareja=>{
                           this.$refs[pareja][0].voltearDeNuevo();
                           this.$refs[pareja][1].voltearDeNuevo();
                        });
                    }
                    this.parejas=[];
                    this.giradas=0;
                }



                   /*  this.cards.forEach(card => {
                        // Accedo a la instancia del componente hijo usando $refs
                        const flipCardInstance = this.$refs['FlipCard' + card.index][0];

                        // Ahora puedes acceder a la propiedad ConVolteo
                        if (flipCardInstance.ConVolteo) {
                        this.giradas++;
                        }
                    }); */
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

