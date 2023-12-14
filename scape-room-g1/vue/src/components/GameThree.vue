<template>
    <div class="container-fluid md: lg xl bg-gradient-to-r from-emerald-500 to-emerald-900">
            <header>
                <h1 class="text-4xl text-center font-bold text-gray-50 bg-black px-3 py-8 m-1">El Rompecabezas de los Elementos</h1>
            </header>

                <main class="m-5">
                    <p class="border-transparent shadow-xl p-2 rounded-lg m-1 text-center m-auto bg-gradient-to-r from-slate-300 to-slate-400">Trabaja tu memoria volteado las tarjetas y juntando las imagenes con los nombres</p>
                </main>

                <div class="grid grid-cols-2 gap-5 items-center m-5 justify-items-center m-5 ">
                    <div v-for="card in cards" class="w-32 h-32 bg-gradient-to-r from-slate-300 to-slate-400 rounded-xl shadow-lg p-3 text-center align-center md:hover:scale-110">
                        <p class="hidden " >{{ card.name }}</p>
                    </div>
                    <div v-for="card in cards" class="w-32 h-32 bg-gradient-to-r from-slate-300 to-slate-400 rounded-xl shadow-lg p-3 text-center align-center">
                        <p class="hidden ">{{ card.img }}</p>
                    </div>
                </div>

    </div>
</template>
