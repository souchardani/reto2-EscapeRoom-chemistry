<template>
    <div
        class="container-fluid backdrop-blur-lg min-h-screen px-2 p-2 pt-8 md:px-12 md:p-8 overflow-hidden"
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
        <h1
            class="text-center font-medium px-5 mb-10 text-5xl md:text-4xl mb-5 drop-shadow-2xl"
        >
            Scape Room
        </h1>
        <!-- main component in movil -->
        <div class="lg:hidden">
            <!-- glass card -->
            <!-- component -->

            <div class="relative py-3 sm:max-w-xl sm:mx-auto m-6">
                <div
                    class="text-justify relative px-8 py-10 bg-white shadow-lg rounded-3xl sm:rounded-3xl sm:p-20 bg-clip-padding bg-opacity-60 border border-gray-200"
                    style="backdrop-filter: blur(20px)"
                >
                    <div class="max-w-md mx-auto">
                        <div>
                            <img
                                :src="'/img/labmainrecorte2.jpg'"
                                alt="laboratorio"
                                class="rounded-lg mb-7 shadow-xl"
                            />
                        </div>
                        <div>
                            <h2
                                class="text-3xl font-bold tracking-tight sm:text-4xl"
                            >
                                ¿Que Tenía el Vial?
                            </h2>
                        </div>
                        <div class="divide-y divide-gray-200">
                            <div
                                class="pb-8 text-base leading-6 space-y-4 text-gray-700 sm:text-lg sm:leading-7"
                            >
                                <p class="mt-6 text-md leading-8">
                                    En un laboratorio de máxima seguridad
                                    biológica, seguridad de nivel 4, ha ocurrido
                                    un terrible accidente. Por suerte, la
                                    persona que lo ha roto se ha apresurado a
                                    presionar la alarma y se han cerrados las
                                    puertas blindadas para evitar la expansión
                                    del agente biológico. Tenemos 30 minutos
                                    para que, por medio de diferentes pruebas,
                                    determinar el antídoto para ingerirlo y
                                    acabar con el microorganismo mortal.
                                </p>
                            </div>
                            <div
                                class="pt-6 text-base leading-6 font-bold sm:text-lg sm:leading-7"
                            ></div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- glass card -->
            <div class="flex items-center justify-center gap-x-6 md:py-20">
                <router-link to="/StartGame">
                    <GlassBtn> Iniciar Partida </GlassBtn>
                </router-link>
            </div>
        </div>
        <!-- main component desktop -->
        <div class="hidden lg:block">
            <div class="py-24">
                <div class="flex gap-x-20 pt-0">
                    <div
                        class="mx-auto max-w-md text-center lg:mx-0 lg:flex-auto lg:py-32 lg:text-left"
                    >
                        <h2
                            class="text-4xl text-gray-800 font-bold tracking-tight"
                        >
                            ¿Que Tenía el Vial?
                        </h2>
                        <p class="mt-6 text-lg leading-8 text-gray-100">
                            En un laboratorio de máxima seguridad biológica,
                            seguridad de nivel 4, ha ocurrido un terrible
                            accidente. Por suerte, la persona que lo ha roto se
                            ha apresurado a presionar la alarma y se han
                            cerrados las puertas blindadas para evitar la
                            expansión del agente biológico. Tenemos 30 minutos
                            para que, por medio de diferentes pruebas,
                            determinar el antídoto para ingerirlo y acabar con
                            el microorganismo mortal.
                        </p>
                        <div
                            class="mt-10 flex items-center justify-center gap-x-6 lg:justify-start"
                        >
                            <router-link to="/Login">
                                <GlassBtn> Iniciar Partida </GlassBtn>
                            </router-link>
                            <router-link
                                to="/Ranking"
                                class="text-sm font-semibold leading-6 text-white"
                                >Acceder al ranking
                                <span aria-hidden="true">→</span></router-link
                            >
                        </div>
                    </div>
                    <div class="relative mt-16 h-80 lg:mt-8">
                        <img
                            class="absolute left-16 top-0 w-[57rem] h-30 max-w-none rounded-md bg-white/5 ring-1 ring-white/10"
                            :src="'/img/labmainrecorte2.jpg'"
                            alt="App screenshot"
                            width="1824"
                            height="1080"
                        />
                    </div>
                </div>
            </div>
        </div>

        <!-- footer transparente -->
        <div
            class="w-100 py-3 mt-8 max-sm:max-w-xl max-sm:mx-auto max-sm:m-6 lg:mt-24"
        >
            <!-- aqui va el footer -->
            <Footer></Footer>
        </div>
    </div>
</template>

<script>
import Footer from "../components/Footer.vue";
import GlassBtn from "../components/GlassBtn.vue";
export default {
    components: {
        Footer,
        GlassBtn,
    },
};
</script>

<!-- glass component -->
<!-- <div class="w-100 p-3 m-6">
    <div
        class="text-justify relative px-8 py-10 bg-white shadow-lg rounded-3xl sm:rounded-3xl bg-clip-padding bg-opacity-60 border border-gray-200"
        style="backdrop-filter: blur(20px)"
    >
        <div class="mx-auto">
            contenido
        </div>
    </div>
</div> -->
