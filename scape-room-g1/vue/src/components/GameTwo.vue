<template>
<div class="container-fluid md: lg xl bg-gradient-to-r from-emerald-500 to-emerald-900">
        <header>
            <h1 class="text-4xl text-center font-bold text-gray-50 bg-black px-3 py-8 m-1">Agrupando</h1>
        </header>

        <main class="m-5">
            <p class="border-transparent shadow-xl p-2 rounded-lg m-1 text-center m-auto bg-gradient-to-r from-slate-300 to-slate-400">
                Demuestra tu conocimiento agrupando los compuestos con sus categorías.
            </p>
        </main>

        <!-- Los divs de las categorias -->
        <div class="container-fluid">
            <div class="grid grid-cols-1 sm:grid-cols-4 p-0 text-center">
                <div class="bg-gradient-to-r from-yellow-300 to-orange-500 p-1 h-32">
                    Analisis
                </div>
                <div class="bg-gradient-to-r from-green-400 to-green-800 p-1 h-32">
                    Microbiología
                </div>
                <div class="bg-gradient-to-r from-blue-400 to-indigo-800 p-1 h-32">
                    Medida
                </div>
                <div class="bg-gradient-to-r from-zinc-300 to-zinc-500 p-1 h-32">
                    Biotecnología
                </div>
            </div>
        </div>



        <!-- El div de los compuestos -->
        <div class="container-fluid my-32">
            <div class="grid grid-cols-2 sm:grid-cols-4 p-0 text-center">
                <div class="border-2 border-gray-950 bg-gradient-to-r from-stone-300 via-zinc-400 to-stone-300 rounded m-1" v-for="compoundElement in compoundTestData">
                    {{ compoundElement.compound }} {{ compoundElement.category }}
                </div>
            </div>

        </div>
</div>

</template>
<script>
export default{
    data() {
        return {
            // datos de prueba para el diseño
            compoundTestData: [
                {
                    compound: 'compuesto 1',
                    category: 'ANALISIS'
                },
                {
                    compound: 'compuesto 2',
                    category: 'ANALISIS'
                },
                {
                    compound: 'compuesto 3',
                    category: 'MICROBIOLOGÍA'
                },
                {
                    compound: 'compuesto 4',
                    category: 'MICROBIOLOGÍA'
                },
                {
                    compound: 'compuesto 5',
                    category: 'MEDIDA'
                },
                {
                    compound: 'compuesto 6',
                    category: 'MEDIDA'
                },
                {
                    compound: 'compuesto 7',
                    category: 'BIOTECNOLOGÍA'
                },
                {
                    compound: 'compuesto 8',
                    category: 'BIOTECNOLOGÍA'
                }
            ],
            compoundData: []
        }
    },
    methods:{

    },
    mounted() {

    },


}
</script>
