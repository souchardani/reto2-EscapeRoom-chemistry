<template>
    <!-- main cards -->
    <div class="grid grid-cols-2 place-content-center justify-items-center">
        <FlipCard
            @volteo="comprobar"
            v-for="(card, index) in cards"
            :key="index"
            :name="card.name"
            :id="card.id"
            :ref="card.id"
        >
            <p class="text-center">{{ card.name }}</p>
        </FlipCard>
        <FlipCard
            @volteo="comprobar"
            v-for="(card, index) in cardsCopia"
            :key="index"
            :name="card.name"
            :id="card.id"
            :ref="card.id"
        >
            <img :src="obtenerImagenes(card.name)" />
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
import { useProgressBarStore } from "../store/progressBar";
import { useCheckStore } from "../store/checkState";
import { mapWritableState } from "pinia";
import { mapActions } from "pinia";
export default {
    data() {
        return {
            acierto:0,
            cards: [],
            cardsCopia: [],
            volteo: null,
            names: [],
            imgs: [],
            parejas: [],
            giradas: 0,
            FormulaNames: [
                {
                    //los objetos estan hardcodeados para hacer pruebas, deaspues se tendrán que recoger de la BD
                    id: 1,
                    name: "Formaldehyde",
                    img: "Formaldehyde.svg",
                },
                {
                    id: 2,
                    name: "Beta-D-Galactopyranose",
                    img: "Beta-D-Galactopyranose.svg",
                },
                {
                    id: 3,
                    name: "D-ribosa",
                    img: "D-ribosa.svg",
                },
                {
                    id: 4,
                    name: "Pyruvate_decarb_1",
                    img: "Pyruvate_decarb_1.svg",
                },
                {
                    id: 5,
                    name: "Lactic-acid-skeletal",
                    img: "Lactic-acid-skeletal.svg",
                },
                {
                    id: 6,
                    name: "Benzyl_chloride",
                    img: "Benzyl_chloride.svg",
                },
                {
                    id: 7,
                    name: "Phenol_chemical_structure_es",
                    img: "Phenol_chemical_structure_es.svg",
                },
                {
                    id: 8,
                    name: "Anisol",
                    img: "Anisol.svg",
                },
                {
                    id: 9,
                    name: "Sodium_acetate_formula_V_1",
                    img: "Sodium_acetate_formula_V_1.svg",
                },
                {
                    id: 10,
                    name: "Ethyl_benzoate",
                    img: "Ethyl_benzoate.svg",
                },
                {
                    id: 11,
                    name: "Methyl_acetate",
                    img: "Methyl_acetate.svg",
                },
                {
                    id: 12,
                    name: "Benzoic_anhydride",
                    img: "Benzoic_anhydride.svg",
                },
            ],
        };
    },
    methods: {
        getNames() {
            while (this.cards.length < 4) {
                const randomIndex = Math.floor(
                    Math.random() * this.FormulaNames.length
                );
                const selectedFormula = this.FormulaNames[randomIndex];

                // Verificar si el elemento ya está en this.cards antes de agregarlo
                if (!this.cards.includes(selectedFormula)) {
                    this.cards.push(selectedFormula);
                }
            }

            return this.cards;
        },
        getNamesCopia(array) {
            this.cardsCopia = array.slice();
            for (let i = this.cardsCopia.length - 1; i > 0; i--) {
                const j = Math.floor(Math.random() * (i + 1));
                [this.cardsCopia[i], this.cardsCopia[j]] = [
                    this.cardsCopia[j],
                    this.cardsCopia[i],
                ];
            }
        },

        obtenerImagenes(name) {
            let respuestaAObtener = this.FormulaNames.filter(
                (respuesta) => respuesta.name === name
            );
            let img = respuestaAObtener[0].img;
            console.log(img);
            return "game1_puzzles_img/" + img;
        },
        comprobar(estado, id) {
            this.parejas.push(id);
            this.giradas++;
            if (this.giradas == 2) {
                if (this.parejas[0] === this.parejas[1]) {
                    alert("pareja encontrada");
                    this.parejas.forEach((pareja) => {
                        this.$refs[pareja][0].correct(); //correct es la clase de resultado encontrado
                        this.$refs[pareja][1].correct();
                    });
                    this.acierto++;
                    if(this.acierto==4){

                        this.changeJuego1();
                        alert("enhoraBuena, has completado el juego");
                        this.$router.push("/StartGame");
                    }

                } else {
                    alert("las parejas no son iguales");
                    this.parejas.forEach((pareja) => {
                        this.$refs[pareja][0].voltearDeNuevo(); //esta funcion devuelve las card a su estado inicial en caso de error
                        this.$refs[pareja][1].voltearDeNuevo();
                    });
                    this.marcaError(this.contador);

                    console.log("el contador es" + this.contador);
                }
                this.parejas = [];
                this.giradas = 0;
            }
        },

        ...mapActions(useProgressBarStore, [
            "insertaFallo1",
            "insertaFallo2",
            "insertaFallo3",
            "insertaFallo4",
            "insertaFallo5",
            "incrementafallo"
        ]),
        ...mapActions(useCheckStore,["changeJuego1"]),

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
    mounted() {
        this.getNames();
        this.getNamesCopia(this.cards);
    },

    components: {
        DescripcionJuego,
        GlassCard,
        Reloj,
        ProgressBar,
        BtnSalir,
        FlipCard,
    },
    computed: {
        ...mapWritableState(useProgressBarStore, ["contador"]),

    },
};
</script>
