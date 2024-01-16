<template>
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
                    class="p-3 rounded-xl sm:grid-cols-4 p-0 text-center gap-y-1 gap-x-2 bg-opacity-75"
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
                                'border border-green-500 border-4':
                                    compoundElement.estado.exito,
                                'border border-red-500 border-4':
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
                                'border border-green-500 border-4':
                                    compuesto.estado.exito,
                                'border border-red-500 border-4':
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
                                'border border-green-500 border-4':
                                    compuesto.estado.exito,
                                'border border-red-500 border-4':
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
                                'border border-green-500 border-4':
                                    compuesto.estado.exito,
                                'border border-red-500 border-4':
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
                                'border border-green-500 border-4':
                                    compuesto.estado.exito,
                                'border border-red-500 border-4':
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
    <success v-bind:enhorabuena="enhorabuena" @clicked2="closeModal"></success>
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
import { useProgressBarStore } from "../store/progressBar";
import { mapWritableState } from "pinia";
import { mapActions } from "pinia";
import unsuccess from "../components/modals/unsuccess.vue";
import success from "../components/modals/success.vue";
import JSConfetti from "js-confetti";
import { useTemporizadorStore } from "../store/TemporizadorStore";
import { useCheckStore } from "../store/checkState";
//libreria para el draggable
import { Container, Draggable } from "vue3-smooth-dnd";
import GlassJuego2 from "../components/GlassJuego2.vue";

export default {
    components: {
        GlassJuego2,
        Container,
        Draggable,
        unsuccess,
        success,
    },
    data() {
        return {
            erroresTotales: 8,
            contador: 0,
            mostrar: false, //esta variable es del componente modal unsuccess
            enhorabuena: false, //esta variable es para controlar el modal success
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
                backlog: [
                    {
                        compound: "compuesto 1",
                        category: "ANALISIS",
                        estado: {
                            exito: false,
                            error: false,
                        },
                    },
                    {
                        compound: "compuesto 2",
                        category: "ANALISIS",
                        estado: {
                            exito: false,
                            error: false,
                        },
                    },
                    {
                        compound: "compuesto 3",
                        category: "MICROBIOLOGIA",
                        estado: {
                            exito: false,
                            error: false,
                        },
                    },
                    {
                        compound: "compuesto 4",
                        category: "MICROBIOLOGIA",
                        estado: {
                            exito: false,
                            error: false,
                        },
                    },
                    {
                        compound: "compuesto 5",
                        category: "MEDIDA",
                        estado: {
                            exito: false,
                            error: false,
                        },
                    },
                    {
                        compound: "compuesto 6",
                        category: "MEDIDA",
                        estado: {
                            exito: false,
                            error: false,
                        },
                    },
                    {
                        compound: "compuesto 7",
                        category: "BIOTECNOLOGIA",
                        estado: {
                            exito: false,
                            error: false,
                        },
                    },
                    {
                        compound: "compuesto 8",
                        category: "BIOTECNOLOGIA",
                        estado: {
                            exito: false,
                            error: false,
                        },
                    },
                ],
            },
            dragginCard: {
                fila: "",
                index: -1,
                cardData: {},
            },
        };
    },
    methods: {
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
                    this.compoundDataEach[filaSoltada][
                        addedIndex
                    ].estado.exito = true;
                    this.compoundDataEach[filaSoltada][
                        addedIndex
                    ].estado.error = false;
                    if (this.erroresTotales == 0) {
                        this.enhorabuena = true;
                        const jsConfetti = new JSConfetti();
                        jsConfetti.addConfetti();
                        this.changeJuego2();
                        //reiniciar estado de barra de errores
                        this.resetState();
                    }
                } else {
                    //*******ES UN ERROR */
                    this.compoundDataEach[filaSoltada][
                        addedIndex
                    ].estado.error = true;
                    this.compoundDataEach[filaSoltada][
                        addedIndex
                    ].estado.exito = false;
                    this.contador++;
                    this.marcaError(this.contador);
                    if (this.contador == 5) {
                        this.mostrar = true;
                        this.reduceTime(300);
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
        ...mapActions(useTemporizadorStore, ["reduceTime"]),
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
                backlog: [
                    {
                        compound: "compuesto 1",
                        category: "ANALISIS",
                        estado: {
                            exito: false,
                            error: false,
                        },
                    },
                    {
                        compound: "compuesto 2",
                        category: "ANALISIS",
                        estado: {
                            exito: false,
                            error: false,
                        },
                    },
                    {
                        compound: "compuesto 3",
                        category: "MICROBIOLOGÍA",
                        estado: {
                            exito: false,
                            error: false,
                        },
                    },
                    {
                        compound: "compuesto 4",
                        category: "MICROBIOLOGÍA",
                        estado: {
                            exito: false,
                            error: false,
                        },
                    },
                    {
                        compound: "compuesto 5",
                        category: "MEDIDA",
                        estado: {
                            exito: false,
                            error: false,
                        },
                    },
                    {
                        compound: "compuesto 6",
                        category: "MEDIDA",
                        estado: {
                            exito: false,
                            error: false,
                        },
                    },
                    {
                        compound: "compuesto 7",
                        category: "BIOTECNOLOGÍA",
                        estado: {
                            exito: false,
                            error: false,
                        },
                    },
                    {
                        compound: "compuesto 8",
                        category: "BIOTECNOLOGÍA",
                        estado: {
                            exito: false,
                            error: false,
                        },
                    },
                ],
            };
            this.contador = 0;
        },
    },
    mounted() {},
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
