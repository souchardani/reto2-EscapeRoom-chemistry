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
                        <GlassJuego2>{{
                            compoundElement.compound
                        }}</GlassJuego2>
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
                    <Draggable
                        v-for="compuesto in compoundDataEach.biotecnologia"
                        :key="compuesto.compound"
                    >
                        <GlassJuego2>{{ compuesto.compound }}</GlassJuego2>
                    </Draggable>
                </Container>
            </div>
        </div>
    </div>

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
//libreria para el draggable
import { Container, Draggable } from "vue3-smooth-dnd";
import GlassJuego2 from "../components/GlassJuego2.vue";

export default {
    components: {
        GlassJuego2,
        Container,
        Draggable,
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
                        compound: "Arrastra aqui ☝️☝️",
                        category: "ANALISIS",
                    },
                ],

                analisis: [
                    {
                        compound: "Arrastra aqui ☝️☝️",
                        category: "ANALISIS",
                    },
                ],
                medida: [
                    {
                        compound: "Arrastra aqui ☝️☝️",
                        category: "ANALISIS",
                    },
                ],
                biotecnologia: [
                    {
                        compound: "Arrastra aqui ☝️☝️",
                        category: "ANALISIS",
                    },
                ],
                backlog: [
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

<style>
.placeholder {
    background: rgba(33, 33, 33, 0.3);
    border-radius: 0.4rem;
    transform: scaleY(0.85);
    transform-origin: 0% 0%;
}
</style>
