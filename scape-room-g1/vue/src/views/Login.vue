<template>
    <!-- component -->
    <div class="bg-gradient-to-r from-slate-500 to-slate-800">
        <div class="flex justify-center h-screen">
            <div
                class="relative hidden bg-cover lg:block lg:w-2/3"
                style="background-image: url(/puerta.jpg)"
            >
                <div
                    class="flex items-center h-full px-20 bg-gray-900 bg-opacity-75"
                >
                    <div>
                        <h2 class="text-4xl font-bold text-white">
                            Que tenía el Vial
                            <i class="ph ph-flask font-5xl"></i>
                        </h2>

                        <p class="max-w-xl mt-3 text-gray-300 text-lg">
                            Entra en nuestro scape room y descubre un mundo de
                            aventuras!
                        </p>
                    </div>
                    <i
                        class="absolute ph ph-test-tube lg:bottom-150 left-3 text-2xl"
                    ></i>
                </div>
            </div>

            <div
                class="flex items-center w-full max-w-md px-6 mx-auto lg:w-1/3"
            >
                <div class="flex-1">
                    <div class="text-center">
                        <h2
                            class="text-4xl font-bold text-center text-gray-100 dark:text-white"
                        >
                            Accede al juego
                        </h2>
                        <!-- <img src="../assets/img/puerta.jpg" alt="" /> -->

                        <p class="my-5 text-gray-200">
                            Introduce un nick para guardar tu progreso y tu
                            clasificacion, y la contraseña de acceso.
                        </p>
                        <!-- tarjeta -->

                        <div
                            id="tarjeta-info"
                            class="flex align-center justify-between gap-5 font-medium font-bold text-gray-500 text-sm bg-yellow-100 text-yellow-700 py-8 px-5 rounded-lg relative"
                        >
                            <i class="ph ph-info text-2xl"></i>
                            <span class="text-left"
                                >Aqui tienes tu primer reto, presiona el tubo de
                                ensayo escondido en la página (debes buscar
                                bien) y descubre como puedes encontrar la
                                contraseña de acceso</span
                            >
                            <i
                                class="ph ph-x absolute top-2 right-2 text-xl hover:scale-125 cursor-pointer"
                            ></i>
                        </div>
                    </div>

                    <div class="mt-8">
                        <form>
                            <div>
                                <label
                                    for="nickJugador"
                                    class="block mb-2 text-sm text-gray-200 font-bold"
                                    >Nick del juego</label
                                >
                                <input
                                    type="text"
                                    name="nickJugador"
                                    id="nickJugador"
                                    placeholder="Daniel_Jugador1"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                />
                            </div>

                            <div class="mt-6">
                                <div class="flex justify-between mb-2">
                                    <label
                                        for="clave-acceso"
                                        class="text-sm text-gray-200 font-bold"
                                        >Clave de acceso</label
                                    >
                                    <a
                                        href="#"
                                        class="text-sm text-gray-400 focus:text-blue-500 hover:text-blue-500 hover:underline"
                                        >No tienes la clave?</a
                                    >
                                </div>

                                <input
                                    type="password"
                                    name="clave-acceso"
                                    id="clave-acceso"
                                    placeholder="Debes buscar la clave con las pistas de la web"
                                    class="block w-full px-4 py-2 mt-2 text-gray-700 placeholder-gray-400 bg-white border border-gray-200 rounded-md dark:placeholder-gray-600 dark:bg-gray-900 dark:text-gray-300 dark:border-gray-700 focus:border-blue-400 dark:focus:border-blue-400 focus:ring-blue-400 focus:outline-none focus:ring focus:ring-opacity-40"
                                />
                            </div>

                            <div class="mt-6">
                                <button
                                    class="w-full px-4 py-2 tracking-wide text-white transition-colors duration-200 transform bg-blue-500 rounded-md hover:bg-blue-400 focus:outline-none focus:bg-blue-400 focus:ring focus:ring-blue-300 focus:ring-opacity-50"
                                >
                                    Iniciar partida
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script></script>
