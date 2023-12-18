<template>
    <!--Falta poner el encabezado aqui-->
    <div class="container-fluid flex flex-col">
        <div class="container-fluid mt-5">
            <h1 class="text-4xl text-center ">Ranking de Mejores Tiempos</h1>
        </div>
        <div class="container-fluid flex flex-col justify-center p-3 m-4">
            <table class="table text-gray-400 space-y-6 text-sm border-separate border-spacing-y-3">
                <thead class="bg-blue-500 text-white">
                    <tr>
                        <th class="p-3 rounded-l-xl text-left">Posición</th>
                        <th class="p-3 text-left">Nick</th>
                        <th class="p-3 text-left">Tiempo</th>
                        <th class="p-3 text-left rounded-r-xl text-left">Dificultad</th>
                    </tr>
                </thead>
                <tbody>
                    <tr class="bg-blue-200 lg:text-black">
                        <td class="p-3 rounded-l-xl text-left">1</td>
                        <td class="p-3 font-medium uppercase ">Daniel</td>
                        <td class="p-3">05:27:47</td>
                        <td class="p-3 capitalize rounded-r-xl text-left">Principiante</td>
                    </tr>
                        <tr class="bg-blue-200 lg:text-black">
                        <td class="p-3 rounded-l-xl text-left">2</td>
                        <td class="p-3 font-medium uppercase ">David</td>
                        <td class="p-3">06:10:39</td>
                        <td class="p-3 capitalize rounded-r-xl text-left">Medio</td>
                    </tr>
                        <tr class="bg-blue-200 lg:text-black">
                        <td class="p-3 rounded-l-xl text-left">3</td>
                        <td class="p-3 font-medium uppercase ">Nestor</td>
                        <td class="p-3">12:34:53</td>
                        <td class="p-3 capitalize rounded-r-xl text-left">Avanzado</td>
                    </tr>
                    <tr class="bg-blue-200 lg:text-black">
                        <td class="p-3 font-medium rounded-l-xl text-left">4</td>
                        <td class="p-3 font-medium uppercase ">Xabier</td>
                        <td class="p-3">20:23:43</td>
                        <td class="p-3 capitalize rounded-r-xl text-left">Medio</td>
                    </tr>
                </tbody>
            </table>
            <div class="flex flex-col items-center m-5">
                <h2 class="text-l m-3">¿¿Te gustaría volver a jugar??</h2>
                <router-link to="Login" class="m-3 border rounded-lg w-30 p-3 text-center bg-[#95CFAB]">Volver a Jugar</router-link>
            </div>
        </div>
    </div>
    <!--Falta poner el footer aqu-->
</template>
<script></script>
