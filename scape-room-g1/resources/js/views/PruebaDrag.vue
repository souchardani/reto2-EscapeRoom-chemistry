<template>
    <!-- Los divs de las categorias -->
    <div
        class="relative container-fluid min-h-screen px-8 p-3 md:px-20"
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
        <!--Boton de salir-->
        <div class="flex justify-end">
            <BtnSalir></BtnSalir>
        </div>
        <!--titulo del juego-->
        <GameTitle :texto="titulo"></GameTitle>
        <!--Descripcion del juego-->
        <DescripcionJuego :texto="descripcion"></DescripcionJuego>
        <!--barra de progreso-->
        <ProgressBar></ProgressBar>
        <!--juego-->
        <div
            id="board"
            class="grid grid-cols-1 gap-4 sm:grid-cols-4 p-0 text-center"
        >
            <!-- div prueba -->
            <div
                id="filaCompuesto"
                class="rounded-xl bg-orange-500 pt-3 p-1 px-3 shadow-lg bg-clip-padding bg-opacity-75"
            >
                <div class="filaTitulo mb-5">Analisis</div>
                <Container
                    group-name="compuestos"
                    @drag-start="handleDragStart('analisis', $event)"
                    @drop="handleDrop('analisis', $event)"
                    :get-child-payload="getChildPayload"
                    :drop-placeholder="{ className: 'placeholder' }"
                >
                    <Draggable
                        v-for="compuesto in compoundDataEach.analisis"
                        :key="compuesto.compound"
                    >
                        <GlassJuego2>{{ compuesto.compound }}</GlassJuego2>
                    </Draggable>
                </Container>
            </div>
            <div
                id="filaCompuesto"
                class="rounded-xl bg-green-500 pt-3 p-1 px-3 shadow-lg bg-clip-padding bg-opacity-75"
            >
                <div class="filaTitulo mb-5">Microbiología</div>
                <Container
                    group-name="compuestos"
                    @drag-start="handleDragStart('microbiologia', $event)"
                    @drop="handleDrop('microbiologia', $event)"
                    :get-child-payload="getChildPayload"
                    :drop-placeholder="{ className: 'placeholder' }"
                >
                    <Draggable
                        v-for="compuesto in compoundDataEach.microbiologia"
                        :key="compuesto.compound"
                    >
                        <GlassJuego2>{{ compuesto.compound }}</GlassJuego2>
                    </Draggable>
                </Container>
            </div>
            <div
                id="filaCompuesto"
                class="rounded-xl bg-blue-400 pt-3 p-1 px-3 shadow-lg bg-clip-padding bg-opacity-75"
            >
                <div class="filaTitulo mb-5">Medida</div>
                <Container
                    group-name="compuestos"
                    @drag-start="handleDragStart('medida', $event)"
                    @drop="handleDrop('medida', $event)"
                    :get-child-payload="getChildPayload"
                    :drop-placeholder="{ className: 'placeholder' }"
                >
                    <Draggable
                        v-for="compuesto in compoundDataEach.medida"
                        :key="compuesto.compound"
                    >
                        <GlassJuego2>{{ compuesto.compound }}</GlassJuego2>
                    </Draggable>
                </Container>
            </div>
            <div
                id="filaCompuesto"
                class="rounded-xl bg-zinc-400 pt-3 p-1 px-3 shadow-lg bg-clip-padding bg-opacity-75"
            >
                <div class="filaTitulo mb-5">Biotecnología</div>
                <Container
                    group-name="compuestos"
                    @drag-start="handleDragStart('biotecnologia', $event)"
                    @drop="handleDrop('biotecnologia', $event)"
                    :get-child-payload="getChildPayload"
                    :drop-placeholder="{ className: 'placeholder' }"
                >
                    <Draggable
                        v-for="compuesto in compoundDataEach.biotecnologia"
                        :key="compuesto.compound"
                    >
                        <GlassJuego2>{{ compuesto.compound }}</GlassJuego2>
                    </Draggable>
                </Container>
            </div>
        </div>
        <!--Reloj del juego-->
        <Reloj></Reloj>
    </div>
    <!-- la router view -->
    <div
        id="board"
        class="grid grid-cols-1 gap-4 sm:grid-cols-4 p-0 text-center"
    >
        <!-- div prueba -->
        <div
            id="filaCompuesto"
            class="rounded-xl bg-orange-500 pt-3 p-1 px-3 shadow-lg bg-clip-padding bg-opacity-75"
        >
            <div class="filaTitulo mb-5">Analisis</div>
            <Container
                group-name="compuestos"
                @drag-start="handleDragStart('analisis', $event)"
                @drop="handleDrop('analisis', $event)"
                :get-child-payload="getChildPayload"
                :drop-placeholder="{ className: 'placeholder' }"
            >
                <Draggable
                    v-for="compuesto in compoundDataEach.analisis"
                    :key="compuesto.compound"
                >
                    <GlassJuego2>{{ compuesto.compound }}</GlassJuego2>
                </Draggable>
            </Container>
        </div>
        <div
            id="filaCompuesto"
            class="rounded-xl bg-green-500 pt-3 p-1 px-3 shadow-lg bg-clip-padding bg-opacity-75"
        >
            <div class="filaTitulo mb-5">Microbiología</div>
            <Container
                group-name="compuestos"
                @drag-start="handleDragStart('microbiologia', $event)"
                @drop="handleDrop('microbiologia', $event)"
                :get-child-payload="getChildPayload"
                :drop-placeholder="{ className: 'placeholder' }"
            >
                <Draggable
                    v-for="compuesto in compoundDataEach.microbiologia"
                    :key="compuesto.compound"
                >
                    <GlassJuego2>{{ compuesto.compound }}</GlassJuego2>
                </Draggable>
            </Container>
        </div>
        <div
            id="filaCompuesto"
            class="rounded-xl bg-blue-400 pt-3 p-1 px-3 shadow-lg bg-clip-padding bg-opacity-75"
        >
            <div class="filaTitulo mb-5">Medida</div>
            <Container
                group-name="compuestos"
                @drag-start="handleDragStart('medida', $event)"
                @drop="handleDrop('medida', $event)"
                :get-child-payload="getChildPayload"
                :drop-placeholder="{ className: 'placeholder' }"
            >
                <Draggable
                    v-for="compuesto in compoundDataEach.medida"
                    :key="compuesto.compound"
                >
                    <GlassJuego2>{{ compuesto.compound }}</GlassJuego2>
                </Draggable>
            </Container>
        </div>
        <div
            id="filaCompuesto"
            class="rounded-xl bg-zinc-400 pt-3 p-1 px-3 shadow-lg bg-clip-padding bg-opacity-75"
        >
            <div class="filaTitulo mb-5">Biotecnología</div>
            <Container
                group-name="compuestos"
                @drag-start="handleDragStart('biotecnologia', $event)"
                @drop="handleDrop('biotecnologia', $event)"
                :get-child-payload="getChildPayload"
                :drop-placeholder="{ className: 'placeholder' }"
            >
                <Draggable
                    v-for="compuesto in compoundDataEach.biotecnologia"
                    :key="compuesto.compound"
                >
                    <GlassJuego2>{{ compuesto.compound }}</GlassJuego2>
                </Draggable>
            </Container>
        </div>
    </div>

    <!-- El div de los compuestos -->
    <div class="container-fluid my-12">
        <div
            class="grid grid-cols-2 sm:grid-cols-4 p-0 text-center gap-y-4 gap-x-2"
        >
            <GlassJuego2 v-for="compoundElement in compoundTestData">
                {{ compoundElement.compound }} {{ compoundElement.category }}
            </GlassJuego2>
        </div>
    </div>
</template>

<script>
//libreria para el draggable
import DescripcionJuego from "../components/DescripcionJuego.vue";
import ProgressBar from "../components/ProgressBar.vue";
import Reloj from "../components/Reloj.vue";
import GameTitle from "../components/GameTitle.vue";
import BtnSalir from "../components/BtnSalir.vue";
import { Container, Draggable } from "vue3-smooth-dnd";
import GlassJuego2 from "../components/GlassJuego2.vue";

export default {
    components: {
        GlassJuego2,
        Container,
        Draggable,
        DescripcionJuego,
        ProgressBar,
        Reloj,
        GameTitle,
        BtnSalir,
    },
    data() {
        return {
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
                    category: "MICROBIOLOGÍA",
                },
                {
                    compound: "compuesto 4",
                    category: "MICROBIOLOGÍA",
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
                    category: "BIOTECNOLOGÍA",
                },
                {
                    compound: "compuesto 8",
                    category: "BIOTECNOLOGÍA",
                },
            ],
            compoundDataEach: {
                microbiologia: [
                    {
                        compound: "compuesto 3",
                        category: "MICROBIOLOGÍA",
                    },
                    {
                        compound: "compuesto 4",
                        category: "MICROBIOLOGÍA",
                    },
                ],

                analisis: [
                    {
                        compound: "compuesto 1",
                        category: "ANALISIS",
                    },
                    {
                        compound: "compuesto 2",
                        category: "ANALISIS",
                    },
                ],
                medida: [
                    {
                        compound: "compuesto 5",
                        category: "MEDIDA",
                    },
                    {
                        compound: "compuesto 6",
                        category: "MEDIDA",
                    },
                ],
                biotecnologia: [
                    {
                        compound: "compuesto 7",
                        category: "BIOTECNOLOGÍA",
                    },
                    {
                        compound: "compuesto 8",
                        category: "BIOTECNOLOGÍA",
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
            console.log(dragResult);
            const { payload, isSource } = dragResult;
            if (isSource) {
                this.dragginCard = {
                    fila,
                    index: payload.index,
                    cardData: {
                        ...this.compoundDataEach[fila][payload.index],
                    },
                };
                console.log(this.dragginCard);
            }
        },
        handleDrop(fila, dropResult) {
            console.log(dropResult);
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
            }
        },
        getChildPayload(index) {
            return {
                index,
            };
        },
    },
    mounted() {},
};
</script>

<style></style>
