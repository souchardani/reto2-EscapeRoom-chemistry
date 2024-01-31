<template>
    <div class="flex justify-center">
        <div
            v-show="help"
            id="tarjeta-info"
            class="flex align-center justify-between gap-5 font-medium font-bold text-gray-500 text-sm bg-yellow-100 text-yellow-700 py-8 px-5 rounded-lg relative mr-2"
        >
            <i class="ph ph-info text-2xl"></i>
            <span class="text-left"
                >Arrastra los elementos hasta su lugar correspondiente.</span
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
    <!-- Los divs de las categorias -->
    <div class="mt-8">
        <div
            id="board"
            class="grid grid-cols-1 gap-4 sm:grid-cols-5 p-0 text-center"
        >
            <!-- div prueba -->
            <div
                id="filaCompuesto"
                class="rounded-xl bg-zinc-400 pt-3 p-1 px-3 shadow-lg bg-clip-padding bg-opacity-75"
            >
                <div class="filaTitulo mb-5">Por Completar 👉👉</div>
                <Container
                    class="p-3 rounded-xl sm:grid-cols-4 text-center gap-y-1 gap-x-2 bg-opacity-75"
                    group-name="compuestos"
                    @drag-start="handleDragStart('backlog', $event)"
                    @drop="handleDrop('backlog', $event)"
                    :get-child-payload="getChildPayload"
                >
                    <Draggable
                        v-for="compoundElement in compoundDataEach.backlog"
                        :key="compoundElement.compound"
                    >
                        <GlassJuego2
                            :class="{
                                ' border-green-500 border-4':
                                    compoundElement.estado.exito,
                                ' border-red-500 border-4':
                                    compoundElement.estado.error,
                            }"
                            >{{ compoundElement.compound }}</GlassJuego2
                        >
                    </Draggable>
                </Container>
            </div>
            <div
                id="filaCompuesto"
                class="rounded-xl bg-orange-500 pt-3 p-1 px-3 shadow-lg bg-clip-padding bg-opacity-75 h-fit"
            >
                <div class="filaTitulo mb-5">Analisis</div>
                <Container
                    group-name="compuestos"
                    @drag-start="handleDragStart('analisis', $event)"
                    @drop="handleDrop('analisis', $event)"
                    :get-child-payload="getChildPayload"
                    :drop-placeholder="{ className: 'placeholder' }"
                >
                    <GlassJuego2 v-if="compoundDataEach.analisis.length == 0">{{
                        "Arrastra aqui &#x261D; &#x261D;"
                    }}</GlassJuego2>
                    <Draggable
                        v-else
                        v-for="compuesto in compoundDataEach.analisis"
                        :key="compuesto.compound"
                    >
                        <GlassJuego2
                            :class="{
                                ' border-green-500 border-4':
                                    compuesto.estado.exito,
                                ' border-red-500 border-4':
                                    compuesto.estado.error,
                            }"
                            >{{ compuesto.compound }}</GlassJuego2
                        >
                    </Draggable>
                </Container>
            </div>
            <div
                id="filaCompuesto"
                class="rounded-xl bg-green-500 pt-3 p-1 px-3 shadow-lg bg-clip-padding bg-opacity-75 h-fit"
            >
                <div class="filaTitulo mb-5">Microbiología</div>
                <Container
                    group-name="compuestos"
                    @drag-start="handleDragStart('microbiologia', $event)"
                    @drop="handleDrop('microbiologia', $event)"
                    :get-child-payload="getChildPayload"
                    :drop-placeholder="{ className: 'placeholder' }"
                >
                    <GlassJuego2
                        v-if="compoundDataEach.microbiologia.length == 0"
                        >{{ "Arrastra aqui &#x261D; &#x261D;" }}</GlassJuego2
                    >
                    <Draggable
                        v-else
                        v-for="compuesto in compoundDataEach.microbiologia"
                        :key="compuesto.compound"
                    >
                        <GlassJuego2
                            :class="{
                                ' border-green-500 border-4':
                                    compuesto.estado.exito,
                                ' border-red-500 border-4':
                                    compuesto.estado.error,
                            }"
                            >{{ compuesto.compound }}</GlassJuego2
                        >
                    </Draggable>
                </Container>
            </div>
            <div
                id="filaCompuesto"
                class="rounded-xl bg-blue-400 pt-3 p-1 px-3 shadow-lg bg-clip-padding bg-opacity-75 h-fit"
            >
                <div class="filaTitulo mb-5">Medida</div>
                <Container
                    group-name="compuestos"
                    @drag-start="handleDragStart('medida', $event)"
                    @drop="handleDrop('medida', $event)"
                    :get-child-payload="getChildPayload"
                    :drop-placeholder="{ className: 'placeholder' }"
                >
                    <GlassJuego2 v-if="compoundDataEach.medida.length == 0">{{
                        "Arrastra aqui &#x261D; &#x261D;"
                    }}</GlassJuego2>
                    <Draggable
                        v-else
                        v-for="compuesto in compoundDataEach.medida"
                        :key="compuesto.compound"
                    >
                        <GlassJuego2
                            :class="{
                                ' border-green-500 border-4':
                                    compuesto.estado.exito,
                                ' border-red-500 border-4':
                                    compuesto.estado.error,
                            }"
                            >{{ compuesto.compound }}</GlassJuego2
                        >
                    </Draggable>
                </Container>
            </div>
            <div
                id="filaCompuesto"
                class="rounded-xl bg-zinc-400 pt-3 p-1 px-3 shadow-lg bg-clip-padding bg-opacity-75 h-fit"
            >
                <div class="filaTitulo mb-5">Biotecnología</div>
                <Container
                    group-name="compuestos"
                    @drag-start="handleDragStart('biotecnologia', $event)"
                    @drop="handleDrop('biotecnologia', $event)"
                    :get-child-payload="getChildPayload"
                    :drop-placeholder="{ className: 'placeholder' }"
                >
                    <GlassJuego2
                        v-if="compoundDataEach.biotecnologia.length == 0"
                        >{{ "Arrastra aqui &#x261D; &#x261D;" }}</GlassJuego2
                    >
                    <Draggable
                        v-else
                        v-for="compuesto in compoundDataEach.biotecnologia"
                        :key="compuesto.compound"
                    >
                        <GlassJuego2
                            :class="{
                                ' border-green-500 border-4':
                                    compuesto.estado.exito,
                                'pointer-events-none': compuesto.estado.exito,
                                ' border-red-500 border-4':
                                    compuesto.estado.error,
                            }"
                            >{{ compuesto.compound }}</GlassJuego2
                        >
                    </Draggable>
                </Container>
            </div>
        </div>
    </div>

    <!-- modals -->
    <success
        v-bind:enhorabuena="enhorabuena"
        @clicked2="closeModal"
        :pista="this.clave[2]"
    ></success>
    <unsuccess v-bind:mostrar="mostrar" @clicked="closeModal"></unsuccess>

    <!-- El div de los compuestos -->
    <!-- <div class="my-12">
        <div id="filaCompuestosACompletar">
            <Container
                class="bg-slate-400 p-3 rounded-xl flex flex-wrap sm:grid-cols-4 p-0 text-center gap-y-1 gap-x-2 bg-opacity-75"
                group-name="compuestos"
                @drag-start="handleDragStart('backlog', $event)"
                @drop="handleDrop('backlog', $event)"
                :get-child-payload="getChildPayload"
            >
                <Draggable
                    v-for="compoundElement in compoundDataEach.backlog"
                    :key="compoundElement.compound"
                >
                    <GlassJuego2>{{ compoundElement.compound }}</GlassJuego2>
                </Draggable>
            </Container>
        </div>
    </div> -->
</template>
<script>
import GlassBtn from "../components/GlassBtn.vue";
import { useProgressBarStore } from "../store/progressBar";
import { useFinalyWord } from "../store/finalyWord";
import { mapWritableState } from "pinia";
import { mapActions } from "pinia";
import unsuccess from "../components/modals/unsuccess.vue";
import success from "../components/modals/success.vue";
import JSConfetti from "js-confetti";
import { useTemporizadorStore } from "../store/TemporizadorStore";
import { useCheckStore } from "../store/checkState";
import { useLoginStore } from "../store/LoginStore";
//libreria para el draggable
import { Container, Draggable } from "vue3-smooth-dnd";
import GlassJuego2 from "../components/GlassJuego2.vue";
import axios from "axios";

export default {
    components: {
        GlassBtn,
        GlassJuego2,
        Container,
        Draggable,
        unsuccess,
        success,
    },
    data() {
        return {
            help: true,
            audioAcertado:new Audio('/sounds/1200.mp3'),
            audioIncorrecto:new Audio('/sounds/incorrect-cbt-sound.mp3'),
            aplausos:new Audio('/sounds/claps-44774.mp3'),
            fail:new Audio('/sounds/fail-144746.mp3'),
            pista: "",
            erroresTotales: 20,
            contador: 0,
            mostrar: false, //esta variable es del componente modal unsuccess
            enhorabuena: false, //esta variable es para controlar el modal success
            descontarTiempo: 0, //esta variable determina el tiempo a descontar dependiendo de la dificultad
            classError: {
                estado: false,
                clase: "border border-red-500 border-4",
            },
            classSuccess: {
                estado: false,
                clase: "bg-green-500",
            },

            // datos de prueba para el diseño
            compoundTestData: [
                {
                    compound: "compuesto 1",
                    category: "ANALISIS",
                },
                {
                    compound: "compuesto 2",
                    category: "ANALISIS",
                },
                {
                    compound: "compuesto 3",
                    category: "MICROBIOLOGIA",
                },
                {
                    compound: "compuesto 4",
                    category: "MICROBIOLOGIA",
                },
                {
                    compound: "compuesto 5",
                    category: "MEDIDA",
                },
                {
                    compound: "compuesto 6",
                    category: "MEDIDA",
                },
                {
                    compound: "compuesto 7",
                    category: "BIOTECNOLOGIA",
                },
                {
                    compound: "compuesto 8",
                    category: "BIOTECNOLOGIA",
                },
            ],
            compoundDataEach: {
                microbiologia: [],

                analisis: [],
                medida: [],
                biotecnologia: [],
                backlog: [],
            },
            dragginCard: {
                fila: "",
                index: -1,
                cardData: {},
            },
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

        handleDragStart(fila, dragResult) {
            const { payload, isSource } = dragResult;
            if (isSource) {
                this.dragginCard = {
                    fila,
                    index: payload.index,
                    cardData: {
                        ...this.compoundDataEach[fila][payload.index],
                    },
                };
            }
        },
        handleDrop(fila, dropResult) {
            const { removedIndex, addedIndex, payload } = dropResult;
            if (fila === this.dragginCard.fila && removedIndex === addedIndex) {
                return;
            }
            if (removedIndex !== null) {
                this.compoundDataEach[fila].splice(removedIndex, 1);
            }
            if (addedIndex !== null) {
                this.compoundDataEach[fila].splice(
                    addedIndex,
                    0,
                    this.dragginCard.cardData
                );
                this.comprobarFamilia(
                    fila,
                    this.dragginCard.cardData,
                    addedIndex
                );
            }
        },
        getChildPayload(index) {
            return {
                index,
            };
        },
        comprobarFamilia(filaSoltada, datosTarjeta, addedIndex) {
            if (filaSoltada === "backlog") {
                this.compoundDataEach[filaSoltada][
                    addedIndex
                ].estado.error = false;
                this.compoundDataEach[filaSoltada][
                    addedIndex
                ].estado.exito = false;
            } else {
                if (filaSoltada === datosTarjeta.category.toLowerCase()) {
                    //*******ES UN ACIERTO */
                    this.erroresTotales--;
                    this.audioAcertado.play();
                    console.log("errores" + this.erroresTotales);
                    if (this.compoundDataEach[filaSoltada].length == 1) {
                        this.compoundDataEach[
                            filaSoltada
                        ][0].estado.exito = true;
                        this.compoundDataEach[
                            filaSoltada
                        ][0].estado.error = false;
                    } else {
                        this.compoundDataEach[filaSoltada][
                            addedIndex
                        ].estado.exito = true;
                        this.compoundDataEach[filaSoltada][
                            addedIndex
                        ].estado.error = false;
                    }
                    if (this.erroresTotales == 0) {
                        this.aplausos.play();
                        this.enhorabuena = true;
                        const jsConfetti = new JSConfetti();
                        jsConfetti.addConfetti();
                        this.changeJuego2();
                        //reiniciar estado de barra de errores
                        this.resetState();
                    }
                } else {
                    //*******ES UN ERROR *
                    if (this.compoundDataEach[filaSoltada].length == 1) {
                        this.compoundDataEach[
                            filaSoltada
                        ][0].estado.error = true;
                        this.compoundDataEach[
                            filaSoltada
                        ][0].estado.exito = false;
                    } else {
                        this.compoundDataEach[filaSoltada][
                            addedIndex
                        ].estado.error = true;
                        this.compoundDataEach[filaSoltada][
                            addedIndex
                        ].estado.exito = false;
                    }

                    this.contador++;
                    this.audioIncorrecto.play();
                    this.marcaError(this.contador);
                    if (this.contador == 5) {
                        this.fail.play();
                        this.mostrar = true;
                        this.descontarTiempo = this.saberTiempoXdificultad(
                            this.usuario.dificultad
                        );
                        this.reduceTime(this.descontarTiempo);
                    }
                }
            }
        },
        ...mapActions(useProgressBarStore, [
            "insertaFallo1",
            "insertaFallo2",
            "insertaFallo3",
            "insertaFallo4",
            "insertaFallo5",
            "incrementafallo",
            "marcaError",
            "resetState",
        ]),
        ...mapActions(useTemporizadorStore, [
            "reduceTime",
            "saberTiempoXdificultad",
        ]),
        ...mapActions(useCheckStore, ["changeJuego2"]),

        closeModal() {
            this.mostrar = false;
            this.enhorabuena = false;
            this.$router.push("StartGame");
            this.resetState();
        },
        resetState() {
            this.compoundDataEach = {
                microbiologia: [],
                analisis: [],
                medida: [],
                biotecnologia: [],
                backlog: [],
            };
            this.contador = 0;
        },
        getCardData() {
            return axios
                .get("http://44.196.190.239/api/getjuego2")
                .then((response) => {
                    this.compoundDataEach.backlog = response.data;
                    //mezclamos el array
                    this.mezclarArray(this.compoundDataEach.backlog);
                    //añadimos el objeto que maneja el estado de cada card
                    this.addExitoError();
                    //obtenemos 10 compuestos aleatorios
                    this.obtener20();
                });
        },
        addExitoError() {
            this.compoundDataEach.backlog.forEach((element) => {
                element.estado = {
                    exito: false,
                    error: false,
                };
            });
        },
        mezclarArray() {
            this.compoundDataEach.backlog.sort(() => Math.random() - 0.5);
        },
        obtener20() {
            let array20 = [];
            for (let i = 0; i < 20; i++) {
                array20.push(this.compoundDataEach.backlog[i]);
            }
            this.compoundDataEach.backlog = array20;
        },
    },

    mounted() {
        this.resetData();
        this.getCardData().then(() => {
            console.log(
                "*********Para los que no controlamos de quimica, las respuestas correctas son:*******"
            );
            console.log(this.compoundDataEach.backlog);
        });
    },
    computed: {
        ...mapWritableState(useFinalyWord, ["clave"]),
        ...mapWritableState(useLoginStore, ["usuario"]), //para usar la variable de usuario del store
    },
};
</script>

<style>
.placeholder {
    background: rgba(33, 33, 33, 0.3);
    border-radius: 0.4rem;
    transform: scaleY(0.85);
    transform-origin: 0% 0%;
}
</style>
