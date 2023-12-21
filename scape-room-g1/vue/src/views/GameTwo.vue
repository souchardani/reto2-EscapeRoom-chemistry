<template>
    <!-- Los divs de las categorias -->
    <div class="container-fluid mt-16">
        <div class="grid grid-cols-1 gap-4 sm:grid-cols-4 p-0 text-center">
            <div
                class="rounded-xl bg-orange-500 p-1 h-32 shadow-lg bg-clip-padding bg-opacity-75 grid place-content-center"
            >
                Analisis
            </div>
            <div
                class="rounded-xl bg-green-500 shadow-lg bg-clip-padding bg-opacity-75 grid place-content-center p-1 h-32"
            >
                Microbiología
            </div>
            <div
                class="rounded-xl bg-blue-400 shadow-lg bg-clip-padding bg-opacity-75 grid place-content-center p-1 h-32"
            >
                Medida
            </div>
            <div
                class="rounded-xl bg-zinc-500 shadow-lg bg-clip-padding bg-opacity-75 grid place-content-center p-1 h-32"
            >
                Biotecnología
            </div>
        </div>
    </div>

    <!-- El div de los compuestos -->
    <div class="container-fluid my-24">
        <div
            class="grid grid-cols-2 sm:grid-cols-4 p-0 text-center gap-y-4 gap-x-2"
        >
            <GlassBtn v-for="compoundElement in compoundTestData">
                {{ compoundElement.compound }} {{ compoundElement.category }}
            </GlassBtn>
        </div>
    </div>
</template>
<script>
import GlassBtn from "../components/GlassBtn.vue";

export default {
    components: {
        GlassBtn,
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
            compoundData: [],
        };
    },
    methods: {},
    mounted() {},
};
</script>
