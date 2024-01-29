<template>
    <div class="flex justify-center">
        <div
            v-show="help"
            id="tarjeta-info"
            class="flex align-center justify-between gap-5 font-medium font-bold text-gray-500 text-sm bg-yellow-100 text-yellow-700 py-8 px-5 rounded-lg relative mr-2"
        >
            <i class="ph ph-info text-2xl"></i>
            <span class="text-left">Selecciona una molecula de la fila de arriba y emparejala con su imagen correspondiente de la fila de abajo.</span>
            <i class="ph ph-x absolute top-2 right-2 text-xl hover:scale-125 cursor-pointer" @click="hideTutorial"></i>
        </div>
        <div class="flex w-100 h-10">
            <GlassBtn @click="apagar()">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="18" viewBox="0 0 576 512">
                    <path d="M301.1 34.8C312.6 40 320 51.4 320 64V448c0 12.6-7.4 24-18.9 29.2s-25 3.1-34.4-5.3L131.8 352H64c-35.3 0-64-28.7-64-64V224c0-35.3 28.7-64 64-64h67.8L266.7 40.1c9.4-8.4 22.9-10.4 34.4-5.3zM425 167l55 55 55-55c9.4-9.4 24.6-9.4 33.9 0s9.4 24.6 0 33.9l-55 55 55 55c9.4 9.4 9.4 24.6 0 33.9s-24.6 9.4-33.9 0l-55-55-55 55c-9.4 9.4-24.6 9.4-33.9 0s-9.4-24.6 0-33.9l55-55-55-55c-9.4-9.4-9.4-24.6 0-33.9s24.6-9.4 33.9 0z" />
                </svg>
            </GlassBtn>
            <GlassBtn class="ml-2" @click="encender()">
                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="14" viewBox="0 0 448 512">
                    <path d="M301.1 34.8C312.6 40 320 51.4 320 64V448c0 12.6-7.4 24-18.9 29.2s-25 3.1-34.4-5.3L131.8 352H64c-35.3 0-64-28.7-64-64V224c0-35.3 28.7-64 64-64h67.8L266.7 40.1c9.4-8.4 22.9-10.4 34.4-5.3zM412.6 181.5C434.1 199.1 448 225.9 448 256s-13.9 56.9-35.4 74.5c-10.3 8.4-25.4 6.8-33.8-3.5s-6.8-25.4 3.5-33.8C393.1 284.4 400 271 400 256s-6.9-28.4-17.7-37.3c-10.3-8.4-11.8-23.5-3.5-33.8s23.5-11.8 33.8-3.5z" />
                </svg>
            </GlassBtn>
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
import GlassBtn from "../components/GlassBtn.vue";
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
            pista: "",
            descontarTiempo: 0,
            cards: [],
            cardsCopia: [],
            volteo: null,
            names: [],
            imgs: [],
            parejas: [],
            giradas: 0,
            FormulaNames: [],
            audioAcertado:new Audio('../../public/sounds/1200.mp3'),
            audioIncorrecto:new Audio('../../public/sounds/incorrect-cbt-sound.mp3'),
            aplausos:new Audio('../../public/sounds/claps-44774.mp3'),
            fail:new Audio('../../public/sounds/fail-144746.mp3')
        };
    },
    methods: {
        // tutoriales y sonidos
        resetData() {
            this.help = true;
        },

        hideTutorial() {
            this.help = false;
        },

        apagar(){
            this.audioAcertado.muted=true;
            this.audioIncorrecto.muted=true;
            this.aplausos.muted=true;
            this.fail.muted=true;
        },
        encender(){
            this.audioAcertado.muted=false;
            this.audioIncorrecto.muted=false;
            this.aplausos.muted=false;
            this.fail.muted=false;
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
                    this.audioAcertado.play();
                    this.acierto++;
                    if (this.acierto == 4) {
                        this.aplausos.play();
                        this.changeJuego1();
                        this.pista = this.clave[1];
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
                    this.audioIncorrecto.play();
                    this.marcaError(this.contador);
                    this.errores++;
                    if (this.errores == 5) {
                        this.fail.play();
                        this.mostrar = true;
                        //funcion de reducir tiempo en funcion al nivel sabiendo la dificultad
                        this.descontarTiempo = this.saberTiempoXdificultad(
                            this.usuario.dificultad
                        );
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
        ...mapActions(useTemporizadorStore, [
            "reduceTime",
            "saberTiempoXdificultad",
        ]),
        ...mapActions(useFinalyWord, ["getDataBase"]),

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
        GlassBtn,
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
        ...mapWritableState(useFinalyWord, ["clave"]),
        ...mapWritableState(useLoginStore, ["usuario"]),
    },
};
</script>
