<template>
    <div class="flex justify-center mb-12">
        <div
            v-show="help"
            id="tarjeta-info"
            class="flex align-center justify-between gap-5 font-medium font-bold text-gray-500 text-sm bg-yellow-100 text-yellow-700 py-8 px-5 rounded-lg relative"
        >
            <i class="ph ph-info text-2xl"></i>
            <span class="text-left">Selecciona una molecula de la fila de arriba y emparejala con su imagen correspondiente de la fila de abajo.</span>
            <i class="ph ph-x absolute top-2 right-2 text-xl hover:scale-125 cursor-pointer" @click="hideTutorial"></i>
        </div>
    </div>
    <!-- main cards -->
    <div
        class="grid grid-cols-2 md:grid-cols-4 place-content-center justify-items-center"
    >
        <FlipCard
            @volteo="comprobar"
            v-for="(card, index) in cards"
            :key="index"
            :name="card.molecule"
            :id="card.id"
            :ref="card.id"
        >
            <p class="text-center">{{ card.molecule }}</p>
        </FlipCard>
        <FlipCard
            @volteo="comprobar"
            v-for="(card, index) in cardsCopia"
            :key="index"
            :name="card.molecule"
            :id="card.id"
            :ref="card.id"
        >
            <img :src="obtenerImagenes(card.molecule)" />
        </FlipCard>
        <success
            v-bind:enhorabuena="enhorabuena"
            @clicked2="closeModal"
            :pista="this.clave[1]"
        ></success>
        <unsuccess v-bind:mostrar="mostrar" @clicked="closeModal"></unsuccess>
    </div>
</template>
<script>
import DescripcionJuego from "../components/DescripcionJuego.vue";
import GlassCard from "../components/GlassCard.vue";
import Reloj from "../components/Reloj.vue";
import BtnSalir from "../components/BtnSalir.vue";
import FlipCard from "../components/Flip-Card.vue";
import { useProgressBarStore } from "../store/progressBar";
import { useCheckStore } from "../store/checkState";
import { useFinalyWord } from "../store/finalyWord";
import { useTemporizadorStore } from "../store/TemporizadorStore";
import { useLoginStore } from "../store/LoginStore";
import { mapWritableState } from "pinia";
import { mapActions } from "pinia";
import unsuccess from "../components/modals/unsuccess.vue";
import success from "../components/modals/success.vue";
import JSConfetti from "js-confetti";
import axios from "axios";
export default {
    data() {
        return {
            help: true,
            errores: 0,
            mostrar: false, //esta variable es del componente modal unsuccess
            enhorabuena: false, //esta variable es para controlar el modal success
            acierto: 0,
            pista:"",
            descontarTiempo:0,
            cards: [],
            cardsCopia: [],
            volteo: null,
            names: [],
            imgs: [],
            parejas: [],
            giradas: 0,
            FormulaNames: [],

        };
    },
    methods: {

        resetData() {
            this.help = true;
        },

        hideTutorial() {
            this.help = false;
        },

        //recojo datos de la base de datos y relleno el array de manera aleatoria para que no se repita el juego
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
        //este metodo controla la aparicion del modal
        closeModal() {
            this.mostrar = false;
            this.enhorabuena = false;
            this.$router.push("StartGame");
        },
        //funcion para concatenar los diferentes array de elementos y volver a seleccionar de manera aleatoria
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
        //funcion para mostrar las imagenes en las cards
        obtenerImagenes(name) {
            let respuestaAObtener = this.FormulaNames.filter(
                (respuesta) => respuesta.molecule === name
            );
            let img = respuestaAObtener[0].img_molecule;
            console.log(img);
            return "game1_puzzles_img/" + img;
        },

        comprobar(estado, id) {
            this.parejas.push(id);
            this.giradas++;
            if (this.giradas == 2) {
                if (this.parejas[0] === this.parejas[1]) {
                    this.acierto++;
                    if (this.acierto == 4) {
                        this.changeJuego1();
                        this.pista=this.clave[1];
                        this.enhorabuena = true;
                        //animacion cuando completas
                        const jsConfetti = new JSConfetti();
                        jsConfetti.addConfetti();
                        //reiniciar estado de barra de errores
                        this.resetState();
                    }
                    this.parejas.forEach((pareja) => {
                        this.$refs[pareja][0].correct(); //correct es la clase de resultado encontrado
                        this.$refs[pareja][1].correct();
                    });
                } else {
                    this.parejas.forEach((pareja) => {
                        this.$refs[pareja][0].voltearDeNuevo(); //esta funcion devuelve las card a su estado inicial en caso de error
                        this.$refs[pareja][1].voltearDeNuevo();
                    });
                    //compropar los errores de la barra y llama a la funcion de restar tiempo
                    this.marcaError(this.contador);
                    this.errores++;
                    if (this.errores == 5) {
                        this.mostrar = true;
                        //funcion de reducir tiempo en funcion al nivel sabiendo la dificultad
                        this.descontarTiempo=this.saberTiempoXdificultad(this.usuario.dificultad);
                        this.reduceTime(this.descontarTiempo);
                    }
                }
                this.parejas = [];
                this.giradas = 0;
            }
        },
        //por cada componente de que tenga un store de pinia , y utilizar sus metodos o actions debemos iportar MAPACTIONS
        //por cada componente en un array añadiremos sus metodos
        ...mapActions(useProgressBarStore, [
            "insertaFallo1",
            "insertaFallo2",
            "insertaFallo3",
            "insertaFallo4",
            "insertaFallo5",
            "incrementafallo",
            "resetState",
        ]),
        ...mapActions(useCheckStore, ["changeJuego1"]),
        ...mapActions(useTemporizadorStore, ["reduceTime","saberTiempoXdificultad"]),
        ...mapActions(useFinalyWord,["getDataBase"]),

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
        //peticion asincrona de los datos de la base de datos
        async getAllData() {
            const allData = await axios.get(
                "http://127.0.0.1:8000/api/getjuego1"
            );
            this.FormulaNames = allData.data;
            console.log(this.FormulaNames);
            this.getNames();
            this.getNamesCopia(this.cards);
        },
    },
    //al montar, llamo a la funcion que me cargue los datos
    mounted() {
        this.resetData();
        this.getAllData();
        this.getDataBase();
    },
    //añadimos los componetes que vamos a utilizar
    components: {
        DescripcionJuego,
        GlassCard,
        Reloj,

        BtnSalir,
        FlipCard,
        unsuccess,
        success,
    },
    //por cada componente de que tenga un store de pinia , para utilizar sus propiedade computadas o getters y las variables debemos iportar mapWritableState
    //por cada componente en un array añadiremos sus metodos computados y sus variables
    computed: {
        ...mapWritableState(useProgressBarStore, ["contador"]),
        ...mapWritableState(useFinalyWord,['clave']),
        ...mapWritableState(useLoginStore,["usuario"]),
    },
};
</script>
