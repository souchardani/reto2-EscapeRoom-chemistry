<template>
    <!--Falta poner el encabezado aqui-->
    <div class="container-fluid flex flex-col relative container-fluid backdrop-blur-lg min-h-screen px-2 md:px-12 p-8"
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
                    transparent 81%);">
        <div class="container-fluid mt-5">
            <h1 class="text-4xl text-center">Ranking de Mejores Tiempos</h1>
        </div>
        <div class="container-fluid flex flex-col justify-center p-1 m-2">
            <GlassCard>
                <table class="table w-full text-sm border-separate border-spacing-y-1 md:border-spacing-y-3 md:text-md lg:border-spacing-y-4 lg:text-lg">
                        <thead>
                            <tr class="shadow-xl rounded-xl">
                                <th class="md:p-3 rounded-l-xl text-center">Posición</th>
                                <th class="md:p-3 text-center">Nick</th>
                                <th class="md:p-3 text-center">Tiempo</th>
                                <th class="md:p-3 text-center rounded-r-xl">Dificultad</th>
                            </tr>
                        </thead>
                    <tbody class="">
                        <tr class="shadow-xl rounded-xl">
                            <td class="md:p-3 rounded-l-xl text-center">1</td>
                            <td class="md:p-3 font-medium uppercase text-center">Daniel</td>
                            <td class="md:p-3 text-center">05:27:47</td>
                            <td class="md:p-3 capitalize rounded-r-xl text-center">Principiante</td>
                        </tr>
                            <tr class="shadow-xl rounded-xl">
                            <td class="md:p-3 rounded-l-xl text-center">2</td>
                            <td class="md:p-3 font-medium uppercase text-center">David</td>
                            <td class="md:p-3 text-center">06:10:39</td>
                            <td class="md:p-3 capitalize rounded-r-xl text-center">Medio</td>
                        </tr>
                            <tr class="shadow-xl rounded-xl">
                            <td class="md:p-3 rounded-l-xl text-center">3</td>
                            <td class="md:p-3 font-medium uppercase text-center">Nestor</td>
                            <td class="md:p-3 text-center">12:34:53</td>
                            <td class="md:p-3 capitalize rounded-r-xl text-center">Avanzado</td>
                        </tr>
                        <tr class="shadow-xl rounded-xl">
                            <td class="md:p-3 rounded-l-xl text-center">4</td>
                            <td class="md:p-3 font-medium uppercase text-center">Xabier</td>
                            <td class="md:p-3 text-center">20:23:43</td>
                            <td class="md:p-3 capitalize rounded-r-xl text-center">Medio</td>
                        </tr>
                    </tbody>
                </table>
            </GlassCard>
            <div class="flex flex-col items-center m-5">
                <router-link to="Login" class="m-3 border rounded-lg w-30 p-3 text-center bg-[#95CFAB]">Volver a Jugar</router-link>
            </div>
        </div>
    </div>
    <!--Falta poner el footer aqu-->
</template>
<script>
import GlassCard from '../components/GlassCard.vue';
export default{
    components:{GlassCard}
}
</script>
